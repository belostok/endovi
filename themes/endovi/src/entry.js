import './styles/main.scss';

import { documentReady } from './scripts/helpers';
import animation from './scripts/front/animation';
import menu from './scripts/front/menu';
import popup from './scripts/front/popup';
import cf7 from './scripts/front/cf7';

documentReady( () => {
	animation();

	menu();
	popup();
	cf7();
} );
