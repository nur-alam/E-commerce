
<div class="row" data-aos="fade-up">
    <div class="col-md-12 text-center">
        <div class="site-block-27">

            @if ($paginator->hasPages())

                <ul>
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li>
                            <a>&lsaquo;</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $paginator->previousPageUrl() }}">
                                &lsaquo;
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li >
                                <span>
                                    {{ $element }}
                                </span>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="active">
                                        <a href="{{ $url }}">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $url }}">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li>
                            <a href="{{ $paginator->nextPageUrl() }}" >
                                &rsaquo;
                            </a>
                        </li>
                    @else
                        <li>
                            <span >&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            @endif

        </div>
    </div>
</div>
