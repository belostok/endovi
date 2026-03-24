<?php
/**
 * Home page template file
 */

get_header();
?>
<?php endovi_inline_style( 'hero' ); ?>
<section class="endovi-hero js-hero">
	<div class="endovi-hero__wrapper">
		<div class="endovi-hero__upper endovi-container relative">
			<div class="endovi-hero__upper-wrapper endovi-wrapper">
				<div class="endovi-hero__logo-container relative desktop">
					<svg width="1380" height="130" viewBox="0 0 1380 130" fill="none"
						xmlns="http://www.w3.org/2000/svg">
						<path d="M1247.74 29.6639L1238.4 39.0815H1200.14L1209.46 29.6639H1247.74Z" fill="white"/>
						<path d="M1260.95 16.277L1254.73 22.5487H1216.45L1222.67 16.277H1260.95Z" fill="white"/>
						<path
							d="M1270.38 6.77807L1268.97 8.23152H1230.65L1233.69 5.24497C1233.77 5.14234 1233.86 5.05736 1233.98 4.9956C1234.09 4.93384 1234.21 4.89669 1234.34 4.88659H1269.66C1269.87 4.86465 1270.09 4.9154 1270.27 5.0308C1270.45 5.1462 1270.59 5.31966 1270.66 5.52372C1270.74 5.73689 1270.76 5.96992 1270.71 6.19324C1270.66 6.41656 1270.55 6.62011 1270.38 6.77807Z"
							fill="white"/>
						<path
							d="M1110.49 0.749328C1110.27 0.542325 1109.99 0.424533 1109.69 0.419312H1086.48C1086.22 0.445265 1085.97 0.561837 1085.79 0.749328C1085.58 0.979239 1085.46 1.28148 1085.46 1.595V127.971C1085.47 128.245 1085.59 128.505 1085.79 128.693C1085.87 128.793 1085.98 128.874 1086.1 128.931C1086.22 128.988 1086.35 129.019 1086.48 129.023H1110.87V1.595C1110.87 1.43455 1110.83 1.27649 1110.77 1.13088C1110.7 0.985279 1110.61 0.85533 1110.49 0.749328Z"
							fill="white"/>
						<path d="M1238.82 39.6517L1150.25 129.024H1110.8L1199.18 39.6517H1238.82Z" fill="white"/>
						<path
							d="M423.529 1.57782C423.517 1.42298 423.538 1.26728 423.591 1.12149C423.644 0.975698 423.727 0.843303 423.836 0.733458C423.944 0.623612 424.074 0.538939 424.218 0.485294C424.362 0.431649 424.515 0.410312 424.668 0.422761H447.862C447.992 0.425131 448.12 0.453714 448.239 0.506837C448.357 0.559961 448.464 0.636558 448.553 0.732152C448.767 0.959735 448.884 1.26352 448.879 1.57782V127.954C448.867 128.228 448.751 128.487 448.553 128.676C448.464 128.771 448.357 128.848 448.239 128.901C448.12 128.954 447.992 128.983 447.862 128.985H386.248C386.248 128.985 383.117 124.571 377.547 116.609L318.595 27.5048C317.578 26.0009 316.216 24.7702 314.626 23.9187C313.036 23.0672 311.266 22.6203 309.468 22.6164H293.206V127.954C293.205 128.091 293.175 128.226 293.119 128.35C293.063 128.475 292.982 128.585 292.88 128.676C292.772 128.78 292.644 128.861 292.505 128.914C292.365 128.967 292.216 128.991 292.067 128.985H268.934C268.804 128.983 268.676 128.954 268.557 128.901C268.439 128.848 268.332 128.771 268.243 128.676C268.141 128.585 268.06 128.475 268.004 128.35C267.948 128.226 267.918 128.091 267.917 127.954V1.57782C267.91 1.42159 267.935 1.26554 267.991 1.11984C268.047 0.974133 268.133 0.842038 268.243 0.732152C268.332 0.636558 268.439 0.559961 268.557 0.506837C268.676 0.453714 268.804 0.425131 268.934 0.422761H330.304C330.304 0.422761 333.679 4.9605 339.269 13.0253L398.221 101.986C399.202 103.525 400.548 104.79 402.135 105.665C403.723 106.541 405.501 106.999 407.308 106.998H423.57L423.529 1.57782Z"
							fill="white"/>
						<path
							d="M683.476 0.419685C688.24 0.39786 692.961 1.33353 697.367 3.17269C701.773 5.01185 705.776 7.71809 709.146 11.1353C712.516 14.5524 715.185 18.6128 717 23.0822C718.815 27.5516 719.74 32.3414 719.721 37.1754V92.2057C719.743 97.0414 718.82 101.833 717.006 106.305C715.192 110.777 712.523 114.84 709.153 118.259C705.783 121.679 701.779 124.387 697.372 126.227C692.965 128.068 688.242 129.004 683.476 128.982H539.796C539.528 128.978 539.273 128.867 539.085 128.673C538.879 128.442 538.769 128.138 538.78 127.827V1.57474C538.769 1.26332 538.879 0.959911 539.085 0.729075C539.273 0.534763 539.528 0.423559 539.796 0.419685H683.476ZM694.372 33.4214C694.374 31.9796 694.091 30.5521 693.539 29.2234C692.988 27.8947 692.179 26.692 691.16 25.6866C690.169 24.6369 688.975 23.8058 687.653 23.2451C686.33 22.6844 684.909 22.4061 683.476 22.4277H564.129V106.995H683.476C684.91 107.014 686.333 106.732 687.655 106.168C688.977 105.604 690.17 104.769 691.16 103.715C692.172 102.7 692.973 101.488 693.514 100.152C694.056 98.8161 694.327 97.3834 694.311 95.939L694.372 33.4214Z"
							fill="white"/>
						<path
							d="M954.489 0.419521C959.251 0.403185 963.97 1.3426 968.373 3.1837C972.777 5.02481 976.778 7.73126 980.147 11.1473C983.515 14.5634 986.185 18.6216 988.002 23.0885C989.819 27.5554 990.747 32.3428 990.734 37.1752V92.2056C990.75 97.0397 989.823 101.829 988.008 106.299C986.192 110.768 983.523 114.829 980.154 118.247C976.785 121.665 972.783 124.373 968.378 126.216C963.973 128.058 959.253 128.998 954.489 128.982H845.896C841.135 128.985 836.421 128.035 832.022 126.188C827.623 124.341 823.627 121.632 820.26 118.216C816.894 114.801 814.224 110.746 812.404 106.282C810.583 101.819 809.648 97.0359 809.65 92.2056V37.1752C809.65 32.3466 810.588 27.5654 812.41 23.1046C814.232 18.6439 816.902 14.5911 820.268 11.1777C823.634 7.76436 827.629 5.05739 832.027 3.21146C836.424 1.36553 841.137 0.416811 845.896 0.419521H954.489ZM965.385 33.4212C965.401 31.975 965.129 30.5403 964.584 29.2038C964.039 27.8673 963.232 26.6568 962.213 25.6452C961.221 24.5846 960.021 23.7453 958.691 23.1807C957.361 22.6161 955.93 22.3385 954.489 22.3657H845.896C843.017 22.4031 840.267 23.5799 838.232 25.6451C836.196 27.7104 835.037 30.5008 835 33.4212V95.9389C835.037 98.8594 836.196 101.65 838.232 103.715C840.267 105.78 843.017 106.957 845.896 106.994H954.489C955.93 107.022 957.361 106.744 958.691 106.179C960.021 105.615 961.221 104.776 962.213 103.715C963.232 102.703 964.039 101.493 964.584 100.156C965.129 98.8199 965.401 97.3852 965.385 95.9389V33.4212Z"
							fill="white"/>
						<path
							d="M1380 127.971C1380 128.105 1379.97 128.237 1379.91 128.358C1379.86 128.479 1379.77 128.586 1379.67 128.672C1379.57 128.783 1379.44 128.87 1379.3 128.927C1379.16 128.984 1379.01 129.01 1378.86 129.002H1355.67C1355.4 128.979 1355.16 128.863 1354.97 128.674C1354.79 128.486 1354.67 128.237 1354.65 127.971V1.59512C1354.64 1.43889 1354.67 1.28284 1354.72 1.13713C1354.78 0.991429 1354.87 0.859333 1354.97 0.749447C1355.06 0.651001 1355.17 0.571176 1355.29 0.514545C1355.41 0.457914 1355.54 0.42559 1355.67 0.41943H1378.86C1379.01 0.417245 1379.16 0.445282 1379.3 0.501924C1379.44 0.558567 1379.57 0.642693 1379.67 0.749447C1379.78 0.859333 1379.87 0.991429 1379.93 1.13713C1379.98 1.28284 1380.01 1.43889 1380 1.59512V127.971Z"
							fill="white"/>
						<path
							d="M22.3621 75.4296H172.262C172.363 75.4296 172.464 75.4093 172.558 75.3699C172.651 75.3305 172.737 75.2728 172.808 75.2C172.88 75.1272 172.937 75.0408 172.976 74.9457C173.015 74.8506 173.035 74.7487 173.035 74.6458V54.0197C173.029 53.8154 172.945 53.6213 172.801 53.4788C172.657 53.3362 172.463 53.2565 172.262 53.2565H22.3621V28.5052C22.3648 27.5707 22.5488 26.646 22.9037 25.7836C23.2586 24.9213 23.7775 24.1384 24.4306 23.4795C25.0837 22.8206 25.8583 22.2987 26.7102 21.9436C27.5622 21.5885 28.4747 21.4072 29.3956 21.4099L172.303 21.9874C172.508 21.9874 172.704 21.9048 172.849 21.7578C172.994 21.6108 173.075 21.4115 173.075 21.2036V0.783793C173.075 0.575919 172.994 0.376557 172.849 0.229568C172.704 0.0825783 172.508 3.6551e-07 172.303 3.6551e-07H1.68834C1.46154 -0.000150004 1.23704 0.0460973 1.02826 0.135975C0.819475 0.225853 0.630692 0.357517 0.473193 0.5231C0.315695 0.688682 0.192714 0.884786 0.1116 1.09969C0.0304861 1.31459 -0.00709499 1.54387 0.00110257 1.77384V101.893C0.00110257 109.004 2.78533 115.825 7.74128 120.853C12.6972 125.882 19.419 128.707 26.4277 128.707H172.262C172.467 128.707 172.663 128.624 172.808 128.477C172.953 128.33 173.035 128.131 173.035 127.923V107.441C173.029 107.237 172.945 107.043 172.801 106.9C172.657 106.758 172.463 106.678 172.262 106.678L29.355 107.256C27.5036 107.245 25.7312 106.494 24.4221 105.165C23.1129 103.837 22.3728 102.039 22.3621 100.16V75.4296Z"
							fill="white"/>
					</svg>
				</div>
				<div class="endovi-hero__title-wrapper relative flex fwrap jcspb aife">
					<div class="endovi-hero__title-container">
						<h1 class="endovi-hero__title h1">
							Наличие на <br>складе в Москве
						</h1>
					</div>
					<div class="endovi-hero__description-container">
						<p class="endovi-hero__description">
							Доставка по всей России
						</p>
					</div>
					<div class="endovi-hero__upper-button-container flex fdc aife jcfe">
						<div class="endovi-hero__pagination-number js-pagination-number">
							01/05
						</div>
						<a href="#" class="endovi-button">
							<span>Заказать</span>
							<svg width="10" height="8" viewBox="0 0 10 8" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M9.35355 4.03544C9.54882 3.84018 9.54882 3.52359 9.35355 3.32833L6.17157 0.146351C5.97631 -0.0489108 5.65973 -0.0489108 5.46447 0.146351C5.2692 0.341614 5.2692 0.658196 5.46447 0.853458L8.29289 3.68189L5.46447 6.51031C5.2692 6.70557 5.2692 7.02216 5.46447 7.21742C5.65973 7.41268 5.97631 7.41268 6.17157 7.21742L9.35355 4.03544ZM0 3.68188L-4.37113e-08 4.18188L9 4.18189L9 3.68189L9 3.18189L4.37113e-08 3.18188L0 3.68188Z"
									fill="#020033"/>
							</svg>
						</a>
					</div>
				</div>
			</div>
			<div class="endovi-hero__slider-container absolute">
				<div class="endovi-hero__slider js-hero-slider" data-autoplay="1">
					<div class="endovi-hero__slider-wrapper swiper-wrapper">
						<div class="endovi-hero__slide swiper-slide img-cover">
							<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/Rectangle 97.png'; ?>" alt="" class="endovi-hero__slide-image">
						</div>
						<div class="endovi-hero__slide swiper-slide img-cover">
							<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/Rectangle 98.png'; ?>" alt="" class="endovi-hero__slide-image">
						</div>
						<div class="endovi-hero__slide swiper-slide img-cover">
							<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/91ade5ecc57d5a4ee37c1556996191fa104026fa.jpg'; ?>" alt="" class="endovi-hero__slide-image">
						</div>
						<div class="endovi-hero__slide swiper-slide img-cover">
							<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/Rectangle 96.png'; ?>" alt="" class="endovi-hero__slide-image">
						</div>
						<div class="endovi-hero__slide swiper-slide img-cover">
							<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/Rectangle 100.png'; ?>" alt="" class="endovi-hero__slide-image">
						</div>
						<div class="endovi-hero__slide swiper-slide img-cover">
							<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/Rectangle 97.png'; ?>" alt="" class="endovi-hero__slide-image">
						</div>
						<div class="endovi-hero__slide swiper-slide img-cover">
							<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/Rectangle 98.png'; ?>" alt="" class="endovi-hero__slide-image">
						</div>
						<div class="endovi-hero__slide swiper-slide img-cover">
							<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/91ade5ecc57d5a4ee37c1556996191fa104026fa.jpg'; ?>" alt="" class="endovi-hero__slide-image">
						</div>
						<div class="endovi-hero__slide swiper-slide img-cover">
							<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/Rectangle 96.png'; ?>" alt="" class="endovi-hero__slide-image">
						</div>
					</div>
				</div>
				<div class="endovi-hero__pagination endovi-pagination js-pagination"></div>
				<button class="endovi-hero__nav endovi-hero__nav_prev endovi-nav endovi-nav_prev js-nav-prev">
					<svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M0.146446 4.03544C-0.0488157 3.84018 -0.0488157 3.52359 0.146446 3.32833L3.32843 0.146351C3.52369 -0.0489108 3.84027 -0.0489108 4.03553 0.146351C4.2308 0.341614 4.2308 0.658196 4.03553 0.853458L1.20711 3.68189L4.03553 6.51031C4.2308 6.70557 4.2308 7.02216 4.03553 7.21742C3.84027 7.41268 3.52369 7.41268 3.32843 7.21742L0.146446 4.03544ZM9.5 3.68188L9.5 4.18188L0.5 4.18189L0.5 3.68189L0.5 3.18189L9.5 3.18188L9.5 3.68188Z"
							fill="white"/>
					</svg>
				</button>
				<button class="endovi-hero__nav endovi-hero__nav_next endovi-nav endovi-nav_next js-nav-next">
					<svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M9.35355 4.03544C9.54882 3.84018 9.54882 3.52359 9.35355 3.32833L6.17157 0.146351C5.97631 -0.0489108 5.65973 -0.0489108 5.46447 0.146351C5.2692 0.341614 5.2692 0.658196 5.46447 0.853458L8.29289 3.68189L5.46447 6.51031C5.2692 6.70557 5.2692 7.02216 5.46447 7.21742C5.65973 7.41268 5.97631 7.41268 6.17157 7.21742L9.35355 4.03544ZM0 3.68188L-4.37113e-08 4.18188L9 4.18189L9 3.68189L9 3.18189L4.37113e-08 3.18188L0 3.68188Z"
							fill="white"/>
					</svg>
				</button>
			</div>
		</div>
		<div class="endovi-hero__lower endovi-container relative">
			<div class="endovi-hero__background-text endovi-background-text">
				о компании ENDOVI о компании ENDOVI о компании ENDOVI о компании ENDOVI о компании ENDOVI
			</div>
			<div class="endovi-hero__lower-wrapper endovi-wrapper relative">
				<div class="endovi-hero__lower-button-container flex jcc">
					<a href="#" class="endovi-button endovi-button_orange">
						<span>Подробнее</span>
						<svg width="10" height="8" viewBox="0 0 10 8" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
								d="M9.35355 4.03544C9.54882 3.84018 9.54882 3.52359 9.35355 3.32833L6.17157 0.146351C5.97631 -0.0489108 5.65973 -0.0489108 5.46447 0.146351C5.2692 0.341614 5.2692 0.658196 5.46447 0.853458L8.29289 3.68189L5.46447 6.51031C5.2692 6.70557 5.2692 7.02216 5.46447 7.21742C5.65973 7.41268 5.97631 7.41268 6.17157 7.21742L9.35355 4.03544ZM0 3.68188L-4.37113e-08 4.18188L9 4.18189L9 3.68189L9 3.18189L4.37113e-08 3.18188L0 3.68188Z"
								fill="white"/>
						</svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="endovi-single-card endovi-container">
	<div class="endovi-single-card__wrapper endovi-wrapper">
		<div class="endovi-single-card__item flex">
			<div class="endovi-single-card__column endovi-single-card__column_title flex fdc jcspb">
				<div class="endovi-single-card__title-container">
					<h2 class="endovi-single-card__title h2">
						Система <br>V-1000
					</h2>
				</div>
				<div class="endovi-single-card__description-container">
					<p class="endovi-single-card__description text-normal">
						Мы любим животных и стараемся поддерживать тех из них, кому не посчастливилось иметь ласковых хозяев и тёплый кров. Один из проверенных способов это сделать — помочь благотворительному фонду «Луч Добра». Благодаря их труду ежегодно сотни питомцев находят свой новый дом.
					</p>
				</div>
			</div>
			<div class="endovi-single-card__column endovi-single-card__column_image flex fdc jcc">
				<div class="endovi-single-card__image-container">
					<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/befb13a4881b87eb60425272623f3339a7d04d94.png'; ?>" alt="" class="endovi-single-card__image">
				</div>
			</div>
			<div class="endovi-single-card__column flex fdc jcfe aife">
				<div class="endovi-single-card__button-container flex fdc">
					<a href="#" class="endovi-button endovi-single-card__button">
						<span>Подробнее о V-1000</span>
						<svg width="10" height="8" viewBox="0 0 10 8" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
								d="M9.35355 4.03544C9.54882 3.84018 9.54882 3.52359 9.35355 3.32833L6.17157 0.146351C5.97631 -0.0489108 5.65973 -0.0489108 5.46447 0.146351C5.2692 0.341614 5.2692 0.658196 5.46447 0.853458L8.29289 3.68189L5.46447 6.51031C5.2692 6.70557 5.2692 7.02216 5.46447 7.21742C5.65973 7.41268 5.97631 7.41268 6.17157 7.21742L9.35355 4.03544ZM0 3.68188L-4.37113e-08 4.18188L9 4.18189L9 3.68189L9 3.18189L4.37113e-08 3.18188L0 3.68188Z"
								fill="#020033"/>
						</svg>
					</a>
					<a href="#" class="endovi-button endovi-button_orange endovi-single-card__button">
						<span>Весь каталог</span>
						<svg width="10" height="8" viewBox="0 0 10 8" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
								d="M9.35355 4.03544C9.54882 3.84018 9.54882 3.52359 9.35355 3.32833L6.17157 0.146351C5.97631 -0.0489108 5.65973 -0.0489108 5.46447 0.146351C5.2692 0.341614 5.2692 0.658196 5.46447 0.853458L8.29289 3.68189L5.46447 6.51031C5.2692 6.70557 5.2692 7.02216 5.46447 7.21742C5.65973 7.41268 5.97631 7.41268 6.17157 7.21742L9.35355 4.03544ZM0 3.68188L-4.37113e-08 4.18188L9 4.18189L9 3.68189L9 3.18189L4.37113e-08 3.18188L0 3.68188Z"
								fill="white"/>
						</svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="endovi-dealers">
	<div class="endovi-dealers__upper endovi-container relative">
		<div class="endovi-dealers__upper-wrapper endovi-wrapper">
			<div class="endovi-dealers__title-container">
				<h2 class="endovi-dealers__title h2">
					Наши дилеры
				</h2>
			</div>
			<div class="endovi-dealers__button-container flex jcc">
				<a href="#" class="endovi-button endovi-button_orange">
					<span>Подробнее</span>
					<svg width="10" height="8" viewBox="0 0 10 8" fill="none"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M9.35355 4.03544C9.54882 3.84018 9.54882 3.52359 9.35355 3.32833L6.17157 0.146351C5.97631 -0.0489108 5.65973 -0.0489108 5.46447 0.146351C5.2692 0.341614 5.2692 0.658196 5.46447 0.853458L8.29289 3.68189L5.46447 6.51031C5.2692 6.70557 5.2692 7.02216 5.46447 7.21742C5.65973 7.41268 5.97631 7.41268 6.17157 7.21742L9.35355 4.03544ZM0 3.68188L-4.37113e-08 4.18188L9 4.18189L9 3.68189L9 3.18189L4.37113e-08 3.18188L0 3.68188Z"
							fill="white"/>
					</svg>
				</a>
			</div>
		</div>
	</div>
	<div class="endovi-dealers__slider-container">
		<div class="endovi-dealers__slider js-dealers-slider" data-autoplay="1">
			<div class="endovi-dealers__slider-wrapper swiper-wrapper">
				<div class="endovi-dealers__slide swiper-slide">
					<div class="endovi-dealers__image-container img-contain">
						<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/Logo0001.png'; ?>" alt="" class="endovi-dealers__image">
					</div>
				</div>
				<div class="endovi-dealers__slide swiper-slide">
					<div class="endovi-dealers__image-container img-contain">
						<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/amd-logo-4001.png'; ?>" alt="" class="endovi-dealers__image">
					</div>
				</div>
				<div class="endovi-dealers__slide swiper-slide">
					<div class="endovi-dealers__image-container img-contain">
						<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/logo1.png'; ?>" alt="" class="endovi-dealers__image">
					</div>
				</div>
				<div class="endovi-dealers__slide swiper-slide">
					<div class="endovi-dealers__image-container img-contain">
						<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/logo2.png'; ?>" alt="" class="endovi-dealers__image">
					</div>
				</div>
				<div class="endovi-dealers__slide swiper-slide">
					<div class="endovi-dealers__image-container img-contain">
						<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/amd-logo-4001.png'; ?>" alt="" class="endovi-dealers__image">
					</div>
				</div>
				<div class="endovi-dealers__slide swiper-slide">
					<div class="endovi-dealers__image-container img-contain">
						<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/logo1.png'; ?>" alt="" class="endovi-dealers__image">
					</div>
				</div>
				<div class="endovi-dealers__slide swiper-slide">
					<div class="endovi-dealers__image-container img-contain">
						<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/logo2.png'; ?>" alt="" class="endovi-dealers__image">
					</div>
				</div>
				<div class="endovi-dealers__slide swiper-slide">
					<div class="endovi-dealers__image-container img-contain">
						<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/logo1.png'; ?>" alt="" class="endovi-dealers__image">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="endovi-news endovi-container">
	<div class="endovi-news__wrapper endovi-wrapper">
		<div class="endovi-news__upper flex fwrap aife jcspb">
			<div class="endovi-news__title-container">
				<h2 class="endovi-news__title h2">
					Новости <br>и мероприятия
				</h2>
			</div>
			<div class="endovi-news__button-container endovi-news__button-container_desktop">
				<a href="#" class="endovi-button endovi-button_orange">
					<span>Все новости</span>
					<svg width="10" height="8" viewBox="0 0 10 8" fill="none"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M9.35355 4.03544C9.54882 3.84018 9.54882 3.52359 9.35355 3.32833L6.17157 0.146351C5.97631 -0.0489108 5.65973 -0.0489108 5.46447 0.146351C5.2692 0.341614 5.2692 0.658196 5.46447 0.853458L8.29289 3.68189L5.46447 6.51031C5.2692 6.70557 5.2692 7.02216 5.46447 7.21742C5.65973 7.41268 5.97631 7.41268 6.17157 7.21742L9.35355 4.03544ZM0 3.68188L-4.37113e-08 4.18188L9 4.18189L9 3.68189L9 3.18189L4.37113e-08 3.18188L0 3.68188Z"
							fill="white"/>
					</svg>
				</a>
			</div>
		</div>
		<div class="endovi-news__items">
			<a href="#" class="endovi-news-card default-hover">
				<div class="endovi-news-card__image-container img-cover">
					<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/Rectangle 127-2.png'; ?>" alt="" class="endovi-news-card__image">
				</div>
				<div class="endovi-news-card__text-side flex fdc jcspb">
					<div class="endovi-news-card__text-upper flex fdc">
						<div class="endovi-news-card__title-container">
							<h4 class="endovi-news-card h4">
								Заголовок
							</h4>
						</div>
						<div class="endovi-news-card__description-container">
							<p class="endovi-news-card__description">
								Мы любим животных и стараемся поддерживать тех из них, кому не посчастливилось иметь ласковых хозяев и тёплый кров.
							</p>
						</div>
					</div>
					<div class="endovi-news-card__date-container">
						<span class="endovi-news-card__date text-normal">
							01 .12. 2025 г.
						</span>
					</div>
				</div>
			</a>
			<a href="#" class="endovi-news-card default-hover">
				<div class="endovi-news-card__image-container img-cover">
					<img src="<?php echo esc_attr( ENDOVI_TEMPLATE_URL ) . 'src/images/temp/Rectangle 127.png'; ?>" alt="" class="endovi-news-card__image">
				</div>
				<div class="endovi-news-card__text-side flex fdc jcspb">
					<div class="endovi-news-card__text-upper flex fdc">
						<div class="endovi-news-card__title-container">
							<h4 class="endovi-news-card h4">
								Заголовок
							</h4>
						</div>
						<div class="endovi-news-card__description-container">
							<p class="endovi-news-card__description">
								Мы любим животных и стараемся поддерживать тех из них, кому не посчастливилось иметь ласковых хозяев и тёплый кров.
							</p>
						</div>
					</div>
					<div class="endovi-news-card__date-container">
						<span class="endovi-news-card__date text-normal">
							01 .12. 2025 г.
						</span>
					</div>
				</div>
			</a>
		</div>
		<div class="endovi-news__button-container endovi-news__button-container_mobile">
			<a href="#" class="endovi-button endovi-button_orange">
				<span>Все новости</span>
				<svg width="10" height="8" viewBox="0 0 10 8" fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path
						d="M9.35355 4.03544C9.54882 3.84018 9.54882 3.52359 9.35355 3.32833L6.17157 0.146351C5.97631 -0.0489108 5.65973 -0.0489108 5.46447 0.146351C5.2692 0.341614 5.2692 0.658196 5.46447 0.853458L8.29289 3.68189L5.46447 6.51031C5.2692 6.70557 5.2692 7.02216 5.46447 7.21742C5.65973 7.41268 5.97631 7.41268 6.17157 7.21742L9.35355 4.03544ZM0 3.68188L-4.37113e-08 4.18188L9 4.18189L9 3.68189L9 3.18189L4.37113e-08 3.18188L0 3.68188Z"
						fill="white"/>
				</svg>
			</a>
		</div>
	</div>
