<section class="@if ($spacing) {{ $spacing }} @endif"
	style="{{ $section_style }}; 
                --cat-bg: {{ $category_style['background_color'] }}; 
                --cat-text: {{ $category_style['text_color'] }};">
	<div class="container px-4 mx-auto">
		@if ($title)
			<p class="text-center font-dm text-5xl font-bold lg:leading-tight leading-tight tracking-tight lg:mb-12 mb-10">
				{{ $title }}
			</p>
		@endif

		@if (!empty($faqs))
			<div class="hidden lg:flex flex-wrap justify-center gap-4 mb-16 max-w-xl mx-auto">
				@foreach ($faqs as $index => $group)
					<button data-target="cat-{{ $index }}"
						class="faq-category-btn cursor-pointer px-3 py-1.5 rounded-full font-dm text-sm font-bold leading-4 transition-all"
						style="{{ $index === 0
						    ? 'background-color: ' . $category_style['background_color'] . '; color: ' . $category_style['text_color'] . ';'
						    : 'color: ' . $category_style['background_color'] . '; background-color: transparent;' }}">
						{{ $group['category_title'] }}
					</button>
				@endforeach
			</div>
			<div class="block lg:hidden mb-12 max-w-xl mx-auto">
				<div class="relative w-full">
					<select id="faq-mobile-select"
						class="w-full h-12 pl-4 pr-12 border-2 rounded-xl font-poppins text-base font-medium bg-white appearance-none outline-none transition-all cursor-pointer"
						style="border-color: {{ $category_style['background_color'] }}; color: {{ $category_style['background_color'] }};">
						@foreach ($faqs as $index => $group)
							<option value="cat-{{ $index }}">{{ $group['category_title'] }}</option>
						@endforeach
					</select>
                    
					<div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none">
						<svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round" />
						</svg>
					</div>
				</div>
			</div>

			<div class="faq-list flex flex-col max-w-xl mx-auto">
				@foreach ($faqs as $catIndex => $group)
					<div class="faq-group {{ $catIndex > 0 ? 'hidden' : '' }}" id="cat-{{ $catIndex }}">

						@if (!empty($group['questions_answers']))
							@foreach ($group['questions_answers'] as $qIndex => $item)
								<div
									class="faq-item border-t border-current border-opacity-10 py-8 cursor-pointer group transition-all duration-300">
									<div class="flex items-start justify-between">
										<div class="flex items-start gap-6 lg:gap-12">

											<span class="faq-number opacity-50 font-poppins text-base font-normal leading-6">
												{{ sprintf('%02d', $qIndex + 1) }}
											</span>

											<div class="flex flex-col gap-4">
												<p class="faq-question font-poppins text-base font-normal leading-6 transition-all duration-300">
													{{ $item['question'] }}
												</p>

												<div class="faq-answer hidden opacity-70 text-base leading-6 max-w-3xl pt-2">
													{!! $item['answer'] !!}
												</div>
											</div>
										</div>

										<div class="faq-arrow-icon">
											<svg class="w-6 h-6 transform opacity-50 group-hover:opacity-100 transition-opacity" viewBox="0 0 24 24"
												fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
													stroke-linejoin="round" />
											</svg>
										</div>
									</div>
								</div>
							@endforeach
						@endif
					</div>
				@endforeach
			</div>
		@endif
	</div>
</section>
