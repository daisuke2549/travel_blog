<!-- ヘッダー画像及びヘッダー背景 -->
<?php
$headerimage = get_theme_mod('header_image');
$headerimagesp = get_theme_mod('header_image_sp');
$headerimagelink = get_theme_mod('header_image_link');
$headerbackground = get_theme_mod('header_background');
$headerbackgroundicon = get_theme_mod('header_background_icon');
$headerbackgroundtitle = get_theme_mod('header_background_title');
$headerbackgroundtext = get_theme_mod('header_background_text');
$headerbackgroundlink = get_theme_mod('header_background_btnlink');
$headerbackgroundbtntext = get_theme_mod('header_background_btntext');
$pickup_tag = get_theme_mod('pickup_tag','pickup'); 
$pickup_big = get_theme_mod('pickup_big',true); 
?>
<?php if(is_front_page()&&!is_paged()): ?>
	<?php if(!empty($headerimage)): ?>
		<?php if(is_mobile()){$headerimage = (empty($headerimagesp))?$headerimage:$headerimagesp;} ?>
		<div class="header-image"><img src="<?php echo $headerimage ?>"><?php if($headerimagelink): ?><a href="<?php echo $headerimagelink ?>"></a><?php endif; ?></div>
	<?php elseif(!empty($headerbackground)): ?>
		<div class="custom-header-img" style="background-image:url(<?php echo $headerbackground; ?>);">
			<div class="header_img_inner_wrap clearfix">
				<?php if(!empty($headerbackgroundicon)): ?>
					<div class="header_inner_icon">
						<img src="<?php echo $headerbackgroundicon ?>">
					</div>
				<?php endif; ?>
					<div class="header_inner_text" style="<?php if(empty($headerbackgroundicon)):?>width:100%;<?php endif; ?>">
						<div class="header_image_title"><?php echo $headerbackgroundtitle ?></div>
						<div class="header_image_desc"><?php echo $headerbackgroundtext ?></div>
						<?php if(!empty($headerbackgroundlink)): ?>
							<div class="button headerbutton"><a href="<?php echo $headerbackgroundlink ?>"><?php echo $headerbackgroundbtntext ?></a></div>
						<?php endif; ?>
					</div>
			</div>
		</div>
	<?php elseif(empty($headerimage)&&empty($headerbackground)&&$pickup_big): ?>
		<?php 
		$pickupposts = get_posts( 'tag='.$pickup_tag );
		if($pickupposts): ?>
			<div class="big_bxslider">
				<ul class="bxslider">
					<?php get_template_part('/lib/parts/pickup','post'); ?>
				</ul>
			</div>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>