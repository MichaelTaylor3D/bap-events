<?php
	if('posts' == get_option('show_on_front')):
		get_template_part('index') ;
	else: 
		get_template_part('homepage'); 
	endif;
?>