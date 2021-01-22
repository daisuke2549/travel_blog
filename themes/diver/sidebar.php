<?php 
global $post;
$position = get_theme_mod('sidebar_position','right');
if(is_singular()){
    $position = get_theme_mod('sidebar_position_page','right');
}
    $singlewidgettitle = '';
    $singlewidgetcontent = '';
    $singlewidgetposition = '';
    $singlewidgettype = '';

    if($post){
    	$singlewidgettitle = get_post_meta($post->ID, 'single_widget_title', true);
	    $singlewidgetcontent = get_post_meta($post->ID, 'single_widget_content', true);
	    $singlewidgetposition = get_post_meta($post->ID, 'single_widget_position', true);
	    $singlewidgettype = get_post_meta($post->ID, 'single_widget_type', true);
    }

if(main_position()!="float:none"): ?>
	<!-- sidebar -->
	<div id="sidebar" style="float:<?php echo $position; ?>;" role="complementary">
		<div class="sidebar_content">
			<?php if($singlewidgetcontent&&$singlewidgetposition==='top'&&$singlewidgettype==='normal'&&is_single()): ?>
				<div class="widget single_widget">
					<?php if($singlewidgettitle): ?><div class="widgettitle"><?php echo $singlewidgettitle; ?></div><?php endif; ?>
					<div class="widget_text"><?php echo apply_filters('the_content',$singlewidgetcontent); ?></div>
				</div>
			<?php endif; ?>
			<?php if(is_active_sidebar('sidebar-1')): 
				dynamic_sidebar('sidebar-1');
			endif; ?>
			<?php if($singlewidgetcontent&&$singlewidgetposition==='bottom'&&$singlewidgettype==='normal'&&is_single()): ?>
				<div class="widget single_widget">
					<?php if($singlewidgettitle): ?><div class="widgettitle"><?php echo $singlewidgettitle; ?></div><?php endif; ?>
					<div class="widget_text"><?php echo apply_filters('the_content',$singlewidgetcontent); ?></div>
				</div>
			<?php endif; ?>
			<div id="fix_sidebar">
			<?php if($singlewidgetcontent&&$singlewidgetposition==='top'&&$singlewidgettype==='fixed'&&is_single()): ?>
				<div class="widget single_widget">
					<?php if($singlewidgettitle): ?><div class="widgettitle"><?php echo $singlewidgettitle; ?></div><?php endif; ?>
					<div class="widget_text"><?php echo apply_filters('the_content',$singlewidgetcontent); ?></div>
				</div>
			<?php endif; ?>
			<?php dynamic_sidebar( 'fix_sidebar' ); ?>
			<?php if($singlewidgetcontent&&$singlewidgetposition==='bottom'&&$singlewidgettype==='fixed'&&is_single()): ?>
				<div class="widget single_widget">
					<?php if($singlewidgettitle): ?><div class="widgettitle"><?php echo $singlewidgettitle; ?></div><?php endif; ?>
					<div class="widget_text"><?php echo apply_filters('the_content',$singlewidgetcontent); ?></div>
				</div>
			<?php endif; ?>
			<?php if(is_single()){diver_get_appeal($post->ID);} ?>
			</div>
		</div>
	</div>
	<!-- /sidebar -->
<?php endif ?>