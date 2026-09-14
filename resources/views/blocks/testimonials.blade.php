<section class="@if($spacing){{ $spacing }}@endif" style="{{ $section_style }}">
	<div class="container px-4 mx-auto">
		@if ($title)
			<p
				class="text-center font-dm lg:text-5xl text-4xl font-bold lg:leading-14 leading-12 tracking-tight">
				{{ $title }}
			</p>
		@endif

		@if (!empty($testimonials))
			<div class="swiper testimonials-swiper lg:mt-24 mt-16">
				<div class="swiper-wrapper">
					@foreach ($testimonials as $item)
<div class="swiper-slide flex flex-col items-center text-center border-b border-current/20 pb-20">
							<blockquote class="font-poppins text-2xl font-normal leading-8 tracking-tight mb-6">
								{{ $item['testimonial'] }}
							</blockquote>

							@if ($item['image'])
								<img src="{{ $item['image']['url'] }}" alt="{{ $item['name'] }}"
									class="w-14 h-14 rounded-full object-cover mb-6 mx-auto">
							@endif

							<p class="font-poppins text-base font-medium leading-6">
								{{ $item['name'] }}
							</p>

							<p class="font-poppins text-sm font-normal leading-6 mt-1 opacity-70">
								{{ $item['position'] }}
							</p>

							<div class="flex items-center justify-center gap-1 mt-6">
								@for ($i = 0; $i < ($item['stars'] ?? 5); $i++)
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path
											d="M11.0811 3.1277C11.4285 2.32265 12.57 2.32265 12.9174 3.1277L15.0974 8.17958C15.2445 8.52047 15.5684 8.7518 15.9386 8.7804L21.5292 9.21239C22.4262 9.2817 22.7826 10.4078 22.0888 10.9806L17.8845 14.4518C17.5879 14.6967 17.458 15.0899 17.5504 15.4632L18.8443 20.6915C19.0571 21.5513 18.1296 22.2429 17.3663 21.7935L12.5066 18.9326C12.1935 18.7482 11.805 18.7482 11.4919 18.9326L6.63219 21.7935C5.86889 22.2429 4.94136 21.5513 5.15415 20.6915L6.44809 15.4632C6.54048 15.0899 6.41061 14.6967 6.11405 14.4518L1.90966 10.9806C1.21591 10.4078 1.57231 9.2817 2.4693 9.21239L8.05995 8.7804C8.43011 8.7518 8.75396 8.52047 8.90107 8.17958L11.0811 3.1277Z"
											fill="#23262F" />
									</svg>
								@endfor
							</div>
						</div>
					@endforeach
				</div>

				@include('partials.slider-nav', [
					'prefix' => 'testimonials',
					'class' => 'mt-12',
				])
			</div>
		@endif
	</div>
</section>
