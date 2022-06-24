import Swiper, { Navigation } from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';

import '../scss/myswiper.scss'

const option = {
	modules: [Navigation],
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
	spaceBetween: 20,
	slidesPerView: 2.2,
};
const swiper = new Swiper('.swiper', option);
