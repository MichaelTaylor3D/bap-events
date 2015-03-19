<?php get_header(); ?>

				<!-- Two Columns -->
            	<div id="two_columns" class="contained responsive row">
            		
                    <!-- Main Section -->
                    <section id="main" class="column width_70">
                    	<h1 class="section_title">
							<?php
                                if(is_category()):
                                    _e('Archives for ', 'threenineeight').single_cat_title();
                                elseif(is_month()):
                                    _e('Archives on ', 'threenineeight').the_time('F, Y');
                                elseif(is_author()):
                                    _e('Archives by ', 'threenineeight').the_author();
                                endif;
                            ?>
                        </h1>
                    
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