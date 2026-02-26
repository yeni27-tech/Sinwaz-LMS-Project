@props(['width' => 32, 'height' => 32, 'color' => '#000000'])


<div class="{{ $attributes->merge(['class' => '']) }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="{{ $width }}" height="{{ $height }}" viewBox="0 0 96 96">
    <defs>
        <linearGradient id="goldMedal" x1="0" y1="0" x2="1" y2="1">
        <stop offset="0" stop-color="#FFF3B0"/>
        <stop offset="0.5" stop-color="#FFD24D"/>
        <stop offset="1" stop-color="#F4B400"/>
        </linearGradient>
        <linearGradient id="ribbonRed" x1="0" y1="0" x2="1" y2="1">
        <stop offset="0" stop-color="#EF4444"/>
        <stop offset="1" stop-color="#B91C1C"/>
        </linearGradient>
    </defs>

    <!-- Ribbon -->
    <path d="M34 10l14 18L30 38 20 16z" fill="url(#ribbonRed)"/>
    <path d="M62 10L48 28l18 10 10-22z" fill="url(#ribbonRed)"/>

    <!-- Medal -->
    <circle cx="48" cy="58" r="22" fill="url(#goldMedal)" stroke="#B7791F" stroke-width="2"/>
    <text x="48" y="64" text-anchor="middle" font-size="18" font-weight="bold" fill="#5A3B00">1</text>
    </svg>
</div>
