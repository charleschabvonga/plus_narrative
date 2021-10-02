<?php //** HEADER COMPONENT */ ?>
	<header id="_component-header">
		<a class="_component-header--logo" href="<?php echo esc_url( home_url() ); ?>">
		<?php if ( get_field( 'navbar_logo', 'options' ) ) : ?>
			<img class="_component-header--img" src="<?php echo  esc_url( get_field( 'navbar_logo', 'options' ) ); ?>">
			<?php
			else :
				echo  esc_html( get_field( 'navbar_brand', 'options' ) );
			endif;
			?>
		</a>
		<button class="_component-header--toggler"  id="_component-header--toggler">
			<span>Menu</span> <i class="_icon--arrow-down"></i>
		</button>

		<div class="_component-header--menu" id="_component-header--menu">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'depth'          => 4,
					)
				);
				?>
		</div>
	</header>
<?php
