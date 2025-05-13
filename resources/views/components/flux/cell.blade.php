@props(['class' => ''])

@php
    $baseClass = 'px-4 py-2 border'; // class default
@endphp

<td {{ $attributes->merge(['class' => "$baseClass $class"]) }}>
    {{ $slot }}
</td>
