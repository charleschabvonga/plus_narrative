<?php
/**
 * Template Name: Components
 *
 * @category Templates
 * @package  PlusNarrative
 * @author   Lliam Scholtz <lliam@plusnarrative.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://plusnarrative.com
 */
get_header();

if ( get_field( 'background_image' ) ) : ?>
<h2 class="component-title">Hero Header</h2>

	<?php
	get_component(
		'hero-header/hero-header',
		array(
			'strapline'        => get_field( 'strapline' ),
			'content'          => get_field( 'header_content' ),
			'background_image' => get_field( 'background_image' ),
			'background_color' => get_field( 'background_color' ),
			'desktop_width'    => get_field( 'desktop_bg_width' ),
			'mobile_width'     => get_field( 'mobile_bg_image_width' ),
		)
	);
endif;

if ( get_field( 'cta_image' ) ) :
	?>
<h2 class="component-title">CTA</h2>

	<?php
	get_component(
		'cta/cta',
		array(
			'cta_intro'    => get_field( 'cta_intro' ),
			'cta_image'    => get_field( 'cta_image' ),
			'cta_features' => get_field( 'cta_features' ),
			'cta_links'    => get_field( 'cta_links' ),
		)
	);
endif;

if ( get_field( 'component_services' ) ) :
	?>
<h2 class="component-title">Services</h2>

	<?php
	get_component(
		'services/services',
		array(
			'services_title'     => get_field( 'services_title' ),
			'services_intro'     => get_field( 'services_intro' ),
			'component_services' => get_field( 'component_services' ),
		)
	);
endif;

if ( get_field( 'component_cover' ) ) :
	?>
<h2 class="component-title">Cover</h2>

	<?php
	get_component(
		'cover/cover',
		array(
			'covers' => get_field( 'component_cover' ),
		)
	);
endif;

if ( get_field( 'block_image' ) ) :
	?>
<h2 class="component-title">Content with side image</h2>

	<?php
	get_component(
		'content/image-sidecar',
		array(
			'content' => get_field( 'block_content' ),
			'image'   => get_field( 'block_image' ),
		)
	);
endif;

if ( get_field( 'topics' ) ) :
	?>
<h2 class="component-title">Text</h2>

	<?php
	get_component(
		'text/text',
		array(
			'topics' => get_field( 'topics' ),
		)
	);
endif;

if ( get_field( 'right_column_image' ) ) :
	?>
<h2 class="component-title">Gallery + Content</h2>

	<?php
	get_component(
		'gallery-container/gallery',
		array(
			'introduction_heading' => get_field( 'introduction_heading' ),
			'introduction'         => get_field( 'introduction' ),
			'left_column_text'     => get_field( 'left_column_text' ),
			'right_column_text'    => get_field( 'right_column_text' ),
			'right_column_image'   => get_field( 'right_column_image' ),
		)
	);
endif;

//use case testimonial card
if ( have_rows( 'customer_blocks' ) ) :
	?>
	<h2 class="component-title">Testimonials Section</h2>

	<div class="_component-testimonials--section">
		<h2><?php the_field( 'heading' ); ?></h2>
		<div class="_component-testimonials--container">
		<?php
		while ( have_rows( 'customer_blocks' ) ) :
			the_row();
			get_component(
				'testimonials/testimonials',
				array(
					'profile_image'     => get_sub_field( 'customer_profile_image' ),
					'customer_name'     => get_sub_field( 'customer_name' ),
					'content'           => get_sub_field( 'content' ),
					'customer_position' => get_sub_field( 'customer_position' ),
				)
			);
		endwhile;
		?>
		</div>
	</div>
	<?php
endif;
?>
<h2 class="component-title">Content</h2>
<?php
	get_component(
		'section-content/section-content',
		array(
			'content_section' => get_field( 'content_section' ),
		)
	);
	?>

<style>
	.component-title{
		padding: 15px;
	}
</style>
<?php
get_footer();
