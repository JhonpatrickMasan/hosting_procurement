<!-- resources/views/components/label.blade.php -->

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $slot }}
</label>
