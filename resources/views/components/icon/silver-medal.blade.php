@props(['width' => 32, 'height' => 32, 'color' => '#000000'])


<div class="{{ $attributes->merge(['class' => '']) }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="{{ $width }}" height="{{$height}}" viewBox="0 0 96 96" role="img" aria-label="Silver Medal">
        <defs>
            <linearGradient id="silver" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0" stop-color="#F8FAFC"/>
            <stop offset="0.45" stop-color="#CBD5E1"/>
            <stop offset="1" stop-color="#94A3B8"/>
            </linearGradient>
            <linearGradient id="ribbonB" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0" stop-color="#60A5FA"/>
            <stop offset="1" stop-color="#1D4ED8"/>
            </linearGradient>
        </defs>

        <!-- Ribbon -->
        <path d="M34 10l14 18L30 38 20 16z" fill="url(#ribbonB)"/>
        <path d="M62 10L48 28l18 10 10-22z" fill="url(#ribbonB)"/>

        <!-- Medal -->
        <circle cx="48" cy="58" r="22" fill="url(#silver)" stroke="#64748B" stroke-width="2"/>
        <circle cx="48" cy="58" r="15" fill="none" stroke="#E2E8F0" stroke-width="3" opacity="0.9"/>

        <!-- 2 text -->
        <text x="48" y="64" text-anchor="middle" font-family="Arial, sans-serif" font-size="18" font-weight="800" fill="#334155">2</text>
    </svg>
</div>
