@php
	$hasLink = !empty($item['link']);
@endphp

<div class="swiper-slide !h-auto py-10">
	<div class="flex flex-col h-full p-10 pt-11 rounded-2xl shadow-lg"
		style="background-color: {{ $item['background'] ? $item['background'] : '#FCFCFD' }}">

        <div class="w-16 h-16 mb-20">
			<img src="{{ $item['icon']['url'] }}" alt="{{ $item['icon']['alt'] }}" class="w-full h-full object-cover rounded-full">
		</div>

		<div class="flex-grow mb-6">
			<p class="font-poppins text-2xl lg:font-normal font-bold leading-8">
				{{ $item['title'] }}
			</p>

			<p class="font-poppins text-sm font-normal leading-6">
				{{ $item['description'] }}
			</p>
		</div>

		@if ($hasLink)
			@php
				$baseColor = !empty($item['button_color']) ? $item['button_color'] : '#E6E8EC';
				$isOutlined = !empty($item['button_outlined']);

				if ($isOutlined) {
				    $lStyle = "border: 2px solid {$baseColor} !important; background-color: transparent !important; color: #23262F !important;";
				} else {
				    $lStyle = "background-color: {$baseColor} !important; border: 2px solid {$baseColor} !important; color: #23262F !important;";
				}
			@endphp

			<div class="mt-auto">
				<a href="{{ $item['link']['url'] }}" target="{{ $item['link']['target'] ?? '_self' }}" style="{{ $lStyle }}"
					class="inline-flex items-center justify-center !px-6 !py-3 rounded-full font-dm !text-sm !font-bold !leading-4">
					{{ $item['link']['title'] }}
				</a>
			</div>
		@endif
	</div>
</div>
