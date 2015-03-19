<?php
/**
 * The Template for displaying all single Eventbrite events.
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
				// Get our event based on the ID passed by query variable.
				$event = new Eventbrite_Query( array( 'p' => get_query_var( 'eventbrite_id' ) ) );

				if ( $event->have_posts() ) :
					while ( $event->have_posts() ) : $event->the_post(); ?>

						<article id="event-<?php the_ID(); ?>" <?php post_class(); ?>>
							<a href="<?php echo esc_url( get_the_permalink( get_queried_object_id() ) ); ?>" title="<?php esc_attr_e( 'All events', 'sorbet' ); ?>">
								<span class="screen-reader-text"><?php esc_html_e( 'Eventbrite events', 'sorbet' ); ?></span>
								<span class="entry-format icon-block"></span>
							</a>

							<?php if ( has_post_thumbnail() ) : ?>
								<div class="entry-thumbnail">
									<?php the_post_thumbnail(); ?>
								</div><!-- .entry-thumbnail .fullwidth-block -->
							<?php endif; ?>

							<header class="entry-header fullwidth-block">
								<h1 class="entry-title"><?php the_title(); ?></h1>
							</header><!-- .entry-header -->

							<div class="entry-content center-block">
								<?php the_content(); ?>

								<?php eventbrite_ticket_form_widget(); ?>
							</div><!-- .entry-content -->

							<footer class="entry-meta center-block">
								<?php eventbrite_event_meta(); ?>

								<?php eventbrite_edit_post_link( __( 'Edit', 'eventbrite_api' ), '<span class="edit-link">', '</span>' ); ?>
							</footer><!-- .entry-meta -->
						</article><!-- #post-## -->

					<?php endwhile;

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;

				// Return $post to its rightful owner.
				wp_reset_postdata();
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
