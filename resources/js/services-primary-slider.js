import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';

export const initServicesPrimarySlider = () => {
	const swiperElement = document.querySelector('.services-primary-swiper');

	if (swiperElement) {
		new Swiper('.services-primary-swiper', {
			modules: [Navigation],
			slidesPerView: 1,
			spaceBetween: 0,
			loop: false,
			navigation: {
				nextEl: '.services-primary-next-btn',
				prevEl: '.services-primary-prev-btn',
			},
			breakpoints: {
				640: {
					slidesPerView: 2,
				},
				1024: {
					slidesPerView: 4,
				}
			}
		});
	}
}

document.addEventListener('DOMContentLoaded', initServicesPrimarySlider);