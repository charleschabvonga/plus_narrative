<?php

add_action( 'after_setup_theme', 'pn_menu_setup' );

/* -------------------------------------------------------------------------- */
/* ----------  Menu  Functions ---------------------------------------------- */
/* -------------------------------------------------------------------------- */
function pn_menu_setup() {
	/* ---------- Menus ------------------------------------------------------ */
	register_nav_menus(
		array(
			'primary'          => 'Global Navigation',
			'footer'           => 'Footer Navigation',
			'footer-secondary' => 'Footer Secondary Navigation',
			'legal-links'      => 'Legal Links',
		)
	);
}
