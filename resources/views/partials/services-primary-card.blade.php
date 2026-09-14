@php
    $hasLink = !empty($item['link']);
    $tag = $hasLink ? 'a' : 'div';
    $attributes = $hasLink ? 'href=' . $item['link'] : '';
@endphp

<div class="swiper-slide !h-auto">
    <{{ $tag }} {!! $attributes !!} class="group block h-full">

        <div class="relative w-full h-72">
            <img src="{{ $item['image']['url'] ?? '' }}" alt="{{ $item['title'] ?? '' }}"
                class="w-full h-full object-cover">

            @if (!empty($item['badge']))
                <div class="absolute top-3 right-3 px-2 py-1 rounded font-poppins text-xs font-bold leading-none uppercase"
                    style="background-color: {{ $item['badge_background'] ?: '#3772FF' }}; opacity: 0.9; color: {{ $item['badge_color'] ?: "#FCFCFD"}}">
                    {{ $item['badge'] }}
                </div>
            @endif
        </div>

        <div class="pt-10 px-10">
            <p class="font-poppins text-base font-bold leading-6 mb-3">
                {{ $item['title'] ?? '' }}
            </p>

            <p class="font-poppins text-sm font-normal leading-6 opacity-70">
                {{ $item['description'] ?? '' }}
            </p>
        </div>

    </{{ $tag }}>
</div>