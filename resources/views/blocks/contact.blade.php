<section class="{{ $spacing }}" style="{{ $section_style }}">
    <div class="container px-4 mx-auto">

        @if ($title || $description)
            <div class="flex justify-center lg:mb-20 mb-12">
                <div class="lg:w-1/2 w-full text-center">
                    @if ($title)
                        <p class="font-dm lg:text-5xl text-4xl font-bold lg:leading-tight leading-9 tracking-tight">
                            {{ $title }}
                        </p>
                    @endif
                    @if ($description)
                        <p class="mt-4 font-poppins text-base leading-6 font-normal opacity-80">
                            {{ $description }}
                        </p>
                    @endif
                </div>
            </div>
        @endif

        <div class="bg-slate-50 lg:rounded-3xl rounded-2xl lg:p-20 px-4 py-8 lg:shadow-lg shadow-sm">
            <div class="flex flex-wrap lg:flex-nowrap lg:gap-12 gap-0">

                <div class="w-full lg:w-1/2">
                    @if ($contacts)
                        <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-x-32 lg:gap-y-12 gap-0">
                            @foreach ($contacts as $item)
                                <div class="flex flex-col lg:border-none border-b border-current/30 lg:pb-0 pb-8 lg:mb-0 mb-8 last:mb-0">
                                    @if ($item['icon'])
                                        <img src="{{ $item['icon']['url'] }}" alt="{{ $item['icon']['alt'] }}" class="w-6 h-6 object-contain">
                                    @endif

                                    <div class="mt-4 font-dm text-sm leading-6">
                                        {{ $item['label'] }}
                                    </div>

                                    <div class="mt-3 font-dm text-sm font-bold leading-6">
                                        @if ($item['type'] === 'phone')
                                            <a href="tel:{{ str_replace(' ', '', $item['contact']) }}" class="hover:underline">{{ $item['contact'] }}</a>
                                        @elseif($item['type'] === 'email')
                                            <a href="mailto:{{ $item['contact'] }}" class="hover:underline">{{ $item['contact'] }}</a>
                                        @else
                                            {{ $item['contact'] }}
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if ($socials)
                        <div class="lg:mt-12 lg:py-0 py-8 lg:border-none border-b border-current/20">
                            <div class="flex items-center gap-6">
                                @foreach ($socials as $sm)
                                    @continue(!$sm['link'] || !$sm['icon'])
                                    <a href="{{ $sm['link'] }}" class="transition-opacity hover:opacity-70" target="_blank">
                                        <img src="{{ $sm['icon']['url'] }}" alt="{{ $sm['icon']['alt'] }}" class="w-5 h-5 object-contain" />
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if ($address)
                        <div class="lg:mt-12 mt-8 lg:mb-0 mb-8">
                            <a href="https://www.google.com/maps/search/{{ urlencode($address) }}" target="_blank"
                                class="inline-flex items-center gap-3 group">
                                <span class="bg-current rounded-full p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21.5223 5.74723C22.3809 3.68663 20.3136 1.61941 18.253 2.478L4.0366 8.40151C1.25632 9.55996 1.72626 13.6348 4.69725 14.1299L9.13133 14.8689L9.87034 19.303C10.3655 22.274 14.4403 22.7439 15.5988 19.9637L21.5223 5.74723Z"
                                            fill="white" />
                                    </svg>
                                </span>
                                <span class="font-dm text-sm font-bold group-hover:underline">
                                    Útvonaltervezés
                                </span>
                            </a>
                        </div>
                    @endif
                </div>

                <div class="w-full lg:w-1/2 lg:pt-0 pt-12 lg:border-none border-t border-current/20">
                    @include('forms.contact-form', [
                        "color" => $input_color
                    ])
                </div>

            </div>
        </div>
    </div>
</section>