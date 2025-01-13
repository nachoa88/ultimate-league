@props(['title', 'subtitle' => '', 'registerMessage' => '', 'titleSize' => 'text-4xl md:text-5xl lg:text-6xl'])

<h1 class="mb-6 font-extrabold leading-none tracking-tight text-white {{ $titleSize }}">
    <!-- The !! work to render the HTML tags in the title, in this case span tag -->
    {!! $title !!}
</h1>
<p class="text-lg font-normal text-gray-200 lg:text-xl mb-4">
    {{ $subtitle }}
</p>
<p class="text-lg font-normal text-gray-200 lg:text-xl">
    {{ $registerMessage }}
</p>