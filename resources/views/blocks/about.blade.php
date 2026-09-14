<section class="@if ($spacing) {{ $spacing }} @endif" style="{{ $section_style }}">
    <div class="container px-4 mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 items-start">
            <div class="lg:col-span-7">
                @if ($label)
                    <p class="font-poppins text-base font-bold leading-4 uppercase mb-5 opacity-50">
                        {{ $label }}
                    </p>
                @endif

                @if ($title)
                    <p class="font-dm lg:text-5xl text-4xl font-bold lg:leading-tight leading-12 tracking-tight lg:mb-24 mb-16">
                        {{ $title }}
                    </p>
                @endif

                @if ($image)
                    <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}"
                        class="w-full lg:h-96 h-auto object-cover object-center rounded-2xl">
                    @endif
            </div>

            @if (!empty($list))
                <div class="lg:col-span-4 lg:col-start-9">
                    <div class="flex flex-col pt-16 lg:pt-0">
                        @foreach ($list as $item)
                            <div class="flex flex-col">
                                <div class="flex items-center gap-2">
                                    <span class="block w-2 h-2 rounded-full" style="background-color: {{ $item['color'] }}"></span>

                                    <p class="font-poppins text-base font-medium leading-6">
                                        {{ $item['title'] }}
                                    </p>
                                </div>

                                <hr class="my-8 opacity-30">

                                <p class="font-poppins text-base font-normal leading-6 opacity-60">
                                    {{ $item['description'] }}
                                </p>

                                <div class="mb-12"></div>
                            </div>
                        @endforeach
                    </div>

                    @if ($button)
                        @php
                            $color = !empty($buttonBg) ? $buttonBg : '#3772FF';

                            if ($outlined_button) {
                                $bgStyle = "border-color: {$color}; color: {$color}; background-color: transparent;";
                                $buttonClasses = '!border-2 !py-4 !px-6 !text-sm !font-dm';
                            } else {
                                $bgStyle = "background-color: {$color}; color: #ffffff;";
                                $buttonClasses = '!py-4 !px-6 !text-base !font-poppins';
                            }
                        @endphp

                        <a href="{{ $button['url'] }}" style="{{ $bgStyle }}"
                            class="{{ $buttonClasses }} !block text-center lg:!inline-flex rounded-full !font-bold !leading-none lg:!mx-0 !mx-auto">
                            {{ $button['title'] }}
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</section>