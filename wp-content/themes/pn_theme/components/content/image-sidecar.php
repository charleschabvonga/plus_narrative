<?php //** CONTENT/SIDECAR COMPONENT */ ?>

<div id="_content-image-sidecar">

	<div id="_content-image-sidecar--image">
		<img src="<?php echo esc_url( $image ); ?>" alt="">
	</div>

	<div id="_content-image-sidecar--content">
		<div class="_content-image-sidecar--content-container">
			<?php echo wp_kses_post( $content ); ?>
		</div>
	</div>

</div>
