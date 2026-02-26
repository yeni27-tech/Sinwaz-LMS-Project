@props(['width' => 32, 'height' => 32, 'color' => '#000000'])


<div class="{{ $attributes->merge(['class' => '']) }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="{{ $width }}" height="{{$height}}" viewBox="0 0 96 96" role="img" aria-label="Bronze Trophy">
        <defs>
            <linearGradient id="bronze" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0" stop-color="#FFD6B0"/>
            <stop offset="0.45" stop-color="#C97C44"/>
            <stop offset="1" stop-color="#7C3F1D"/>
            </linearGradient>
            <linearGradient id="bronze2" x1="0" y1="1" x2="1" y2="0">
            <stop offset="0" stop-color="#F2B38B"/>
            <stop offset="1" stop-color="#A4512A"/>
            </linearGradient>
        </defs>

        <!-- Cup -->
        <path d="M32 18h32v9c0 11-7 20-16 22v6h9v8H39v-8h9v-6c-9-2-16-11-16-22v-9z"
                fill="url(#bronze)" stroke="#4A2512" stroke-width="2" />
        <!-- Handles -->
        <path d="M32 22h-5c-4 0-6 2-6 6v3c0 7 5 12 12 12h2"
                fill="none" stroke="url(#bronze2)" stroke-width="6" stroke-linecap="round"/>
        <path d="M64 22h5c4 0 6 2 6 6v3c0 7-5 12-12 12h-2"
                fill="none" stroke="url(#bronze2)" stroke-width="6" stroke-linecap="round"/>

        <!-- Base -->
        <path d="M35 72h26v8H35z" fill="#2B1B16" opacity="0.9"/>
        <path d="M30 80h36v8H30z" fill="#1F1411" opacity="0.95"/>

        <!-- 3 badge -->
        <circle cx="48" cy="36" r="9" fill="#FFF" opacity="0.2"/>
        <text x="48" y="40" text-anchor="middle" font-family="Arial, sans-serif" font-size="10" font-weight="700" fill="#3B1F12">3</text>
        </svg>
</div>
