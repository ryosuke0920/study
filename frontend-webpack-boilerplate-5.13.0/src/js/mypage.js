import "regenerator-runtime/runtime";
import '../scss/app.scss';
import Swiper, { Navigation } from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';

console.log('app.js');

class Switcher {
	async main() {
		(new SwiperPage()).main();
	}
}

class SwiperPage {
	constructor() {
		this.swiperOption = {
			modules: [
				Navigation,
			],
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
		};
	}
	async main() {
		const node = document.querySelector('.mycards');
		console.log(node);
		const swiper = new Swiper(node, this.swiperOption);
	}
}

(new Switcher()).main();
