<section class="@if ($spacing) {{ $spacing }} @endif" style="{{ $section_style }}">
    <div class="container px-4 mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">

            <div class="lg:col-span-6">
                @if ($label)
                    <p
                        class="text-center lg:text-left font-poppins text-xs font-bold leading-3 uppercase mb-4 tracking-wider opacity-70">
                        {{ $label }}
                    </p>
                @endif

                @if ($title)
                    <p
                        class="text-center lg:text-left font-dm text-5xl lg:text-6xl font-bold leading-[1] tracking-tight mb-8">
                        {{ $title }}
                    </p>
                @endif

                @if ($description)
                    <p class="text-center lg:text-left font-poppins text-base font-normal leading-6 mb-10 opacity-80">
                        {{ $description }}
                    </p>
                @endif

                @if ($button)
                    @php
                        $color = !empty($buttonBg) ? $buttonBg : '#3772FF';

                        if ($outlined_button) {
                            $bgStyle = "border: 2px solid {$color}; background-color: transparent; color: {$color};";
                        } else {
                            $bgStyle = "background-color: {$color}; border: 2px solid {$color}; color: #ffffff;";
                        }
                    @endphp

                    <a href="{{ $button['url'] }}" style="{{ $bgStyle }}"
                        class="table lg:inline-block rounded-full px-6 py-4 font-poppins text-base font-bold leading-none lg:mx-0 mx-auto">
                        {{ $button['title'] }}
                    </a>
                @endif
            </div>

            <div class="lg:col-span-5 lg:col-start-8 flex justify-center lg:justify-end">
              @if ($image)
                <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}"
                    class="w-full h-auto max-w-lg lg:w-128 lg:h-128 object-cover">
                
                @endif
            </div>

        </div>
    </div>
</section>