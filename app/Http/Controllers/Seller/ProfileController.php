<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Mail\SendPasswordChange;
use App\Models\Seller;
use App\Models\sellerParent;
use App\Models\City;
use App\Models\Shipping;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        #$seller_parent = sellerParent::where('seller_id', auth('seller')->id())->first();
        /*$age = Carbon::now()->diff(auth('seller')->user()->dob);
        if (!$seller_parent) {
            $seller_parent = sellerParent::create(['seller_id' => auth('seller')->id()]);
        }*/
        $states = State::all();
        return view('seller.profile', compact('states'));
    }

    public function edit()
    {
        $states = State::all();
        $cities = City::where('state_id', auth('seller')->user()->state)->get();
        return view('seller.profile_edit', compact('states', 'cities'));
    }

    public function update(ProfileRequest $request)
    {
        auth('seller')->user()->update($request->all());
        return back()->with('success', 'Profile successfully updated.');
    }

    public function updateImage(Request $request)
    {
        $this->validate($request, [
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:512', Rule::dimensions()->minWidth(370)->ratio(1 / 1)]
        ]);
        if (Storage::exists('public/'.auth('seller')->user()->image)) {
            Storage::delete('public/'.auth('seller')->user()->image);
        }
        $imgName = time() . '.' . $request->file('image')->extension();
        $request->file('image')->storeAs("seller/profile_pix", $imgName, 'public');
        Seller::where('id', auth('seller')->id())->update(['image' => $imgName]);
        return back()->with('success', 'Profile picture successfully updated.');
    }

    public function password()
    {
        return view('seller.change_password');
    }

    public function passwordUpdate(PasswordRequest $request)
    {
        auth('seller')->user()->update(['password' => Hash::make($request->get('password'))]);
        #Mail::to(auth('seller')->user()->email)->send(new SendPasswordChange(auth('seller')->user()->firstname));
        return back()->with('success', 'Password successfully updated.');
    }
}
