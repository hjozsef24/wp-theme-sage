import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';

export const initServicesSecondarySlider = () => {
	const swiperElement = document.querySelector('.services-secondary-swiper');

	if (swiperElement) {
		new Swiper('.services-secondary-swiper', {
			modules: [Navigation],
			slidesPerView: 1,
			spaceBetween: 24,
			loop: false,
			navigation: {
				nextEl: '.services-secondary-next-btn',
				prevEl: '.services-secondary-prev-btn',
			},
			breakpoints: {
				640: {
					slidesPerView: 2,
					spaceBetween: 32,
				},
				1024: {
					slidesPerView: 4,
					spaceBetween: 48, 
				}
			}
		});
	}
}

document.addEventListener('DOMContentLoaded', initServicesSecondarySlider);