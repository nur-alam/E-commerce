<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class checkOutCnt extends Controller
{


    public function index()
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $cart_items = $cart->items;

        // insert into order table

        $order = Order::create([
            'user_id' => auth()->user()->id
        ]);

        // insert into order_product table

        foreach ($cart_items as $item){
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item['item']['id'],
                'qty' => $item['qty']
            ]);
        }

        \session()->flash('success','Your order placed.');
        Session::forget('cart');
        return view('thankyou');
        //return redirect()->route('thankyou')->with('order_id',$order->id);

    }

    public function thankyou(){
        return view('thankyou');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

}
