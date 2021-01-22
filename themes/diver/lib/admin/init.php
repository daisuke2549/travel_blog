<?php
// ログイン画面
if (!function_exists('custom_login_logo')){
function custom_login_logo() { ?>
  <style>
    .login #login h1 a {
      background: url(<?php echo get_template_directory_uri(); ?>/images/logo.png) no-repeat;
      width: auto;
      background-position: center;
      background-size: contain;
    }
  </style>
<?php }
}
add_action( 'login_enqueue_scripts', 'custom_login_logo' );

if (!function_exists('custom_login_logo_url')){
  function custom_login_logo_url() {
    return 'https://tan-taka.com/diver';
  }
}
add_filter( 'login_headerurl', 'custom_login_logo_url' );


// 投稿画面の項目を非表示にする
function remove_default_post_screen_metaboxes() {
 if (!current_user_can('level_10')) { // level10以下のユーザーの場合メニューをremoveする
 remove_meta_box( 'postcustom','post','normal' ); // カスタムフィールド
 remove_meta_box( 'postexcerpt','post','normal' ); // 抜粋
 // remove_meta_box( 'commentstatusdiv','post','normal' ); // ディスカッション
 remove_meta_box( 'commentsdiv','post','normal' ); // コメント
 remove_meta_box( 'trackbacksdiv','post','normal' ); // トラックバック
 remove_meta_box( 'authordiv','post','normal' ); // 作成者
 //remove_meta_box( 'slugdiv','post','normal' ); // スラッグ
 remove_meta_box( 'revisionsdiv','post','normal' ); // リビジョン
 }
 }
add_action('admin_menu','remove_default_post_screen_metaboxes');

add_filter('https_ssl_verify', '__return_false');
add_filter('https_local_ssl_verify', '__return_false');

//update
require get_template_directory().'/lib/assets/theme-update-checker.php';
$example_update_checker = new ThemeUpdateChecker('diver','https://tan-taka.com/wp_diver/theme-update/update-info.json');

if (!function_exists('custom_admin_footer')){
function custom_admin_footer() {
    echo apply_filters('orig_admin_footer','<a href="https://tan-taka.com/diver/contact/">DIVER お問い合わせ</a>');
}
}
add_filter('admin_footer_text', 'custom_admin_footer');


add_filter('got_rewrite','__return_true');

if (!function_exists('set_head_analytics_tags')){
  function set_head_analytics_tags(){

    $type = get_option('diver_option_analytics_type','analytics');
    $gaid = get_option( 'diver_option_base_gaid',get_theme_mod( 'diver_analytics_id',''));
    $gtag = get_option( 'diver_option_base_gtag');

    if(!(get_option('diver_option_base_gaid_admin',0)==1&&(current_user_can('administrator')||current_user_can('editor')||current_user_can('author')||current_user_can('Contributor')))){

      if($type=='analytics' && $gaid){ ?>
      <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create',<?php echo json_encode($gaid); ?>,'auto');ga('send','pageview');</script>
      <?php }elseif($type=='gtag' && $gtag){ ?>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $gtag; ?>"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', <?php echo json_encode($gtag); ?>);
      </script>
      <?php }

    }
  }
}
add_action( 'wp_head', 'set_head_analytics_tags');

if (!function_exists('set_head_custom_tags')){
  function set_head_custom_tags(){
    $gawm = get_option( 'diver_option_base_gawm' );
    if($gawm): ?>
    <meta name="google-site-verification" content="<?php echo $gawm ?>" />
    <?php endif;

    if(is_singular()){
      global $post;
      if($post){
      echo do_shortcode(get_post_meta($post->ID,'head_innner_content',true)); 
      }
    }

    echo do_shortcode(get_option('diver_option_base_ana_head',get_theme_mod('diver_access_tag_head')));
  }
}
add_action( 'wp_head', 'set_head_custom_tags');
