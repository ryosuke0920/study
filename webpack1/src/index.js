// import './style.css';
import './style.scss';


const ROOT = document.querySelector(':root');
const NAV = document.querySelector('nav');
const MENU_BUTTON_CLASS = 'menu-button';
const MENU_SHOW_CLASS = 'menu-show';
const MENU_HIDE_CLASS = 'menu-hide';

class MyFrame {

	init(){
		NAV.addEventListener('click', this.nav_click.bind(this) );
		window.addEventListener('click', this.window_click.bind(this) );
	}

	nav_click(e){
		e.stopPropagation();
	}

	window_click(e){
		const classList = e.target.classList;

		if(classList.contains(MENU_BUTTON_CLASS)){
			e.preventDefault();
			ROOT.classList.remove(MENU_HIDE_CLASS);
			ROOT.classList.add(MENU_SHOW_CLASS);
			return;
		}

		if(ROOT.classList.contains(MENU_SHOW_CLASS)){
			ROOT.classList.add(MENU_HIDE_CLASS);
			return;
		}

	}
}

(new MyFrame()).init();
