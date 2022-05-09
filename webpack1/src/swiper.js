import Swiper, { Navigation, Pagination } from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

import './swiper.scss';

class MyFrame {
	init(){
		this.init_swiper();
	}
	init_swiper(){
		const swiper = new Swiper('.swiper', {
			modules: [Navigation, Pagination],

			// Optional parameters
			loop: true,
		  
			// If we need pagination
			pagination: {
			  el: '.swiper-pagination',
			},
		  
			// Navigation arrows
			navigation: {
			  nextEl: '.swiper-button-next',
			  prevEl: '.swiper-button-prev',
			},
		  
			// And if we need scrollbar
			scrollbar: {
			  el: '.swiper-scrollbar',
			},
		  });
		  
	}

}

(new MyFrame()).init();
