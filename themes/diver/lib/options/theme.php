<?php
// 管理メニューにフックを登録
add_action('admin_menu', 'diver_options_init');

// メニューを追加する
function diver_options_init()
{
	if (current_user_can('administrator')) { 

	    add_menu_page('Diverオプション', 'Diverオプション', 'read','manage_options','diver_option_base',get_template_directory_uri().'/images/diver_logo_d_min.png',2);
	    
	    add_submenu_page('manage_options', 'Diverオプション', '基本設定','read','manage_options','diver_option_base');

	    add_submenu_page('manage_options', '投稿設定', '投稿設定','manage_options','diver_option_post','diver_option_post');


	    add_submenu_page('manage_options', 'SNS設定', 'SNS設定','manage_options','diver_option_sns','diver_option_sns');

	    add_submenu_page('manage_options', 'SEO設定', 'SEO設定','manage_options','diver_option_seo','diver_option_seo');

	    add_submenu_page('manage_options', 'OGP設定', 'OGP設定','manage_options','diver_option_ogp','diver_option_ogp');

	    add_submenu_page('manage_options', '入力補助設定', '入力補助設定','manage_options','diver_option_aux','diver_option_aux');

	    add_submenu_page('manage_options', 'ファーストビュー', 'ファーストビュー','manage_options','diver_option_first','diver_option_first');

	    add_submenu_page('manage_options', 'ヘッダーボタン', 'ヘッダーボタン','manage_options','diver_option_headerbtn','diver_option_headerbtn');

	    add_submenu_page('manage_options', 'フッターメニュー', 'フッターメニュー','manage_options','diver_option_footerbar','diver_option_footerbar');

	    add_submenu_page('manage_options', 'フッターCTA', 'フッターCTA','manage_options','diver_option_footercta','diver_option_footercta');

	    add_submenu_page('manage_options', 'その他', 'その他','manage_options','diver_option_other','diver_option_other');
	}
}

function diver_option_base() {
include('theme-option/base.php');
}
function diver_option_post() {
include('theme-option/post.php');
}
function diver_option_seo() {
include('theme-option/seo.php');
}
function diver_option_sns() {
include('theme-option/sns.php');
}
function diver_option_ogp() {
include('theme-option/ogp.php');
}
function diver_option_aux() {
include('theme-option/auxiliary.php');
}
function diver_option_first() {
include('theme-option/firstview.php');
}
function diver_option_headerbtn() {
include('theme-option/headerbtn.php');
}
function diver_option_footerbar() {
include('theme-option/footerbar.php');
}
function diver_option_footercta() {
include('theme-option/footercta.php');
}
function diver_option_other() {
include('theme-option/other.php');
}


