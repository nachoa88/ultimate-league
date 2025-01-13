@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-teal-300 text-center font-semibold text-xs text-teal-300 uppercase tracking-widest leading-5 focus:outline-none focus:border-teal-300 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-center font-semibold text-xs text-white uppercase tracking-widest leading-5 hover:text-teal-300 hover:border-teal-300 focus:outline-none focus:text-teal-300 focus:border-teal-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
