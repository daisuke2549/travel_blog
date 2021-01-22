<?php
function size_settings($wp_customize) {
 
    $wp_customize->add_section( 'size-settings', array(
    'title'          => 'サイズ設定',
    'priority'       => 25,
    ) );

    $wp_customize->add_setting('main-max-size', array('default'=>'90%'));
    $wp_customize->add_control( 'main-max-size', array(
        'settings' => 'main-max-size',
        'label'   => 'サイト全体のサイズ',
        'description' => '大[1201px~]の横幅(default:90%)',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('main-mid-size', array('default'=>'96%'));
    $wp_customize->add_control('main-mid-size', array(
        'settings' => 'main-mid-size',
        'description' => '中[769px~1200px]の横幅(default:96%)',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('main-max-size-page', array('default'=>get_theme_mod('main-max-size','90%')));
    $wp_customize->add_control( 'main-max-size-page', array(
        'settings' => 'main-max-size-page',
        'label'   => '個別ページメインカラム',
        'description' => '大[1201px~]の横幅(default:90%)',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('main-mid-size-page', array('default'=>get_theme_mod('main-mid-size','96%')));
    $wp_customize->add_control('main-mid-size-page', array(
        'settings' => 'main-mid-size-page',
        'description' => '中[769px~1200px]の横幅(default:96%)',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('sidebar-size', array('default'=>'310px'));
    $wp_customize->add_control( 'sidebar-size', array(
        'settings' => 'sidebar-size',
        'label'   => 'サイドバー',
        'description' => 'サイドバーの横幅(default:310px)',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('archive-thumbnail-aspect', array('default'=>'0'));
    $wp_customize->add_control( 'archive-thumbnail-aspect', array(
        'settings' => 'archive-thumbnail-aspect',
        'label'   => 'サムネイル縦横比（横幅：高さ）',
        'section' => 'size-settings',
        'type'    => 'select',
        'choices'    => array(
            '0' => '選択して下さい。',
            '52.35' => '1.91:1',
            '56.25' => '16:9',
            '61.8' => '1.618:1',
            '75' => '4:3',
            '100' => '1:1',
        ),
    ));

    $wp_customize->add_setting('archive-list-postimg-max-size', array());
    $wp_customize->add_control( 'archive-list-postimg-max-size', array(
        'settings' => 'archive-list-postimg-max-size',
        'label'   => 'サムネイル画像の高さ - リスト(非推奨)',
        'description' => 'リストレイアウトは、コンテンツ(タイトル等)の高さより低く設定することはできません。<br>大[768px~]の高さ',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('archive-list-postimg-mid-size', array());
    $wp_customize->add_control('archive-list-postimg-mid-size', array(
        'settings' => 'archive-list-postimg-mid-size',
        'description' => '中[~767px](SP)の高さ',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('archive-list-postimg-min-size', array());
    $wp_customize->add_control( 'archive-list-postimg-min-size', array(
        'settings' => 'archive-list-postimg-min-size',
        'description' => '小[~599px](SP)の高さ',
        'section' => 'size-settings',
    ));


    $wp_customize->add_setting('archive-grid-postimg-max-size', array());
    $wp_customize->add_control( 'archive-grid-postimg-max-size', array(
        'settings' => 'archive-grid-postimg-max-size',
        'label'   => 'サムネイル画像の高さ - グリッド(非推奨)',
        'description' => '大[768px~]の高さ',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('archive-grid-postimg-mid-size', array());
    $wp_customize->add_control('archive-grid-postimg-mid-size', array(
        'settings' => 'archive-grid-postimg-mid-size',
        'description' => '中[~767px](SP)の高さ',
        'section' => 'size-settings',
    ));

    $wp_customize->add_setting('archive-grid-postimg-min-size', array());
    $wp_customize->add_control( 'archive-grid-postimg-min-size', array(
        'settings' => 'archive-grid-postimg-min-size',
        'description' => '小[~599px](SP)の高さ',
        'section' => 'size-settings',
    ));

}
add_action('customize_register', 'size_settings');

function diver_customize_size_css(){
    //初期サイズ
    $sidebarwidth = get_theme_mod('sidebar-size','310px');
    $mainmaxsize = get_theme_mod('main-max-size','90%');
    $mainmidsize = get_theme_mod('main-mid-size','96%');

    $archivelistimgmax = get_theme_mod('archive-list-postimg-max-size');
    $archivelistimgmid = get_theme_mod('archive-list-postimg-mid-size');
    $archivelistimgmin = get_theme_mod('archive-list-postimg-min-size');
    $archivegridimgmax = get_theme_mod('archive-grid-postimg-max-size');
    $archivegridimgmid = get_theme_mod('archive-grid-postimg-mid-size');
    $archivegridimgmin = get_theme_mod('archive-grid-postimg-min-size');

    $aspect = get_theme_mod('archive-thumbnail-aspect','0');

    ob_start();

    ?>
    <style>

        @media screen and (min-width: 1201px){
            #main-wrap,.header-wrap .header-logo,
            .header_small_content,
            .bigfooter_wrap,
            .footer_content,
            .container_top_widget,
            .container_bottom_widget{
                width: <?php echo $mainmaxsize; ?>;   
            }
        }

        @media screen and (max-width: 1200px){
           #main-wrap,.header-wrap .header-logo,
           .header_small_content,
           .bigfooter_wrap,.footer_content,
           .container_top_widget,
           .container_bottom_widget{
                width: <?php echo $mainmidsize; ?>;   
            }
        }

        @media screen and (max-width: 768px){
            #main-wrap,.header-wrap .header-logo,
            .header_small_content,
            .bigfooter_wrap,
            .footer_content,
            .container_top_widget,
            .container_bottom_widget{
                width: 100%;   
            }
        }

        @media screen and (min-width: 960px){
            #sidebar {
                width: <?php echo $sidebarwidth; ?>;
            }
        }

        <?php if($aspect ==  0 && ($archivegridimgmax || $archivelistimgmax)): ?>
            .grid_post_thumbnail .post_thumbnail_wrap::before,
            .post_thumbnail .post_thumbnail_wrap::before{
                content:none;
            }
            .grid_post_thumbnail .post_thumbnail_wrap img,
            .post_thumbnail .post_thumbnail_wrap img{
                position: relative;
            }

            .grid_post_thumbnail .post-box-thumbnail__wrap{
                height: <?php echo $archivegridimgmax; ?>;
            }

            .post_thumbnail{
                height: <?php echo $archivelistimgmax; ?>;
            }

            @media screen and (max-width: 767px){
                .grid_post_thumbnail{
                    height: <?php echo $archivegridimgmid; ?>;
                }

                .post_thumbnail{
                    height: <?php echo $archivelistimgmid; ?>;
                }
            }

            @media screen and (max-width: 599px){
                .grid_post_thumbnail{
                    height: <?php echo $archivegridimgmin; ?>;
                }

                .post_thumbnail{
                    height: <?php echo $archivelistimgmin; ?>;
                }
            }
        <?php else: if($aspect != 0):?>
            .post-box-thumbnail__wrap::before{
                padding-top: <?php echo $aspect; ?>%;
            }
        <?php endif;endif; ?>
    </style>
    <?php
    if(is_singular()){
        $pagemaxsize = get_theme_mod('main-max-size-page',get_theme_mod('main-max-size','90%'));
        $pagemidsize = get_theme_mod('main-mid-size-page',get_theme_mod('main-mid-size','96%'));
        ?>
        <style>
            @media screen and (min-width: 1201px){
                #main-wrap{
                    width: <?php echo $pagemaxsize; ?>;   
                }
            }

            @media screen and (max-width: 1200px){
               #main-wrap{
                    width: <?php echo $pagemidsize; ?>;   
                }
            }
        </style>
        <?php }

    $size_css = ob_get_contents();
    ob_end_clean();

    echo minify_css($size_css);

}
add_action( 'wp_head', 'diver_customize_size_css');
?>