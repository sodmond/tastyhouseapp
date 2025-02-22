<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentController;
use App\Models\Admin;
use App\Models\Seller;
use App\Models\BasicSetting;
use App\Models\Book;
use App\Models\Earning;
use App\Models\Order;
use App\Models\Payout;
use App\Notifications\ApprovalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Calculation\Database\DMax;
use Unicodeveloper\Paystack\Facades\Paystack;

class HomeController extends Controller
{
    public function home()
    {
        return redirect()->route('seller.home');
    }

    public function index()
    {
        #$books = Book::where('seller_id', auth('seller')->id())->pluck('id');
        return view('seller.home');
    }

    public function requestApproval(Request $request)
    {
        $admin = Admin::find(1);
        $admin->notify(new ApprovalRequest(auth('seller')->id()));
        return back()->with('success', 'Approval request has been sent.');
    }

    public function premiumPayment(Request $request)
    {
        $basic_settings = BasicSetting::find(1);
        if ($request->method() == 'GET') {
            return view('seller.premium_payment', compact('basic_settings'));
        }
        $data = [
            'amount'    => ($basic_settings->seller_premium_fee * 100),
            'email'     => auth('seller')->user()->email,
            'currency'  => 'NGN',
            'reference' => Paystack::genTranxRef(),
            'metadata' => [
                'seller_id' => auth('seller')->id(),
                'seller_premium' => true
            ],
            'callback_url' => route('payment.verify')
        ];
        try {
            $paymentUrl = Paystack::getsellerizationUrl($data);
            return $paymentUrl->redirectNow();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->withErrors(['err_msg' => 'Problem encountered, pls try again']);
        }
    }

    public static function setSellerPro($paymentData)
    {
        $paymentMeta = $paymentData['metadata'];
        DB::beginTransaction();
        try {
            $transactions = DB::table('transactions')->where('reference', $paymentData['reference'])->get();
            if ($transactions->count() < 1) {
                $transaction = DB::table('transactions')->insertGetId([
                    'type' => 'purchase',
                    'method' => 'Paystack',
                    'amount' => $paymentData['amount']/100,
                    'reference' => $paymentData['reference'],
                    'memo' => '',
                    'status' => 'completed',
                    'created_at' => now()
                ]);
                $seller = Seller::find($paymentMeta['seller_id']);
                $seller->level = 'pro';
                $seller->payment_id = $transaction;
                $seller->save();
            }
            DB::commit();
            return redirect()->route('seller.blog');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect()->route('seller.blog')->withErrors(['err_msg' => 'Problem encountered with payment, pls contact administrator.']);
        }
    }
}
