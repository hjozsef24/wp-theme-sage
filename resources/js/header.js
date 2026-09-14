import $ from 'jquery';

$(function () {
	const menuBtn = $('#menu-btn');
	const menuOverlay = $('#menu-overlay');
	const line1 = $('#line1');
	const line2 = $('#line2');
	const body = $('body');

	menuBtn.on('click', function () {
		menuOverlay.toggleClass('-right-full right-0');
		line1.toggleClass('rotate-45 translate-y-[4px]');
		line2.toggleClass('-rotate-45 -translate-y-[4px]');
		body.toggleClass('overflow-hidden');
	});
});