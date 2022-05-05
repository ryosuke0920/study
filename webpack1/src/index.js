import './style.scss';


const ROOT = document.querySelector(':root');
const HEAD = ROOT.querySelector('head');
const MENU_FLOOR = ROOT.querySelector('#menu-floor');

const MENU_BUTTON_CLASS = 'menu-button';
const MENU_SHOW_CLASS = 'menu-show';

const WIN1_BUTTON_CLASS = 'win1-button';
const WIN1_SHOW_CLASS = 'win1-show';

const WIN2_BUTTON_CLASS = 'win2-button';
const WIN2_SHOW_CLASS = 'win2-show';

const WIN3_BUTTON_CLASS = 'win3-button';
const WIN3_SHOW_CLASS = 'win3-show';

class MyFrame {

	init(){
		ROOT.setAttribute('onclick', 'void(0)');
		ROOT.classList.add(WIN1_SHOW_CLASS);
		window.addEventListener('click', this.window_click.bind(this) );

		ROOT.addEventListener('touchstart', this.window_touch.bind(this) );
		ROOT.addEventListener('touchend', this.window_touch.bind(this) );
		ROOT.addEventListener('touchmove', this.window_touch.bind(this) );
		ROOT.addEventListener('touchcancel', this.window_touch.bind(this) );
	}

	window_click(e){
		console.log(e);
		const classList = e.target.classList;
		const id = e.target.id;

		if(classList.contains(WIN1_BUTTON_CLASS)){
			e.preventDefault();
			this.slide_win(WIN1_SHOW_CLASS);
			return;
		}

		if(classList.contains(WIN2_BUTTON_CLASS)){
			e.preventDefault();
			this.slide_win(WIN2_SHOW_CLASS);
			return;
		}

		if(classList.contains(WIN3_BUTTON_CLASS)){
			e.preventDefault();
			this.slide_win(WIN3_SHOW_CLASS);
			return;
		}

		if(classList.contains(MENU_BUTTON_CLASS)){
			e.preventDefault();
			ROOT.classList.add(MENU_SHOW_CLASS);
			return;
		}

		if(id == MENU_FLOOR.id){
			e.preventDefault();
			ROOT.classList.remove(MENU_SHOW_CLASS);
			return;
		}
	}

	window_touch(e){
		console.log(e);
	}

	slide_win(to){
		ROOT.classList.remove(WIN1_SHOW_CLASS);
		ROOT.classList.remove(WIN2_SHOW_CLASS);
		ROOT.classList.remove(WIN3_SHOW_CLASS);
		ROOT.classList.add(to);
	}
}

(new MyFrame()).init();
