
@extends('layouts.master')

@section('title','SHOPERS CART')

@section('content')



        <div class="site-section">
            <div class="container">

                <div class="row mb-5">
                    <form class="col-md-12" method="post">
                        <div class="site-blocks-table">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($products as $product)
                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="{{ asset('storage/'.$product['item']['image']) }}" alt="{{ $product['item']['slug'] }}" class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black">{{ $product['item']['title'] }}</h2>
                                    </td>
                                    <td>${{ $product['item']['price'] }}</td>
                                    <td>

                                        <div class="input-group mb-3" style="max-width: 120px;">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-primary js-btn-minus"
                                                        onclick="productIncr('{{ $product['item']['id'] }}','-')" type="button">&minus;</button>
                                            </div>

                                            <input type="text" id="product_{{$product['item']['id']}}" class="form-control text-center"
                                                   value="{{ $product['qty'] }}"
                                                   placeholder="" aria-label="Example text with button addon"
                                                   aria-describedby="button-addon1">

                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary js-btn-plus"
                                                        onclick="productIncr('{{ $product['item']['id'] }}','+')" type="button">&plus;</button>
                                            </div>
                                        </div>

                                    </td>
                                    <td>${{ $product['price'] }}</td>
                                    <td><a href="javascript:void(0)" onclick="removeItem('{{$product['item']['slug']}}')" class="btn btn-primary btn-sm">X</a></td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-5">
                                        <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <span class="text-black">Total</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">${{ $totalPrice }}</strong>
                                    </div>
                                </div>
                                @if(count($products))
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="text-white btn btn-primary btn-lg py-3 btn-block" href="{{ route('cart.checkout') }}"
                                           onclick="window.location='checkout.html'">
                                            Proceed To Checkout
                                        </a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


@endsection

@section('extra-js')
    <script>

        function productIncr(product_id,sign){
            let qty = document.getElementById(`product_${product_id}`).value;
            if(sign == '+'){
                qty++;
            }else if (sign == '-') {
                qty--;
            }
            if(qty<=0)
            {
                //alert('item quantity can\'t be zero!');
                location.reload();return;
            }
            axios.patch(`cart/update`, {
                product_id : product_id,
                qty : qty
            }).then( (res)=>{
                console.log(res.data);
                location.reload();
            }).catch( (error)=>console.log(error) );
        }

        function removeItem(product_slug) {
            axios.delete(`cart/${product_slug}`,{
                    product_slug:product_slug
                }).then((res)=>{
                    console.log(res.data);
                    location.reload();
                }).catch((err)=>console.log(err));
        }

    </script>
@endsection
