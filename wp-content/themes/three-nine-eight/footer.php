            </div>
            <!-- Body end -->

			<?php if(is_active_sidebar('footer_widgets')): ?>       
                <!-- Bottom Footer -->
                <footer id="bottom">
                    <div class="contained row">
						<?php dynamic_sidebar('footer_widgets');  ?>
                    </div>
                </footer>
                <!-- Bottom Footer end -->
			<?php endif; ?>
            
        	<?php if(has_nav_menu('footer_menu', 'threenineeight')): ?>
                <!-- Footer Nav -->
                <nav id="footer">
                    <div class="contained">
						<?php
                            wp_nav_menu(array(
                                'container'			=> false,
                                'fallback_cb'		=> false,
                                'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'menu_id'			=> 'footer_menu',
                                'menu_class'		=> 'footer menu',
                                'theme_location'	=> 'footer_menu'
                            ));
                        ?>
                    </div>
                </nav>
                <!-- Footer Nav end -->
        	<?php endif; ?>
            
            <div id="legal">Powered by <strong><a href="http://wordpress.org">WordPress</a></strong>, Theme by <strong><a href="http://drewdyer.co.uk">Andrew Dyer</a></strong></div>
        
        </div>
    	<!-- Container end -->

	<?php wp_footer(); ?>
    </body>
</html>