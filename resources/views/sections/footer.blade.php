<footer class="w-full lg:pb-6 pb-12" style="{{ $section_style }}">
    <div class="container mx-auto px-4 pt-16 lg:pt-20 ">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 pb-8 lg:pb-20">
            <div class="md:col-span-4">
                @if ($logo)
                    <img src="{{ $logo['url'] }}" alt="{{ $logo['alt'] }}" class="w-29 h-8 mb-10" />
                    @endif

                @if ($description)
                    <p class="leading-6 font-normal text-sm mb-10">{{ $description }}</p>
                @endif

                @if ($socialMedia)
                    <div class="flex items-center gap-6">
                        @foreach ($socialMedia as $sm)
                            @continue(!$sm['link'] || !$sm['icon'])

                            <a href="{{ $sm['link'] }}" class="" target="_blank">
                                <img src="{{ $sm['icon']['url'] }}" alt="{{ $sm['icon']['alt'] }}"
                                    class="w-5 h-5 object-contain cursor-pointer" />
                                    </a>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="md:col-span-3 md:col-start-6 flex flex-col gap-8">
                <button class="footer-toggle lg:hidden flex items-center justify-between w-full border-t border-{{$section_colors['bg']}} pt-8">
                    <span class="font-bold uppercase tracking-wider text-xs text-left">
                        {{ wp_get_nav_menu_name('footer_navigation_first') }}
                    </span>
                    <span class="md:hidden transition-transform duration-300 arrow">
                        {!! $getSvg('icons/arrow.svg') !!}
                    </span>
                </button>

                <nav class="footer-content hidden md:flex flex-col">
                    @if (has_nav_menu('footer_navigation_first'))
                        {!! wp_nav_menu([
                            'theme_location' => 'footer_navigation_first',
                            'container' => false,
                            'echo' => false,
                            'items_wrap' => '<ul class="flex flex-col gap-8">%3$s</ul>',
                            'link_class' => 'text-sm leading-4 font-bold ' . ($section_colors['menu'] ? "text-[{$section_colors['menu']}]" : 'text-[#777E90]'),
                        ]) !!}
                    @endif
                </nav>
            </div>

            <div class="md:col-span-3 md:col-start-10 flex flex-col gap-8">
                <button class="footer-toggle lg:hidden flex items-center justify-between w-full border-t border-{{$section_colors['bg']}} pt-8">
                    <span class="font-bold uppercase tracking-wider text-xs text-left !mb-0">
                        {{ wp_get_nav_menu_name('footer_navigation_second') }}
                    </span>
                    <span class="md:hidden transition-transform duration-300 arrow">
                        {!! $getSvg('icons/arrow.svg') !!}
                    </span>
                </button>

                <nav class="footer-content hidden md:flex flex-col">
                    @if (has_nav_menu('footer_navigation_second'))
                        {!! wp_nav_menu([
                            'theme_location' => 'footer_navigation_second',
                            'container' => false,
                            'echo' => false,
                            'items_wrap' => '<ul class="flex flex-col gap-8">%3$s</ul>',
                            'link_class' => 'text-sm leading-4 font-bold ' . ($section_colors['menu'] ? "text-[{$section_colors['menu']}]" : 'text-[#777E90]'),
                        ]) !!}
                    @endif
                </nav>
            </div>

        </div>

        @if ($copyright)
            <div class="pt-6 border-t text-{{$section_colors['bg']}} text-sm gap-4">
                <p class="text-center text-xs leading-5">{{ $copyright }}</p>
                </div>
        @endif
    </div>
</footer>
<div
	class="hidden 
    mb-0 mb-4 mb-8 mb-12 mb-16 mb-20 mb-24 mb-28 mb-32 mb-36 mb-40 mb-44 mb-48 mb-56 mb-64 mb-80 mb-96 mb-112 mb-128 
    py-0 py-4 py-8 py-12 py-16 py-20 py-24 py-28 py-32 py-36 py-40 py-44 py-48 py-56 py-64 py-80 py-96 py-112 py-128">
</div>
