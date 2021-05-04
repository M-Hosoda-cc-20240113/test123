@if ($paginator->hasPages())
    <ul class="p-paginator u-mt-30">
        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
            <li class="p-paginator__item p-paginator__item--prev"><a class="p-paginator__link" href="{{ $paginator->previousPageUrl() }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewbox="0 0 8 12">
                        <g fill="none" fill-rule="evenodd">
                            <path fill="#33313C" d="M7.41 1.41L6 0 0 6l6 6 1.41-1.41L2.83 6z"></path>
                        </g>
                    </svg>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="p-paginator__item"><a class="p-paginator__link" href="#">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="p-paginator__item active"><a class="p-paginator__link" href="#">{{ $page }}</a></li>
                    @else
                        <li class="p-paginator__item"><a class="p-paginator__link" href="{{ $url }}">{{ $page }}</a> </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="p-paginator__item p-paginator__item--next"><a class="p-paginator__link" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewbox="0 0 8 12">
                        <g fill="none" fill-rule="evenodd">
                            <path fill="#33313C" d="M7.41 1.41L6 0 0 6l6 6 1.41-1.41L2.83 6z"></path>
                        </g>
                    </svg>
                </a>
            </li>
        @endif
    </ul>
@endif

