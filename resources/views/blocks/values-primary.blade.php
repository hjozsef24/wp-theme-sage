<section class="@if ($spacing) {{ $spacing }} @endif" style="{{ $section_style }}">
    <div class="container px-4 mx-auto">
        <div class="flex justify-center lg:mb-24 mb-12">
            <div class="lg:w-2/3 w-full text-center flex flex-col items-center">
                @if ($label)
                    <span class="font-poppins text-xs font-bold leading-3 uppercase mb-3 opacity-70">
                        {{ $label }}
                    </span>
                @endif

                @if ($title)
                    <p class="font-dm text-3xl font-bold leading-10 tracking-tight">
                        {{ $title }}
                    </p>
                @endif

                @if ($button)
                    @php
                        $button_classes = $outlined_button
                            ? 'inline-flex items-center justify-center px-6 py-4 rounded-full border-2 font-dm text-sm font-bold leading-normal'
                            : 'inline-flex items-center justify-center px-6 py-4 gap-3 rounded-full font-poppins font-bold text-base text-white';

                        $button_style = $outlined_button
                            ? "border-color: {$button_background}; color: #23262F;"
                            : "background-color: {$button_background};";
                    @endphp

                    <div class="mt-8">
                        <a href="{{ $button['url'] ?? '#' }}" class="{{ $button_classes }}" style="{{ $button_style }}">
                            {{ $button['title'] }}
                        </a>
                    </div>
                @endif
            </div>
        </div>

        @if ($values)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-8">
                @foreach ($values as $value)
                    <div class="rounded-3xl p-6 py-12 lg:px-8 lg:py-16 flex flex-col items-start" style="background-color: {{$card_background}}">
                        @if ($value['icon'])
                            <div class="w-12 h-12 mb-8">
                                <img src="{{ $value['icon']['url'] }}" alt="{{ $value['icon']['alt'] ?? $value['title'] }}"
                                    class="w-full h-full object-contain">
                            </div>
                        @endif

                        <p class="font-poppins text-base font-bold leading-6 mb-4">
                            {{ $value['title'] }}
                        </p>

                        <p class="font-poppins text-sm font-normal leading-6 opacity-70">
                            {{ $value['description'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>