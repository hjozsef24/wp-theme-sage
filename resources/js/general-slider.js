import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';

export const initGeneralSlider = () => {
	const swiperElement = document.querySelector('.general-slider-swiper');

	if (swiperElement) {
		new Swiper('.general-slider-swiper', {
			modules: [Navigation],
			slidesPerView: 1.2,
			spaceBetween: 24,
			slidesOffsetAfter: 32,
			centeredSlides: false,
			loop: false,
			navigation: {
				nextEl: '.general-slider-next-btn',
				prevEl: '.general-slider-prev-btn',
			},
			breakpoints: {
				1024: {
					slidesPerView: 4,
					spaceBetween: 32,
					slidesOffsetAfter: 0,
				}
			}
		});

	}
}

document.addEventListener('DOMContentLoaded', initGeneralSlider);