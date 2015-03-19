<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
    	<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    	<title><?php wp_title('|', true, 'right'); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php
        	wp_enqueue_style('threenineeight-style', get_stylesheet_uri(), false, '1.1.1');
			wp_head();
		?>
    </head>
    
    <body <?php body_class(); ?>>
    
    	<!-- Container -->
        <div id="container">
        
        	<?php if(has_nav_menu('header_menu', 'threenineeight')): ?>
                <!-- Header Nav -->
                <nav id="header">
                    <div class="contained">
						<?php
                            wp_nav_menu(array(
                                'container'			=> false,
                                'fallback_cb'		=> false,
                                'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'menu_id'			=> 'header_menu',
                                'menu_class'		=> 'header menu',
                                'theme_location'	=> 'header_menu'
                            ));
                        ?>
                    </div>
                </nav>
                <!-- Header Nav end -->
        	<?php endif; ?>
            
            <!-- Top Header -->
            <header id="top">
            	<div class="contained responsive row">
                	<div class="column width_50">
                    
                        <!-- Logo -->
                        <span class="logo">                     
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <span class="blog_name"><?php bloginfo('name'); ?></span><br />
                                <span class="blog_tagline"><?php bloginfo('description'); ?></span>
                            </a>
                        </span>
                        <!-- Logo end -->
                        
                    </div>
                	<div class="last column width_50">
						<?php
                            if(is_active_sidebar('header_widgets')):
                                dynamic_sidebar('header_widgets');
                            else:
                                get_search_form();
                            endif;
                        ?>
                    </div>
                </div>
            </header>
            <!-- Top Header end -->
            
            <?php if(has_nav_menu('primary_menu', 'threenineeight') or has_nav_menu('secondary_menu', 'threenineeight')): ?>
                <!-- Navigation -->
                <div id="navigationAnchor"></div>
                <div id="navigation" class="responsive">
    
    				<?php if(has_nav_menu('primary_menu', 'threenineeight')): ?>
                        <!-- Primary Nav -->
                        <nav id="primary" class="responsive">
                            <div class="contained">
                                <div id="primary_toggle" class="menu_toggle">Menu Toggle</div>
								<?php
                                    wp_nav_menu(array(
                                        'container'			=> false,
                                        'fallback_cb'		=> false,
                                        'items_wrap'		=> '<ul class="%2$s">%3$s</ul>',
                                        'menu_class'		=> 'drop_down primary menu',
                                        'theme_location'	=> 'primary_menu'
                                    ));
                                ?>
                            </div>
                        </nav>
                        <!-- Primary Nav end -->
    				<?php endif; ?>

					<?php if(has_nav_menu('secondary_menu', 'threenineeight')): ?>
                        <!-- Secondary Nav -->
                        <nav id="secondary" class="responsive">
                            <div class="contained">
                                <div id="secondary_toggle" class="menu_toggle">Menu Toggle</div>
								<?php
                                    wp_nav_menu(array(
                                        'container'			=> false,
                                        'fallback_cb'		=> false,
                                        'items_wrap'		=> '<ul class="%2$s">%3$s</ul>',
                                        'menu_class'		=> 'drop_down secondary menu',
                                        'theme_location'	=> 'secondary_menu'
                                    ));
                                ?>
                            </div>
                        </nav>
                        <!-- Secondary Nav end -->
    				<?php endif; ?>
                    
                </div>
                <!-- Navigation end -->
        	<?php endif; ?>
            
            <!-- Body -->
            <div id="body">