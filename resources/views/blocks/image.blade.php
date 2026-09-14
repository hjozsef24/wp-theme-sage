@php
    $aspectClass = [
        'horizontal' => 'aspect-video lg:aspect-[16/9]',
        'square' => 'aspect-square',
        'vertical' => 'aspect-[4/5]',
    ][$orientation] ?? 'aspect-[4/5]';

    $alignClass = !$is_centered ? 'justify-start text-left' : 'justify-center text-center';
    $selfAlignClass = !$is_centered ? 'self-start' : 'self-center';

    $imageWidthClass = $is_full_width ? 'w-full' : 'lg:w-1/2 w-full';
@endphp

<section class="@if($spacing){{ $spacing }}@endif" style="{{ $section_style }}">
    <div class="container px-4 mx-auto">
        
        <div class="{{ $container_class }}">

            @if (!empty($image))
                <figure class="w-full flex flex-col {{ $alignClass }}">
                    <div class="relative overflow-hidden {{ $selfAlignClass }} {{ $imageWidthClass }} {{ $aspectClass }} {{ $rounded ? 'rounded-2xl' : '' }}">
                        <img src="{{ $image['url'] }}" alt="{{ $image['alt'] ?? '' }}" 
                             class="absolute inset-0 w-full h-full object-cover"
                             loading="lazy">
                    </div>
                </figure>
            @endif

        </div>
    </div>
</section>