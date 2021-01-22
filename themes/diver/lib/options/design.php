<?php
function design_settings($wp_customize) {

    require_once( get_template_directory().'/lib/assets/colorPicker/alpha-color-picker.php' );
 
    $wp_customize->add_section( 'design_settings', array(
    'title'          => 'デザイン設定①',
    'priority'       => 25,
    ) );


/****** shadow **********/
    $wp_customize->add_setting('diver_block_style', array('default'=> 'shadow'));
    $wp_customize->add_control( 'diver_block_style', array(
        'settings' => 'diver_block_style',
        'label'   => 'ブロック要素',
        'description' => '囲み方',
        'section' => 'design_settings',
        'type'    => 'radio',
        'choices'    => array(
            'none' => '無し',
            'shadow' => '影',
            'border' => 'ライン',
    ),        ));

    $wp_customize->add_setting('diver_block_radius', array('default'=> false));
    $wp_customize->add_control( 'diver_block_radius', array(
        'settings' => 'diver_block_radius',
        'label'   => '角を丸くする',
        'section' => 'design_settings',
        'type'     => 'checkbox'
    ));

/****** new label **********/
    $newtagbacground = get_theme_mod('background-newtag', '#f66');
    $newtagtext = get_theme_mod('text-newtag','#fff');

    $wp_customize->add_setting('newlabel_bg', array('default' => $newtagbacground));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'newlabel_bg',array(
        'settings' => 'newlabel_bg',
        'label' => 'Newラベルスタイル',
        'description'   => '背景色',
        'section' => 'design_settings',
        )));

    $wp_customize->add_setting('newlabel_text', array('default' => $newtagtext));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'newlabel_text',array(
        'settings' => 'newlabel_text',
        'description'   => '文字色',
        'section' => 'design_settings',
        )));

    $wp_customize->add_setting('newlabel_style', array('default'=> 'sribon2'));
    $wp_customize->add_control( 'newlabel_style', array(
        'settings' => 'newlabel_style',
        'description' => 'スタイル',
        'section' => 'design_settings',
        'type'    => 'select',
        'choices'    => array(
            'vribon1' => '縦リボン1',
            'vribon2' => '縦リボン2',
            'hribon1' => '横リボン1',
            'hribon2' => '横リボン2',
            'sribon1' => '斜めリボン',
            'sribon2' => '斜め三角',
            'circle' => '丸',
    ),        ));

/******  hover image **********/
    $wp_customize->add_setting('thumbnail_hover_anime', array('default'=> 'zoom'));
    $wp_customize->add_control( 'thumbnail_hover_anime', array(
        'settings' => 'thumbnail_hover_anime',
        'label' => '記事一覧サムネイル',
        'description' => '記事一覧でカーソルを乗せた時に画像がアニメーションする種類を設定できます。',
        'section' => 'design_settings',
        'type'    => 'select',
        'choices'    => array(
            'none' => 'なし',
            'zoom' => 'ズーム',
            'blur' => 'ぼかし',
            'gray' => 'グレイスケール',
            'sepia' => 'セピア',
            'opacity' => '透過',
    ),        ));

        /****** none thumb **********/
    // $wp_customize->add_setting('diver_archive_thumb_footer', array('default'=> false));
    // $wp_customize->add_control( 'diver_archive_thumb_footer', array(
    //     'settings' => 'diver_archive_thumb_footer',
    //     'label' => 'サムネイル内にSNSボタンを表示する',
    //     'section' => 'design_settings',
    //     'type'     => 'checkbox'
    // ));

    /****** none thumb **********/
    $wp_customize->add_setting('diver_archive_thumb', array('default'=> false));
    $wp_customize->add_control( 'diver_archive_thumb', array(
        'settings' => 'diver_archive_thumb',
        'label' => 'サイト全体のサムネイルを非表示にする(投稿内ではアイキャッチ画像が表示されます。)',
        'section' => 'design_settings',
        'type'     => 'checkbox'
    ));

/******  top scroll **********/
    $wp_customize->add_setting('top_scroll_bg', array('default' => 'rgba(0,0,0,0.6)'));
    $wp_customize->add_control( new Customize_Alpha_Color_Control($wp_customize,'top_scroll_bg',array(
        'settings' => 'top_scroll_bg',
        'label' => 'トップスクロールボタン',
        'description'   => '背景色',
        'section' => 'design_settings',
        )));

    $wp_customize->add_setting('top_scroll_text', array('default' => '#fff'));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'top_scroll_text',array(
        'settings' => 'top_scroll_text',
        'description'   => '文字色',
        'section' => 'design_settings',
        )));

