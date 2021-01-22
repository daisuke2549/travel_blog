<!-- comment area -->
<div id="comment-area">
	<?php if(have_comments()): // コメントがあったら ?>
		<div class="single_title"><?php echo get_theme_mod('comment_list_title','コメント一覧'); ?></div>
		<ol class="commets-list">
			<?php wp_list_comments('avatar_size=55'); //コメント一覧を表示 ?>
		</ol>
		<div class="comment-page-link">
			<?php paginate_comments_links(); //コメントが多い場合、ページャーを表示 ?>
		</div>
	<?php endif; ?>

	<?php
	$args = array(
	// 'title_reply' => apply_filters('diver_comment_title','Comment'),
	 'title_reply_before' => '<div class="respondform_title">', 
	 'title_reply_after' => '</div>', 
	'label_submit' => '送信'
	);
	comment_form($args);
	?>
</div>
<!-- /comment area -->