						<?php if(have_comments()): ?>
                            <!-- Comments Section -->
                            <section id="comments">
								<h1 class="title"><?php comments_number('No comments', 'One comment', '% comments'); ?> to "<?php the_title(); ?>"</h1>   
                                <?php paginate_comments_links(); ?>
                                <ol class="comment-list">
                                	<?php wp_list_comments('avatar_size=100&type=comment&type=all'); ?>
                                </ol>
								<?php paginate_comments_links(); ?>
                            </section>
                            <!-- Comments Section end -->
						<?php endif; ?>
                        
                        <?php
                            if(comments_open()):
                                comment_form();
                            endif;
                        ?>  