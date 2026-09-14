<header style="{{ $section_style }}">
	<div class="container mx-auto pt-12 pb-6 md:py-12 px-4">
		<div class="flex items-center justify-between">
			@if ($logo)
				<a href="{{ home_url() }}">
					<img src="{{ $logo['url'] }}" alt="{{ $logo['alt'] }}" class="w-28 h-8 object-contain" />
				</a>
			@endif

			<div id="menu-btn" class="lg:hidden block z-40">
                <span class="block w-5 h-1 rounded transition-all duration-300 mb-1" 
                      style="background-color: {{ $section_colors['text'] ?? '#777E90' }};" id="line1"></span>
                <span class="block w-5 h-1 rounded transition-all duration-300" 
                      style="background-color: {{ $section_colors['text'] ?? '#777E90' }};" id="line2"></span>
            </div>

			<nav id="menu-overlay"
				class="flex flex-col lg:flex-row gap-8 fixed top-28 -right-full w-full h-[calc(100svh-6.5rem)] bg-[#FCFCFD] z-40 transition-all duration-500 ease-in-out lg:static lg:h-auto lg:w-auto lg:bg-transparent lg:translate-x-0"
				aria-label="{{ wp_get_nav_menu_name('header_navigation') }}">

				@if (has_nav_menu('header_navigation'))
					{!! wp_nav_menu([
					    'theme_location' => 'header_navigation',
					    'container' => false,
					    'echo' => false,
					    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					    'link_class' => 'lg:text-sm lg:leading-4 lg:font-bold text-2xl leading-8 font-semibold',
					    'menu_class' =>
					        'flex flex-col items-start pt-12 gap-8 px-8 lg:flex-row lg:items-center lg:gap-12 lg:pt-0 lg:px-0',
					]) !!}
				@endif

				@if ($highlightedButton)
					@php
						$color = !empty($highlightedButton['color']) ? $highlightedButton['color'] : '#E6E8EC';
						$isOutlined = !empty($highlightedButton['outlined']);

						if ($isOutlined) {
						    $hStyle = "border-color: {$color} !important; background-color: transparent !important; color: #23262F !important;";
						} else {
						    $hStyle = "background-color: {$color} !important; border-color: {$color} !important; color: #23262F !important;";
						}
					@endphp

					<a href="{{ $highlightedButton['url'] }}" style="{{ $hStyle }}"
						class="mt-auto ml-auto mr-auto mb-20 lg:m-0 lg:m-unset lg:!text-sm lg:!leading-4 !text-base !leading-4 !py-4 !px-6 lg:!py-3 lg:!px-4 !rounded-full !border-2 !font-bold transition-all hover:opacity-80 text-center">
						{{ $highlightedButton['title'] }}
					</a>
				@endif
			</nav>
		</div>
	</div>
</header>
