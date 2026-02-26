@props([
    'disabled' => false,
    'name' => ''
])

<select @disabled($disabled) name="{{ $name }}" {{ $attributes->merge(['class' => 'border-gray-300 focus:ring-0']) }}>
   {{ $slot }}
</select>