/******  view ranking **********/
    $wp_customize->add_setting('post_ranking_style', array('default'=> 'circle'));
    $wp_customize->add_control( 'post_ranking_style', array(
        'settings' => 'post_ranking_style',
        'label' => 'ランキングウィジェット順位',
        'description' => 'ウィジェットWordpress Popular Postsの順位スタイルを変更できます。',
        'section' => 'design_settings',
        'type'    => 'select',
        'choices'    => array(
            'none' => '非表示',
            'circle' => '丸',
            'square' => '四角',
            'triangle' => '三角',
            'big' => '大きい数字',
    ),        ));

}

add_action('customize_register', 'design_settings');


/*****************************************************

            css

*****************************************************/
function diver_design_option_css(){
/*****************************************************

            blockstyle

*****************************************************/

    ob_start();

    $blockstyle = get_theme_mod('diver_block_style','shadow'); 

    if(get_theme_mod('diver_block_radius',false)): ?>
        <style>
            .appeal_box,#share_plz,.hentry, #single-main .post-sub,#breadcrumb,#sidebar .widget,.navigationd,.pickup-cat-wrap,.maintop-widget, .mainbottom-widget,.post-box-contents,#main-wrap .pickup_post_list,#main-wrap .pickup_post_list img,.sticky-post-box,.p-entry__tw-follow,.p-entry__push,.catpage_content_wrap,.diver_widget_post_list .post_list img,.pickup-cat-img img,.sticky-post-box .post_thumbnail img,.wpp-thumbnail,.post_list_wrap img,.single-recommend img,.post_footer_author .author-post-thumb img,.grid_post_thumbnail img{
                border-radius: 4px;
            }
        </style>
<?php endif; ?>

    <?php
    switch ($blockstyle) {
        case 'shadow': ?>
            <style>
                .appeal_box,#share_plz,.hentry, #single-main .post-sub,#breadcrumb,#sidebar .widget,.navigation,.wrap-post-title,.pickup-cat-wrap,.maintop-widget, .mainbottom-widget,.post-box-contents,#main-wrap .pickup_post_list,.sticky-post-box,.p-entry__tw-follow,.p-entry__push,.catpage_content_wrap,#cta{-webkit-box-shadow: 0 0 5px #ddd;-moz-box-shadow: 0 0 5px #ddd;box-shadow: 0 0 5px #ddd;-webkit-box-shadow: 0 0 0 5px rgba(150,150,150,.2);-moz-box-shadow: 0 0 5px rgba(150,150,150,.2);box-shadow: 0 0 5px rgba(150,150,150,.2);}
            </style>
           <?php break;
        case 'border': ?>
            <style>
               .appeal_box,#share_plz,.hentry, #single-main .post-sub,#breadcrumb,#sidebar .widget,.navigation,.wrap-post-title,.pickup-cat-wrap,.maintop-widget, .mainbottom-widget,.post-box-contents,#main-wrap .pickup_post_list,.sticky-post-box,.p-entry__tw-follow,.p-entry__push,.catpage_content_wrap,#cta{border: 1px solid #eee;}
            </style>
           <?php break;
    }

/*****************************************************

            new label

*****************************************************/

$newtagbacground = get_theme_mod('background-newtag', '#f66');
$newtagtext = get_theme_mod('text-newtag','#fff');

$newlablebg = get_theme_mod('newlabel_bg',$newtagbacground);
$newlabletext = get_theme_mod('newlabel_text',$newtagtext);
$newlablestyle = get_theme_mod('newlabel_style','sribon2');

