<div {{ $attributes->merge(['class' => 'w-full border rounded-lg overflow-hidden']) }}>
    <table class="w-full divide-y divide-gray-200">
        {{ $slot }}
    </table>
</div>
