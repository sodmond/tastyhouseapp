<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\ProductCategory;
use App\Models\State;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getCitiesforState($state_id)
    {
        $state = State::find($state_id);
        if (!$state) {
            return response()->json(['error' => 'Not found'], 404);
        }
        return response()->json(['cities' => $state->cities], 200);
    }

    public function about()
    {
        return view('about');
    }

    public function faq()
    {
        return view('faq');
    }

    public function contact()
    {
        return view('contact');
    }

    public function tandc()
    {
        return view('terms_conditions');
    }

    public function privacyPolicy()
    {
        return view('privacy_policy');
    }

    public function getSubCategories($cat_id)
    {
        $category = ProductCategory::find($cat_id);
        if (!$category) {
            return response()->json(['error' => 'No record found'], 400);
        }
        $sub_categories = ProductCategory::where('parent', $category->id)->get();
        return response()->json(['categories' => $sub_categories]);
    }
}
