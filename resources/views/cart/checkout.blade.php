

@extends('layouts.master')

@section('title','SHOPERS CHECKOUT')

@section('content')


    <div class="site-section">
    <div class="container">
        @guest
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="border p-4 rounded" role="alert">
                    Please login to place order? <a href="{{ route('login') }}">Click here</a> to login
                </div>
            </div>
        </div>
        @endguest
        <div class="row">

            <div class="col-md-6 offset-md-3">

                <div class="row mb-5">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Your Order</h2>
                        <div class="p-3 p-lg-5 border">
                            <table class="table site-block-order-table mb-5">
                                <thead>
                                <th>Product</th>
                                <th>Total</th>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product['item']['title'] }} <strong class="mx-2">x</strong>{{ $product['qty'] }}</td>
                                    <td>${{ $product['price'] }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="text-black font-weight-bold"><strong>Total Price</strong></td>
                                    <td class="text-black font-weight-bold"><strong>${{ $totalPrice }}</strong></td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="border p-3 mb-3">
                                <h3 class="h6 mb-0">
                                    Payment System Cash On Delivery
                                </h3>
                            </div>
                            @auth
                            <div class="form-group">
                                <a class="btn btn-primary btn-lg py-3 btn-block" href="{{ route('order.index') }}">
                                    Place Order
                                </a>
                            </div>
                            @endauth

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- </form> -->
    </div>
</div>

@endsection
