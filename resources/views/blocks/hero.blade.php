@if ($isFullWidth)
    <section
        class="relative w-full h-[35rem] lg:h-[40rem] overflow-hidden bg-black @if ($spacing) {{ $spacing }} @endif"
        style="{{ $section_style }}">
        <div class="container h-full px-4 mx-auto">
            @if ($image)
                <img src="{{ $image['url'] }}" alt="{{ $image['alt'] ?? $title }}"
                    class="absolute inset-0 z-[0] w-full h-full object-cover">
            @endif

            <div class="absolute inset-0 z-[1]">
                <div class="absolute inset-0 bg-black/60 lg:hidden"></div>
                <div class="hidden lg:block absolute inset-0"
                    style="background: linear-gradient(270deg, rgba(255, 255, 255, 0) 0%, #000 100%);">
                </div>
            </div>

            <div class="relative h-full max-w-[90rem] mx-auto z-[2]">
                <div class="absolute bottom-10 lg:bottom-28 max-w-[33.5rem] pr-8 lg:pr-0">
                    @if ($label)
                        <span class="block font-poppins text-base font-bold leading-4 uppercase mb-3">
                            {{ $label }}
                        </span>
                    @endif

                    @if ($title)
                        <p class="font-dm text-4xl lg:text-7xl font-bold leading-[1.1] tracking-tight mb-5">
                            {{ $title }}
                        </p>
                    @endif

                    @if ($description)
                        <p class="font-poppins text-base font-normal leading-relaxed mb-10 opacity-90">
                            {{ $description }}
                        </p>
                    @endif

                    <div class="flex items-center flex-wrap gap-4">
                        @foreach(['primary' => $button_primary, 'secondary' => $button_secondary] as $type => $btn)
                            @if ($btn)
                                @php
                                    $color = $btn['color'] ?? ($type === 'primary' ? '#3772FF' : '#ffffff');
                                    $isOutlined = !empty($btn['outlined']);
                                    $style = $isOutlined
                                        ? "border: 2px solid {$color} !important; background-color: transparent !important; color: {$color} !important;"
                                        : "background-color: {$color} !important; border: 2px solid {$color} !important; color: " . ($type === 'primary' ? '#ffffff' : '#23262F') . " !important;";
                                @endphp
                                <a href="{{ $btn['url'] }}" target="{{ $btn['target'] }}"
                                    class="lg:px-8 lg:py-4 px-6 py-3 rounded-full font-dm !text-base !font-bold !text-center"
                                    style="{{ $style }}">
                                    {{ $btn['title'] }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@else
    <section class="@if ($spacing) {{ $spacing }} @endif" style="{{ $section_style }}">
        <div class="container mx-auto px-4 flex justify-center">
            <div
                class="relative w-full lg:max-w-[84rem] h-[37.5rem] lg:h-[52.5rem] rounded-t-4xl overflow-hidden">

                @if ($image)
                    <div class="absolute inset-0 z-[0]">
                        <img src="{{ $image['url'] }}" alt="{{ $image['alt'] ?? $title }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0"
                            style="background: linear-gradient(90deg, #F4F5F6 0%, rgba(244, 245, 246, 0.8) 20%, rgba(244, 245, 246, 0) 50%);">
                        </div>
                    </div>
                @endif

                <div class="relative z-[2] h-full w-full">
                    <div class="absolute bottom-10 left-6 lg:bottom-28 lg:left-28 max-w-[33.5rem] pr-6 lg:pr-0">

                        @if ($label)
                            <span class="block font-poppins lg:text-base text-xs font-bold uppercase mb-3 opacity-70">
                                {{ $label }}
                            </span>
                        @endif

                        @if ($title)
                            <p class="font-dm text-4xl lg:text-6xl font-bold leading-tight tracking-tight mb-5">
                                {{ $title }}
                            </p>
                        @endif

                        @if ($description)
                            <p class="font-poppins text-base font-normal leading-relaxed mb-10">
                                {{ $description }}
                            </p>
                        @endif

                        <div class="flex items-center flex-wrap gap-4">
                            @if ($button_primary)
                                @php
                                    $pColor = $button_primary['color'] ?? '#3772FF';
                                    $pStyle = !empty($button_primary['outlined'])
                                        ? "border: 2px solid {$pColor}; background-color: transparent; color: {$pColor};"
                                        : "background-color: {$pColor}; border: 2px solid {$pColor}; color: #ffffff;";
                                @endphp
                                <a href="{{ $button_primary['url'] }}" target="{{ $button_primary['target'] }}"
                                    class="lg:px-8 lg:py-4 px-6 py-3 rounded-full font-dm text-base font-bold text-center transition-transform hover:scale-105"
                                    style="{{ $pStyle }}">
                                    {{ $button_primary['title'] }}
                                </a>
                            @endif

                            @if ($button_secondary)
                                @php
                                    $sColor = $button_secondary['color'] ?? '#E6E8EC';
                                    $sStyle = !empty($button_secondary['outlined'])
                                        ? "border: 2px solid {$sColor}; background-color: transparent; color: #23262F;"
                                        : "background-color: {$sColor}; border: 2px solid {$sColor}; color: #23262F;";
                                @endphp
                                <a href="{{ $button_secondary['url'] }}" target="{{ $button_secondary['target'] }}"
                                    class="lg:px-8 lg:py-4 px-6 py-3 rounded-full font-dm text-base font-bold text-center transition-transform hover:scale-105"
                                    style="{{ $sStyle }}">
                                    {{ $button_secondary['title'] }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif