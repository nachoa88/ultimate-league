<nav aria-label="Page pagination">
    <ul class="inline-flex -space-x-px text-sm">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li aria-disabled="true">
                <span
                    class="w-24 flex items-center justify-center px-3 h-8 ms-0 leading-tight text-center font-semibold text-xs text-white uppercase tracking-widest bg-cyan-800 border border-e-0 border-cyan-950 rounded-s-lg">
                    Previous</span>
            </li>
        @else
            <li>
                <a class="w-24 flex items-center justify-center px-3 h-8 ms-0 leading-tight text-center font-semibold text-xs text-white uppercase tracking-widest bg-cyan-700 border border-e-0 border-cyan-950 rounded-s-lg hover:bg-cyan-800 hover:text-white"
                    href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    Previous</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li aria-current="page"><span
                                class="flex items-center justify-center px-3 h-8 text-center font-semibold text-xs text-white uppercase tracking-widest border border-cyan-950 bg-teal-500">{{ $page }}</span>
                        </li>
                    @else
                        <li><a class="flex items-center justify-center px-3 h-8 leading-tight text-center font-semibold text-xs text-white uppercase tracking-widest bg-cyan-700 border border-cyan-950 hover:bg-cyan-800 hover:text-white"
                                href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="w-24 flex items-center justify-center px-3 h-8 leading-tight text-center font-semibold text-xs text-white uppercase tracking-widest bg-cyan-700 border border-cyan-950 rounded-e-lg hover:bg-cyan-800 hover:text-white"
                    href="{{ $paginator->nextPageUrl() }}" rel="next">
                    Next</a>
            </li>
        @else
            <li aria-disabled="true">
                <span
                    class="w-24 flex items-center justify-center px-3 h-8 leading-tight text-center font-semibold text-xs text-white uppercase tracking-widest bg-cyan-800 border border-cyan-950 rounded-e-lg">
                    Next</span>
            </li>
        @endif
    </ul>
</nav>
