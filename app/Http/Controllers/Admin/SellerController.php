<?php

namespace App\Http\Controllers\Admin;

use App\Exports\sellersExport;
use App\Http\Controllers\Controller;
use App\Mail\ApprovalStatus;
use App\Models\sellersBlog;
use App\Models\Book;
use App\Models\Earning;
use App\Models\Order;
use App\Models\Payout;
use App\Models\Seller;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class SellerController extends Controller
{
    public function index()
    {
        if (isset($_GET['search'])) {
            $searchVal = $_GET['search'];
            $searchArr = explode(' ', $searchVal);
            $sellers = Seller::whereIn('firstname', $searchArr)->orWhereIn('lastname', $searchArr)->orderByDesc('created_at')->paginate(10);
            return view('admin.sellers.index', compact('sellers'));
        }
        $sellers = Seller::orderByDesc('created_at')->paginate(10);
        $sellers_pending = Seller::where('approval', false);
        return view('admin.sellers.index', compact('sellers', 'sellers_pending'));
    }

    public function pending()
    {
        $sellers = seller::where('approval', false)->paginate(10);
        return view('admin.sellers.pending', compact('sellers'));
    }

    public function get($id)
    {
        $seller = seller::find($id);
        return view('admin.sellers.single', compact('seller'));
    }

    public function approval($id, Request $request)
    {
        $this->validate($request, [
            'status' => 'required|integer'
        ]);
        $seller = Seller::find($id);
        if ($request->status == 1) {
            $seller->update(['approval' => 1]);
            Mail::to($seller->email)->send(new ApprovalStatus(1));
            return back()->with('success', 'seller has been notified of profile approval.');
        }
        if ($request->status == 0) {
            Mail::to($seller->email)->send(new ApprovalStatus(0));
            return back()->with('success', 'seller has been notified of profile decline.');
        }
    }

    public function export()
    {
        if (isset($_GET['month']) && isset($_GET['year'])) {
            $month = $_GET['month'];
            $year = $_GET['year'];
            $dateObj = DateTime::createFromFormat('!m', $month);
            $monthName = $dateObj->format('F');
            $fileName = 'sellers-'.$monthName.$year.'.xlsx';
            return Excel::download(new sellersExport($month, $year), $fileName);
        }
        return redirect()->back();
    }

    public function books($id)
    {
        $seller = seller::find($id);
        $books = Book::where('seller_id', $id)->orderByDesc('created_at')->paginate(10);
        return view('admin.books.index', compact('books', 'seller'));
    }

    public function blog($id)
    {
        $seller = seller::find($id);
        $blog = sellersBlog::where('seller_id', $id)->orderByDesc('created_at')->paginate(10);
        return view('admin.blog.index', compact('blog', 'seller'));
    }

    public function sales($id)
    {
        $seller = seller::find($id);
        $earnings = Earning::where('seller_id', $id)->orderByDesc('created_at')->paginate(10);
        $orders = Order::all()->keyBy('id');
        return view('admin.revenue.earnings', compact('earnings', 'orders', 'seller'));
    }

    public function payouts($id)
    {
        $seller = seller::find($id);
        $payouts = Payout::where('seller_id', $id)->orderByDesc('created_at')->paginate(10);
        return view('admin.revenue.payout_list', compact('payouts', 'seller'));
    }

    public function ban($id)
    {
        $seller = seller::find($id);
        if ($seller) {
            if ($seller->ban_status == false) {
                $seller->ban_status = true;
                $seller->save();
                return back()->with('success', 'seller has been banned');
            }
            $seller->ban_status = false;
            $seller->save();
            return back()->with('success', 'seller ban has been lifted');
        }
    }
}
