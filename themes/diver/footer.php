		<?php if(is_active_sidebar( 'container-bottom' )): ?>
			<div class="container_bottom_widget">
				<div class="container_bottom_widget_content clearfix">
				<?php dynamic_sidebar('container-bottom'); ?>
				</div>
			</div>
		<?php endif; ?>
		</div>
		<!-- /container -->
		<?php if(!is_singular('lp')&&!is_attachment()): ?>

			<!-- Big footer -->
			<?php get_template_part('/lib/parts/bigfooter');?>
			<!-- /Big footer -->

			<!-- footer -->
			<footer id="footer">
				<div class="footer_content clearfix">
					<nav class="footer_navi" role="navigation">
						<?php wp_nav_menu( array(
						'theme_location'=>'footer-navi', 
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0,
						'fallback_cb' => '',
						));
						?>
					</nav>
					<p id="copyright"><?php echo get_option('diver_option_base_footer_credit',get_bloginfo('name').' All Rights Reserved.'); ?></p>
				</div>
			</footer>
			<!-- /footer -->
			<?php if(get_theme_mod('pagetopscroll')): ?>
				<span id="page-top"><a href="#wrap"><?php echo apply_filters('diver_footer_page_top','<i class="fa fa-chevron-up" aria-hidden="true"></i>') ?></a></span>
			<?php endif; ?>
			<!-- フッターmenu -->
			<?php get_template_part('/lib/parts/footer','menu'); ?>
			<!-- フッターCTA -->
			<?php  get_template_part('/lib/parts/footer','cta'); ?>
		<?php endif; ?>

		<?php wp_footer(); ?>
		<script>!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script>
		<?php if(!is_amp()){echo do_shortcode(get_option('diver_option_base_ana_body',get_theme_mod('diver_access_tag_body')));} ?>

		<div class="drawer-overlay"></div>
		<div class="drawer-nav"><?php dynamic_sidebar('drawer_widget'); ?></div>

		<?php if(get_theme_mod('sp_header_search',true)): ?>
		<div id="header_search" class="lity-hide">
			<?php dynamic_sidebar('searchbox_widget'); ?>
		</div>
		<?php endif; ?>
	</body>
</html>