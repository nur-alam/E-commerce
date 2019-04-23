
@extends('layouts.master')

@section('title','shop')

@section('content')

<div class="site-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-md-9 order-2">

                <div class="row">
                    <div class="col-md-12 mb-5">
                        <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
                    </div>
                </div>

                <div class="row mb-5">
                    @foreach($products as $product)
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">
                                <a href="{{ route('product_details',$product->slug) }}"><img src="{{ asset('/storage/'.$product->image) }}" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3 style="max-height: 47px;overflow: hidden;">
                                    <a href="{{ route('product_details',$product->slug) }}">
                                        {{ $product->title }}
                                    </a>
                                </h3>
                                <p class="text-black font-weight-bold">${{ $product->price }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{ $products->links() }}

            </div>

            @include('partials.category_leftbar')

        </div>


    </div>
</div>

@endsection
