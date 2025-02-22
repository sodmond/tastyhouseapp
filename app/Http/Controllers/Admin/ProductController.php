<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\State;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderByDesc('created_at')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function get($id)
    {
        $product = Product::find($id);
        return view('admin.products.single', compact('product'));
    }

    public function new()
    {
        $categories = ProductCategory::where('level', 1)->get();
        $states = State::all();
        return view('admin.products.new', compact('categories', 'states'));
    }

    /*public function addNew(ProductRequest $request)
    {
        $product = new Product();
        $product->seller_id = auth('seller')->id();
        $product->product_category_id = $request->category3 ?? $request->category2;
        $product->title = $request->title;
        $product->price = $request->price ?? 0;
        $product->price_type = $request->price_type;
        $product->condition = $request->condition;
        $product->slug = genrateSlug([$request->title, $request->condition]);
        $product->description = $request->description;
        $product->city_id = $request->city;
        $images = [];
        foreach ($request->file('image') as $image) {
            $imgName = Str::random().'.'.$image->extension();
            $image->storeAs("products/".auth('seller')->id(), $imgName, 'public');
            $images[] = $imgName;
        }
        $thumbnail = ImageManager::imagick()->read($request->file('image')[0]->path());
        $thumbnail->cover(400, 400, 'center')->save(storage_path('/app/public/products/'.auth('seller')->id().'/thumbnail/'. $images[0]));
        $product->image = json_encode($images);
        if ($product->save()) {
            return back()->with('success', 'Product has been added.');
        }
        return back()->withErrors(['err_msg' => 'Problem encountered, pls try again']);
    }*/

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = [];
        $categories[0] = ProductCategory::where('level', 1)->get();
        if($product->category->level == 2){
            $cat_choice = [$product->category->parent, $product->product_category_id, ''];
            $categories[1] = ProductCategory::where('parent', $product->category->parent)->get();
            $categories[2] = ProductCategory::where('parent', $product->category->id)->get();
        }
        if($product->category->level == 3){
            $findMainCat = ProductCategory::find($product->category->parent);
            $cat_choice = [$findMainCat->parent, $product->category->parent, $product->product_category_id];
            $categories[1] = ProductCategory::where('parent', $findMainCat->parent)->get();
            $categories[2] = ProductCategory::where('parent', $product->category->parent)->get();
        }
        $states = State::all();
        $cities = City::where('state_id', $product->city->state->id)->get();
        return view('admin.products.edit', compact('product', 'categories', 'cat_choice', 'states', 'cities'));
    }
}
