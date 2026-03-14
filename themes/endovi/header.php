<?php
?>
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
		<header class="endovi-header">
		</header>
		<main class="endovi-main">
