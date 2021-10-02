<?php

function my_wpcf7_form_elements( $html ) {
	$text = 'Select a subject';
	$html = str_replace( '---', $text, $html );
	return $html;
}
add_filter( 'wpcf7_form_elements', 'my_wpcf7_form_elements' );
