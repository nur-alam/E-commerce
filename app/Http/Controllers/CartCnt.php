<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartCnt extends Controller
{

    public function index()
    {
        //Session::forget('cart');
        //return response()->json(Session::get('cart'));
        //dd(Session::get('cart')->items[4]);
        $products = [];
        $totalPrice = '';
        if(!Session::has('cart')){
            session()->flash('info','No product added to your cart!');
            return view('cart.index',compact('products','totalPrice'));
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;
        return view('cart.index',compact('products','totalPrice'));
    }

    public function getAddToCart(Request $request)
    {
        $product = Product::find($request->product_id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->cartIncrementDecrement($product,$product->id,$request->qty);
        Session::put('cart', $cart);
        session()->flash('success','Product added to your cart');
        return response()->json(Session::get('cart'));
    }

    public function update(Request $request)
    {
        $product = Product::find($request->product_id);
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->cartIncrementDecrement($product,$product->id,$request->qty);
        Session::put('cart',$cart);
        return response()->json(Session::get('cart'));
    }

    public function destroy(Product $product)
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->remvoeItem($product->id);
        Session::put('cart',$cart);
        return response()->json(true);
    }

    public function checkout()
    {
        $products = [];
        $totalPrice = '';
        if(!Session::has('cart')){
            session()->flash('info','No product added to your cart!');
            return view('cart.index',compact('products','totalPrice'));
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;
        return view('cart.checkout',compact('products','totalPrice'));
    }

}
