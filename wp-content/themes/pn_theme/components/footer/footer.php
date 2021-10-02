<?php //** FOOTER COMPONENT */ ?>
<footer id="colophon" class="site-footer" role="contentinfo" itemscope="" itemtype="http://schema.org/WPFooter">
	<div class="footer-col logo-col">
		<?php
		$footer_logo = get_field( 'footer_logo', 'option' );
		if ( $footer_logo ) :
			?>
			<a class="footer-logo" href="/">
				<img src="<?php echo esc_url( $footer_logo['url'] ); ?>" alt="<?php echo esc_attr( $footer_logo['alt'] ); ?>" />
			</a>
		<?php endif; ?>
		<span class="footer-content"><?php echo wp_kses_post( get_field( 'footer_content', 'option' ) ); ?></span>

		<?php if ( get_field( 'mailchimp_link', 'option' ) ) : ?>
		<!-- Begin Mailchimp Signup Form -->
		<link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
		<div id="mc_embed_signup">
		<span class="form-introduction"><?php echo wp_kses_post( get_field( 'form_introduction', 'option' ) ); ?></span>
			<form action="<?php echo esc_url( get_field( 'mailchimp_link', 'option' ) ); ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<div id="mc_embed_signup_scroll">
				<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
				<svg  id="send-icon" class="send-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="14.931" viewBox="0 0 18 14.931">
				<path id="Send" d="M17.908.063a.283.283,0,0,0-.291-.039L.156,7.647A.247.247,0,0,0,.151,8.1L3.6,9.566c.091.042,7.2-3.479,7.2-3.479L6.437,10.68a.5.5,0,0,0-.137.344V14.43a.5.5,0,0,0,.857.35l2.284-2.327,3.6,1.713a.285.285,0,0,0,.223,0,.259.259,0,0,0,.149-.156L17.988.329A.243.243,0,0,0,17.908.063Z" fill="#8298ab"/>
				</svg>
				<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
				<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_5b61465aa2146874bac027919_488c06ca52" tabindex="-1" value=""></div>
				<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
				</div>
			</form>
		</div>
		<?php endif; ?>

		<!--End mc_embed_signup-->		
	</div>
	<div class="footer-menu-left">
	<h3><?php echo esc_html( get_field( 'footer_links_1_heading', 'option' ) ); ?></h3>
	<?php
		wp_nav_menu(
			array(
				'theme_location' => 'footer',
				'depth'          => 3,
				'walker'         => new WP_Bootstrap_Navwalker,
			)
		);
		?>
	</div>
	<div class="footer-menu-right">
	<h3><?php echo esc_html( get_field( 'footer_links_2_heading', 'option' ) ); ?></h3>
	<?php
		wp_nav_menu(
			array(
				'theme_location' => 'footer-secondary',
				'depth'          => 3,
				'walker'         => new WP_Bootstrap_Navwalker,
			)
		);
		?>
	</div>

	<div class="social-footer">
	<?php if ( have_rows( 'social_links', 'option' ) ) : ?>
		<ul class="social-links">
			<?php
			while ( have_rows( 'social_links', 'option' ) ) :
				the_row();
				$image = get_sub_field( 'icon', 'option' );
				?>
				<a href="<?php echo esc_url( get_sub_field( 'link', 'option' ) ); ?>" target="_blank"><li class="social-link"><span class="dashicons">
					<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
				</span></li></a>
				<?php
			endwhile;
			?>
		</ul>
		<?php
	endif;
	?>
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'legal-links',
					'depth'          => 3,
					'walker'         => new WP_Bootstrap_Navwalker,
				)
			);
			?>
		<span class="copyright">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( get_field( 'copyright_text', 'option' ) ); ?></span>
	</div>	
</footer>
<?php
