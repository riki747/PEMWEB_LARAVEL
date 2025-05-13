@props(['variant' => 'primary', 'size' => 'md', 'href' => null, 'type' => null])

@php
$classes = match($variant) {
'primary' => 'px-4 py-2 bg-blue-600 text-black hover:bg-blue-700 transition',
'outline' => 'border border-gray-400 text-gray-700 hover:bg-gray-100 transition',
'danger', 'destructive' => 'px-4 py-2 bg-red-600 text-white hover:bg-red-700 transition',
default => '',
};

$sizes = match($size) {
'sm' => 'text-sm px-2 py-1',
'md' => 'text-lg px-3 py-2',
default => '',
};
@endphp
<flux:button>Button</flux:button>

@if ($href)
<a href="{{ $href }}" {{ $attributes->merge(['class' => "$classes $sizes rounded"]) }}>
    {{ $slot }}
</a>
@else
<button type="{{ $type ?? 'button' }}" {{ $attributes->merge(['class' => "$classes $sizes rounded"]) }}>
    {{ $slot }}
</button>
@endif