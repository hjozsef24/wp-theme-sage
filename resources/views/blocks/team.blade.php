<section class="mx-auto @if ($spacing) {{ $spacing }} @endif" style="{{ $section_style }}">
	<div class="container !p-0 mx-auto">
		<div class="grid grid-cols-1 lg:grid-cols-12 lg:mb-20 mb-12 px-8 lg:px-0">
			<div class="lg:col-span-6 lg:col-start-4 text-center">
				@if ($title)
					<p class="font-dm text-5xl font-bold leading-14 tracking-tight mb-5">
						{{ $title }}
					</p>
				@endif

				@if ($description)
					<p class="opacity-70 font-poppins text-base font-normal leading-6">
						{{ $description }}
					</p>
				@endif
			</div>
		</div>

		@if (!empty($team))
			<div class="hidden lg:grid lg:grid-cols-3 lg:gap-x-8 lg:gap-y-16 px-4">
				@foreach ($team as $member)
					@include('partials.team-card', ['member' => $member])
				@endforeach
			</div>

			<div class="lg:hidden pl-8">
				<div class="swiper team-swiper">
					<div class="swiper-wrapper">
						@foreach ($team as $member)
							<div class="swiper-slide">
								@include('partials.team-card', ['member' => $member])
							</div>
						@endforeach
					</div>
				</div>
			</div>

			@include('partials.slider-nav', [
				'prefix' => 'team',
				'class' => 'mt-12',
			])
		@endif
	</div>
</section>
