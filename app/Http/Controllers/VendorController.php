<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function about()
    {
        return view('seller_become');
    }

    public function index()
    {
        return view('sellers');
    }

    public function view()
    {
        return view('seller_details');
    }
}
