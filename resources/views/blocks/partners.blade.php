<section class="@if($spacing){{ $spacing }}@endif" style="{{ $section_style }}">
    <div class="container px-4 mx-auto">
        @if ($title)
            <p class="text-center font-poppins text-base font-bold leading-6 mb-10 lg:px-0 px-8">
                {{ $title }}
            </p>
        @endif

        @if (!empty($partners))
            <div class="relative group lg:px-0 px-8">
                <div class="swiper partners-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($partners as $partner)
                            <div class="swiper-slide flex justify-center">
                                <div
                                    class="w-40 h-16 flex items-center justify-center grayscale hover:grayscale-0 transition-all duration-300">
                                    @if (!empty($partner['link']))
                                        <a href="{{ $partner['link'] }}" target="_blank" rel="noopener" class="block">
                                            <img src="{{ $partner['logo']['url'] }}" alt="{{ $partner['logo']['alt'] }}"
                                                class="max-w-full max-h-full object-contain">
                                        </a>
                                    @elseif(!empty($partner['logo']))
                                        <img src="{{ $partner['logo']['url'] }}" alt="{{ $partner['logo']['alt'] }}"
                                            class="max-w-full max-h-full object-contain">
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @if (count($partners) > 5)
                    @include('partials.slider-nav', [
                        'prefix' => 'partners',
                        'class' => 'mt-12',
                    ])
                @endif
            </div>
        @endif
    </div>
</section>