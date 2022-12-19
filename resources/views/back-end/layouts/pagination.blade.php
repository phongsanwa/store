@if ($paginator->hasPages())
    <ul class="pagination pagination-rounded justify-content-end mb-2">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                        <i class="mdi mdi-chevron-left"></i>
                    </a>
                </li>
            @else
                <li class="page-item "><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="mdi mdi-chevron-left"></i></a></li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">{{ $element }}</li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="mdi mdi-chevron-right"></i></a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#"><i class="mdi mdi-chevron-right"></i></a>
                </li>
            @endif
        </ul>
@endif
