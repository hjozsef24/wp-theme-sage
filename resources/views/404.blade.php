@extends('layouts.app')

@section('content')
	<div class="flex flex-col items-center justify-center py-20 lg:py-32 px-8">
		<div class="w-full flex justify-center mb-12">
			<img src="@asset('assets/images/404.svg')" alt="404 hiba" style="width: 536px; height: auto;" class="max-w-full object-contain" />
		</div>

		<div class="flex flex-col items-center gap-8 text-center w-full">

			@if ($description)
				<p class="text-lg md:text-xl max-w-md leading-relaxed">
					{{ $description }}
				</p>
			@endif

			@if ($button)
				@php
					$btnColor = !empty($button['color']) ? $button['color'] : '#23262F';
					$isOutlined = !empty($button['outlined']);

					if ($isOutlined) {
					    $customStyle = "background-color: transparent !important; border: 2px solid {$btnColor} !important; color: {$btnColor} !important;";
					} else {
					    $customStyle = "background-color: {$btnColor} !important; border: 2px solid {$btnColor} !important; color: #ffffff !important;";
					}
				@endphp

				<a href="{{ $button['url'] }}" style="{{ $customStyle }}"
					class="inline-block !py-3 !px-4 py-6 !font-bold !rounded-full">
					{{ $button['title'] }}
				</a>
			@endif
		</div>
	</div>
@endsection
