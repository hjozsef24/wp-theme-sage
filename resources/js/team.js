import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';

export const initTeamSlider = () => {
	const swiperElement = document.querySelector('.team-swiper');

	if (swiperElement) {
		new Swiper('.team-swiper', {
			slidesPerView: 1.2,
			modules: [Navigation],
			slidesOffsetAfter: 32,
			spaceBetween: 8,
			centeredSlides: false,
			loop: false,
			navigation: {
				nextEl: '.team-next-btn',
				prevEl: '.team-prev-btn',
			},
			breakpoints: {
				768: {
					slidesPerView: 2,
				},
				1199: {
					slidesPerView: 3,
				},
			}
		});
	}
}

document.addEventListener('DOMContentLoaded', initTeamSlider);