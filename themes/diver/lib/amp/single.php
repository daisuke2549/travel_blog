<?php require_once ( get_template_directory() . '/lib/amp/header.php' ); ?>
<?php echo (get_theme_mod('breadcrumb_set_post',true))?get_template_part('/lib/parts/breadcrumb'):''; ?> 
<div id="main-wrap">
	<div id="single-main">
	<?php 
	if (have_posts()) : // WordPress ループ
		while (have_posts()) : the_post(); // 繰り返し処理開始 
		$cat = get_the_category();
		$catname = $cat[0]->cat_name; //カテゴリー名
		$catslug = $cat[0]->slug; //スラッグ名
	?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post-meta">
				<div class="single-post-category"><?php the_category(' ') ?></div>
				<?php the_tags('<div class="tag">','</div><div class="tag">','</div>'); ?>
			</div>
			<h1 class="single-post-title"><?php echo get_the_title(); ?></h1>
			<div class="single-post-date_wrap">
				<?php if(get_theme_mod('single_published_date',true)): ?>
					<time class="single-post-date published updated" datetime="<?php the_time('Y-m-d'); ?>"><i class="fa fa-calendar" aria-hidden="true"></i><?php the_time('Y.m.d'); ?></time>
				<?php endif; ?>
				
				<?php if(get_theme_mod('single_modified_date',true)): ?>
					<time class="single-post-date modified" datetime="<?php the_modified_date('Y-m-d'); ?>"><i class="fa fa-refresh" aria-hidden="true"></i><?php the_modified_date('Y.m.d') ?></time>
				<?php endif; ?>
			</div>
			<?php 
				// アイキャッチ画像のIDを取得
				$thumbnail_id = get_post_thumbnail_id(); 
				// mediumサイズの画像内容を取得（引数にmediumをセット）
				$eye_img = wp_get_attachment_image_src( $thumbnail_id , 'full' );
			?>
			<?php if($eye_img&&get_option('diver_postsettings_icatch_on',get_theme_mod('single_icatch',1))): ?>
				<div class="single_thumbnail">
					<amp-img src="<?php echo $eye_img[0] ?>" layout="responsive" height="<?php echo $eye_img[2] ?>" width="<?php echo $eye_img[1] ?>">
				</div>
			<?php endif; ?>
			<div class="single-post-main">
			<div class="amp-social">
				<amp-social-share type="facebook" width="55" height="40"></amp-social-share>
				<amp-social-share type="twitter" width="55" height="40"></amp-social-share>
				<amp-social-share type="gplus" width="55" height="40"></amp-social-share>
				<amp-social-share type="hatena_bookmark" layout="container" data-share-endpoint="http://b.hatena.ne.jp/entry/<?php echo the_permalink(); ?>">B!</amp-social-share>
				<amp-social-share type="line" layout="container" data-share-endpoint="http://line.me/R/msg/text/?TITLE%3ASOURCE_URL"></amp-social-share>
			</div>
			<?php 
			if(get_option('diver_option_base_ad_amptop_custom')){
				echo get_option('diver_option_base_ad_amptop_custom'); 
			}else{
				echo (get_option('diver_option_base_ad_amptop'))?diver_option_get_adsence():''; 
			}
			?>

			<div class="content"><?php the_content(); ?></div>
				<?php get_template_part('/lib/parts/pager-next-links'); ?>
			</div>
		</div>

		<!-- CTA -->
		<?php diver_get_cta(get_the_ID()); ?>

		<?php 
		if(get_option('diver_option_base_ad_ampbottom_custom')){
			echo get_option('diver_option_base_ad_ampbottom_custom'); 
		}else{
			echo (get_option('diver_option_base_ad_ampbottom'))?diver_option_get_adsence():'';		
		}
		?>

		<!-- post navigation -->
		<ul class="navigation">
			<?php 
			if( get_previous_post() ): ?>
				<li class="left"><?php previous_post_link('%link', '%title'); ?></li>
			<?php 
			endif;
			if( get_next_post() ): ?>
				<li class="right"><?php next_post_link('%link', '%title'); ?></li>
			<?php 
			endif; 
			?>
		</ul>

		<?php endwhile; // 繰り返し処理終了		
		else : // ここから記事が見つからなかった場合の処理 ?>
		<div class="post">
			<h2>記事はありません</h2>
			<p>お探しの記事は見つかりませんでした。</p>
		</div>
		<?php endif; ?>

		<div class="post-sub">
			<?php require_once ( get_template_directory() . '/lib/amp/relatedpost.php' ); ?>
		</div>
	</div>
</div>
<?php require_once ( get_template_directory() . '/lib/amp/footer.php' ); ?>