</section>

<section class="endovi-feedback endovi-container">
	<div class="endovi-feedback__wrapper endovi-wrapper">
		<div class="endovi-feedback__title-container">
			<h2 class="endovi-feedback__title h2">
				Отзывы <br>специалистов
			</h2>
		</div>
		<div class="endovi-feedback__slider-container relative">
			<div class="endovi-feedback__slider js-feedback-slider" data-autoplay="1">
				<div class="endovi-feedback__slider-wrapper swiper-wrapper">
					<div class="endovi-feedback__slide swiper-slide">
						<div class="endovi-feedback__slide-inner flex fdc jcspb">
							<div class="endovi-feedback__slide-description-container">
								<h4 class="endovi-feedback__slide-description h4">
									Мы любим животных и стараемся поддерживать тех из них, кому не посчастливилось иметь ласковых хозяев и тёплый кров. Один из проверенных способов это сделать — помочь благотворительному фонду «Луч Добра». Благодаря их труду ежегодно сотни питомцев находят свой новый дом
								</h4>
							</div>
							<div class="endovi-feedback__slide-position-container">
								<span class="endovi-feedback__slide-position">
									Бурильщик
								</span>
							</div>
						</div>
					</div>
					<div class="endovi-feedback__slide swiper-slide">
						<div class="endovi-feedback__slide-inner flex fdc jcspb">
							<div class="endovi-feedback__slide-description-container">
								<h4 class="endovi-feedback__slide-description h4">
									Мы любим животных и стараемся поддерживать тех из них, кому не посчастливилось иметь ласковых хозяев и тёплый кров. Один из проверенных способов это сделать — помочь благотворительному фонду «Луч Добра». Благодаря их труду ежегодно сотни питомцев находят свой новый дом. Благодаря их труду ежегодно сотни питомцев находят свой новый дом
								</h4>
							</div>
							<div class="endovi-feedback__slide-position-container">
								<span class="endovi-feedback__slide-position">
									Бурильщик
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="endovi-feedback__pagination endovi-pagination js-pagination"></div>
			<div class="endovi-feedback__nav-container">
				<button
					class="endovi-feedback__nav endovi-feedback__nav_prev endovi-nav endovi-nav_fill endovi-nav_prev js-nav-prev">
					<svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M0.146446 4.03544C-0.0488157 3.84018 -0.0488157 3.52359 0.146446 3.32833L3.32843 0.146351C3.52369 -0.0489108 3.84027 -0.0489108 4.03553 0.146351C4.2308 0.341614 4.2308 0.658196 4.03553 0.853458L1.20711 3.68189L4.03553 6.51031C4.2308 6.70557 4.2308 7.02216 4.03553 7.21742C3.84027 7.41268 3.52369 7.41268 3.32843 7.21742L0.146446 4.03544ZM9.5 3.68188L9.5 4.18188L0.5 4.18189L0.5 3.68189L0.5 3.18189L9.5 3.18188L9.5 3.68188Z"
							fill="white"/>
					</svg>
				</button>
				<button
					class="endovi-feedback__nav endovi-feedback__nav_next endovi-nav endovi-nav_fill endovi-nav_next js-nav-next">
					<svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M9.35355 4.03544C9.54882 3.84018 9.54882 3.52359 9.35355 3.32833L6.17157 0.146351C5.97631 -0.0489108 5.65973 -0.0489108 5.46447 0.146351C5.2692 0.341614 5.2692 0.658196 5.46447 0.853458L8.29289 3.68189L5.46447 6.51031C5.2692 6.70557 5.2692 7.02216 5.46447 7.21742C5.65973 7.41268 5.97631 7.41268 6.17157 7.21742L9.35355 4.03544ZM0 3.68188L-4.37113e-08 4.18188L9 4.18189L9 3.68189L9 3.18189L4.37113e-08 3.18188L0 3.68188Z"
							fill="white"/>
					</svg>
				</button>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
