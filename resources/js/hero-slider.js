import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';

export const initHeroSlider = () => {
	const swiperElement = document.querySelector('.hero-sliders');

	if (swiperElement) {
		new Swiper('.hero-sliders', {
            modules: [Navigation],
			slidesPerView: 1,
            loop: true,
            navigation: {
				nextEl: '.hero-sliders-next-btn',
				prevEl: '.hero-sliders-prev-btn',
			},
		});

	}
}

document.addEventListener('DOMContentLoaded', initHeroSlider);