?>
     <style>
        .newlabel {display: inline-block;position: absolute;margin: 0;text-align: center;font-size: 13px;color: <?php echo $newlabletext ?>;font-size: 13px;background: <?php echo $newlablebg ?>;top:0;}
        .newlabel span{color: <?php echo $newlabletext ?>;background: <?php echo $newlablebg ?>;}

        .pickup-cat-img .newlabel::before {content: "";top: 0;left: 0;border-bottom: 40px solid transparent;border-left: 40px solid <?php echo $newlablebg ?>;position: absolute;}
        .pickup-cat-img .newlabel span{font-size: 11px;display: block;top: 6px;transform: rotate(-45deg);left: 0px;position: absolute;z-index: 101;background: none;}

        @media screen and (max-width:768px){
            .newlabel span{font-size: .6em;}
        }
    </style>
    <?php switch ($newlablestyle) { 
        case 'vribon1': ?>
            <style>
            .post-box-contents .newlabel{top: -8px;left: 12px;padding: 10px 0 7px;width: 40px;text-align: center;border-radius: 2px 0 0 0;box-shadow: 4px 10px 25px 1px rgba(0,0,0,.3);}
            .post-box-contents .newlabel:before{position: absolute;content: '';top: 0;right: -6px;border: none;border-bottom: solid 8px #666;border-right: solid 6px transparent;}
            .post-box-contents .newlabel:after{content: '';position: absolute;left: 0;    bottom: -10px;height: 10px;width: 0;border-left: 20px solid transparent;border-right: 20px solid transparent;border-top: 10px solid <?php echo $newlablebg ?>;}
            @media screen and (max-width:768px){
                .post-box-contents .newlabel {
                    padding: 5px 0;
                    width: 30px;
                }
                .post-box-contents .newlabel:after{
                    border-left: 15px solid transparent;
                    border-right: 15px solid transparent;
                }
                .post-box-contents .newlabel{
                    left: 6px;
                }
            }
            </style>
        <?php break;
        case 'vribon2': ?>
        <style>
            .post-box-contents .newlabel {top: -8px;left: 12px;padding: 10px 0;width: 40px;color: white;border-radius: 2px 0 0 0;box-shadow: 4px 10px 25px 1px rgba(0,0,0,.3);}
            .post-box-contents .newlabel:before{position: absolute;content: '';top: 0;right: -6px;border: none;border-bottom: solid 8px #666;border-right: solid 6px transparent;}
            .post-box-contents .newlabel:after{content: '';position: absolute;left: 0;bottom: -10px;height:20px;width: 0;border-left: 20px solid <?php echo $newlablebg ?>;border-right: 20px solid <?php echo $newlablebg ?>;border-bottom: 10px solid transparent;z-index: -1;}
            @media screen and (max-width:768px){
                .post-box-contents .newlabel {
                    padding: 5px 0;
                    width: 30px;
                }
                .post-box-contents .newlabel:after{
                    border-left: 15px solid <?php echo $newlablebg ?>;
                    border-right: 15px solid <?php echo $newlablebg ?>;
                    border-bottom: 5px solid transparent;
                    bottom: -5px;
                }
                .post-box-contents .newlabel{
                    left: 6px;
                }
            }
        </style>
        <?php break;
        case 'hribon1': ?>
        <style>
            .post-box-contents .newlabel {left: 8;top: 10px;padding: 0 10px;height: 30px;line-height: 30px;letter-spacing: 0.1em;box-shadow: 1px -1px 1px rgba(5, 1,10, 0.1);}
            .post-box-contents .newlabel:before {position: absolute;content: '';top: -8px;left: -7px;border: none;height: 38px;width: 7px;background: <?php echo $newlablebg ?>;border-radius: 5px 0 0 5px;}
            .post-box-contents .newlabel:after {position: absolute;content: '';top: -7px;left: -5px;border: none;height: 7px;width: 5px;background: #666;border-radius: 5px 0 0 5px;}
            @media screen and (max-width:768px){
                .post-box-contents .newlabel {
                    top: 5px;
                    padding: 0 5px;
                    height: 20px;
                    line-height: 20px;
                }

                .post-box-contents .newlabel:before{
                    top:-4px;
                    left: -5px;
                    height: 24px;
                    width: 5px;
                }

                .post-box-contents .newlabel:after {
                    top: -3px;
                    left: -2px;
                    height: 3px;
                    width: 2px;
                }
        </style>
        <?php break;
        case 'hribon2': ?>
        <style>
        .post-box-contents .newlabel {left: -8px;top: 10px;padding: 5px 0;width: 70px;box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);}
        .post-box-contents .newlabel:after{position: absolute;content: '';z-index: 999;top: 0;bottom:0;right: -10px;width: 20px;border-width: 15px 10px 14px 0px;border-color: <?php echo $newlablebg ?> transparent <?php echo $newlablebg ?> <?php echo $newlablebg ?>;border-style: solid;}
        .post-box-contents .newlabel:before {position: absolute;content: '';top: 100%;left: 0;border: none;border-bottom: solid 8px transparent;border-right: solid 8px #666;}
        @media screen and (max-width:768px){
            .post-box-contents .newlabel{
                top: 5px;
                padding: 0px;
                width: 40px;
                left: -4px;
            }

            .post-box-contents .newlabel:after{
                border-width: 9px 10px 9px 2px;
            }
            .post-box-contents .newlabel:before{
                border-bottom: solid 4px transparent;
                border-right: solid 4px #666;
            }
        }

        </style>
        <?php break;
        case 'sribon1': ?>
        <style>
            .post-box-contents .newlabel {top: -8px;left: -8px;width: 77px;height: 80px;overflow: hidden;background: none;}
            .post-box-contents .newlabel span {white-space:nowrap;display: inline-block;position: absolute;padding: 7px 0;right: -9px;top: 17px;width: 112px;text-align: center;line-height: 10px;letter-spacing: 0.05em;-webkit-transform: rotate(-45deg);-ms-transform: rotate(-45deg);transform: rotate(-45deg);box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);}
            .post-box-contents .newlabel span:before,.post-box-contents .newlabel span:after{position: absolute;content: "";border-top: 6px solid #666;border-left: 6px solid transparent;border-right: 6px solid transparent;bottom: -6px;}
            .post-box-contents .newlabel span:before{left: 1px;}
            .post-box-contents .newlabel span:after{right: 3px;}
            @media screen and (max-width:768px){
                .post-box-contents .newlabel span{
                    line-height: 0px;
                    width: 70px;
                    top:7px;
                }
                .post-box-contents .newlabel {
                    top: -4px;
                    left: -4px;
                    width: 41px;
                }
                .post-box-contents .newlabel span:before {
                    left: 7px;
                }
                .post-box-contents .newlabel span:after {
                    right: 8px;
                }
                .post-box-contents .newlabel span:before, .post-box-contents .newlabel span:after {
                    border-top: 3px solid #666;
                    border-left: 3px solid transparent;
                    border-right: 3px solid transparent;
                    bottom: -3px;
                }
        </style>
        <?php break;
        case 'sribon2':?>
        <style>
        .post-box-contents .newlable{top:0px;}
        .post-box-contents .newlabel::before {content: "";top: 0;left: 0;border-bottom: 4em solid transparent;border-left: 4em solid <?php echo $newlablebg ?>;position: absolute;}
        .post-box-contents .newlabel span{white-space:nowrap;display: block;top: 8px;transform: rotate(-45deg);left: 2px;position: absolute;z-index: 101;background: none;}
        @media screen and (max-width:768px){
            .post-box-contents .newlabel::before{
                border-bottom: 3em solid transparent;
                border-left: 3em solid <?php echo $newlablebg ?>;
            }
            .post-box-contents .newlabel span{
                top: 7px;
                left: 1px;
            }
        }
        </style>
        <?php break;
        case 'circle':?>
        <style>
        .post-box-contents .newlabel{width: 45px;height: 45px;border-radius:50%;top:-10px;left: -12px;transform: rotate(-25deg);}
        .post-box-contents .newlabel span{white-space:nowrap;line-height: 45px;text-align: center;}
        @media screen and (max-width:768px){
            .post-box-contents .newlabel {
                width: 30px;
                height: 30px;
                top: -6px;
                left: -6px;
            }
            .post-box-contents .newlabel span{line-height: 30px;}
        }

        </style>
        <?php break;
    }
 /*****************************************************

            thumbnail hover

*****************************************************/
    $thumbnailhover = get_theme_mod('thumbnail_hover_anime','zoom'); 

    switch ($thumbnailhover) { 
        case 'zoom': ?>
        <style>
        @media screen and (min-width:560px){
            .grid_post-box:hover .grid_post_thumbnail img,
            .post-box:hover .post_thumbnail img{-webkit-transform: scale(1.2);transform: scale(1.2);}
        }
        </style>
        <?php break;
        case 'blur': ?>
        <style>
        @media screen and (min-width:560px){
            .grid_post-box:hover .grid_post_thumbnail img,
            .post-box:hover .post_thumbnail img{-webkit-filter: blur(2px);filter: blur(2px);}
        }
        </style>
        <?php break;
        case 'gray': ?>
        <style>
        @media screen and (min-width:560px){
            .grid_post-box:hover .grid_post_thumbnail img,
            .post-box:hover .post_thumbnail img{-webkit-filter: grayscale(100%);filter: grayscale(100%);
            }
        }
        </style>
        <?php break;
        case 'sepia': ?>
        <style>
        @media screen and (min-width:560px){
            .grid_post-box:hover .grid_post_thumbnail img,
            .post-box:hover .post_thumbnail img{-webkit-filter: sepia(100%);filter: sepia(100%);}
        }
        </style>
        <?php break;
        case 'opacity': ?>
        <style>
        @media screen and (min-width:560px){
            .grid_post-box:hover .grid_post_thumbnail img,
            .post-box:hover .post_thumbnail img{opacity: 0.5;}
        }
        </style>
        <?php break;
    }

/*****************************************************

            thumbnail footer

*****************************************************/
    if(get_theme_mod('diver_archive_thumb_footer',false)): ?>
        <style>
            /*.grid_post_thumbnail *,.post_thumbnail * {-webkit-transition: all 0.5s ease;transition: all 0.5s ease;}
            .grid_post_thumbnail figcaption,.post_thumbnail figcaption {position: absolute;bottom: 0;left: 0;width: 100%;z-index: 1;-webkit-transform: translateY(100%);transform: translateY(100%);background: rgba(255, 255, 255, 0.9);margin: 0;padding: 8px 10px;background: rgba(255, 255, 255, 0.9);text-align: right;}
            .grid_post_thumbnail figcaption a,.post_thumbnail figcaption a{display: inline-block;position: relative;}
            .grid_post_thumbnail figcaption img,.post_thumbnail figcaption img{width: 30px;height: 30px;margin: 0 2px;vertical-align: sub;background: none;}
            .grid_post_thumbnail figcaption img:hover,.post_thumbnail figcaption img:hover{-webkit-transform: scale(1.1);transform: scale(1.1);}
            .grid_post_thumbnail a,.post_thumbnail a {left: 0;right: 0;top: 0;bottom: 0;position: absolute;z-index: 1;}
            .post-box-contents:hover .grid_post_thumbnail img,.post-box-contents:hover .post_thumbnail img{opacity: 0.9;}
            .post-box-contents:hover .grid_post_thumbnail figcaption,.post-box-contents:hover .post_thumbnail figcaption{-webkit-transform: translateY(0);transform: translateY(0);}*/
        </style>
    <?php endif;

 /*****************************************************

            thumbnail none

*****************************************************/
    if(get_theme_mod('diver_archive_thumb',false)): ?>
        <style>
            .post_thumbnail,.grid_post_thumbnail,.pickup-cat-img,.bxslider_main img,.author-post-thumb,.post_list_wrap img,.recommend-thumb,.sticky-post-box .post_thumbnail,.diver_widget_post_list .post_list .post_list_thumb,.post_list_wrap figure{display: none !important;}
            .sticky-post-box .post-meta-all{padding:10px 20px; }
             .diver_widget_post_list .post_list .meta{margin: 0 !important;padding: 0 !important;}
             #sidebar .diver_widget_post_list .post_list.grid{height: 100px}
             #sidebar .diver_widget_post_list .post_list.grid.first:first-child{height: 80px}
             .bxslider_main .meta{height: 78px}
            .single-recommend{height: 70px;}
        </style>
    <?php endif;

 /*****************************************************

            top scroll

*****************************************************/
    $topscrollbg = get_theme_mod('top_scroll_bg', 'rgba(0,0,0,0.6)');
    $topscrollcolor = get_theme_mod('top_scroll_text','#fff'); ?>
        <style>
            #page-top a{background:<?php echo $topscrollbg ?>;color:<?php echo $topscrollcolor ?>;}
        </style>
    <?php 

 /*****************************************************

            wpp ranking

*****************************************************/
    $post_ranking_style = get_theme_mod('post_ranking_style','circle'); 
    switch ($post_ranking_style) { 
        case 'big': ?>
    <style>
        .wpp-thumbnail,.diver_popular_posts li.widget_post_list a{
            margin-left: 2em !important;
        }

        .wpp-list li:nth-child(1):before,.diver_popular_posts li.widget_post_list:nth-child(1):before {
            color: rgb(255, 218, 9);
        }
        .wpp-list li:nth-child(2):before,.diver_popular_posts li.widget_post_list:nth-child(2):before {
            color: #ccc;
        }
        .wpp-list li:nth-child(3):before,.diver_popular_posts li.widget_post_list:nth-child(3):before {
            color: rgba(255, 121, 37, 0.8);
        }
        .wpp-list li:before{
            content: counter(wpp-ranking, decimal);
            counter-increment: wpp-ranking;
        }
        .diver_popular_posts li.widget_post_list:before {
            content: counter(dpp-ranking, decimal);
            counter-increment: dpp-ranking;
        }
        .wpp-list li:before,.diver_popular_posts li.widget_post_list:before {
            line-height: 1;
            left: 8px;
            position: absolute;
            top: 50%;
            font-size: 2em;
            margin-top: -.5em;
            font-family: "Tahoma";
            font-style: italic; 
            text-shadow: 2px 2px 0px #fff;
        }
    </style>
    <?php break;
    case 'circle': ?>
        <style>
        .wpp-list li:nth-child(1):after,.diver_popular_posts li.widget_post_list:nth-child(1):after {
            background: rgb(255, 230, 88);
        }
        .wpp-list li:nth-child(2):after,.diver_popular_posts li.widget_post_list:nth-child(2):after {
            background: #ccc;
        }
        .wpp-list li:nth-child(3):after,.diver_popular_posts li.widget_post_list:nth-child(3):after {
            background: rgba(255, 121, 37, 0.8);
        }
        .wpp-list li:after{
            content: counter(wpp-ranking, decimal);
            counter-increment: wpp-ranking;
        }
        .diver_popular_posts li.widget_post_list:after {
            content: counter(dpp-ranking, decimal);
            counter-increment: dpp-ranking;
        }
        .wpp-list li:after,.diver_popular_posts li.widget_post_list:after {
            line-height: 1;
            position: absolute;
            padding: 3px 6px;
            left: 4px;
            top: 4px;
            background: #313131;
            color: #fff;
            font-size: 1em;
            border-radius: 50%;
            font-weight: bold;
            z-index: 
        }
        </style>
    <?php break;
    case 'square': ?>
        <style>
        .wpp-list li:nth-child(1):after,.diver_popular_posts li.widget_post_list:nth-child(1):after {
            background: rgb(255, 230, 88);
        }
        .wpp-list li:nth-child(2):after,.diver_popular_posts li.widget_post_list:nth-child(2):after {
            background: #ccc;
        }
        .wpp-list li:nth-child(3):after,.diver_popular_posts li.widget_post_list:nth-child(3):after {
            background: rgba(255, 121, 37, 0.8);
        }
        .wpp-list li:after{
            content: counter(wpp-ranking, decimal);
            counter-increment: wpp-ranking;
        }
        .diver_popular_posts li.widget_post_list:after {
            content: counter(dpp-ranking, decimal);
            counter-increment: dpp-ranking;
        }
        .wpp-list li:after,.diver_popular_posts li.widget_post_list:after {
            line-height: 1;
            position: absolute;
            padding: 3px 6px;
            left: 8px;
            top: 8px;
            background: #313131;
            color: #fff;
            font-size: 1em;
            font-weight: bold;
        }
        </style>
    <?php break;
    case 'triangle': 
        $backgroundwidget = get_theme_mod('background-widget','#fff');
    ?>
        <style>
        .wpp-list li:nth-child(1):after,.diver_popular_posts li.widget_post_list:nth-child(1):after {
           color:rgb(255, 230, 88);
        }
        .wpp-list li:nth-child(2):after,.diver_popular_posts li.widget_post_list:nth-child(2):after {
            color:#ccc;
        }
        .wpp-list li:nth-child(3):after,.diver_popular_posts li.widget_post_list:nth-child(3):after {
            color:rgba(255, 121, 37, 0.8);
        }
        .wpp-list li:before,.diver_popular_posts li.widget_post_list:before {
            content: "";
            top: 8px;
            left: 8px;
            border-bottom: 2em solid transparent;
            border-left: 2em solid <?php echo $backgroundwidget ?>;
            position: absolute;
            z-index: 1;
        }
        .wpp-list li:after{
            content: counter(wpp-ranking, decimal);
            counter-increment: wpp-ranking;
        }
        .diver_popular_posts li.widget_post_list:after {
            content: counter(dpp-ranking, decimal);
            counter-increment: dpp-ranking;
        }
        .wpp-list li:after,.diver_popular_posts li.widget_post_list:after {
            font-weight: bold;
            display: block;
            font-size: 1.3em;
            top: 0px;
            transform: rotate(-45deg);
            color: #333;
            left: 4px;
            width: 1em;
            text-align: center;
            position: absolute;
            z-index: 2;
        }
        </style>
    <?php break;
    }

    $design_css = ob_get_contents();
    ob_end_clean();

    echo minify_css($design_css);
 }
add_action( 'wp_footer', 'diver_design_option_css');
?>