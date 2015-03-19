<?php if($wp_query->max_num_pages > 1): ?>
    <div class="pagination row">
    	<div class="previous"><?php next_posts_link(__('&#8249; Older posts', 'threenineeight')); ?></div>
    	<div class="next"><?php previous_posts_link(__('Newer posts &#8250;', 'threenineeight')); ?></div>
    </div>
<?php endif; ?>