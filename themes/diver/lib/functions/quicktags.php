<?php
add_action( 'admin_print_footer_scripts', 'add_diver_quicktag' );
if (!function_exists('add_diver_quicktag')){
  function add_diver_quicktag() {
        if (wp_script_is('quicktags')){
    ?>
      <script type="text/javascript">
      if (typeof QTags != 'undefined'){
          QTags.addButton('qt_table','table','<table>','</table>');
          QTags.addButton('qt_tr','tr','<tr>','</tr>');
          QTags.addButton('qt_th','th','<th>','</th>');
          QTags.addButton('qt_td','td','<td>','</td>');
          QTags.addButton('qt_dl','dl','<dl>','</dl>');
          QTags.addButton('qt_dt','dt','<dt>','</dt>');
          QTags.addButton('qt_dd','dd','<dd>','</dd>');
          QTags.addButton('qt_h2','h2','<h2>','</h2>');
          QTags.addButton('qt_h3','h3','<h3>','</h3>');
          QTags.addButton('qt_h4','h4','<h4>','</h4>');
          QTags.addButton('qt_h5','h5','<h5>','</h5>');
          QTags.addButton('qt_left','左寄せ','<p style="text-align: left;">','</p>');
          QTags.addButton('qt_right','右寄せ','<p style="text-align: right;">','</p>');
          QTags.addButton('qt_center','中央寄せ','<p style="text-align: center;">','</p>');
          QTags.addButton('qt_br','改行','<p>&nbsp;</p>','');
          QTags.addButton('qt_bq','引用','<blockquote>','</blockquote>');
          QTags.addButton('qt_nextpage','改ページ','<!--nextpage-->','');
          QTags.addButton('qt_clear','回りこみ解除','<div class="clearfix clearfloat"></div>','');
          QTags.addButton('qt_fontsize','文字サイズ','[fontsize size=""]','[/fontsize]');
          QTags.addButton('qt_fontcolor','文字色','[color color=""]','[/color]');
          QTags.addButton('qt_fontbgcolor','背景色','[bgcolor color=""]','[/bgcolor]');
          QTags.addButton('qt_strong','太字','<strong>','</strong>');
          QTags.addButton('qt_slu','打ち消し線','<s>','</s>');
          QTags.addButton('qt_marker','マーカー','<span class="sc_marker">','</span>');
          QTags.addButton('qt_marker-animation','動くマーカー','<span class="sc_marker-animation">','</span>');
          QTags.addButton('qt_aside_n','お知らせ','[aside type="normal"]','[/aside]');
          QTags.addButton('qt_aside_w','警告','[aside type="warning"]','[/aside]');
          QTags.addButton('qt_getpost','内部リンク','[getpost id=""]','');
          QTags.addButton('qt_fcebook','facebook','[facebook]','');
          QTags.addButton('qt_twitter','twitter','[twitter]','');
          QTags.addButton('qt_instagram','instagram','[instagram]','');
          QTags.addButton('qt_googleplus','google+','[googleplus]','');
          QTags.addButton('qt_article','新着記事リスト','[article num="5"]','');
      }
      </script>
  <?php
    }
      $gad_client = get_option( 'diver_option_base_ad_client' );
      $gad_slot = get_option( 'diver_option_base_ad_slot' );

      if($gad_client&&$gad_slot){ ?>
          <script type="text/javascript">
          if (typeof QTags != 'undefined'){
              QTags.addButton('qt_dgad','Adsence','[dgad]','');
          }
          </script>
      <?php }
  }
}

function default_quicktags($qtInit) {
    $qtInit['buttons'] = 'link,img,ul,ol,li';
    return $qtInit;
}
add_filter('quicktags_settings', 'default_quicktags', 10, 1);

function tinymce_backcolor_buttons($buttons){
    array_push($buttons, 'backcolor');
    return $buttons;
}
add_filter("mce_buttons_2", "tinymce_backcolor_buttons");

function tinymce_fontsizeselect_buttons($buttons) {
    array_unshift($buttons, 'fontsizeselect');
    return $buttons;
}
add_filter('mce_buttons_2','tinymce_fontsizeselect_buttons');

function remove_tinymce_buttons( $buttons ) {
  $remove = array('bold', 'italic','blockquote'); // ここに削除したいものを記述
  return array_diff($buttons, $remove);
}
add_filter( 'mce_buttons', 'remove_tinymce_buttons' );

function mce_external_plugins_table($plugins) {
    $plugins['table'] = '//cdn.tinymce.com/4/plugins/table/plugin.min.js';
    return $plugins;
}
add_filter( 'mce_external_plugins', 'mce_external_plugins_table' );

function mce_buttons_table($buttons) {
    $buttons[] = 'table';
    return $buttons;
}
add_filter( 'mce_buttons', 'mce_buttons_table' );

if ( !function_exists( 'diver_initialize_tinymce_styles' ) ):
function diver_initialize_tinymce_styles($init_array) {
  //追加するスタイルの配列を作成
  $style_formats = array(
    array(
      'title' => 'バッジ',
      'inline' => 'span',
      'classes' => 'badge'
    ),
    array(
      'title' => 'マーカー（黄）',
      'inline' => 'span',
      'classes' => 'sc_marker y'
    ),
    array(
      'title' => 'マーカー（赤）',
      'inline' => 'span',
      'classes' => 'sc_marker red'
      ),
    array(
      'title' => 'マーカー（青）',
      'inline' => 'span',
      'classes' => 'sc_marker blue'
      ),
    array(
      'title' => '動くマーカー（黄）',
      'inline' => 'span',
      'classes' => 'sc_marker-animation y'
    ),
    array(
      'title' => '動くマーカー（赤）',
      'inline' => 'span',
      'classes' => 'sc_marker-animation red'
      ),
    array(
      'title' => '動くマーカー（青）',
      'inline' => 'span',
      'classes' => 'sc_marker-animation blue'
      ),
    array(
      'title' => '回り込み解除',
      'block' => 'div',
      'classes' => 'clearfix clearfloat'
      ),

  );
  $init_array['style_formats'] = json_encode($style_formats);
  return $init_array;
}
endif;
add_filter('tiny_mce_before_init', 'diver_initialize_tinymce_styles', 10000);
 
//TinyMCEにスタイルセレクトボックスを追加
if ( !function_exists( 'diver_add_styles_to_tinymce_buttons' ) ):
function diver_add_styles_to_tinymce_buttons($buttons) {
  $temp = array_shift($buttons);
  array_unshift($buttons, 'styleselect');
  array_unshift($buttons, $temp);
  return $buttons;
}
endif;
add_filter('mce_buttons_2','diver_add_styles_to_tinymce_buttons');

function myplugin_tinymce_buttons($buttons){
      unset($buttons);
      $buttons = array('fontsizeselect','styleselect','forecolor','backcolor','bold','italic','underline','strikethrough','undo','redo');
      return $buttons;
 }
add_filter('mce_buttons_2','myplugin_tinymce_buttons');
