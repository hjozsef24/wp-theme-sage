<section class="@if($spacing){{ $spacing }}@endif" style="{{ $section_style }}">
	<div class="container px-4 mx-auto">
		<div class="grid grid-cols-1 lg:grid-cols-12">
			<div class="lg:col-span-8 lg:col-start-3 text-center">

				@if ($label)
					<p
						class="lg:text-center text-left opacity-80 font-poppins text-xs font-bold leading-3 uppercase mb-4 tracking-wider">
						{{ $label }}
					</p>
				@endif

				@if ($title)
					<p
						class="lg:text-center text-left font-dm text-4xl leading-12 tracking-tight font-bold lg:text-4xl lg:leading-12">
						{{ $title }}
					</p>
				@endif

			</div>
		</div>

		@if (!empty($cards))
			<div class="lg:mt-24 mt-12 grid grid-cols-1 lg:grid-cols-4 gap-8">
				@foreach ($cards as $item)
					@include('partials.pricing-card', ['item' => $item])
				@endforeach
			</div>
		@endif
	</div>
</section>
