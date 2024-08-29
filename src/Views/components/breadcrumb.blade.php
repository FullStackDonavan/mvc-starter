<nav aria-label="breadcrumb" class="bg-gray-100 p-4 rounded-md shadow-sm">
    <ol class="flex items-center space-x-2 text-gray-700">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb['url'] && !$loop->last)
                <li class="flex items-center">
                    <a href="{{ $breadcrumb['url'] }}" class="text-blue-600 hover:text-blue-800">
                        {{ $breadcrumb['title'] }}
                    </a>
                    <!-- Separator -->
                    <span class="mx-2 text-gray-400">/</span>
                </li>
            @else
                <li class="flex items-center text-gray-500">
                    {{ $breadcrumb['title'] }}
                </li>
            @endif
        @endforeach
    </ol>
</nav>
