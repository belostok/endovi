import './styles/main.scss';

import { documentReady } from './scripts/helpers';
import animation from './scripts/front/animation';
import menu from './scripts/front/menu';

documentReady( () => {
	animation();

	menu();
} );
