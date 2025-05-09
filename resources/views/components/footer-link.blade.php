@props(['active' => false, 'href' => '#'])

<a {{ $attributes->merge(['class' => 'text-sm text-gray-700 hover:text-gray-900 transition duration-150 ease-in-out', 'href' => $href]) }}>
    {{ $slot }}
</a>