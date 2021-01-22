<?php
register_sidebar( array(
     'name' => 'メインサイドバー',
     'id' => 'sidebar-1',
     'description' => 'サイドバーのウィジットエリアです。',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
     'before_title' => '<div class="widgettitle">',
     'after_title' => '</div>'
) );

register_sidebar(array(
     'name' => '追従サイドバー' ,
     'id' => 'fix_sidebar' ,
     'description' => 'ここに設定した項目は、スクロールに追従して表示されます。規約違反にならないよう注意してご利用してください。',
     'before_widget' => '<div id="%1$s" class="widget fix_sidebar %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<div class="widgettitle">',
     'after_title' => '</div>',
));

register_sidebar(array(
     'name' => 'メインエリア上部' ,
     'id' => 'container-top' ,
     'description' => 'メインエリア上部に表示されます。',
     'before_widget' => '<div id="%1$s" class="widget containertop-widget containerwidget %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<div class="wrap-post-title">',
     'after_title' => '</div>'
));

register_sidebar(array(
     'name' => 'メインエリア下部' ,
     'id' => 'container-bottom' ,
     'description' => 'メインエリア下部に表示されます。',
     'before_widget' => '<div id="%1$s" class="widget containerbottom-widget containerwidget %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<div class="wrap-post-title">',
     'after_title' => '</div>'
));

register_sidebar(array(
     'name' => 'トップページ上部' ,
     'id' => 'main-top' ,
     'description' => 'トップページ上部に表示されます。',
     'before_widget' => '<div id="%1$s" class="widget maintop-widget mainwidget %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<div class="wrap-post-title">',
     'after_title' => '</div>'
));

register_sidebar(array(
     'name' => 'トップページ下部' ,
     'id' => 'main-bottom' ,
     'description' => 'トップページ下部に表示されます。',
     'before_widget' => '<div id="%1$s" class="widget mainbottom-widget mainwidget %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<div class="wrap-post-title">',
     'after_title' => '</div>'
));

register_sidebar(array(
     'name' => '投稿ページ上部' ,
     'id' => 'single-top-widget' ,
     'description' => '投稿ページ上部に表示されます。',
     'before_widget' => '<div id="%1$s" class="widget singletop-widget mainwidget %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<div class="wrap-post-title">',
     'after_title' => '</div>'
));

register_sidebar(array(
     'name' => '投稿内上部' ,
     'id' => 'single-top' ,
     'description' => '投稿ページコンテンツ内のアイキャッチ画像SNS下に表示されます。',
     'before_widget' => '<div id="%1$s" class="widget single-top %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<div class="widgettitle">',
     'after_title' => '</div>'
));

register_sidebar(array(
     'name' => 'PC : 投稿内下部' ,
     'id' => 'single-pcad' ,
     'description' => '記事コンテンツ直下に配置できます。※スマホでは表示されません。',
     'before_widget' => '<div id="%1$s" class="widget %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<div class="widgettitle">',
     'after_title' => '</div>'
));

register_sidebar(array(
     'name' => 'SP : 投稿内下部' ,
     'id' => 'single-spad' ,
     'description' => '記事コンテンツ直下に配置できます。※パソコンでは表示されません。',
     'before_widget' => '<div id="%1$s" class="widget %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<div class="widgettitle">',
     'after_title' => '</div>'
));

register_sidebar(array(
     'name' => 'h2直前ウィジェット' ,
     'id' => 'widget-h2' ,
     'description' => '最初のh2の直前に表示されます。',
     'before_widget' => '<div id="%1$s" class="widget widget-h2 %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<div class="widgettitle">',
     'after_title' => '</div>'
));

register_sidebar(array(
     'name' => 'ループの途中' ,
     'id' => 'in_loop' ,
     'before_widget' => '<div id="%1$s" class="in_loop widget %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<div class="widgettitle">',
     'after_title' => '</div>'
));

register_sidebar(array(
     'name' => '関連記事エリア' ,
     'id' => 'single-related-area' ,
     'description' => '投稿ページ下部の関連コンテンツ直下に配置できます。アドセンスの関連コンテンツユニット等配置してください。',
     'before_widget' => '<div id="%1$s" class="widget single-related-area %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<div class="single_title">',
     'after_title' => '</div>'
));

register_sidebar(array(
     'name' => 'おすすめ記事エリア' ,
     'id' => 'single-recommend-area' ,
     'description' => '投稿ページ最下部のおすすめ記事直下に配置できます。',
     'before_widget' => '<div id="%1$s" class="widget single-recommend-area %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<div class="single_title">',
     'after_title' => '</div>'
));

register_sidebar(array(
     'name' => 'ビッグフッター(左)' ,
     'description' => 'カラム数を非表示に設定している場合は表示されません。(カスタマイズ > メイン設定 > フッター設定 > ビッグフッターカラム数)',
     'id' => 'bigfooter_left' ,
     'before_widget' => '<div id="%1$s" class="widget bigfooter_col %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<div class="footer_title">',
     'after_title' => '</div>'
));

register_sidebar(array(
     'name' => 'ビッグフッター(中左)' ,
     'id' => 'bigfooter_center1' ,
     'before_widget' => '<div id="%1$s" class="widget bigfooter_col %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<div class="footer_title">',
     'after_title' => '</div>'
));

register_sidebar(array(
     'name' => 'ビッグフッター(中右)' ,
     'description' => 'カラム数を３カラム、もしくは非表示に設定している場合は表示されません。(カスタマイズ > メイン設定 > フッター設定 > ビッグフッターカラム数)',
     'id' => 'bigfooter_center2' ,
     'before_widget' => '<div id="%1$s" class="widget bigfooter_col %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<div class="footer_title">',
     'after_title' => '</div>'
));

register_sidebar(array(
     'name' => 'ビッグフッター(右)' ,
     'description' => 'カラム数を非表示に設定している場合は表示されません。(カスタマイズ > メイン設定 > フッター設定 > ビッグフッターカラム数)',
     'id' => 'bigfooter_right' ,
     'before_widget' => '<div id="%1$s" class="widget bigfooter_col %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<div class="footer_title">',
     'after_title' => '</div>'
));

register_sidebar(array(
     'name' => 'ヘッダーロゴの右' ,
     'id' => 'nav_inleft' ,
     'description' => 'メインメニューの表示を\"独立\"に設定すると表示されます。電話番号や、ボタンを設定してください。',
     'before_widget' => '<div id="%1$s" class="nav_inleft %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<div>',
     'after_title' => '</div>'
));

register_sidebar(array(
     'name' => 'ドロワーメニュー' ,
     'description' => 'スマホ表示時にスライドして現れるメニューのコンテンツ【独立メニュー設定時かつヘッダーボタンを設定されていない場合に表示されます。】',
     'id' => 'drawer_widget' ,
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
     'before_title' => '<div class="drawer_content_title">',
     'after_title' => '</div>'
));

register_sidebar(array(
     'name' => '検索ボックス' ,
     'description' => 'スマホ表示時に表示する検索ボックス',
     'id' => 'searchbox_widget' ,
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
     'before_title' => '<div class="searchbox_content_title">',
     'after_title' => '</div>'
));

// tab widget

$i = 1;
while($i <= get_option( 'diver_option_base_tabwidget','1')){
     register_sidebar(array(
          'name' => 'タブウィジェットエリア - '.$i ,
          'description' => '',
                    'id' => 'diver_tabwidget_'.$i ,
          'before_widget' => '<div id="%1$s" class="d_tab_tab">',
          'after_widget' => '</div>',
          'before_title' => '<div class="d_tab_title">',
          'after_title' => '</div>'
     ));
     $i++; 
}