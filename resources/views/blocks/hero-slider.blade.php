<section class="@if ($spacing) {{ $spacing }} @endif">
    <div class="container px-4 mx-auto">
        <div class="relative overflow-hidden h-[35rem] lg:h-[51rem]">
            
            @if(!empty($slides))
                <div class="swiper hero-sliders rounded-t-4xl h-full overflow-hidden">
                    <div class="swiper-wrapper h-full">
                        @foreach ($slides as $slide)
                            @include('partials.hero-slide', ['item' => $slide])
                        @endforeach
                    </div>
                </div>

                <div class="absolute bottom-5 left-1/2 z-30 -translate-x-1/2 w-full flex justify-center">
                    @include('partials.slider-nav', [
                        'prefix' => 'hero-sliders',
                        'class' => 'text-white',
                    ])
                </div>
            @endif
        </div>
    </div>
</section>