<?php //** HEADER WITH BUTTONS COMPONENT */ ?>
	<header id="_component-header-with-button">
		<a class="_component-header-with-button--logo" href="<?php echo esc_url( home_url() ); ?>">
		<?php if ( get_field( 'navbar_logo', 'options' ) ) : ?>
			<img class="_component-header-with-button--img" src="<?php echo  esc_url( get_field( 'navbar_logo', 'options' ) ); ?>">
			<?php
			else :
				echo  esc_html( get_field( 'navbar_brand', 'options' ) );
			endif;
			?>
		</a>
		<button class="_component-header-with-button--toggler"  id="_component-header-with-button--toggler">
			<span class="open-menu">Menu</span>
			<span class="close-menu">Close</span>
		</button>

		<?php
		$buttons = get_field( 'navbar_button', 'options' );
		if ( ! $buttons ) {
			$buttons_status = 'no-buttons';
		}
		?>
		<div class="_component-header-with-button--menu <?php echo esc_html( $buttons_status ); ?>" id="_component-header-with-button--menu">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'depth'          => 4,
					)
				);
				?>
			<?php
			if ( $buttons ) :
				if ( have_rows( 'buttons', 'options' ) ) :
					?>
				<div class="_component-header-with-button--button-container">
					<?php
					while ( have_rows( 'buttons', 'options' ) ) :
						the_row();

						$btn_link = get_sub_field( 'button_link', 'options' );
						$btn_text = get_sub_field( 'button_text', 'options' );
						?>

						<a class="_component-header-with-button--button" href="<?php echo esc_url( $btn_link ); ?>"><?php echo esc_html( $btn_text ); ?></a>
				<?php endwhile; ?>
				</div>
					<?php
				endif;
			endif;
			?>
		</div>
	</header>
<?php
