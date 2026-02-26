@props(['width' => 32, 'height' => 32, 'color' => '#000000'])


<div class="{{ $attributes->merge(['class' => '']) }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="{{ $width }}" height="{{$height}}" viewBox="0 0 96 96">
        <defs>
            <linearGradient id="bronzeMedal" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0" stop-color="#FFD6B0"/>
            <stop offset="0.5" stop-color="#C97C44"/>
            <stop offset="1" stop-color="#7C3F1D"/>
            </linearGradient>
            <linearGradient id="ribbonBlue" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0" stop-color="#3B82F6"/>
            <stop offset="1" stop-color="#1E3A8A"/>
            </linearGradient>
        </defs>

        <!-- Ribbon -->
        <path d="M34 10l14 18L30 38 20 16z" fill="url(#ribbonBlue)"/>
        <path d="M62 10L48 28l18 10 10-22z" fill="url(#ribbonBlue)"/>

        <!-- Medal -->
        <circle cx="48" cy="58" r="22" fill="url(#bronzeMedal)" stroke="#4A2512" stroke-width="2"/>
        <text x="48" y="64" text-anchor="middle" font-size="18" font-weight="bold" fill="#3B1F12">3</text>
    </svg>
</div>
