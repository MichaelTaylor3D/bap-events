<?php get_header(); ?>

				<!-- Two Columns -->
            	<div id="two_columns" class="contained responsive row">
            		
                    <!-- Main Section -->
                    <section id="main" class="column width_70">
                    
                    	<!-- Content -->
						<div id="content">
							<?php
                                if(have_posts()):
                                    while(have_posts()):
                                        the_post();
                                        get_template_part('content', get_post_format());
                                        comments_template();
                                    endwhile;
                                    threenineeight_pagination();
                                else :
                                    get_template_part('not-found');
                                endif;
                            ?>
                        </div>
                    	<!-- Content end -->
                        
                    </section>
                    <!-- Main Section end -->
                
					<?php get_sidebar(); ?>
                    
                 </div>
				<!-- Two Columns end -->
                
<?php get_footer(); ?>