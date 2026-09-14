import $ from 'jquery';

$(function () {
	const $toggles = $('.footer-toggle');

	$toggles.on('click', function () {
		if (window.innerWidth < 768) {
			const $this = $(this);
			const $content = $this.next('.footer-content');
			const $arrow = $this.find('.arrow');

			$content.toggleClass('hidden flex');

			$arrow.toggleClass('rotate-180');
		}
	});

	$(window).on('resize', function() {
		if (window.innerWidth >= 768) {
			$('.footer-content').addClass('flex').removeClass('hidden');
			$('.arrow').removeClass('rotate-180');
		} else {
			$('.footer-content').addClass('hidden').removeClass('flex');
		}
	});
});