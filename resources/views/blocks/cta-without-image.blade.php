<section class="@if ($spacing) {{ $spacing }} @endif" style="{{ $section_style }}">
	<div class="container px-4 mx-auto">
		<div class="grid grid-cols-1 lg:grid-cols-12">
			<div class="lg:col-span-8 lg:col-start-3 text-center">
				@if ($label)
					<p class="opacity-60 font-poppins text-xs font-bold leading-3 uppercase mb-4 tracking-wider">
						{{ $label }}
					</p>
				@endif

				@if ($title)
					<p class="font-dm text-3xl font-bold leading-10 tracking-tight mb-8">
						{{ $title }}
					</p>
				@endif

				@if ($button)
					@php
						$color = !empty($buttonBg) ? $buttonBg : '#3772FF';

						if ($outlined_button) {
						    $bgStyle = "border: 2px solid {$color}; background-color: transparent; color: {$color};";
						} else {
						    $bgStyle = "background-color: {$color}; border: 2px solid {$color}; color: #ffffff; text-decoration: none;";
						}
					@endphp

					<a href="{{ $button['url'] }}" style="{{ $bgStyle }}"
						class="table rounded-full px-6 py-4 font-poppins text-base font-bold leading-none mx-auto">
						{{ $button['title'] }}
					</a>
				@endif

			</div>
		</div>
	</div>
</section>
