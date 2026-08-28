<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'flex' ); ?>>

<?php wp_body_open(); ?>

<div class="main-wrapper flex fdc relative">
	<div class="site-content">
		<?php endovi_inline_style( 'header' ); ?>
		<header class="endovi-header endovi-container">
			<div class="endovi-header__wrapper endovi-wrapper flex fwrap jcspb aic">
				<div class="endovi-header__logo-container">
					<?php endovi_the_logo(); ?>
				</div>
				<button class="endovi-header__menu-button mobile img-contain js-menu-button">
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M2.5 15H17.5V13.3333H2.5V15ZM2.5 10.8333H17.5V9.16667H2.5V10.8333ZM2.5 5V6.66667H17.5V5H2.5Z"
							fill="#020033"/>
					</svg>
				</button>
				<nav class="endovi-header__menu-container js-menu">
					<div class="endovi-header__menu-wrapper">
						<div class="endovi-header__menu-header flex aic jcspb mobile">
							<div class="endovi-header__logo-container">
								<?php endovi_the_logo(); ?>
							</div>
							<button class="endovi-header__close-menu-button img-contain js-close-menu-button">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M6.4 19L5 17.6L10.6 12L5 6.4L6.4 5L12 10.6L17.6 5L19 6.4L13.4 12L19 17.6L17.6 19L12 13.4L6.4 19Z"
										fill="#020033"/>
								</svg>
							</button>
						</div>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'header',
								'menu_class'     => 'endovi-header__menu flex fwrap',
								'container'      => false,
							)
						);
						?>
					</div>
			</div>
		</header>
		<main class="endovi-main">
