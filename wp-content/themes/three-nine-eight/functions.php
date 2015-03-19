<?php
	/* Enqeue JavaScript
	 * --------------------------------------------- */
	if(!is_admin()) :
		add_action('wp_enqueue_scripts', 'threenineeight_js');
	endif;
	if(!function_exists('threenineeight_js')) :
		function threenineeight_js(){
			wp_enqueue_script('threenineeight-scripts', get_template_directory_uri() . '/js/threenineeight-scripts.js', array('jquery'), '1.0.0', false);
		}
	endif;
	
	/* After Setup Theme Hook
	 * --------------------------------------------- */
	add_action('after_setup_theme', 'threenineeight_setup');
	if(!function_exists('threenineeight_setup')):
		function threenineeight_setup(){
			
			//Define content width
			if(!isset($content_width)):
				$content_width = 900;
			endif;	
			
			//Localization support
			$locale = get_locale();
			$locale_file = get_template_directory().'/languages/$locale.php';
			if(is_readable($locale_file)):
				require_once($locale_file);
			endif;
			load_theme_textdomain('threenineeight', get_template_directory().'/languages');
			
			//Add theme support for a custom stylesheet editor.
			add_editor_style();
			
			//Add theme support for post and comment RSS feeds.
			add_theme_support('automatic-feed-links');
				
			//Add theme support for custom-background.
			add_theme_support('custom-background');
			
			//Add theme support for JetPack infinite-scroll
			add_theme_support('infinite-scroll', array(
				'type'				=> 'scroll',
				'container'			=> 'content',
				'footer'			=> false,
				'wrapper'			=> true,
				'render'			=> false,
				'posts_per_page'	=> false
			));
			
			//Add theme support for post-thumbnails.
			add_theme_support('post-thumbnails');
					
			//Add theme support for woocommerce.
			add_theme_support('woocommerce');	
			
			//Add theme support for custom-menus.
			register_nav_menus(array(
				'header_menu'		=> __('Header Menu', 'threenineeight'),
				'primary_menu'		=> __('Primary Menu', 'threenineeight'),
				'secondary_menu'	=> __('Secondary Menu', 'threenineeight'),
				'footer_menu'		=> __('Footer Menu', 'threenineeight')
			));
		}					
	endif;
	
	
	/* Widigits Initialisation
	 * --------------------------------------------- */
	add_action('widgets_init', 'threenineeight_widgets_init');
	if(!function_exists('threenineeight_widgets_init')):
		function threenineeight_widgets_init(){
			
			//Sidebar widgets
			register_sidebar(array(
				'name'          => __('Sidebar Widgets', 'threenineeight'),
				'id'            => 'sidebar_widgets',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="title">',
				'after_title'   => '</h2>'
			));
			
			//Header widgets
			register_sidebar(array(
				'name'          => __('Header Widgets', 'threenineeight'),
				'id'            => 'header_widgets',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="title">',
				'after_title'   => '</h2>'
			));
			
			//Footer widgets
			register_sidebar(array(
				'name'          => __('Footer Widgets', 'threenineeight'),
				'id'            => 'footer_widgets',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="title">',
				'after_title'   => '</h2>'
			));
			
			//Homepage widgets
			register_sidebar(array(
				'name'          => __('Homepage Widgets', 'threenineeight'),
				'id'            => 'homepage_widgets',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="title">',
				'after_title'   => '</h2>'
			));
			
			//Parallax widgets
			register_sidebar(array(
				'name'          => __('Parallax Widgets', 'threenineeight'),
				'id'            => 'parallax_widgets',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h2 class="title">',
				'after_title'   => '</h2>'
			));	
		}		
	endif;
	
	/* Title Filter
	 * --------------------------------------------- */
	function threenineeight_wp_title($title, $sep){
		global $paged, $page;
		if(is_feed()):
			return $title;
		endif;
		$title .= get_bloginfo('name');
		$site_description = get_bloginfo('description', 'display');
		if($site_description and(is_home() or is_front_page())):
			$title = "$title $sep $site_description";
		endif;
		if($paged >= 2 or $page >= 2) :
			$title = "$title $sep ". sprintf( __('Page %s', 'threenineeight'), max($paged, $page));
		endif;
		return $title;
	}
	add_filter('wp_title', 'threenineeight_wp_title', 10, 2);
	
	/* Infinite Scroll
	 * --------------------------------------------- */
	function threenineeight_scroll_is_supported(){
		$supported = current_theme_supports('infinite-scroll');
		return $supported;
	}
	add_filter('infinite_scroll_archive_supported', 'threenineeight_scroll_is_supported');
	
	/* Comment Reply Enqueue
	 * --------------------------------------------- */
	function threenineeight_enqueue_comment_reply(){
		if(is_singular() && comments_open() && get_option('thread_comments')){ 
			wp_enqueue_script('comment-reply'); 
		}
	}
	add_action('wp_enqueue_scripts', 'threenineeight_enqueue_comment_reply');
	
	/* Pagination
	 * --------------------------------------------- */
	function threenineeight_pagination(){	
		if(!class_exists('Jetpack') or !Jetpack::is_module_active('infinite-scroll')):
			get_template_part('pagination');
		endif;
	}
	
	/* Article Before
	 * --------------------------------------------- */
	if(!function_exists('threenineeight_article_before')):
		function threenineeight_article_before(){
			echo('<header class="before">');
			printf(
				__('Posted by %1$s on %2$s', 'threenineeight'),
				sprintf('<a href="%1$s" class="%2$s">%3$s</a>',
					get_author_posts_url(get_the_author_meta('ID')),
					'author',
					esc_attr(get_the_author())
				),
				sprintf('<a href="%1$s" class="%2$s">%3$s</a>',
					'#',
					'date',
					esc_html(get_the_date())
				)
			);
			if(comments_open()):
				comments_popup_link(__('No Comments', 'threenineeight'), __('One Comment', 'threenineeight'), __('% Comments', 'threenineeight'),('comments'));
			endif;
			echo('</header>');
		}
	endif;
	
	/* Article After
	 * --------------------------------------------- */
	if(!function_exists('threenineeight_article_after')):
		function threenineeight_article_after(){
			if(has_category() or has_tag()):
				echo('<footer class="after">');
					if(has_category()):
						echo '<span class="categories">';
						echo _e('Posted in ', 'threenineeight').the_category(', ');
						echo '</span>';
					endif;
					if(has_tag()):
						the_tags(__('<span class="tags">Tags: ', 'threenineeight'). ' ', ' ', '</span>');
					endif;
					if(current_user_can('edit_posts')):
						edit_post_link(__('<br /><span class="edit">Edit This</span>', 'threenineeight'));
					endif;
				echo('</footer>');
			endif;
		}
	endif;
	
	/* Article Edit
	 * --------------------------------------------- */
	function threenineeight_article_edit(){
		if(current_user_can('edit_posts')) :
			echo edit_post_link(__('<span class="edit">Edit this</span>', 'threenineeight'));
		endif;
	}
?>