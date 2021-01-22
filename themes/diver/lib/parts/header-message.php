<?php 
    $header_message = get_option( 'diver_option_base_headermessage');
    $headermessage_bg = get_option( 'diver_option_base_headermessage_bg','#f9f9f9');
    $headermessage_text = get_option( 'diver_option_base_headermessage_text','#000');

    $header_message_badge = get_option( 'diver_option_base_headermessage_badge');
    $header_message_badge_bg = get_option( 'diver_option_base_headermessage_badge_bg','#f00');
    $header_message_badge_text = get_option( 'diver_option_base_headermessage_badge_text','#fff');

    $header_message_link = get_option( 'diver_option_base_headermessage_link');
?>

<?php if($header_message && diver_page_check(get_option('diver_option_base_headermessage_view','all')) && !is_singular('lp')): ?>
<div class="header_message clearfix" style="background:<?php echo $headermessage_bg; ?>;">
	<?php if($header_message_link): ?>
		 <a class="header_message_wrap" href="<?php echo $header_message_link; ?>">
			<div class="header_message_text" style="color: <?php echo $headermessage_text; ?>">
			<?php if($header_message_badge): ?>
				<span class="header_message_badge" style="background: <?php echo $header_message_badge_bg; ?>;color:<?php echo $header_message_badge_text ?>;"><?php echo $header_message_badge; ?></span>
			<?php endif; ?>
			<?php echo $header_message; ?>
			</div>
		</a>
	<?php else: ?>
		<div class="header_message_wrap">
			<div class="header_message_text" style="color: <?php echo $headermessage_text; ?>">
			<?php if($header_message_badge): ?>
				<span class="header_message_badge" style="background: <?php echo $header_message_badge_bg; ?>;color:<?php echo $header_message_badge_text ?>;"><?php echo $header_message_badge; ?></span>
			<?php endif; ?>
			<?php echo $header_message; ?>
			</div>
		</div>
	<?php endif; ?>
</div>

<?php endif; ?>