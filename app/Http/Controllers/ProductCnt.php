<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductCnt extends Controller
{

    public function index()
    {
        //dd(\session()->get());
        //return response()->json(auth()->user());
        $products = Product::where('featured','=',0)->latest()->get();
        $featured_product = Product::where('featured','=',1)->firstOrFail();
        return view('home',compact('products','featured_product'));
    }

    public function product_details(Product $product)
    {
        return view('shop.single-shop',compact('product'));
    }

    public function shop()
    {
        $products = Product::where('featured','!=',1)->paginate(5);
        return view('shop.index',compact('products'));
    }

    public function category_products(Category $category)
    {
        $products = Product::where('category_id','=',$category->id)->paginate(16);
        $categories = Category::with('product')->get();
        return view('shop.index',compact('products','categories'));
    }


}
