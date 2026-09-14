<form id="contact-form" class="flex flex-col gap-8">
	@php
		wp_nonce_field('my_ajax_nonce', 'security');
		$inputStyle = "background-color: {$color};";
	@endphp

	<div class="flex flex-col gap-3">
		<label for="name" class="font-dm text-xs font-bold opacity-70 uppercase">
			Név
		</label>
		<input type="text" id="name" name="name" required @style([$inputStyle])
			class="w-full h-12 px-4 border-2 rounded-xl font-poppins text-sm outline-none transition-all duration-300 hover:border-black/20 focus:border-black">
	</div>

	<div class="flex flex-col gap-3">
		<label for="email" class="font-dm text-xs font-bold opacity-70 uppercase">
			E-mail cím
		</label>
		<input type="email" id="email" name="email" required @style([$inputStyle])
			class="w-full h-12 px-4 border-2 rounded-xl font-poppins text-sm outline-none transition-all duration-300 hover:border-black/20 focus:border-black">
	</div>

	<div class="flex flex-col gap-3">
		<label for="subject" class="font-dm text-xs font-bold opacity-70 uppercase">
			Tárgy
		</label>
		<input type="text" id="subject" name="subject" required @style([$inputStyle])
			class="w-full h-12 px-4 border-2 rounded-xl font-poppins text-sm outline-none transition-all duration-300 hover:border-black/20 focus:border-black">
	</div>

	<div class="flex flex-col gap-3">
		<label for="message" class="font-dm text-xs font-bold opacity-70 uppercase">
			Üzenet
		</label>
		<textarea id="message" name="message" rows="4" @style([$inputStyle])
		 class="w-full p-4 border-2 rounded-xl font-poppins text-sm outline-none transition-all duration-300 hover:border-black/20 focus:border-black resize-none"></textarea>
	</div>

	<div class="mt-2">
		@php
			$color = !empty($button['color']) ? $button['color'] : '#23262F';
			$isOutlined = !empty($button['outlined']);

			if ($isOutlined) {
			    $submitStyle = "background-color: transparent !important; border: 2px solid {$color} !important; color: {$color} !important;";
			} else {
			    $submitStyle = "background-color: {$color} !important; border: 2px solid {$color} !important; color: #ffffff !important;";
			}
		@endphp

		<button type="submit" style="{{ $submitStyle }}"
			class="w-full lg:w-auto cursor-pointer inline-flex items-center justify-center !px-6 !py-3.5 !rounded-full font-poppins font-bold !text-base !leading-6">
			{{ $button['title'] ?? 'Küldés' }}
		</button>
	</div>

	<div id="form-response" class="hidden mt-4 font-dm text-sm font-bold"></div>
</form>

<style>
	input.error,
	textarea.error {
		border-color: #EF466F !important;
	}
</style>
