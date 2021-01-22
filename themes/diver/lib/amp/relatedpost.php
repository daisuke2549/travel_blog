<?php $recommendnum = get_theme_mod('recommend_num',8);
if(!empty($recommendnum)): ?>
<div class="amp-related">
<div class="related-title">おすすめ記事</div>
	<ul>
		<?php
		//関連記事を５つランダムに表示する
		$categories = get_the_category($post->ID);
		$category_ID = array();
		foreach($categories as $category):
		array_push( $category_ID, $category -> cat_ID);
		endforeach ;
		$args = array(
		'post__not_in' => array($post -> ID),
		'posts_per_page'=> $recommendnum,
		'orderby' => 'rand',
		);
		$query = new WP_Query($args); ?>
		<?php if( $query -> have_posts() ): ?>
		<?php while ($query -> have_posts()) : $query -> the_post(); ?>

		<li class="clearfix">
		<?php if ( has_post_thumbnail() ): // サムネイルがある場合 ?>
		<?php
		$image_id = get_post_thumbnail_id();
		$image_url = wp_get_attachment_image_src($image_id, 'thumbnail',true);
		?>
		<amp-img src="<?php echo $image_url[0]; ?>" width="90" height="80" class="list-amp-img"></amp-img>

		<?php else: // サムネイルがない場合 ?>
		<amp-img src="<?php echo get_template_directory_uri(); ?>/images/nopic.png" width="70" height="70" class="list-amp-img" ></amp-img>
		<?php endif; ?>

		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</li>
		<?php endwhile;endif;?>
	</ul>
</div>
<?php endif; ?>