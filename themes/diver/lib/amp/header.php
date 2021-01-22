<?php global $post; ?>
<!DOCTYPE html>
<html ⚡>
<head>
		<meta charset="UTF-8">
		<title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
		<meta name="description" content="<?php echo get_diver_excerpt($post->ID,120); ?>">
		<link rel="shortcut icon" href="<?php if (get_theme_mod( 'diver_favicon' )) : echo get_theme_mod( 'diver_favicon'); else: echo get_template_directory_uri().'/images/favicon.ico'; endif; ?>">
		<link rel="apple-touch-icon" href="<?php if (get_theme_mod( 'diver_appleicon' )) : echo get_theme_mod( 'diver_appleicon'); else: echo get_template_directory_uri().'/images/favicon.ico'; endif; ?>" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<!--[if IE]>
				<link rel="shortcut icon" href="<?php if (get_theme_mod( 'diver_favicon_ie' )) : echo get_theme_mod( 'diver_favicon_ie'); else: echo get_template_directory_uri().'/images/favicon.ico'; endif; ?>">
		<![endif]-->
			<?php $canonical_url = get_permalink(); ?>
			<link rel="canonical" href="<?php echo $canonical_url; ?>" />
			<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

			<script async src="https://cdn.ampproject.org/v0.js"></script>

			<?php
			ob_start();//バッファリング
				get_template_part('ad-amp');//広告貼り付け用に作成したテンプレート
				$ad_template = ob_get_clean();
				while(have_posts()): the_post();
				  //$the_content = convert_content_for_amp(get_the_content()).$ad_template;
				  //以下の処理はthe_contentで取得しないとプラグインやフックなどの処理後のHTMLが取得できなかったので（get_the_contentではダメだった）
				  ob_start();//バッファリング
				  the_content();//広告貼り付け用に作成したテンプレート
				  $the_content = ob_get_clean();
				  $the_content = $the_content.$ad_template;
				endwhile;
				$elements = array(
				  'amp-facebook' => 'amp-facebook-0.1.js',
				  'amp-youtube' => 'amp-youtube-0.1.js',
				  'amp-vine' => 'amp-vine-0.1.js',
				  'amp-twitter' => 'amp-twitter-0.1.js',
				  'amp-instagram' => 'amp-instagram-0.1.js',
				  'amp-iframe' => 'amp-iframe-0.1.js',
				  'amp-audio' => 'amp-audio-0.1.js',
  				  'amp-video' => 'amp-video-0.1.js',
				  'amp-form' => 'amp-form-0.1.js',
				  'amp-ima-vide' => 'amp-ima-video-0.1.js'
				);

				//var_dump($the_content);
				foreach( $elements as $key => $val ) {
				  if( strpos($the_content, '<'.$key) !== false ) {
				    echo '<script async custom-element="'.$key.'" src="https://cdn.ampproject.org/v0/'.$val.'"></script>'.PHP_EOL;

				  }
				}

			?>

			<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
			<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
			<script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>


			<script type="application/ld+json">
			{
			    "@context": "http://schema.org",
			    "@type": "NewsArticle",
			    "mainEntityOfPage":{
			        "@type":"WebPage",
			        "@id":"<?php the_permalink(); ?>" // パーマリンクを取得
			    },
			    "headline": "<?php wp_title( '|', true, 'right' ); bloginfo('name'); ?>", // ページタイトルを取得
			    "image": {
			        "@type": "ImageObject",
			        "url": "<?php // アイキャッチ画像URLを取得
			        $image_id = get_post_thumbnail_id();
			        $image_url = wp_get_attachment_image_src($image_id, true);
			        if(isset($image_url[0])){
				        echo $image_url[0];
				    }
			        ?>",
			        "height": 800,
			        "width": 800
			    },
			    "datePublished": "<?php the_time('Y/m/d') ?>", // 記事投稿時間
			    "dateModified": "<?php the_modified_date('Y/m/d') ?>", // 記事更新時間
			    "author": {
			        "@type": "Person",
			        "name": "<?php the_author_meta('nickname'); ?>" // 投稿者ニックネーム
			    },
			    "publisher": {
			        "@type": "Organization",
			        "name": "<?php bloginfo('name'); ?>", // サイト名
			        "logo": {
			            "@type": "ImageObject",
			            "url": "<?php bloginfo('template_url'); ?>/img/logo.png", // ロゴ画像
			            "width": 130,
			            "height": 53
			        }
			    },
			    "description": "<?php echo get_diver_excerpt($post->ID,120); ?>" // 抜粋
			}
			</script>
			<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>

			<?php 
				$ampcss = diver_minifier_amp_css();
				$ampcsschild = (apply_filters('diver_amp_style',''))?apply_filters('diver_amp_style',''):'';

				$ampcss = convert_amp_css($ampcss.$ampcsschild);

				$customcss = '';
				$color_theme = get_theme_mod('color_theme','custom');
				if($color_theme=='light'):
					$customcss = '#header{background:#fff}';
			    elseif($color_theme=='dark'):
					$customcss = '#header{background:#000}';
			    elseif($color_theme=='blue'):
					$customcss = '#header{background:#6779a5}';
			    elseif($color_theme=='red'):
					$customcss = '#header{background:#d05151}';
			    elseif($color_theme=='green'):
					$customcss = '#header{background:#639e66}';
			    elseif($color_theme=='custom'):
			    	$headerbackground = get_theme_mod( 'background-header', '#ffffff');
				    $headertext = get_theme_mod('text-header','#333333');

					$customcss = '#header{background:'.$headerbackground.';color:'.$headertext.';}.header-logo a{color:'.$headertext.';}';
				endif; ?>
			<style amp-custom><?php echo $ampcss.$customcss; ?></style>
			<?php echo get_option('diver_option_base_amp_head'); ?>
</head>
	<body <?php body_class(); ?> >
	<?php $gaid = get_option( 'diver_option_base_gaid',get_theme_mod( 'diver_analytics_id','')); 
	if($gaid):
	?>
	  <amp-analytics type="googleanalytics" id="analytics1">
	  <script type="application/json">
		{
		  "vars": {
		    "account": "<?php echo $gaid; ?>"
		},
		  "triggers": {
		    "trackPageview": {
		      "on": "visible",
		      "request": "pageview"
		    }
		  }
		}
		</script>
	  </amp-analytics>
	<?php endif; ?>

	<div id="container">

		<!-- header -->
		<div id="header" class="clearfix">
			<div class="header-wrap">

				<div class="header-logo">
					<span id="logo">
						<?php $diverlogo = get_theme_mod("diver_logo"); ?>
						<a href="<?php echo home_url('/'); ?>" rel="nofollow">
							<?php if(empty($diverlogo)): ?>
								<?php bloginfo('name'); ?>
							<?php else: ?>
								<amp-img
									src="<?php echo esc_url($diverlogo) ?>"
									width="200"
									height="200"
									layout="responsive"
									alt="<?php bloginfo('name'); ?>">
								</amp-img>
							<?php endif; ?>
						</a>
	 				</span>
	 			</div>
			</div>
		</div>
		<nav id="scrollnav" class="inline-nospace" role="navigation" itemscope="itemscope" itemtype="http://scheme.org/SiteNavigationElement">
			<?php wp_nav_menu( array ( 
				'theme_location' => 'scroll-menu',
				'items_wrap' => '<ul id="scroll-menu">%3$s</ul>',
				'link_before' => '',
				'link_after' => '',
				'depth' => 0,
				'fallback_cb' => ''
			)); ?>
			</nav>