function diver_option_setcss(){
	//投稿
    $diver_postsettings_icatch = get_option( 'diver_postsettings_icatch','0');
    $diver_postsettings_icatch_height = get_option('diver_postsettings_icatch_height','1');
    $diver_postsettings_icatch_height_on = get_option('diver_postsettings_icatch_height_on','500');

	$content_fontsize = get_option( 'diver_postsettings_fontsize','17');
	$content_fontsizesp = get_option( 'diver_postsettings_fontsizesp','16');
	$content_pspace = get_option( 'diver_postsettings_p_space','1');
	$content_lineheight = get_option( 'diver_postsettings_line_space','1.8');
	$content_img_shadow = get_option('diver_postsettings_img_shadow',0);
	$content_img_border = get_option('diver_postsettings_img_border',0);

	ob_start();
	?>
	<style>
	.content{font-size: <?php echo $content_fontsize; ?>px;line-height: <?php echo $content_lineheight ?>;}
	.content p {padding: 0 0 <?php echo $content_pspace ?>em;}
	.content ul,.content ol,.content table,.content dl{margin-bottom:<?php echo $content_pspace ?>em;}
	<?php if($content_img_shadow): ?>
	.content img{-webkit-box-shadow: 0 0px 5px rgba(0, 0, 0, 0.1);-moz-box-shadow: 0 0px 5px rgba(0, 0, 0, 0.1);box-shadow: 0 0px 5px rgba(0, 0, 0, 0.1);}
	<?php endif; ?>
	<?php if($content_img_border): ?>
	.content img{border:1px solid #eee;}
	<?php endif; ?>

	<?php if($diver_postsettings_icatch==1): ?>
	.single_thumbnail img{width: 100%;}
	<?php endif; ?>

	<?php if($diver_postsettings_icatch_height): ?>
		.single_thumbnail img{max-height: <?php echo $diver_postsettings_icatch_height_on; ?>px;}
	<?php endif; ?>

	@media screen and (max-width:768px){
		.content{font-size: <?php echo $content_fontsizesp; ?>px}
	}
	</style>
	<?php
    $theme_css = ob_get_contents();
    ob_end_clean();

    echo minify_css($theme_css);
}
add_action( 'wp_footer', 'diver_option_setcss');

function diver_firstviewsetcss(){
	//投稿
    $diver_firstview_simple_bgcolor = get_option('diver_firstview_simple_bgcolor','#759ab2');
    $diver_firstview_simple_bgcolor2 = get_option('diver_firstview_simple_bgcolor2','#fff');
    $diver_firstview_simple_fontcolor = get_option('diver_firstview_simple_fontcolor','#333');
    $diver_firstview_img_fixed = get_option('diver_firstview_img_fixed','1');
    $diver_postsettings_link_style = get_option('diver_postsettings_link_style',0);
    $diver_postsettings_kaereba = get_option('diver_postsettings_kaereba',1);
    $diver_postsettings_toc = get_option('diver_postsettings_toc',0);

    ob_start();

?>
	<style>
		.diver_firstview_simple.stripe.length{
		  background-image: linear-gradient(
		    -90deg,
		    transparent 25%,
		    <?php echo $diver_firstview_simple_bgcolor2 ?> 25%, <?php echo $diver_firstview_simple_bgcolor2 ?> 50%,
		    transparent 50%, transparent 75%,
		    <?php echo $diver_firstview_simple_bgcolor2 ?> 75%, <?php echo $diver_firstview_simple_bgcolor2 ?>
		  );
		  background-size: 80px 50px;
		}

		.diver_firstview_simple.stripe.slant{
		  background-image: linear-gradient(
		    -45deg,
		    transparent 25%,
		    <?php echo $diver_firstview_simple_bgcolor2 ?> 25%, <?php echo $diver_firstview_simple_bgcolor2 ?> 50%,
		    transparent 50%, transparent 75%,
		    <?php echo $diver_firstview_simple_bgcolor2 ?> 75%, <?php echo $diver_firstview_simple_bgcolor2 ?>
		  );
		  background-size: 50px 50px;
		}

		.diver_firstview_simple.stripe.vertical{
		  background-image: linear-gradient(
		    0deg,
		    transparent 25%,
		    <?php echo $diver_firstview_simple_bgcolor2 ?> 25%, <?php echo $diver_firstview_simple_bgcolor2 ?> 50%,
		    transparent 50%, transparent 75%,
		    <?php echo $diver_firstview_simple_bgcolor2 ?> 75%, <?php echo $diver_firstview_simple_bgcolor2 ?>
		  );
		  background-size: 50px 80px;
		}

		.diver_firstview_simple.dot {
		  background-image: radial-gradient(<?php echo $diver_firstview_simple_bgcolor2 ?> 20%, transparent 0), radial-gradient(<?php echo $diver_firstview_simple_bgcolor2 ?> 20%, transparent 0);
		  background-position: 0 0, 10px 10px;
		  background-size: 20px 20px;
		}

		.diver_firstview_simple.tile.length,.diver_firstview_simple.tile.vertical{
		  background-image: linear-gradient(45deg, <?php echo $diver_firstview_simple_bgcolor2 ?> 25%, transparent 25%, transparent 75%, <?php echo $diver_firstview_simple_bgcolor2 ?> 75%, <?php echo $diver_firstview_simple_bgcolor2 ?>), linear-gradient(45deg, <?php echo $diver_firstview_simple_bgcolor2 ?> 25%, transparent 25%, transparent 75%, <?php echo $diver_firstview_simple_bgcolor2 ?> 75%, <?php echo $diver_firstview_simple_bgcolor2 ?>);
	    background-position: 5px 5px ,40px 40px;
	    background-size: 70px 70px;
		}
		.diver_firstview_simple.tile.slant{
			background-image: linear-gradient(45deg, <?php echo $diver_firstview_simple_bgcolor2 ?> 25%, transparent 25%, transparent 75%, <?php echo $diver_firstview_simple_bgcolor2 ?> 75%, <?php echo $diver_firstview_simple_bgcolor2 ?>), linear-gradient(-45deg, <?php echo $diver_firstview_simple_bgcolor2 ?> 25%, transparent 25%, transparent 75%, <?php echo $diver_firstview_simple_bgcolor2 ?> 75%, <?php echo $diver_firstview_simple_bgcolor2 ?>);
		  background-size: 50px 50px;
		   background-position: 25px;
		}
		.diver_firstview_simple.grad.length{
			background: linear-gradient(<?php echo $diver_firstview_simple_bgcolor2 ?>,<?php echo $diver_firstview_simple_bgcolor ?>);
		}
		.diver_firstview_simple.grad.vertical{
			background: linear-gradient(-90deg,<?php echo $diver_firstview_simple_bgcolor2 ?>,<?php echo $diver_firstview_simple_bgcolor ?>);
		}
		.diver_firstview_simple.grad.slant{
			background: linear-gradient(-45deg, <?php echo $diver_firstview_simple_bgcolor2 ?>,<?php echo $diver_firstview_simple_bgcolor ?>);
		}
		<?php if($diver_postsettings_link_style): ?>
		.content a{
			    text-decoration: underline;
		}
		<?php endif; ?>
		<?php if(get_option('diver_postsettings_icatchbg_on',get_theme_mod('single_icatch_bg',1))): ?>
			.single_thumbnail:before {
			    content: '';
			    background: inherit;
			    -webkit-filter: grayscale(100%) blur(5px) brightness(.9);
			    -moz-filter: grayscale(100%) blur(5px) brightness(.9);
			    -o-filter: grayscale(100%) blur(5px) brightness(.9);
			    -ms-filter: grayscale(100%) blur(5px) brightness(.9);
			    filter: grayscale(100%) blur(5px) brightness(.9);
			    position: absolute;
			    top: -5px;
			    left: -5px;
			    right: -5px;
			    bottom: -5px;
			    z-index: -1;
			}
		<?php endif; ?>
		<?php if($diver_postsettings_kaereba): ?>
		/****************************************

          カエレバ・ヨメレバ

		*****************************************/
		.cstmreba {
			width: 98%;
			height:auto;
			margin:36px 0;
		}
		.booklink-box, .kaerebalink-box, .tomarebalink-box {
			width: 100%;
			background-color: #fff;
			overflow: hidden;
			box-sizing: border-box;
			padding: 12px 8px;
		  margin:1em 0;
		  -webkit-box-shadow: 0 0px 5px rgba(0, 0, 0, 0.1);
		  -moz-box-shadow: 0 0px 5px rgba(0, 0, 0, 0.1);
		  box-shadow: 0 0px 5px rgba(0, 0, 0, 0.1);
		}
		/* サムネイル画像ボックス */
		.booklink-image,
		.kaerebalink-image,
		.tomarebalink-image {
			width:150px;
			float:left;
			margin:0 14px 0 0;
			text-align: center;
		}
		.booklink-image a,
		.kaerebalink-image a,
		.tomarebalink-image a {
			width:100%;
			display:block;
		}
		/* サムネイル画像 */
		.booklink-image a img, .kaerebalink-image a img, .tomarebalink-image a img {
			margin:0 ;
			padding: 0;
			text-align:center;
		}
		.booklink-info, .kaerebalink-info, .tomarebalink-info {
			overflow:hidden;
			line-height:170%;
			color: #333;
		}
		/* infoボックス内リンク下線非表示 */
		.booklink-info a,
		.kaerebalink-info a,
		.tomarebalink-info a {
			text-decoration: none;	
		}
		/* 作品・商品・ホテル名 リンク */
		.booklink-name>a,
		.kaerebalink-name>a,
		.tomarebalink-name>a {
			border-bottom: 1px dotted ;
			color:#0044cc;
			font-size:16px;
		}
		/* 作品・商品・ホテル名ホテル名 リンク ホバー時 */
		.booklink-name>a:hover,
		.kaerebalink-name>a:hover,
		.tomarebalink-name>a:hover {
			color: #722031;
		}
		/* powered by */
		.booklink-powered-date,
		.kaerebalink-powered-date,
		.tomarebalink-powered-date {
			font-size:10px;
			line-height:150%;
		}
		.booklink-powered-date a,
		.kaerebalink-powered-date a,
		.tomarebalink-powered-date a {
			border-bottom: 1px dotted ;
			color: #0044cc;
		}
		/* 著者・住所 */
		.booklink-detail, .kaerebalink-detail, .tomarebalink-address {
			font-size:12px;
		}
		.kaerebalink-link1 img, .booklink-link2 img, .tomarebalink-link1 img {
			display:none;
		}
		.booklink-link2>div, 
		.kaerebalink-link1>div, 
		.tomarebalink-link1>div {
		    float: left;
		    width: 32.33333%;
		    margin: 0.5% 0;
		    margin-right: 1%;
		}
		/***** ボタンデザインここから ******/
		.booklink-link2 a, 
		.kaerebalink-link1 a,
		.tomarebalink-link1 a {
			width: 100%;
			display: inline-block;
			text-align: center;
			font-size: .9em;
			line-height: 2em;
			padding:3% 1%;
			margin: 1px 0;
			border-radius: 2px;
			color: #fff !important;
			box-shadow: 0 2px 0 #ccc;
			background: #ccc;
			position: relative;
			transition: 0s;
		  font-weight: bold;
		}
		.booklink-link2 a:hover,
		.kaerebalink-link1 a:hover,
		.tomarebalink-link1 a:hover {
			top:2px;
			box-shadow: none;
		}
		/* トマレバ */
		.tomarebalink-link1 .shoplinkrakuten a { background: #76ae25; }/* 楽天トラベル */
		.tomarebalink-link1 .shoplinkjalan a { background: #ff7a15; }/* じゃらん */
		.tomarebalink-link1 .shoplinkjtb a { background: #c81528; }/* JTB */
		.tomarebalink-link1 .shoplinkknt a { background: #0b499d; }/* KNT */
		.tomarebalink-link1 .shoplinkikyu a { background: #bf9500; }/* 一休 */
		.tomarebalink-link1 .shoplinkrurubu a { background: #000066; }/* るるぶ */
		.tomarebalink-link1 .shoplinkyahoo a { background: #ff0033; }/* Yahoo!トラベル */
		/* カエレバ */
		.kaerebalink-link1 .shoplinkyahoo a {background:#ff0033;} /* Yahoo!ショッピング */
		.kaerebalink-link1 .shoplinkbellemaison a { background:#84be24 ; }	/* ベルメゾン */
		.kaerebalink-link1 .shoplinkcecile a { background:#8d124b; } /* セシール */ 
		.kaerebalink-link1 .shoplinkkakakucom a {background:#314995;} /* 価格コム */
		/* ヨメレバ */
		.booklink-link2 .shoplinkkindle a { background:#007dcd;} /* Kindle */
		.booklink-link2 .shoplinkrakukobo a{ background:#d50000; } /* 楽天kobo */
		.booklink-link2  .shoplinkbk1 a { background:#0085cd; } /* honto */
		.booklink-link2 .shoplinkehon a { background:#2a2c6d; } /* ehon */
		.booklink-link2 .shoplinkkino a { background:#003e92; } /* 紀伊國屋書店 */
		.booklink-link2 .shoplinktoshokan a { background:#333333; } /* 図書館 */
		/* カエレバ・ヨメレバ共通 */
		.kaerebalink-link1 .shoplinkamazon a, 
		.booklink-link2 .shoplinkamazon a { background:#FF9901; } /* Amazon */
		.kaerebalink-link1 .shoplinkrakuten a , 
		.booklink-link2 .shoplinkrakuten a { background: #c20004; } /* 楽天 */
		.kaerebalink-link1 .shoplinkseven a, 
		.booklink-link2 .shoplinkseven a { background:#225496;} /* 7net */
		/***** ボタンデザインここまで ******/
		.booklink-footer {
			clear:both;
		}
		/***  解像度480px以下のスタイル ***/
		@media screen and (max-width:480px){
			.booklink-image,
			.kaerebalink-image,
			.tomarebalink-image {
				width:100%;
				float:none !important;
			}
			.booklink-link2>div, 
			.kaerebalink-link1>div, 
			.tomarebalink-link1>div {
				width: 49%;
				margin: 0.5%;
			}
			.booklink-info,
			.kaerebalink-info,
			.tomarebalink-info {
				text-align:center;
				padding-bottom: 1px;
			}
		}
		<?php endif; ?>
		/**** kaereba ****/

		<?php if($diver_postsettings_toc): ?>
		<?php $diver_toc_color = get_option('diver_postsettings_toc_color','#e1eff4'); ?>
		<?php $diver_toc_textcolor = get_option('diver_postsettings_toc_textcolor','#1e73be'); ?>
		/****************************************

          TOC+

		*****************************************/

		ul.toc_list {
		    padding: 0 1.5em;
		    margin: 1em 0;
		}

		#toc_container {
		  margin: 2em 0;
		  background: #fff;
		  border: 5px solid <?php echo $diver_toc_color ?>;
		  border-radius: 2px;
		  color: #666; 
		  display: block !important;
		}

		#toc_container .toc_title {
		  margin-bottom: 15px;
		  font-size: 1.7em;
		  background: <?php echo $diver_toc_color ?>;
		  color: #fff;
		  margin-bottom: 0;
		    padding: 0px 1em;
		    font-weight: bold;
    	}



		span.toc_toggle {
		    background: #fff;
		    color: #577fbc;
		    font-size: .6em;
		    padding: 5px 8px;
		    border-radius: 3px;
		    vertical-align: middle;
		    margin-left: 5px;
		}

		span.toc_toggle a {
		    color: #577fbc;
		    text-decoration: none;
		}

		#toc_container .toc_list {
		    list-style-type: none !important;
		    counter-reset: li; 
		}

		#toc_container .toc_list > li {
		    position: relative;
		    margin-bottom: 15px;
		    line-height: 1.3em;
		    font-size: 0.9em; 
		}


		#toc_container .toc_list > li a {
		    text-decoration: none !important; 
		    font-size: 14px;
		    font-weight: bold;
		    color: <?php echo $diver_toc_textcolor ?>;
		}

		#toc_container .toc_list > li > a {
		    font-size: 18px;
		}

		#toc_container .toc_list > li a:hover {
		    text-decoration: underline !important; 
		}

		#toc_container .toc_list > li ul {
		    list-style-type: disc;
		    margin-top: 10px;
		    padding: 0 10px;
		    color: <?php echo $diver_toc_color ?>; 
		}

		#toc_container .toc_list > li > ul li {
		    font-size: 0.9em;
		    margin-bottom: 8px;
		    list-style: none;
		}

		#toc_container .toc_list li ul a:before,.toc_widget_list li ul a:before {
		    content: "\f0da";
		    margin-right: 7px;
		    vertical-align: middle;
		    opacity: .5;
		    font-family: fontAwesome;
		}

		.toc_widget_list li ul a:before{
		    margin-right: 2px;
		}

		#toc_container .toc_list li ul ul a:before,.toc_widget_list li ul ul a:before {
		  content:"\f105";
		}

		span.toc_number {
		    background: <?php echo $diver_toc_textcolor ?>;
		    color: #fff;
		    font-weight: bold;
		    border-radius: 50%;
		    line-height: 1.5em;
		    width: 1.5em;
		    text-align: center;
		    display: inline-block;
		    margin-right: 5px;
		    opacity: .5;
		    font-size: .8em;
		}

		ul.toc_widget_list {
		    font-weight: bold;
		}

		ul.toc_widget_list li {
		    padding: 8px;
		}
		ul.toc_widget_list li ul li {
		    padding: 5px;
		}

		ul.toc_widget_list li ul {
		    font-size: .9em;
		}


		ul.toc_list li ul .toc_number,ul.toc_widget_list li ul .toc_number{
		    display: none;
		}



		@media only screen and (min-width: 641px) {

		  #toc_container .toc_title {
		    font-size: 1.3em; 
		  }

		  #toc_container .toc_list > li {
		    margin-bottom: 18px;
		    font-size: 1em; 
		  }

		}

		@media screen and (max-width: 768px){

		  ul.toc_list {
		      padding: 0 1em;
		  }

		  #toc_container .toc_title {
		    font-size: 1.2em; 
		    padding: 5px 15px;
		  }

		  #toc_container .toc_list > li a {
		      font-size: 12px;
		  }

		  #toc_container .toc_list > li > a {
		      font-size: 14px;
		  }

		  #toc_container .toc_list > li{
		    margin-bottom:10px;
		  }

		}
		<?php endif; ?>
	</style>
	<?php

	$theme_css = ob_get_contents();
    ob_end_clean();

    echo minify_css($theme_css);
}
add_action( 'wp_footer', 'diver_firstviewsetcss');

function diver_headerbtnsetcss(){ 
    $headerbackground = get_theme_mod( 'background-header', '#ffffff');
    $headerlink = get_theme_mod('link-header','#333355');

    $diver_option_headerbtn_bg1 = get_option( 'diver_option_headerbtn_bg1',$headerbackground);
    $diver_option_headerbtn_color1 = get_option( 'diver_option_headerbtn_color1',$headerlink);

    $diver_option_headerbtn_bg2 = get_option( 'diver_option_headerbtn_bg2',$headerbackground);
    $diver_option_headerbtn_color2 = get_option( 'diver_option_headerbtn_color2',$headerlink);

    $diver_option_headerbtn_bg3 = get_option( 'diver_option_headerbtn_bg3',$headerbackground);
    $diver_option_headerbtn_color3 = get_option( 'diver_option_headerbtn_color3',$headerlink);

    $diver_option_headerbtn_bg4 = get_option( 'diver_option_headerbtn_bg4',$headerbackground);
    $diver_option_headerbtn_color4 = get_option( 'diver_option_headerbtn_color4',$headerlink);

    $diver_option_headerbtn_iconsize = get_option( 'diver_option_headerbtn_iconsize','30');
    $diver_option_headerbtn_separator = get_option( 'diver_option_headerbtn_separator','#d4d4d4');
    $diver_option_headerbtn_separator_width = get_option( 'diver_option_headerbtn_separator_width','1');

    $i = 0;
    $count = 0;
    	while ($i < 5) {
		if(get_option( 'diver_option_headerbtn_title'.$i)&&!get_option( 'diver_option_headerbtn_hidden'.$i)){ 
			$count++;
		}
		$i++;
	}
	$count = ($count<=0)?'1':$count;

	ob_start();
?>
<style>
.nav_in_btn li.nav_in_btn_list_1 a{
    background: <?php echo $diver_option_headerbtn_bg1; ?>;
    color: <?php echo $diver_option_headerbtn_color1 ?>;
}
.nav_in_btn li.nav_in_btn_list_2 a{
    background: <?php echo $diver_option_headerbtn_bg2; ?>;
    color: <?php echo $diver_option_headerbtn_color2; ?>;
}
.nav_in_btn li.nav_in_btn_list_3 a{
    background: <?php echo $diver_option_headerbtn_bg3; ?>;
    color: <?php echo $diver_option_headerbtn_color3; ?>;
}
.nav_in_btn li.nav_in_btn_list_4 a{
    background: <?php echo $diver_option_headerbtn_bg4; ?>;
    color: <?php echo $diver_option_headerbtn_color4; ?>;
}
.nav_in_btn ul li {
    border-left: solid <?php echo $diver_option_headerbtn_separator_width ?>px <?php echo $diver_option_headerbtn_separator; ?>;
}
.nav_in_btn ul li:last-child {
    border-right: solid <?php echo $diver_option_headerbtn_separator_width ?>px <?php echo $diver_option_headerbtn_separator; ?>;
}

.nav_in_btn ul li i{
	font-size: <?php echo $diver_option_headerbtn_iconsize; ?>px;
}

.d_sp .nav_in_btn ul li{width: <?php echo 100/$count ?>%;}



</style>
<?php

	$theme_css = ob_get_contents();
    ob_end_clean();

    echo minify_css($theme_css);
}
add_action( 'wp_footer', 'diver_headerbtnsetcss');