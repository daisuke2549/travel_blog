<?php
// add_filter('embed_oembed_discover', '__return_false');
// remove_action('wp_head','rest_output_link_wp_head');
// remove_action('wp_head','wp_oembed_add_discovery_links');
// remove_action('wp_head','wp_oembed_add_host_js');
// remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result');

remove_filter('the_content', array($wp_embed, 'autoembed'), 8);
add_filter( 'the_content', array($wp_embed, 'autoembed'), 12 );

if (!function_exists('diver_custom_embed_style')){
  function diver_custom_embed_style() {
      ?>
      <style text="text/css">
      body,html{padding:0;margin:0}body{font-family:sans-serif}.wp-embed,.wp-embed-share-input{font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif}.screen-reader-text{border:0;clip:rect(1px,1px,1px,1px);-webkit-clip-path:inset(50%);clip-path:inset(50%);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px;word-wrap:normal!important}.dashicons{display:inline-block;width:20px;height:20px;background-color:transparent;background-repeat:no-repeat;background-size:20px;background-position:center;transition:background .1s ease-in;position:relative;top:5px}.dashicons-no{background-image:url("data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%20viewBox%3D%270%200%2020%2020%27%3E%3Cpath%20d%3D%27M15.55%2013.7l-2.19%202.06-3.42-3.65-3.64%203.43-2.06-2.18%203.64-3.43-3.42-3.64%202.18-2.06%203.43%203.64%203.64-3.42%202.05%202.18-3.64%203.43z%27%20fill%3D%27%23fff%27%2F%3E%3C%2Fsvg%3E")}.dashicons-admin-comments{background-image:url("data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%20viewBox%3D%270%200%2020%2020%27%3E%3Cpath%20d%3D%27M5%202h9q.82%200%201.41.59T16%204v7q0%20.82-.59%201.41T14%2013h-2l-5%205v-5H5q-.82%200-1.41-.59T3%2011V4q0-.82.59-1.41T5%202z%27%20fill%3D%27%2382878c%27%2F%3E%3C%2Fsvg%3E")}.wp-embed-comments a:hover .dashicons-admin-comments{background-image:url("data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%20viewBox%3D%270%200%2020%2020%27%3E%3Cpath%20d%3D%27M5%202h9q.82%200%201.41.59T16%204v7q0%20.82-.59%201.41T14%2013h-2l-5%205v-5H5q-.82%200-1.41-.59T3%2011V4q0-.82.59-1.41T5%202z%27%20fill%3D%27%230073aa%27%2F%3E%3C%2Fsvg%3E")}.dashicons-share{background-image:url("data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%20viewBox%3D%270%200%2020%2020%27%3E%3Cpath%20d%3D%27M14.5%2012q1.24%200%202.12.88T17.5%2015t-.88%202.12-2.12.88-2.12-.88T11.5%2015q0-.34.09-.69l-4.38-2.3Q6.32%2013%205%2013q-1.24%200-2.12-.88T2%2010t.88-2.12T5%207q1.3%200%202.21.99l4.38-2.3q-.09-.35-.09-.69%200-1.24.88-2.12T14.5%202t2.12.88T17.5%205t-.88%202.12T14.5%208q-1.3%200-2.21-.99l-4.38%202.3Q8%209.66%208%2010t-.09.69l4.38%202.3q.89-.99%202.21-.99z%27%20fill%3D%27%2382878c%27%2F%3E%3C%2Fsvg%3E");display:none}.js .dashicons-share{display:inline-block}.wp-embed-share-dialog-open:hover .dashicons-share{background-image:url("data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%20viewBox%3D%270%200%2020%2020%27%3E%3Cpath%20d%3D%27M14.5%2012q1.24%200%202.12.88T17.5%2015t-.88%202.12-2.12.88-2.12-.88T11.5%2015q0-.34.09-.69l-4.38-2.3Q6.32%2013%205%2013q-1.24%200-2.12-.88T2%2010t.88-2.12T5%207q1.3%200%202.21.99l4.38-2.3q-.09-.35-.09-.69%200-1.24.88-2.12T14.5%202t2.12.88T17.5%205t-.88%202.12T14.5%208q-1.3%200-2.21-.99l-4.38%202.3Q8%209.66%208%2010t-.09.69l4.38%202.3q.89-.99%202.21-.99z%27%20fill%3D%27%230073aa%27%2F%3E%3C%2Fsvg%3E")}.wp-embed{padding:15px;font-size:14px;font-weight:400;line-height:1.5;color:#82878c;background:#fff;border:1px solid #e5e5e5;box-shadow:0 1px 1px rgba(0,0,0,.05);overflow:auto;zoom:1;display: -webkit-flex;display:-ms-flexbox;display: flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;}.wp-embed a{color:#82878c;text-decoration:none}.wp-embed a:hover{text-decoration:underline}.wp-embed-featured-image{margin-bottom:10px;-webkit-box-ordinal-group: 1;-ms-flex-order: 1;-webkit-order: 1;order: 1;}.wp-embed-featured-image img{width:100%;height:auto;border:none}.wp-embed p{margin:0}p.wp-embed-heading{margin:0 0 10px;font-weight:600;font-size:16px;line-height:1.3;-webkit-box-ordinal-group:2;-ms-flex-order:2;-webkit-order:2;order:2;}.wp-embed-heading a{color:#32373c}.wp-embed .wp-embed-more{color:#b4b9be}.wp-embed-footer{display:table;width:100%;margin-top:10px;-webkit-box-ordinal-group:4;-ms-flex-order:4;-webkit-order:4;order:4;}.wp-embed-site-icon{vertical-align: middle;margin-right: 5px;height:25px;width:25px;border:0}.wp-embed-site-title{font-weight:600;line-height:25px}.wp-embed-site-title a{position:relative;display:inline-block;}.wp-embed-meta,.wp-embed-site-title{display:table-cell}.wp-embed-meta{text-align:right;white-space:nowrap;vertical-align:middle}.wp-embed-comments,.wp-embed-share{display:inline}.wp-embed-comments a,.wp-embed-share-tab-button{display:inline-block}.wp-embed-meta a:hover{text-decoration:none;color:#0073aa}.wp-embed-comments a{line-height:25px}.wp-embed-comments+.wp-embed-share{margin-left:10px}.wp-embed-share-dialog{position:absolute;top:0;left:0;right:0;bottom:0;background-color:#222;background-color:rgba(10,10,10,.9);color:#fff;opacity:1;transition:opacity .25s ease-in-out}.wp-embed-share-dialog.hidden{opacity:0;visibility:hidden}.wp-embed-share-dialog-close,.wp-embed-share-dialog-open{margin:-8px 0 0;padding:0;background:0 0;border:none;cursor:pointer;outline:0}.wp-embed-share-dialog-close .dashicons,.wp-embed-share-dialog-open .dashicons{padding:4px}.wp-embed-share-dialog-open .dashicons{top:8px}.wp-embed-share-dialog-close:focus .dashicons,.wp-embed-share-dialog-open:focus .dashicons{box-shadow:0 0 0 1px #5b9dd9,0 0 2px 1px rgba(30,140,190,.8);border-radius:100%}.wp-embed-share-dialog-close{position:absolute;top:20px;right:20px;font-size:22px}.wp-embed-share-dialog-close:hover{text-decoration:none}.wp-embed-share-dialog-close .dashicons{height:24px;width:24px;background-size:24px}.wp-embed-share-dialog-content{height:100%;-webkit-transform-style:preserve-3d;transform-style:preserve-3d;overflow:hidden}.wp-embed-share-dialog-text{margin-top:25px;padding:20px}.wp-embed-share-tabs{margin:0 0 20px;padding:0;list-style:none}.wp-embed-share-tab-button button{margin:0;padding:0;border:none;background:0 0;font-size:16px;line-height:1.3;color:#aaa;cursor:pointer;transition:color .1s ease-in}.wp-embed-share-tab-button [aria-selected=true],.wp-embed-share-tab-button button:hover{color:#fff}.wp-embed-share-tab-button+.wp-embed-share-tab-button{margin:0 0 0 10px;padding:0 0 0 11px;border-left:1px solid #aaa}.wp-embed-share-tab[aria-hidden=true]{display:none}p.wp-embed-share-description{margin:0;font-size:14px;line-height:1;font-style:italic;color:#aaa}.wp-embed-share-input{box-sizing:border-box;width:100%;border:none;height:28px;margin:0 0 10px;padding:0 5px;font-size:14px;font-weight:400;line-height:1.5;resize:none;cursor:text}textarea.wp-embed-share-input{height:72px}html[dir=rtl] .wp-embed-site-title a{padding-left:0;padding-right:35px}html[dir=rtl] .wp-embed-site-icon{margin-right:0;margin-left:10px;left:auto;right:0}html[dir=rtl] .wp-embed-meta{text-align:left}html[dir=rtl] .wp-embed-share{margin-left:0;margin-right:10px}html[dir=rtl] .wp-embed-share-dialog-close{right:auto;left:20px}html[dir=rtl] .wp-embed-share-tab-button+.wp-embed-share-tab-button{margin:0 10px 0 0;padding:0 11px 0 0;border-left:none;border-right:1px solid #aaa}.wp-embed-excerpt{
        -webkit-box-ordinal-group:3;-ms-flex-order:3;-webkit-order:3;order:3;font-size: 13px;}
      </style>
      <?php
      echo apply_filters('diver_custom_embed_style_filter','');
  }
  remove_action('embed_head', 'print_embed_styles');
}
add_filter('embed_head', 'diver_custom_embed_style');



