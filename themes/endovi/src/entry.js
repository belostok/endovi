import './styles/main.scss';

import { documentReady } from './scripts/helpers';
import heroSlider from './scripts/front/hero-slider';
import dealersSlider from './scripts/front/dealers-slider';
import feedbackSlider from './scripts/front/feedback-slider';
import animation from './scripts/front/animation';
import tabs from './scripts/front/tabs';
import menu from './scripts/front/menu';

documentReady( () => {
	animation();

	menu();
	tabs();

	heroSlider();
	dealersSlider();
	feedbackSlider();
} );
