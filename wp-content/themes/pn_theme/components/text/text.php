<?php
/**
 * TEXT COMPONENT
 * @params
 * $topics          @type: string
 * $topic_title     @type: string
 * $tagline         @type: string
 * $content         @type: string
 * $author          @type: string
*/
if ( $topics ) :
	?>
	<div class="text-container" id="text-container">
		<div class="inner-container" id="inner-content">

			<div class="left-outer-container">
				<div class="left-container">
				<?php foreach ( $topics as $topic ) : ?>
					<a class="each-block" href="#<?php echo esc_html( pn_slugify( $topic['topic_title'] ) ); ?>">
					<div class="top-separator"></div>
						<h3 class="each-block-heading">
							<?php echo esc_html( $topic['topic_title'] ); ?>
						</h3>
						<span class="each-block-tag">
							<?php echo esc_html( $topic['author'] ); ?>
						</span>
					</a>
					<?php endforeach; ?>
				</div>
			</div>

			<?php foreach ( $topics as $topic ) : ?>
			<div id="<?php echo esc_html( pn_slugify( $topic['topic_title'] ) ); ?>" class="right-container-block">
				<span class="tag-line"><?php echo esc_html( $topic['tagline'] ); ?></span>
				<a href="#<?php echo esc_html( pn_slugify( $topic['topic_title'] ) ); ?>" class="content-heading"><?php echo esc_html( $topic['topic_title'] ); ?></a>
				<?php echo wp_kses_post( $topic['content'] ); ?>
			</div>

				<?php
		endforeach;
			?>
		</div>
	</div>
	<?php
endif; ?>