function urllink($match)
{
    if (!empty($match[1])) {
        return url_to_blog_card_tag($match[1]);
    }
    return $match[0];
}

//本文中のURLをブログカードタグに変更する
function url_to_blog_card($the_content) {

    $res = preg_match_all('/^(<p>)?(<br ? \/?>)?(<a.+?>)?https?:\/\/'.preg_quote(apply_filters("url_to_blog_card_domain",get_this_site_domain()), "/").'\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+(<\/a>)?(<br ? \/?>)?(<\/p>)?/im', $the_content,$m);

    if ($res) {
      foreach ($m[0] as $match) {
        // if ( !is_p_tag_appropriate($match) ) {
        //   return;
        // }


        $tag = url_to_blog_card_tag(strip_tags($match));

        if ( !$tag ) continue;

        $the_content = preg_replace('{'.preg_quote($match).'}', '$1'.$tag , $the_content, 1);

        wp_reset_postdata();
      }
    }
  
  return $the_content;//置換後のコンテンツを返す
}
add_filter('the_content', 'url_to_blog_card',11);
add_filter('widget_text', 'url_to_blog_card', 11);
add_filter('widget_classic_text', 'url_to_blog_card', 11);
add_filter('the_category_tag_content', 'url_to_blog_card', 11);


function url_to_blog_card_tag($url) {

  if ( !$url ) return;
  $url = strip_tags($url);
  $id = url_to_postid( $url );
  if ( !$id ) return;

  $card_post = get_post($id);
  setup_postdata($card_post);
  $title = $card_post->post_title;

  $date_sort = apply_filters('diver_scgetpost_date_sort',get_theme_mod('post_sort','published'));
  $date = ($date_sort=='published')?get_post_time('Y.n.j',null, $card_post->ID,true):get_post_modified_time('Y.n.j',null, $card_post->ID,true);
  $excerpt = get_diver_excerpt($card_post->ID, 90);
  $thumbnail = get_diver_thumb_id_img($id,'midium');

  $tag = '<div class="sc_getpost"><a class="clearfix" href="'.$url.'"><div><div class="sc_getpost_thumb post-box-thumbnail__wrap">'.$thumbnail.'</div><div class="title">'.$title.'</div><div class="date">'.$date.'</div><div class="substr">'.str_replace(array("\r\n", "\r", "\n"), '',$excerpt).'</div></div></a></div>';
  return $tag;
}


function is_p_tag_appropriate($match){
  if (strpos($match,'p>') !== false){
    //pタグが含まれていた場合は開始タグと終了タグが揃っているかどうか
    if ( (strpos($match,'<p>') !== false) && (strpos($match,'</p>') !== false) ) {
      return true;
    }
    return false;
  }
  return true;
}
?>