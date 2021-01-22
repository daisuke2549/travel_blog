<?php
function color_settings($wp_customize) {

    require_once( get_template_directory().'/lib/assets/colorPicker/alpha-color-picker.php' );

    $wp_customize->add_section( 'color-settings', array(
    'title'          => '基本カラー',
    'priority'       => 25,
    ) );

    $wp_customize->add_setting('color_theme', array('default'=>'custom'));
    $wp_customize->add_control( 'color_theme', array(
        'settings' => 'color_theme',
        'label'   => 'テーマカラー',
        'description' => 'テーマを選ぶだけで全体のカラーが変わります。個々に設定したい場合は、カスタムを選択してから設定してください。',
        'section' => 'color-settings',
        'type'    => 'radio',
        'choices'    => array(
            'light' => 'light',
            'dark' => 'dark',
            'blue' => 'blue',
            'red' => 'red',
            'green' => 'green',
            'custom' => 'カスタマイズ',
        ),        
    ));


    $wp_customize->add_setting('diver_background', array( 'default' => '#efefef'));
    $wp_customize->add_control( new Customize_Alpha_Color_Control($wp_customize,'diver_background',array(
        'settings' => 'diver_background',
        'label'   => '背景色',
        'description' => '背景色',
        'section' => 'color-settings',
        'show_opacity' => true, 
        'palette' => array( 
          'rgba(255,255,255,0.9)',
        ),
        )));

    $wp_customize->add_setting('diver_text', array('default' => '#333333',));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'diver_text',array(
        'settings' => 'diver_text',
        'label'   => '文字色',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('diver_link', array('default'=> '#335'));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'diver_link',array(
        'settings' => 'diver_link',
        'label'   => 'リンク',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('diver_link-hover', array('default'=> '#6495ED'));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'diver_link-hover',array(
        'settings' => 'diver_link-hover',
        'label'   => 'リンク(マウスオン時)',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('diver_text_incontent', array('default' => '#000',));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'diver_text_incontent',array(
        'settings' => 'diver_text_incontent',
        'label'   => '投稿内文字色',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('diver_link_incontent', array('default'=> '#6f97bc'));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'diver_link_incontent',array(
        'settings' => 'diver_link_incontent',
        'label'   => '投稿内リンク',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('diver_link-hover_incontent', array('default'=> '#6495ED'));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'diver_link-hover_incontent',array(
        'settings' => 'diver_link-hover_incontent',
        'label'   => '投稿内リンク(マウスオン時)',
        'section' => 'color-settings',
        )));

// header
    $wp_customize->add_setting('background-header', array('default'=> '#fff'));
    $wp_customize->add_control( new Customize_Alpha_Color_Control($wp_customize,'background-header',array(
        'settings' => 'background-header',
        'label'   => 'ヘッダー背景',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('text-header', array('default'=> '#333',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'text-header',array(
        'settings' => 'text-header',
        'label'   => 'ヘッダーテキスト',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('link-header', array('default'=> '#335',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'link-header',array(
        'settings' => 'link-header',
        'label'   => 'ヘッダーリンク',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('link-hover-header', array('default'=> '#6495ED',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'link-hover-header',array(
        'settings' => 'link-hover-header',
        'label'   => 'ヘッダーリンク(マウスオン時)',
        'section' => 'color-settings',
        )));

// mini-header
    $wp_customize->add_setting('background-miniheader', array('default'=> '#5d8ac1'));
    $wp_customize->add_control( new Customize_Alpha_Color_Control($wp_customize,'background-miniheader',array(
        'settings' => 'background-miniheader',
        'label'   => 'ミニヘッダー背景',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('text-miniheader', array('default'=> '#fff',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'text-miniheader',array(
        'settings' => 'text-miniheader',
        'label'   => 'ミニヘッダーテキスト',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('link-miniheader', array('default'=> '#fff',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'link-miniheader',array(
        'settings' => 'link-miniheader',
        'label'   => 'ミニヘッダーリンク',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('link-hover-miniheader', array('default'=> '#6495ED',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'link-hover-miniheader',array(
        'settings' => 'link-hover-miniheader',
        'label'   => 'ミニヘッダーリンク(マウスオン時)',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('background-fixheader', array('default'=> '#fff'));
    $wp_customize->add_control( new Customize_Alpha_Color_Control($wp_customize,'background-fixheader',array(
        'settings' => 'background-fixheader',
        'label'   => '固定ヘッダー背景',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('text-fixheader', array('default'=> '#333',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'text-fixheader',array(
        'settings' => 'text-fixheader',
        'label'   => '固定ヘッダーテキスト',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('link-fixheader', array('default'=> '#335',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'link-fixheader',array(
        'settings' => 'link-fixheader',
        'label'   => '固定ヘッダーリンク',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('link-hover-fixheader', array('default'=> '#6495ED',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'link-hover-fixheader',array(
        'settings' => 'link-hover-fixheader',
        'label'   => '固定ヘッダーリンク(マウスオン時)',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('background_onlymenu', array('default'=> '#fff',
        ));
    $wp_customize->add_control( new Customize_Alpha_Color_Control($wp_customize,'background_onlymenu',array(
        'settings' => 'background_onlymenu',
        'label'   => '独立メニュー背景',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('text_onlymenu', array('default'=> '#333',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'text_onlymenu',array(
        'settings' => 'text_onlymenu',
        'label'   => '独立メニューテキスト',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('background_onlymenu_hover', array('default'=> '#5d8ac1',
        ));
    $wp_customize->add_control( new Customize_Alpha_Color_Control($wp_customize,'background_onlymenu_hover',array(
        'settings' => 'background_onlymenu_hover',
        'label'   => '独立メニュー背景(マウスオン時)',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('text_onlymenu_hover', array('default'=> '#fff',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'text_onlymenu_hover',array(
        'settings' => 'text_onlymenu_hover',
        'label'   => '独立メニューテキスト(マウスオン時)',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('background_scrollmenu', array('default'=> 'rgba(255,255,255,.8)'));
    $wp_customize->add_control( new Customize_Alpha_Color_Control($wp_customize,'background_scrollmenu',array(
        'settings' => 'background_scrollmenu',
        'label'   => 'スクロールメニュー背景',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('text_scrollmenu', array('default'=> '#505050',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'text_scrollmenu',array(
        'settings' => 'text_scrollmenu',
        'label'   => 'スクロールメニューテキスト',
        'section' => 'color-settings',
        )));



// big footer
    $wp_customize->add_setting('background-bigfooter', array('default'=> '#fff',
        ));
    $wp_customize->add_control( new Customize_Alpha_Color_Control($wp_customize,'background-bigfooter',array(
        'settings' => 'background-bigfooter',
        'label'   => 'ビッグフッター背景',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('text-bigfooter', array('default'=> '#333',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'text-bigfooter',array(
        'settings' => 'text-bigfooter',
        'label'   => 'ビッグフッターテキスト',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('link-bigfooter', array('default'=> '#335',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'link-bigfooter',array(
        'settings' => 'link-bigfooter',
        'label'   => 'ビッグフッターリンク',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('link-hover-bigfooter', array('default'=> '#6495ED',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'link-hover-bigfooter',array(
        'settings' => 'link-hover-bigfooter',
        'label'   => 'ビッグフッターリンク(マウスオン時)',
        'section' => 'color-settings',
        )));

    //footer
        $wp_customize->add_setting('background-footer', array('default'=> '#fff',
        ));
    $wp_customize->add_control( new Customize_Alpha_Color_Control($wp_customize,'background-footer',array(
        'settings' => 'background-footer',
        'label'   => 'フッター背景',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('text-footer', array('default'=> '#999',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'text-footer',array(
        'settings' => 'text-footer',
        'label'   => 'フッターテキスト',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('link-footer', array('default'=> '#333355',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'link-footer',array(
        'settings' => 'link-footer',
        'label'   => 'フッターリンク',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('link-hover-footer', array('default'=> '#6495ED',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'link-hover-footer',array(
        'settings' => 'link-hover-footer',
        'label'   => 'フッターリンク(マウスオン時)',
        'section' => 'color-settings',
        )));

    //widget title
    $wp_customize->add_setting('background-widget', array('default'=> '#fff',
        ));
    $wp_customize->add_control( new Customize_Alpha_Color_Control($wp_customize,'background-widget',array(
        'settings' => 'background-widget',
        'label'   => 'ウィジェット背景',
        'section' => 'color-settings',
        )));


    $wp_customize->add_setting('text-widget', array('default'=> '#333',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'text-widget',array(
        'settings' => 'text-widget',
        'label'   => 'ウィジェットテキスト',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('link-widget', array('default'=> '#333355',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'link-widget',array(
        'settings' => 'link-widget',
        'label'   => 'ウィジェットリンク',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('link-hover-widget', array('default'=> '#6495ED',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'link-hover-widget',array(
        'settings' => 'link-hover-widget',
        'label'   => 'ウィジェットリンク(マウスオン時)',
        'section' => 'color-settings',
        )));


    $wp_customize->add_setting('box-color', array('default'=> '#fff',
        ));
    $wp_customize->add_control( new Customize_Alpha_Color_Control($wp_customize,'box-color',array(
        'settings' => 'box-color',
        'label'   => '投稿ブロック背景',
        'section' => 'color-settings',
        )));

    $wp_customize->add_setting('drawer-bg', array('default'=> '#fff',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'drawer-bg',array(
        'settings' => 'drawer-bg',
        'label'   => 'ドロワーメニュー背景',
        'section' => 'color-settings',
    )));

    $wp_customize->add_setting('drawer-color', array('default'=> '#000',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'drawer-color',array(
        'settings' => 'drawer-color',
        'label'   => 'ドロワーメニュー内テキスト',
        'section' => 'color-settings',
    )));

    $wp_customize->add_setting('drawer-titlebg', array('default'=> '#eee',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'drawer-titlebg',array(
        'settings' => 'drawer-titlebg',
        'label'   => 'ドロワーメニュー内ウィジェットタイトル背景',
        'section' => 'color-settings',
    )));

    $wp_customize->add_setting('drawer-titlecolor', array('default'=> '#333',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'drawer-titlecolor',array(
        'settings' => 'drawer-titlecolor',
        'label'   => 'ドロワーメニュー内ウィジェットタイトル文字色',
        'section' => 'color-settings',
    )));

    $wp_customize->add_setting('footer_fixmenu-bg', array('default'=> 'rgba(255,255,255,.8)',
        ));
    $wp_customize->add_control( new Customize_Alpha_Color_Control($wp_customize,'footer_fixmenu-bg',array(
        'settings' => 'footer_fixmenu-bg',
        'label'   => 'フッター固定メニュー背景',
        'section' => 'color-settings',
    )));


    $wp_customize->add_setting('footer_fixmenu-text', array('default'=> '#333',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'footer_fixmenu-text',array(
        'settings' => 'footer_fixmenu-text',
        'label'   => 'フッター固定メニューテキスト',
        'section' => 'color-settings',
    )));

    $wp_customize->add_setting('pagenation-bg', array('default'=> '#afafaf',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'pagenation-bg',array(
        'settings' => 'pagenation-bg',
        'label'   => 'ページネーションボタン背景',
        'section' => 'color-settings',
    )));

    $wp_customize->add_setting('pagenation-text', array('default'=> '#fff',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'pagenation-text',array(
        'settings' => 'pagenation-text',
        'label'   => 'ページネーションボタンテキスト',
        'section' => 'color-settings',
    )));

    $wp_customize->add_setting('pagenation-current_bg', array('default'=> '#607d8b',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'pagenation-current_bg',array(
        'settings' => 'pagenation-current_bg',
        'label'   => 'ページネーションボタン背景(現在)',
        'section' => 'color-settings',
    )));

    $wp_customize->add_setting('pagenation-current_text', array('default'=> '#fff',
        ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'pagenation-current_text',array(
        'settings' => 'pagenation-current_text',
        'label'   => 'ページネーションボタンテキスト(現在)',
        'section' => 'color-settings',
    )));
}
add_action('customize_register', 'color_settings');

function diver_customize_css(){
    //初期カラー
    $background = get_theme_mod('diver_background','#efefef');
    $maintext = get_theme_mod( 'diver_text', '#333333');
    $mainlink = get_theme_mod( 'diver_link', '#333355');
    $mainlinkhover = get_theme_mod( 'diver_link-hover', '#6495ED');

    $maintextin = get_theme_mod( 'diver_text_incontent', '#000');
    $mainlinkin = get_theme_mod( 'diver_link_incontent', '#6f97bc');
    $mainlinkhoverin = get_theme_mod( 'diver_link-hover_incontent', '#6495ED');

    $headerbackground = get_theme_mod( 'background-header', '#ffffff');
    $headertext = get_theme_mod('text-header','#333333');
    $headerlink = get_theme_mod('link-header','#333355');
    $headerlinkhover = get_theme_mod('link-hover-header','#6495ED');

    $miniheaderbackground = get_theme_mod( 'background-miniheader', '#5d8ac1');
    $miniheadertext = get_theme_mod('text-miniheader','#fff');
    $miniheaderlink = get_theme_mod('link-miniheader','#fff');
    $miniheaderlinkhover = get_theme_mod('link-hover-miniheader','#6495ED');

    $fixheaderbackground = get_theme_mod( 'background-fixheader', '#ffffff');
    $fixheadertext = get_theme_mod('text-fixheader','#333333');
    $fixheaderlink = get_theme_mod('link-fixheader','#333355');
    $fixheaderlinkhover = get_theme_mod('link-hover-fixheader','#6495ED');

    $onlymenubackground = get_theme_mod('background_onlymenu','#fff');
    $onlymenutext = get_theme_mod('text_onlymenu','#333');
    $onlymenubackgroundhover = get_theme_mod('background_onlymenu_hover','#5d8ac1');
    $onlymenutexthover = get_theme_mod('text_onlymenu_hover','#fff');

    $scrollmenubackground = get_theme_mod('background_scrollmenu','rgba(255,255,255,.8)');
    $scrollmenutext = get_theme_mod('text_scrollmenu','#505050');

    $bigfooterbackground = get_theme_mod( 'background-bigfooter', '#fff');
    $bigfootertext = get_theme_mod('text-bigfooter','#333333');
    $bigfooterlink = get_theme_mod('link-bigfooter','#333355');
    $bigfooterlinkhover = get_theme_mod('link-hover-bigfooter','#6495ED');

    $footerbackground = get_theme_mod( 'background-footer', '#fff');
    $footertext = get_theme_mod('text-footer','#999');
    $footerlink = get_theme_mod('link-footer','#333355');
    $footerlinkhover = get_theme_mod('link-hover-footer','#6495ED');

    $backgroundwidget = get_theme_mod('background-widget','#fff');
    $widgettext = get_theme_mod('text-widget','#333');
    $widgetlink = get_theme_mod('link-widget','#333355');
    $widgetlinkhover = get_theme_mod('link-hover-widget','#6495ED');

    $box_color = get_theme_mod('box-color','#fff');

    $color_theme = get_theme_mod('color_theme','custom');


    $drawer_bg = get_theme_mod('drawer-bg','#fff');
    $drawer_color = get_theme_mod('drawer-color','#000');
    $drawer_titlebg = get_theme_mod('drawer-titlebg','#eee');
    $drawer_titlecolor = get_theme_mod('drawer-titlecolor','#333');

    $footer_fixmenu_bg = get_theme_mod('footer_fixmenu-bg','rgba(255,255,255,.8)');
    $footer_fixmenu_text = get_theme_mod('footer_fixmenu-text','#333');

    $maintexthex = color_to_rgb($headertext);

    $pagenation_bg = get_theme_mod('pagenation-bg','#afafaf');
    $pagenation_text = get_theme_mod('pagenation-text','#fff');
    $pagenation_current_bg = get_theme_mod('pagenation-current_bg','#607d8b');
    $pagenation_current_text = get_theme_mod('pagenation-current_text','#fff');


    ob_start();

    if($color_theme=='light'): ?>
        <style>

            body{background-color: #efefef;color: #333;}

            .header-wrap,#header ul.sub-menu, #header ul.children,#scrollnav,.description_sp{background:#fff;color:#333}
            .header-wrap a,#scrollnav a,div.logo_title{color: #333;}

            .drawer-nav-btn span{background-color: #333;}
            .drawer-nav-btn:before,.drawer-nav-btn:after {border-color:#333;}

            #scrollnav ul li a {background: #f3f3f3;color: #333;}
            .header-wrap,#header ul.sub-menu, #header ul.children,#scrollnav,.description_sp,.post-box-contents,#main-wrap #pickup_posts_container img,.hentry, #single-main .post-sub,.navigation,.single_thumbnail,.in_loop,#breadcrumb,.pickup-cat-list,.maintop-widget, .mainbottom-widget,#share_plz,.sticky-post-box,.catpage_content_wrap,.cat-post-main,#sidebar .widget,#onlynav,#onlynav ul ul,#bigfooter,#footer,#nav_fixed.fixed, #nav_fixed #nav ul ul,.header_small_menu,.content,#footer_sticky_menu,.footermenu_col,a.page-numbers,#scrollnav{background:#fff;color: #333;}

            #onlynav ul li a{color: #333;}

            .pagination .current {background: #abccdc;color: #fff;}

            </style>
    <?php elseif($color_theme=='dark'): ?>
         <style>
            body{background-color: #111;color: #fff;}
            a,div.logo_title{color: #fff;}
            .drawer-nav-btn span{background-color: #fff;}
            .drawer-nav-btn:before,.drawer-nav-btn:after {border-color:#fff;}


            #scrollnav ul li a{background: rgba(255,255,255,255.3);color:#fff } 

            .header-wrap,#header ul.sub-menu, #header ul.children,#scrollnav,.description_sp,.post-box-contents,#main-wrap #pickup_posts_container img,.hentry, #single-main .post-sub,.navigation,.single_thumbnail,.in_loop,#breadcrumb,.pickup-cat-list,.maintop-widget, .mainbottom-widget,#share_plz,.sticky-post-box,.catpage_content_wrap,.cat-post-main,#onlynav,#onlynav ul ul,#bigfooter,#footer,#nav_fixed.fixed, #nav_fixed #nav ul ul,.header_small_menu,#footer_sticky_menu,.footermenu_col,a.page-numbers,#scrollnav,.page_title{background:#111;color: #fff;}

            .post-box-contents,#main-wrap #pickup_posts_container img,.hentry, #single-main .post-sub,.navigation,.single_thumbnail,.in_loop,#breadcrumb,.pickup-cat-list,.maintop-widget, .mainbottom-widget,#share_plz,.sticky-post-box,.catpage_content_wrap,.cat-post-main,.#sidebar .widget{background:#222;}
            #scrollnav ul li a {background: rgb(60, 59, 59);color: #fff;}
            #onlynav ul li a,.widget_archive select, .widget_categories select{color: #fff;}
            #single-main .post-meta .tag, #single-main .article_footer .tag{background-color: #333;}

            .drawer-nav{background-color:#000;}
            .drawer_content_title {background: #333;}

            .pagination .current {background: #fff;color: #abccdc;}
            .widget{background-color: #000;}
            </style>

    <?php elseif($color_theme=='blue'): ?>
        <style>
                body{background-color: #eee;color: #333}
                a{color: #333}
                a:hover{color:#04C}

                .header-wrap,#header ul.sub-menu, #header ul.children,#scrollnav,.description_sp,#nav_fixed.fixed{background:#6779a5;color:#fff }
                .header-wrap a,#nav_fixed.fixed a,div.logo_title{color:#fff }
                .header-wrap a:hover,#nav_fixed.fixed a:hover,div.logo_title:hover{color:#04c}
                .drawer-nav-btn span{background-color: #fff;}
                .drawer-nav-btn:before,.drawer-nav-btn:after {border-color:#fff;}


                .header_small_menu{background:#364979;color:#fff;border-bottom:none}
                .header_small_menu a{color:#fff}
                .header_small_menu a:hover{color:#04c}

                #onlynav,#onlynav ul li a,#nav_fixed #nav ul ul{background: #6779a5;color:#fff}
                #onlynav ul > li:hover > a{background: #c8d0e2;color:#6779a5;}

                #bigfooter{background:#6779a5;color:#fff}
                #bigfooter a{color:#fff}
                #bigfooter a:hover{color:#04c}

                #footer{background:#364979;color: #fff;}
                #footer a{color: #fff}
                #footer a:hover{color: #04c}

                #sidebar .widget{background: #fff;}

                .post-box-contents,#main-wrap #pickup_posts_container img,.hentry, #single-main .post-sub,.single_thumbnail,.navigation,.in_loop,#breadcrumb,.pickup-cat-list,.maintop-widget, .mainbottom-widget,#share_plz,.sticky-post-box,.catpage_content_wrap,.cat-post-main{background: #fff;}

                .post-box{border-color:#5d8ac1;}

            </style>
    <?php elseif($color_theme=='red'): ?>
             <style>
                body{background-color: #ffeeee;color: #333}
                a{color: #333}
                a:hover{color:#04C}

                .header-wrap,#header ul.sub-menu, #header ul.children,#scrollnav,.description_sp,#nav_fixed.fixed{background:#d05151;color:#fff }
                .header-wrap a,#nav_fixed.fixed a,div.logo_title{color:#fff }
                .header-wrap a:hover,#nav_fixed.fixed a:hover,div.logo_title:hover{color:#04c}
                .drawer-nav-btn span{background-color: #fff;}
                .drawer-nav-btn:before,.drawer-nav-btn:after {border-color:#fff;}

                .header_small_menu{background:#ff9696;color:#fff;border-bottom:none}
                .header_small_menu a{color:#fff}
                .header_small_menu a:hover{color:#04c}

                #onlynav,#onlynav ul li a,#nav_fixed #nav ul ul{background: #d05151;color:#fff}
                #onlynav ul > li:hover > a{background: #ffc4c4;color:#d05151;}

                #bigfooter{background:#ff9696;color:#fff}
                #bigfooter a{color:#fff}
                #bigfooter a:hover{color:#04c}

                #footer{background:#d05151;color: #fff;}
                #footer a{color: #fff}
                #footer a:hover{color: #04c}

                #sidebar .widget{background: #fff;}

                .post-box-contents,#main-wrap #pickup_posts_container img,.hentry,#single-main .post-sub,.single_thumbnail,.navigation,.in_loop,#breadcrumb,.pickup-cat-list,.maintop-widget, .mainbottom-widget,#share_plz,.sticky-post-box,.catpage_content_wrap,.cat-post-main{background: #fff;}

                .post-box{border-color:#ffd2d2;}

            </style>

     <?php elseif($color_theme=='green'): ?>
             <style>
                body{background-color: #f5e3d4;color: #333}
                a{color: #333}
                a:hover{color:#04C}

                .header-wrap,#header ul.sub-menu, #header ul.children,#scrollnav,.description_sp,#nav_fixed.fixed{background:#639e66;color:#fff }
                .header-wrap a,#nav_fixed.fixed a,div.logo_title{color:#fff }
                .header-wrap a:hover,#nav_fixed.fixed a:hover,div.logo_title:hover{color:#04c}
                .drawer-nav-btn span{background-color: #fff;}
                .drawer-nav-btn:before,.drawer-nav-btn:after {border-color:#fff;}

                .header_small_menu{background:#909e90;color:#fff;border-bottom:none}
                .header_small_menu a{color:#fff}
                .header_small_menu a:hover{color:#04c}

                #onlynav,#onlynav ul li a,#nav_fixed #nav ul ul{background: #639e66;color:#fff}
                #onlynav ul > li:hover > a{background: #d2e8d3;color:#639e66;}

                #bigfooter{background:#909e90;color:#fff}
                #bigfooter a{color:#fff}
                #bigfooter a:hover{color:#04c}

                #footer{background:#639e66;color: #fff;}
                #footer a{color: #fff}
                #footer a:hover{color: #04c}

                #sidebar .widget{background: #fff;}

                .post-box-contents,#main-wrap #pickup_posts_container img,.hentry,#single-main .post-sub,.navigation,.single_thumbnail,.in_loop,#breadcrumb,.pickup-cat-list,.maintop-widget, .mainbottom-widget,#share_plz,.sticky-post-box,.catpage_content_wrap,.cat-post-main{background: #fff;}

                .post-box{border-color:#ffd2d2;}

            </style>

    <?php elseif($color_theme=='custom'): ?>
        <style>
            body{background-color: <?php echo $background; ?>;color: <?php echo $maintext ?>;}
            a{color: <?php echo $mainlink ?>;}
            a:hover{color: <?php echo $mainlinkhover ;?>}

            .content{color:<?php echo $maintextin ?>;}
            .content a{color:<?php echo $mainlinkin ?>;}
            .content a:hover{color:<?php echo $mainlinkhoverin ?>;}

            .header-wrap,#header ul.sub-menu, #header ul.children,#scrollnav,.description_sp{background: <?php echo $headerbackground ?>;color: <?php echo $headertext ?>}
            .header-wrap a,#scrollnav a,div.logo_title{color: <?php echo $headerlink ?>;}
            .header-wrap a:hover,div.logo_title:hover{color: <?php echo $headerlinkhover ?>}
            .drawer-nav-btn span{background-color: <?php echo $headerlink ?>;}
            .drawer-nav-btn:before,.drawer-nav-btn:after {border-color:<?php echo $headerlink ?>;}

            #scrollnav ul li a{background: <?php echo $scrollmenubackground; ?>;color:<?php echo $scrollmenutext ?> }

            .header_small_menu{background: <?php echo $miniheaderbackground ?>;color: <?php echo $miniheadertext ?>}
            .header_small_menu a{color: <?php echo $miniheaderlink ?>}
            .header_small_menu a:hover{color: <?php echo $miniheaderlinkhover ?>}

            #nav_fixed.fixed, #nav_fixed #nav ul ul{background: <?php echo $fixheaderbackground ?>;color: <?php echo $fixheadertext ?>}
            #nav_fixed.fixed a,#nav_fixed .logo_title{color: <?php echo $fixheaderlink ?>}
            #nav_fixed.fixed a:hover{color: <?php echo $fixheaderlinkhover ?>}

            #nav_fixed .drawer-nav-btn:before,#nav_fixed .drawer-nav-btn:after{border-color: <?php echo $fixheaderlink ?>;}
            #nav_fixed .drawer-nav-btn span{background-color: <?php echo $fixheaderlink ?>;}

            #onlynav{background: <?php echo $onlymenubackground ?>;color: <?php echo $onlymenutext ?>}
            #onlynav ul li a{color: <?php echo $onlymenutext ?>}
            #onlynav ul ul.sub-menu{background: <?php echo $onlymenubackground ?>}
            #onlynav div > ul > li > a:before{border-color: <?php echo $onlymenutext ?>}
            #onlynav ul > li:hover > a:hover,#onlynav ul>li:hover>a,#onlynav ul>li:hover li:hover>a,#onlynav ul li:hover ul li ul li:hover > a{background: <?php echo $onlymenubackgroundhover ?>;color: <?php echo $onlymenutexthover ?>}
            #onlynav ul li ul li ul:before{border-left-color: <?php echo $onlymenutexthover ?>}
            #onlynav ul li:last-child ul li ul:before{border-right-color: <?php echo $onlymenutexthover ?>}

            #bigfooter{background: <?php echo $bigfooterbackground ?>;color: <?php echo $bigfootertext ?>}
            #bigfooter a{color: <?php echo $bigfooterlink ?>}
            #bigfooter a:hover{color: <?php echo $bigfooterlinkhover ?>}

            #footer{background: <?php echo $footerbackground ?>;color: <?php echo $footertext ?>}
            #footer a{color: <?php echo $footerlink ?>}
            #footer a:hover{color: <?php echo $footerlinkhover ?>}

            #sidebar .widget{background: <?php echo $backgroundwidget; ?>;color:<?php echo $widgettext ?>; }
            #sidebar .widget a:hover{color:<?php echo $widgetlinkhover ?>;}
            .post-box-contents,#main-wrap #pickup_posts_container img,.hentry, #single-main .post-sub,.navigation,.single_thumbnail,.in_loop,#breadcrumb,.pickup-cat-list,.maintop-widget, .mainbottom-widget,#share_plz,.sticky-post-box,.catpage_content_wrap,.cat-post-main{background:<?php echo $box_color ?>;}

            .post-box{border-color:#eee;}

            .drawer_content_title,.searchbox_content_title{background:<?php echo $drawer_titlebg ?>;color: <?php echo $drawer_titlecolor ?>;}
            .drawer-nav,#header_search{background:<?php echo $drawer_bg ?>}
            .drawer-nav,.drawer-nav a,#header_search,#header_search a{color:<?php echo $drawer_color ?>}

            #footer_sticky_menu{background: <?php echo $footer_fixmenu_bg ?>}
            .footermenu_col{background: <?php echo $footer_fixmenu_bg ?>;color:<?php echo $footer_fixmenu_text ?>;}

            a.page-numbers{background: <?php echo $pagenation_bg ?>;color: <?php echo $pagenation_text ?>;}
            .pagination .current{background: <?php echo $pagenation_current_bg ?>;color: <?php echo $pagenation_current_text ?>;}

        </style>
<?php endif; 

    $color_css = ob_get_contents();
    ob_end_clean();

    echo minify_css($color_css);
}
    add_action( 'wp_head', 'diver_customize_css');
?>