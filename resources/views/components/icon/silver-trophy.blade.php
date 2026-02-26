@props(['width' => 32, 'height' => 32, 'color' => '#000000'])


<div class="{{ $attributes->merge(['class' => '']) }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="{{ $width }}" height="{{$height}}" viewBox="0 0 96 96">
    <defs>
        <linearGradient id="silverCup" x1="0" y1="0" x2="1" y2="1">
        <stop offset="0" stop-color="#F8FAFC"/>
        <stop offset="0.5" stop-color="#CBD5E1"/>
        <stop offset="1" stop-color="#94A3B8"/>
        </linearGradient>
    </defs>

    <!-- Cup -->
    <path d="M30 18h36v10c0 12-8 22-18 24v6h10v8H38v-8h10v-6c-10-2-18-12-18-24V18z"
            fill="url(#silverCup)" stroke="#64748B" stroke-width="2"/>

    <!-- Handles -->
    <path d="M30 22h-6c-4 0-6 2-6 6v4c0 8 6 14 14 14h2"
            fill="none" stroke="#CBD5E1" stroke-width="6" stroke-linecap="round"/>
    <path d="M66 22h6c4 0 6 2 6 6v4c0 8-6 14-14 14h-2"
            fill="none" stroke="#CBD5E1" stroke-width="6" stroke-linecap="round"/>

    <!-- Base -->
    <rect x="34" y="72" width="28" height="8" fill="#334155"/>
    <rect x="28" y="80" width="40" height="8" fill="#1E293B"/>

    <!-- Number -->
    <text x="48" y="40" text-anchor="middle" font-size="14" font-weight="bold" fill="#334155">2</text>
    </svg>
</div>
