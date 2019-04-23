
<div class="col-md-3 order-1 mb-5 mb-md-0">
    <div class="border p-4 rounded mb-4">
        <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
        <ul class="list-unstyled mb-0">
            @foreach($categories as $cat)
                <li class="mb-1">
                    <a href="{{ route('category_products',$cat->slug) }}" class="d-flex">
                        <span>{{ $cat->name }}</span> <span class="text-black ml-auto">( {{ count($cat->product) }} )</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="border p-4 rounded mb-4">
    </div>
</div>
