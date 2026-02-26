@props(['width' => 32, 'height' => 32, 'color' => '#000000'])


<div class="{{ $attributes->merge(['class' => '']) }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="{{ $width }}" height="{{$height}}" viewBox="0 0 96 96" role="img" aria-label="Gold Trophy">
        <defs>
            <linearGradient id="gold" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0" stop-color="#FFF3B0"/>
            <stop offset="0.4" stop-color="#FFD24D"/>
            <stop offset="0.75" stop-color="#F4B400"/>
            <stop offset="1" stop-color="#B7791F"/>
            </linearGradient>
            <linearGradient id="gold2" x1="0" y1="1" x2="1" y2="0">
            <stop offset="0" stop-color="#FFE8A3"/>
            <stop offset="1" stop-color="#E09F00"/>
            </linearGradient>
        </defs>

        <!-- Cup -->
        <path d="M30 16h36v10c0 12-8 22-18 24v6h10v8H38v-8h10v-6c-10-2-18-12-18-24V16z"
                fill="url(#gold)" stroke="#8A5A00" stroke-width="2" />
        <!-- Handles -->
        <path d="M30 20h-6c-4 0-6 2-6 6v4c0 8 6 14 14 14h2"
                fill="none" stroke="url(#gold2)" stroke-width="6" stroke-linecap="round"/>
        <path d="M66 20h6c4 0 6 2 6 6v4c0 8-6 14-14 14h-2"
                fill="none" stroke="url(#gold2)" stroke-width="6" stroke-linecap="round"/>

        <!-- Base -->
        <path d="M34 72h28v8H34z" fill="#3B2F2F" opacity="0.9"/>
        <path d="M28 80h40v8H28z" fill="#2A1F1F" opacity="0.95"/>

        <!-- 1 badge -->
        <circle cx="48" cy="36" r="9" fill="#FFF" opacity="0.22"/>
        <text x="48" y="40" text-anchor="middle" font-family="Arial, sans-serif" font-size="10" font-weight="700" fill="#5A3B00">1</text>
        </svg>
</div>
