<div class="relative rounded-2xl p-6 pt-8 flex flex-col shadow-md"
	style="background-color: {{ $item['background_color'] ? $item['background_color'] : '#FCFCFD' }}">
	@if (!empty($item['badge_title']))
		<div class="absolute -top-2 -right-2 px-2 py-2 rounded font-poppins text-xs font-bold leading-none uppercase"
			style="
                background-color: {{ !empty($item['badge_background']) ? $item['badge_background'] : '#45B26B' }};
                color: {{ !empty($item['background_color']) ? $item['background_color'] : '#FCFCFD' }}">
			{{ $item['badge_title'] }}
		</div>
	@endif

	<p class="font-poppins text-base font-normal leading-6" style="color: {{ $item['title_color'] ?? '#3772FF' }}">
		{{ $item['title'] }}
	</p>

	<p class="font-poppins text-xs font-normal leading-5 mb-6">
		{{ $item['label'] }}
	</p>

	<div class="flex items-start gap-1 mb-8">
		<span class="font-poppins text-2xl font-semibold leading-8">
			{{ $item['price']['sign'] }}
		</span>
		<span class="font-dm text-4xl font-bold leading-12 tracking-tight mr-1">
			{{ $item['price']['amount'] }}
		</span>
		<span class="opacity-70 font-dm text-4xl font-bold leading-12 tracking-tight">
			{{ $item['price']['foreign_exchange'] }}
		</span>
	</div>

	<ul class="flex-grow">
		@foreach ($item['features'] as $feature)
			<li class="flex items-center gap-3 py-3 border-t {{ $loop->last ? 'border-b' : '' }}"
				style="border-color: {{ $item['features_separator_color'] ? $item['features_separator_color'] : '#E6E8EC' }}">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<path d="M6 12L10 16L18 8" stroke="#45B36B" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
						stroke-linejoin="round" />
				</svg>
				<span class="font-poppins text-sm font-normal leading-6">
					{{ $feature['feature'] }}
				</span>
			</li>
		@endforeach
	</ul>

	@if ($item['button'])
		@php
			$color = $item['button_background'] ?? '#3772FF';
			$isOutlined = !empty($item['button_outlined']);

			if ($isOutlined) {
			    $btnStyle = "border: 2px solid {$color} !important; background-color: transparent !important; color: {$color} !important;";
			} else {
			    $btnStyle = "background-color: {$color} !important; border: 2px solid {$color} !important; color: #ffffff !important;";
			}
		@endphp

		<div class="mt-6">
			<a href="{{ $item['button']['url'] }}" target="{{ $item['button']['target'] }}" style="{{ $btnStyle }}"
				class="lg:table block text-center rounded-full px-6 py-4 font-poppins text-base font-bold leading-none lg:mx-0 mx-auto transition-all duration-200">
				{{ $item['button']['title'] }}
			</a>
		</div>
	@endif

</div>
