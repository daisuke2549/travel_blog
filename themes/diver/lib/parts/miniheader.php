<?php if(get_theme_mod('mini_header',true)): ?>
	<div class="header_small_menu clearfix">
		<div class="header_small_content">
			<div id="description"><?php bloginfo('description'); ?></div>
			<nav class="header_small_menu_right" role="navigation" itemscope="itemscope" itemtype="http://scheme.org/SiteNavigationElement">
				<?php wp_nav_menu( array(
				'theme_location'=>'header-sub', 
				'before' => '',
				'after' => '',
				'link_before' => '',
				'link_after' => '',
				'depth' => 0,
				'fallback_cb' => '',
				)); ?>
			</nav>
		</div>
	</div>
<?php endif; ?>