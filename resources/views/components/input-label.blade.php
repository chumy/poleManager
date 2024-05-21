@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-amber-500']) }}>
    {{ $value ?? $slot }}
</label>
