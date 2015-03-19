                                    <!-- Article <?php the_ID(); ?> -->
                                    <article id="article_<?php the_ID(); ?>" <?php post_class(); ?>>
                                        <?php if(has_post_thumbnail()): ?>
                                            <div class="thumbnail">
                                                <?php if(is_single() or is_page()): the_post_thumbnail(); else: ?>
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														<?php the_post_thumbnail(); ?>
                                                    </a>
                                                <?php endif; ?>    
                                            </div>              
                                        <?php endif; ?> 
										<?php
                                        	if(the_title('<h2 class="title">', '</h2>'));
											threenineeight_article_before();
											the_content(__('Continue Reading &rarr;', 'threenineeight'));
											wp_link_pages(array(
                                                'before'	=> '<div class="pagination">'.__('<span class="pages">Pages</span>', 'threenineeight'),
                                                'after'		=> '</div>'
                                            ));
											threenineeight_article_after();
                                        ?>
                                    </article>
                                    <!-- Article <?php the_ID(); ?> end -->