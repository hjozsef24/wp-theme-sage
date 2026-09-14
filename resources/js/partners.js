import Swiper from 'swiper';
import { Navigation, Autoplay } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';

export const initPartnersSlider = () => {
  const swiperElement = document.querySelector('.partners-swiper');
  
  if (swiperElement) {
	new Swiper('.partners-swiper', {
	  modules: [Navigation, Autoplay],
	  slidesPerView: 2,
	  spaceBetween: 24,
	  loop: true,
	  autoplay: {
		delay: 3000,
		disableOnInteraction: false,
	  },
	  navigation: {
		nextEl: '.partners-next-btn',
		prevEl: '.partners-prev-btn',
	  },
	  breakpoints: {
		640: {
		  slidesPerView: 2,
		},
		768: {
		  slidesPerView: 4,
		},
		1199: {
		  slidesPerView: 5,
		},
	  },
	});
  }
};

document.addEventListener('DOMContentLoaded', initPartnersSlider);