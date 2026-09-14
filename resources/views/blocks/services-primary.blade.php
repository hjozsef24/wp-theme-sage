<section class="@if($spacing){{ $spacing }}@endif" style="{{ $section_style }}">
	<div class="grid grid-cols-1 lg:grid-cols-12 mb-12 lg:mb-24">
		<div class="lg:col-span-4 lg:col-start-5 text-center px-8 lg:px-0">
			@if ($title)
				<p
					class="font-dm text-4xl leading-12 lg:text-5xl lg:leading-14 font-bold tracking-tight mb-4">
					{{ $title }}
				</p>
			@endif

			@if ($description)
				<p class="font-poppins text-base font-normal leading-6">
					{{ $description }}
				</p>
			@endif

		</div>
	</div>

	@if (!empty($services))
		<div class="swiper services-primary-swiper">
			<div class="swiper-wrapper">
				@foreach ($services as $item)
					@include('partials.services-primary-card', ['item' => $item])
				@endforeach
			</div>
		</div>

		@include('partials.slider-nav', ['prefix' => 'services-primary', 'class' => 'mt-12'])
	@endif
</section>
