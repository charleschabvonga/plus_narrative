<?php
/**
 * The header for our theme
 *
 * @category Theme
 * @package  Theme
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://plusnarrative.com
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8"/>
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta itemprop="name" content="<?php bloginfo( 'name' ); ?>"/>
	<meta itemprop="url" content="<?php echo esc_url( home_url( '/' ) ); ?>"/>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="http://gmpg.org/xfn/11" rel="profile"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php get_component( 'header-with-button/header-with-button' ); ?>

	<main id="main" class="site-main">
