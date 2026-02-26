@props([
    'disabled' => false,
    'value' => ''
])

<input @disabled($disabled) value="{{ $value }}" {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
