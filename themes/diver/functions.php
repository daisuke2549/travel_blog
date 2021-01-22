<?php
// core
require_once ('lib/admin/init.php' );
require_once ('lib/admin/scheme.php' );
require_once ('lib/admin/seo.php' );
require_once ('lib/admin/ogp.php' );

// option 
require_once ('lib/options/main.php' );
require_once ('lib/options/single.php' );
require_once ('lib/options/category.php' );
require_once ('lib/options/color.php' );
require_once ('lib/options/size.php' );
require_once ('lib/options/icon.php' );
require_once ('lib/options/layout.php' );
require_once ('lib/options/design.php' );
require_once ('lib/options/design2.php' );
require_once ('lib/options/theme.php' );

// setting
require_once('lib/functions/diver_settings.php');
require_once ('lib/functions/blogcard.php' );
require_once('lib/functions/load-script.php');
require_once('lib/functions/custom_post.php');
require_once('lib/functions/widget.php');
require_once('lib/functions/posts.php');
require_once('lib/functions/posts-loop.php');
require_once('lib/functions/cta.php');
require_once('lib/functions/amp.php');
require_once('lib/functions/appealbox.php');
require_once('lib/functions/shortcode.php');
require_once('lib/functions/social_btn.php');
require_once ('lib/functions/amp_convert.php' );
require_once ('lib/functions/lazyload.php' );
require_once ('lib/functions/quicktags.php' );
require_once ('lib/functions/adsence.php');
require_once ('lib/functions/minifier.php');
require_once ('lib/functions/analytics.php');
require_once ('lib/parts/catpage_contents.php' );

if(get_bloginfo('version') >= "5.0.0"){
	require_once ('lib/functions/editor/gutenberg/blocks.php');
}

if(is_admin()){
	require_once ('lib/functions/editor/auxiliary.php');
	require_once ('lib/functions/editor/getpost.php');
	require_once ('lib/functions/editor/getcommon.php');
} 

//metabox
require_once ('lib/metabox/layout.php' );
require_once ('lib/metabox/cta.php' );
require_once ('lib/metabox/widget.php' );
require_once ('lib/metabox/ad.php' );
require_once ('lib/metabox/custom_css.php' );
require_once ('lib/metabox/amp.php' );
require_once ('lib/metabox/title-count.php');
require_once ('lib/metabox/appeal.php');
require_once ('lib/metabox/featuredImage.php' );
require_once ('lib/metabox/auth-before.php');
require_once ('lib/metabox/lp_header.php' );
require_once ('lib/metabox/lp_layout.php' );
require_once ('lib/metabox/catpage.php' );
require_once ('lib/metabox/seo.php' );
require_once ('lib/metabox/nextpage.php' );
require_once ('lib/metabox/head_inner.php' );

//widget
require_once ('lib/widget/ad.php' );
require_once ('lib/widget/newpost.php' );
require_once ('lib/widget/newpost_grid.php' );
require_once ('lib/widget/profile.php' );
require_once('lib/widget/pcsp.php');
require_once('lib/widget/tab.php');
require_once('lib/widget/dpp.php');
require_once('lib/widget/search.php');

 if(phpversion() > "5.6.0"){
	require_once ('lib/assets/minifier/php-html-css-js-minifier.php');
}
require_once(ABSPATH . 'wp-admin/includes/file.php');