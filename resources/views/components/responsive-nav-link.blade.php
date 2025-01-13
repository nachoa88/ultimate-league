@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-teal-300 text-start text-base font-medium text-teal-300 bg-sky-900 focus:outline-none focus:text-teal-300 focus:bg-sky-900 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-white hover:text-teal-300 hover:bg-sky-900 hover:border-teal-300 focus:outline-none focus:text-teal-300 focus:bg-sky-900 focus:border-teal-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
