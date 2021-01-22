<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php echo diver_meta_title(); ?></title>
<?php echo_meta_description_tag(); ?>
<?php 
	if(get_option('diver_seosetting','1')){
		diver_meta_thumbnail();
		diver_meta_robot();
	}
	if(get_option('diver_ogpsetting','1')){
		diver_meta_ogp();
	}
 ?>
<link rel="canonical" href="<?php echo diver_canonical_url(); ?>">
<link rel="shortcut icon" href="<?php echo get_theme_mod( 'diver_favicon');?>">
<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo get_theme_mod( 'diver_favicon_ie'); ?>">
<![endif]-->
<link rel="apple-touch-icon" href="<?php echo get_theme_mod( 'diver_appleicon');?>" />
<?php if(is_single()&&apply_filters('diver_amp_enable_all_set',get_post_meta($post->ID, "amp_name", true))): ?>
	<link rel="amphtml" href="<?php echo add_query_arg(array('amp' => '1'), get_permalink()); ?>">
<?php endif; ?>
<?php wp_head(); ?>

<script src="https://www.youtube.com/iframe_api"></script>

<?php if(get_option('diver_option_base_ad_client')&&get_option('diver_option_base_ad_slot')&&!is_customize_preview()): ?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<?php endif; ?>
</head>
<body itemscope="itemscope" itemtype="http://schema.org/WebPage" <?php body_class(); ?>>
<?php if(get_theme_mod('comment_form_style','none')=='facebook'||get_option('diver_sns_facebook_app')): ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/<?php echo apply_filters('diver_facebook_lang','ja_JP'); ?>/sdk.js#xfbml=1&version=v5.0&appId=<?php echo get_option('diver_sns_facebook_app'); ?>"></script>
<?php endif; ?>

<div id="container">
<!-- header -->
<?php if(!is_singular('lp') && !is_attachment() ): ?>
	<!-- lpページでは表示しない -->
	<div id="header" class="clearfix">
	<?php $firstView_pos = get_option('diver_option_firstview_position',get_theme_mod('headerimage_position','bottom')); ?>
		<?php if($firstView_pos == 'top'){get_template_part('/lib/parts/firstview');} ?>
		<header class="header-wrap" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
		<?php get_template_part('/lib/parts/miniheader'); ?>

			<div class="header-logo clearfix">
				<?php get_template_part('/lib/parts/sp','menu'); ?>

				<!-- /Navigation -->
				<div id="logo">
					<?php 
					$diverlogo = get_theme_mod("diver_logo"); 
					$logo_link = apply_filters('diver_logo_link',home_url('/')); 
					?>
					<a href="<?php echo $logo_link; ?>">
						<?php if(empty($diverlogo)): ?>
							<div class="logo_title"><?php bloginfo('name'); ?></div>
						<?php else: ?>
							<img src="<?php echo esc_url($diverlogo) ?>" alt="<?php bloginfo('name'); ?>">
						<?php endif; ?>
					</a>
				</div>
				<?php if(get_theme_mod('nav_style','in')=='in'): ?>
					<nav id="nav" role="navigation" itemscope="itemscope" itemtype="http://scheme.org/SiteNavigationElement">
						<?php wp_nav_menu( array ( 
							'theme_location' => 'header-navi',
							'items_wrap' => '<ul id="mainnavul" class="menu">%3$s</ul>',
							'link_before' => '',
							'link_after' => '',
							'depth' => 0,
							'fallback_cb' => ''
						)); ?>
					</nav>
				<?php else: 
					(!is_mobile())?get_template_part('/lib/parts/header-right'):'';
				endif; ?>
			</div>
		</header>
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
		<?php get_template_part('/lib/parts/nav','fixed'); ?>
		<?php if($firstView_pos == 'middle'){get_template_part('/lib/parts/firstview');} ?>
		<?php if(get_theme_mod('nav_style')=='only'): ?>
			<nav id="onlynav" class="onlynav" role="navigation" itemscope="itemscope" itemtype="http://scheme.org/SiteNavigationElement">
				<?php wp_nav_menu( array ( 
					'theme_location' => 'header-navi',
					'items_wrap' => '<ul id="onlynavul" class="menu">%3$s</ul>',
					'link_before' => '',
					'link_after' => '',
					'depth' => 0,
					'fallback_cb' => ''
				)); ?>
			</nav>
		<?php endif; ?>
		<?php if($firstView_pos == 'bottom'){get_template_part('/lib/parts/firstview');} ?>
	</div>
	<div class="d_sp">
	<?php (is_mobile()&&get_option('diver_option_headerbtn_spon',1))?get_template_part('/lib/parts/header-right'):''; ?>
	</div>
	<?php get_template_part('/lib/parts/header-message'); ?>
	<?php if(is_active_sidebar( 'container-top' )): ?>
		<div class="container_top_widget">
			<div class="container_top_widget_content clearfix">
			<?php dynamic_sidebar('container-top'); ?>
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>