<?php get_header(); ?>

				<!-- One Column -->
            	<div id="one_column" class="contained responsive row">
            		
                    <!-- Main Section -->
                    <section id="main" class="last column">
						<?php
                            if(have_posts()):
                                while(have_posts()):
                                    the_post();
								?>

                                    <!-- Article <?php the_ID(); ?> end -->
                                    <article id="article_<?php the_ID(); ?>" <?php post_class(); ?>>
                                        <?php if(has_post_thumbnail()): ?>
                                            <div class="thumbnail">
                                                <?php the_post_thumbnail();  ?>
                                            </div>              
                                        <?php endif; ?> 
                                        <?php
                                            if(the_title('<h2 class="title">', '</h2>'));
                                            the_content(__('Continue Reading &rarr;', 'threenineeight'));
                                            wp_link_pages(array(
                                                'before'	=> '<div class="pagination">'.__('Pages:', 'threenineeight'),
                                                'after'		=> '</div>'
                                            ));
                                        ?>
                                    </article>
                                    <!-- Article <?php the_ID(); ?> end -->

								<?php
                                    comments_template();
                                endwhile;
                            else :
                                get_template_part('not-found');
                            endif;
                        ?>
                    </section>
                    <!-- Main Section end -->
                    
                 </div>
				<!-- One Columns end -->
                
                
			<?php if(is_active_sidebar('parallax_widgets')): ?>       
            	<!-- Banner Section -->
            	<section id="default" class="banner"  data-speed="4" data-type="background">
                    <div class="overlay">
                        <div class="contained">
						<?php dynamic_sidebar('parallax_widgets');  ?>
                        </div>
                    </div>
                </section>
            	<!-- Banner Section end -->
			<?php endif; ?>
                
                
			<?php if(is_active_sidebar('homepage_widgets')): ?>       
                <!-- Widgets Section -->
                <section id="widgets">
                    <div class="contained row">
						<?php dynamic_sidebar('homepage_widgets');  ?>
                    </div>
                </section>
                <!-- Widgets Section end -->
			<?php endif; ?>
                 
<?php get_footer(); ?>