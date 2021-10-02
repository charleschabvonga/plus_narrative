<?php
/**
 * CUSTOMERS CARD COMPONENT
 * @params
 * $profile_image      @type: string
 * $customer_name      @type: string
 * $content            @type: string
 * $customer_position  @type: string
*/
?>
<div class="_component-testimonial--card">
	<div class="_component-testimonial--text">
		<?php echo wp_kses_post( $content ); ?>
	</div>

	<div class="_component-testimonial--user">
		<div class="_component-testimonial--profile" style="background-image: url('<?php echo esc_url( $profile_image ); ?>')" ></div>

		<div class="_component-testimonial--user-details">
			<div class="user-names"><?php echo esc_html( $customer_name ); ?> </div>
			<div class="user-designation"><?php echo esc_html( $customer_position ); ?></div>
		</div>

	</div>
</div>
