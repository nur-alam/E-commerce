
@extends('layouts.master')

@section('title',$product->title)

@section('content')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ route('home') }}">
                        Home
                    </a>
                    <span class="mx-2 mb-0">/</span>
                    <a href="{{ route('shop') }}">
                        Shop
                    </a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">
                        {{ $product->title }}
                    </strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src=" {{ asset('storage/'.$product->image) }} " alt="{{ $product->title }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="text-black"> {{ $product->title }} </h2>
                    <p><strong class="text-primary h4">${{ $product->price }}</strong></p>
                    <div class="mb-5">
                        <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" onclick="qtyDecrement('{{ $product->id }}')" type="button">&minus;</button>
                            </div>
                            <input type="text" class="form-control text-center" id="product_{{$product->id}}" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>

                    </div>
                    <p>
                        <a href="javascript:void(0)" onclick="addToCart('{{$product->id}}')" class="buy-now btn btn-sm btn-primary">
                            Add To Cart
                        </a>
                    </p>
                    <p>{!! $product->desc !!} </p>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra-js')
    <script type="application/javascript">

        function addToCart(product_id){
            let qty = document.getElementById(`product_${product_id}`).value;
            if(qty<=0){
                loacation.reload();
            }
            //console.log(product_id,qty);
            axios.post('/add-to-cart',{
                    product_id: product_id,
                    qty : qty
                }).then((res)=>{
                    console.log(res.data);
                    location.reload();
                }).catch((err)=>console.log(err));
        }

        function qtyDecrement(product_id) {
            let qty = document.getElementById(`product_${product_id}`).value;
            if (qty-1<=0){
                location.reload();
            }
        }

    </script>
@endsection
