<?php if(get_theme_mod('fix_header',true)): ?>

	<?php 
		$diverlogo = get_theme_mod("diver_logo"); 
		$logo_link = apply_filters('diver_logo_link',home_url('/')); 
	 ?>
	<div id="nav_fixed">
		<div class="header-logo clearfix">
			<!-- Navigation -->
			<?php get_template_part('/lib/parts/sp','menu'); ?>

			<!-- /Navigation -->
			<div class="logo clearfix">
				<a href="<?php echo $logo_link; ?>">
					<?php if(empty($diverlogo)): ?>
						<div class="logo_title"><?php bloginfo('name'); ?></div>
					<?php else: ?>
						<img src="<?php echo esc_url($diverlogo) ?>" alt="<?php bloginfo('name'); ?>">
					<?php endif; ?>
				</a>
			</div>
		<?php 
		if(get_theme_mod("fix_header_menu","main") == "main"): ?>
			<nav id="nav" role="navigation" itemscope="itemscope" itemtype="http://scheme.org/SiteNavigationElement">
				<?php wp_nav_menu( array ( 
					'theme_location' => 'header-navi',
					'items_wrap' => '<ul id="fixnavul" class="menu">%3$s</ul>',
					'link_before' => '',
					'link_after' => '',
					'depth' => 0,
					'fallback_cb' => ''
				)); ?>
			</nav>
		<?php else: 
			dynamic_sidebar('nav_inleft');
		endif; ?>
		</div>
	</div>
<?php endif; ?>