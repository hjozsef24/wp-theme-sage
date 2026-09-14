import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';

export const initTestimonialsSlider = () => {
	const swiperElement = document.querySelector('.testimonials-swiper');

	if (swiperElement) {
		new Swiper('.testimonials-swiper', {
			slidesPerView: 1,
			modules: [Navigation],
			spaceBetween: 32,
			loop: true,
			breakpoints: {
				1024: {
					slidesPerView: 3,
				}
			},
			navigation: {
				nextEl: '.testimonials-next-btn',
				prevEl: '.testimonials-prev-btn',
			},
		});
	}
}

document.addEventListener('DOMContentLoaded', initTestimonialsSlider);