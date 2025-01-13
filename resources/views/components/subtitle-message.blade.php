@props(['subtitle', 'text' => ''])

<h1 class="mt-8 text-2xl font-extrabold leading-none tracking-tight text-white md:text-3xl lg:text-4xl">
    {!! $subtitle !!}
</h1>
<p class="my-4 text-lg font-normal text-gray-200 lg:text-xl">
    {{ $text }}
</p>