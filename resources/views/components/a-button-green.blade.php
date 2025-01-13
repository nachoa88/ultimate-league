@props(['route', 'label'])

<a href="{{ route($route) }}"
    {{ $attributes->merge(['class' => 'relative inline-flex items-center justify-center min-w-28 max-w-max p-0.5 overflow-hidden rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-400']) }}>
    <span
        class="relative min-w-28 max-w-max px-5 py-1.5 transition-all ease-in duration-75 bg-gray-900 rounded-md group-hover:bg-opacity-0 text-center font-semibold text-xs text-white uppercase tracking-widest">
        {{ $label }}
    </span>
</a>