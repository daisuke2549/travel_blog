<?php
function layout_settings($wp_customize) {
 
    $wp_customize->add_section( 'layout_settings', array(
    'title'          => 'レイアウト設定',
    'priority'       => 25,
    ) );

    /****** post layput **********/
    $wp_customize->add_setting('sitelogo_pos', array(
        'default'        => 'inline',
    ));
    $wp_customize->add_control( 'sitelogo_pos', array(
        'settings' => 'sitelogo_pos',
        'label' => 'ヘッダーロゴ設定',
        'description' => 'ロゴの配置を設定します',
        'section' => 'layout_settings',
        'type'    => 'radio',
        'choices'    => array(
            'inline' => '左寄せ',
            'block' => '中央寄せ',
        ),        ));

    /****** post layput **********/
    $wp_customize->add_setting('post_layout', array(
        'default'        => 'list',
    ));
    $wp_customize->add_control( 'post_layout', array(
        'settings' => 'post_layout',
        'label' => '記事一覧レイアウト設定',
        'description' => '記事一覧(PC)のレイアウトを変更します。',
        'section' => 'layout_settings',
        'type'    => 'radio',
        'choices'    => array(
            'list' => 'リスト表示',
            'grid' => 'グリッド表示',
            'minilist' => 'ミニリスト表示',

        ),        ));

    /****** post layput **********/
    $wp_customize->add_setting('post_sp_layout', array(
        'default'        => 'list',
    ));
    $wp_customize->add_control( 'post_sp_layout', array(
        'settings' => 'post_sp_layout',
        'description' => '記事一覧(SP:モバイル)のレイアウトを変更します。',
        'section' => 'layout_settings',
        'type'    => 'radio',
        'choices'    => array(
            'list' => 'リスト表示',
            'grid' => 'グリッド表示'
        ),        ));


    /******  grid column **********/
    $wp_customize->add_setting('grid_maxcol', array(
        'default'        => '3',
    ));
    $wp_customize->add_control( 'grid_maxcol', array(
        'settings' => 'grid_maxcol',
        'description' => 'グリッドの最大カラム数',
        'section' => 'layout_settings',
        'type'    => 'select',
        'choices'    => array(
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
    ),        ));

     /******  grid column min **********/
    $wp_customize->add_setting('grid_mincol', array(
        'default'        => '2',
    ));
    $wp_customize->add_control( 'grid_mincol', array(
        'settings' => 'grid_mincol',
        'description' => 'グリッドの最小カラム数',
        'section' => 'layout_settings',
        'type'    => 'select',
        'choices'    => array(
            '1' => '1',
            '2' => '2',
    ),        ));


    /****** sidebar position **********/
    $wp_customize->add_setting('sidebar_position', array(
        'default'        => 'right',
    ));
    $wp_customize->add_control( 'sidebar_position', array(
        'settings' => 'sidebar_position',
        'label'   => 'サイドバー表示位置設定',
        'description' => '全体のサイドバーの位置を変更できます。',
        'section' => 'layout_settings',
        'type'    => 'radio',
        'choices'    => array(
            'left' => '左(left)',
            'right' => '右(right)',
            'none' => '非表示(none)',
        ),        ));

    $wp_customize->add_setting('sidebar_position_page', array(
        'default'        => 'right',
    ));
    $wp_customize->add_control( 'sidebar_position_page', array(
        'settings' => 'sidebar_position_page',
        'description' => '個別ページのサイドバーの位置を変更できます。',
        'section' => 'layout_settings',
        'type'    => 'radio',
        'choices'    => array(
            'left' => '左(left)',
            'right' => '右(right)',
            'none' => '非表示(none)',
        ),        ));

    /******  Footer **********/
    $wp_customize->add_setting('bigfooter_col', array(
        'default'        => '0',
    ));
    $wp_customize->add_control( 'bigfooter_col', array(
        'settings' => 'bigfooter_col',
        'label'   => 'フッター設定',
        'description' => 'ビッグフッターのカラム数',
        'section' => 'layout_settings',
        'type'    => 'radio',
        'choices'    => array(
            '0' => '非表示',
            '3' => '3カラム',
            '4' => '4カラム',
        ),        ));
}

add_action('customize_register', 'layout_settings');

function diver_layout_option_css(){
    $gridmaxcol = get_theme_mod('grid_maxcol', '3');
    $gridmincol = get_theme_mod('grid_mincol', '2');
    ob_start();
    ?>

    <?php switch ($gridmaxcol) {
        case '1': ?>
            <style>
            .grid_post-box{
                width:100% !important;
                }
            </style>
        <?php break;
        case '2': ?>
            <style>
            .grid_post-box{
                width:50%;
                }
            </style>
        <?php break;
        case '4': ?>
         <style>
            @media screen and (min-width:1201px){
            .grid_post-box{
                width:25%;
                }
            }

            @media screen and (max-width: 1200px){
                .grid_post-box {
                    width:33.3333%;
                }
            }
        </style>
        <?php break;
    } 

    switch ($gridmincol) {
        case '1': ?>
            <style>
            @media screen and (max-width: 599px){
                .grid_post-box{
                    width:100% !important;
                }
                .grid_post-box .post-substr {
                    display: block;
                }
            }
            </style>
        <?php break;
        case  '2' : ?>
            <style>
            @media screen and (max-width: 599px){
                .grid_post-box{
                    width:50% !important;
                }
            }
            </style>
        <?php break;
    } 

    $sitelogo_pos = get_theme_mod('sitelogo_pos', 'inline');
    switch ($sitelogo_pos) {
        case 'block': ?>
        <style>
            .header-wrap .header-logo{display: block;}
            .header_small_menu .header_small_menu_right{display: none;}
            .header_small_menu #description{float:none;text-align: center;}
            .header-wrap #logo, .nav_inleft_wrap, .header-wrap .header-logo #nav{text-align: center;display: block;}
            .nav_inleft{text-align: center;margin: 0 auto;}
            .header-wrap .header-logo #nav ul{float: none;}
            #header .header-wrap .menu{display: inline-block;}
            .header-logo .nav_in_btn {display: none;}
            @media screen and (min-width: 769px){
                #logo img {height: 60px;margin: .5em;}
            }
        </style>
        <?php break;
        case 'inline': ?>
        <?php break;
    } ?>

<?php

    $layout_css = ob_get_contents();
    ob_end_clean();

    echo minify_css($layout_css);
    }
    add_action( 'wp_footer', 'diver_layout_option_css');
?>