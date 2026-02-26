@props([
    'disabled' => false,
    'value' => ''
])

<option @disabled($disabled) value="{{ $value }}" {{ $attributes->merge(['class' => 'border-gray-300  rounded-md shadow-sm']) }}>
   {{ $slot }}
</option>
