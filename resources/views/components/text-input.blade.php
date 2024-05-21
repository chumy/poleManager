@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-500 focus:border-amber-500 focus:ring-amber-500 rounded-md shadow-sm']) !!}>
