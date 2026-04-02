import './styles/main.scss';

import { documentReady } from './scripts/helpers';
import animation from './scripts/front/animation';
import tabs from './scripts/front/tabs';
import menu from './scripts/front/menu';

documentReady( () => {
	animation();

	menu();
	tabs();
} );
