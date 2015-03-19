<?php
/**
 * The template for displaying all Eventbrite events (index), and archives (sorted by organizer or venue).
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="archive-header fullwidth-block page-header">
				<h1 class="entry-title page-title">
					<?php the_title(); ?>
				</h1>
			</header><!-- .archive-header -->

			<?php
				// Set up and call our Eventbrite query.
				$events = new Eventbrite_Query( apply_filters( 'eventbrite_query_args', array(
					// 'display_private' => false, // boolean
					// 'limit' => null,            // integer
					// 'organizer_id' => null,     // integer
					// 'p' => null,                // integer
					// 'post__not_in' => null,     // array of integers
					// 'venue_id' => null,         // integer
				) ) );

				if ( $events->have_posts() ) :
					while ( $events->have_posts() ) : $events->the_post(); ?>

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
								<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
							</header><!-- .entry-header -->

							<div class="entry-content center-block">
								<?php eventbrite_ticket_form_widget(); ?>
							</div><!-- .entry-content -->

							<footer class="entry-meta center-block">
								<?php eventbrite_event_meta(); ?>

								<?php eventbrite_edit_post_link( __( 'Edit', 'eventbrite_api' ), '<span class="edit-link">', '</span>' ); ?>
							</footer><!-- .entry-meta -->
						</article><!-- #post-## -->

					<?php endwhile;

					// Previous/next post navigation.
					eventbrite_paging_nav( $events );

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
