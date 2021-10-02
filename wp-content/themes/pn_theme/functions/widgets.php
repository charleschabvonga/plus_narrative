<?php

add_action( 'widgets_init', 'pn_widgets_init' );

function pn_widgets_init() {
	register_sidebar(
		array(
			'name'          => 'Sidebar Widgets',
			'id'            => 'archive-widgets',
			'description'   => 'Add widgets here to appear in your sidebar on archives & pages.',
			'before_widget' => '<section class="widget %2$s">',
			'after_widget'  => "</section>\n",
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer Widgets',
			'id'            => 'footer-widgets',
			'description'   => 'Add widgets here to appear below your content on pages.',
			'before_widget' => '<section class="widget %2$s">',
			'after_widget'  => "</section>\n",
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
