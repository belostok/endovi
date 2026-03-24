import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

import scroll from './scroll';

gsap.registerPlugin( ScrollTrigger );

export default () => {
	scroll( gsap, ScrollTrigger );
};
