@php
    $textColor = $item['text_color'] ?? '#ffffff';
    $bgImg = $item['background_image']['url'] ?? '';
    $layer = $item['background_layer'] ?? 'dark';
    $button = $item['button'] ?? null;
    $buttonBg = $item['button_background'] ?? '#3772FF';
    $outlined = $item['button_outlined'] ?? false;

    if ($button) {
        if ($outlined) {
            $bgStyle = "border-width: 2px; border-style: solid; border-color: {$buttonBg}; background-color: transparent; color: {$buttonBg};";
        } else {
            $bgStyle = "background-color: {$buttonBg}; border-width: 2px; border-style: solid; border-color: {$buttonBg}; color: #ffffff;";
        }
    }
@endphp

<div class="swiper-slide relative z-20 flex h-full w-full items-center justify-center" style="color: {{ $textColor }};">
    
    @if($bgImg)
        <img src="{{ $bgImg }}" alt="{{ $item['title'] }}" 
             class="absolute inset-0 z-0 h-full w-full object-cover" />
    @endif

    <div class="absolute inset-0 z-10 {{ $layer === 'dark' ? 'bg-black/40' : 'bg-white/20' }}"></div>

    <div class="relative z-20 flex h-full flex-col items-center justify-center px-6 text-center mx-auto" style="color: {{ $textColor }};">
        
        <p class="mb-4 font-dm text-3xl font-bold tracking-tight capitalize lg:text-6xl lg:mb-6 lg:w-200">
            {{ $item['title'] }}
        </p>

        <div class="mb-8 w-full font-dm text-base font-normal leading-relaxed opacity-90 lg:text-xl lg:max-w-3xl lg:w-100">
            {!! $item['description'] !!}
        </div>

        @if ($button)
            <a href="{{ $button['url'] }}" 
               style="{{ $bgStyle }}"
               class="inline-block rounded-full px-6 py-4 font-poppins text-base font-medium">
                {{ $button['title'] }}
            </a>
        @endif
    </div>
</div>