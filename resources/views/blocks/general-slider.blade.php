<section class="overflow-hidden lg:overflow-visible @if($spacing){{ $spacing }}@endif" style="{{ $section_style }}">
    <div class="container px-4 mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 mb-12 lg:mb-20 xl:px-0">

            <div class="order-1 lg:order-2 lg:col-span-7">
                @include('partials.slider-nav', [
                    'prefix' => 'general-slider',
                    'class' => 'lg:justify-end justify-start lg:ml-0 -ml-2.5 lg:mb-0 mb-9',
                ])
                </div>

            <div class="order-2 lg:order-1 lg:col-span-5">
                @if ($title)
                    <p
                        class="font-dm text-4xl lg:text-5xl font-bold leading-10 lg:leading-tight tracking-tight mb-4">
                        {{ $title }}
                    </p>
                @endif

                @if ($description)
                    <p class="text-base leading-6 font-poppins">
                        {{ $description }}
                    </p>
                @endif
            </div>
        </div>

        @if (!empty($slides))
            <div>
                <div class="swiper general-slider-swiper !overflow-visible lg:!overflow-hidden">
                    <div class="swiper-wrapper">
                        @foreach ($slides as $item)
                            @include('partials.general-slider-card', ['item' => $item])
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>