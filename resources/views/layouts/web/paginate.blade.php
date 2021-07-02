@if ($paginator->hasPages())
    <div class="news_page_nav">
        <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <!-- <li class="text-center trans_200" disabled aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a href="#" aria-hidden="true">&lsaquo;</a>
                </li> -->
            @else
                <li class="text-center trans_200">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="text-center trans_200 disabled" aria-disabled="true"><a style="color: white;">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active text-center trans_200" aria-current="page"><a style="color: white;">{{ $page }}</a></li>
                        @else
                            <li class="text-center trans_200"><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="text-center trans_200">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <!-- <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li> -->
            @endif
        </ul>
    </div>
@endif
