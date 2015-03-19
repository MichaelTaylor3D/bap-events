                    <!-- Aside -->
                    <aside id="sidebar" class="last column width_30">
						<?php if(!dynamic_sidebar('sidebar_widgets')): ?>
                        
                            <!-- Widget -->
                            <div class="widget">
                                <?php get_search_form(); ?>
                            </div>
                            <!-- Widget end -->
    
                            <!-- Widget -->
                            <div class="widget">
                                <h2 class="title"><?php _e('Archives', 'threenineeight'); ?></h2>
                                <ul class="widget_archive">
                                    <?php
										wp_get_archives(array(
											'type' => 'monthly'
										));
									?> 
                                </ul>
                            </div>
                            <!-- Widget end -->
                        
						<?php endif; ?>
                        
                    </aside>   
                    <!-- Aside end --> 