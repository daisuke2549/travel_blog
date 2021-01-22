<?php get_header(); ?>
<?php
$pickup_tag = get_theme_mod('pickup_tag','pickup'); 
$pickupposts = get_posts( 'tag='.$pickup_tag );
?>
<div id="main-wrap" class="main_404">
	<div class="notfofund_title">ページが見つかりません。</div>
	<div class="notfofund_text">URLが正しく入力されているかお確かめください。</br>
	URLが正しく、かつブラウザで再読み込みしても表示されない場合は、</br>
	ページが移動または削除された可能性があります。</div>


	<form role="search" method="get" class="searchform" class="notfofund_search aligncenter" action="<?php echo home_url('/'); ?>" >
		<input type="text" placeholder="検索"  value="" name="s" class="s" />
		<input type="submit" class="searchsubmit" value="" />
	</form>

<?php if($pickup_tag&&$pickupposts): ?>
	<div class="notfofund_slick_title">おすすめの記事</div>
		<?php get_template_part('/lib/parts/pickup','post'); ?>
	</div>
<?php endif; ?>
<?php get_footer();