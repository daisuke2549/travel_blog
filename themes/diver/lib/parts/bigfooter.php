<?php $col = get_theme_mod('bigfooter_col','0') ?>
<?php if(!empty($col)): ?>
	<div id="bigfooter">
		<div class="bigfooter_wrap clearfix">
			<div class="bigfooter_colomn col<?php echo $col ?>">
				<?php dynamic_sidebar('bigfooter_left'); ?>
			</div>
			<div class="bigfooter_colomn col<?php echo $col ?>">
				<?php dynamic_sidebar('bigfooter_center1'); ?>
			</div>
			<?php if($col == 4): ?>
				<div class="bigfooter_colomn col4">
					<?php dynamic_sidebar('bigfooter_center2'); ?>
				</div>
			<?php endif; ?>
			<div class="bigfooter_colomn col<?php echo $col ?>">
				<?php dynamic_sidebar('bigfooter_right'); ?>
			</div>
		</div>
	</div>
<?php endif; ?>
