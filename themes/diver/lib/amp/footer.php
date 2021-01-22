			<a class="return_link" href="<?php echo home_url('/'); ?>">最新の記事はこちらから</a>

			<?php if (defined( 'JETPACK__VERSION' ) ) {
				echo '<amp-pixel src="'.esc_url( jetpack_amp_build_stats_pixel_url() ).'"></amp-pixel>';
			} ?>
			
			<div id="footer">
				<div class="footer_content">
						<p id="copyright" class="wrapper">&copy; <?php bloginfo('name'); ?> All Rights Reserved.</p>
				</div>
			</div>
		</div>
		<?php echo get_option('diver_option_base_amp_body'); ?>
	</body>
</html>