<?php
// function run_shortcode_before( $content ) {
//   global $shortcode_tags;
//   $orig_shortcode_tags = $shortcode_tags;  // 現在のショートコードの登録情報をすべてバックアップ
//   remove_all_shortcodes();  // 現在のショートコードの登録情報を一時的にすべて削除
//   add_shortcode('colwrap', 'colwrap' );  // フィルターの前に実行するショートコードを登録
//   $content = do_shortcode( $content );  // 登録したショートコードの実行
//   $shortcode_tags = $orig_shortcode_tags;  // バックアップしておいたショートコードの登録情報を復元
//   return $content;
// }
// add_filter( 'the_content', 'run_shortcode_before', 7 );

// Column shortcord
function colwrap( $atts, $content = null ) {
        $content = do_shortcode($content);
    return '<div class="row">'.$content.'</div>';
}
add_shortcode('colwrap', 'colwrap');

// 1/2
function col2( $atts, $content = null ) {
    $content = do_shortcode($content);
    return '<div class="col2">' . $content . '</div>';
}
add_shortcode('col2', 'col2');

// 1/2 sp
function col2_sp( $atts, $content = null ) {
    $content = do_shortcode($content);
    return '<div class="col2 col2_sp">' . $content . '</div>';
}
add_shortcode('col2_sp', 'col2_sp');

// 1/3
function col3( $atts, $content = null ) {
    $content = do_shortcode($content);
    return '<div class="col3">' . $content . '</div>';
}
add_shortcode('col3', 'col3');

// 2/3
function col3_2( $atts, $content = null ) {
    $content = do_shortcode($content);
    return '<div class="col3_2">' . $content . '</div>';
}
add_shortcode('col3_2', 'col3_2');

// 1/4
function col4( $atts, $content = null ) {
    $content = do_shortcode($content);
    return '<div class="col4">' . $content . '</div>';
}
add_shortcode('col4', 'col4');

// 3/4
function col4_3( $atts, $content = null ) {
    $content = do_shortcode($content);
    return '<div class="col4_3">' . $content . '</div>';
}
add_shortcode('col4_3', 'col4_3');

// clear
function columnclear() {
    return '<div class="clearfix clearfloat"></div>';
}
add_shortcode('clear', 'columnclear');

// border
function border($atts, $content = null ) {
    extract(shortcode_atts(array(
        'color' => '#ccc',
        'height' => '2'
    ), $atts));
    return '<div class="border" style="background:'.$color.';height:'.$height.'px"></div>';
}
add_shortcode('border', 'border');

// aside
function aside($atts, $content = null) {
    $content = do_shortcode($content);
    extract(shortcode_atts(array(
        'type' => 'normal',
    ), $atts));
    if($type == 'normal'){
        $icon = 'fa fa-comments-o';
    }else if($type == 'warning'){
        $icon = 'fa fa-exclamation-triangle';
    }
    return '<div class="aside-'.$type.'"><span><i class="'.$icon.'" aria-hidden="true"></i></span>　'. $content .'</div>';
}
add_shortcode('aside', 'aside');

//button
function button($atts, $content = null) {
    extract(shortcode_atts(array(
        'type' => '',
        'url' => '',
        'color' => '',
        'target' => ''
    ), $atts));
    preg_match("|<a href=\"(.*?)\".*?>(.*?)</a>|mis",$content,$matches);
    if($matches){
        $url = $matches[1];
        $content = $matches[2];
    }

    if($target){
        $target = 'target="'.$target.'"';
    }
    return '<div class="button '.$type.'"><a href="'.$url.'" '.$target.' style="background:'.$color.';color:#fff;" >'.$content.'</a></div>';
}
add_shortcode('btn', 'button');


// voice
function voice($atts, $content = null ) {
    extract(shortcode_atts(array(
        'type' => 'left',
        'icon' => '',
        'name' => '',
        'color' => ''
    ), $atts));
    $type = ($type == 'l')?'left':$type;
    $type = ($type == 'r')?'right':$type;

    return '<div class="voice clearfix '.$type.'"><div class="icon"><img src="'.$icon.'"><div class="name">'.$name.'</div></div><div class="text sc_balloon '.$type.' '.$color.'">' . $content . '</div></div>';
}
add_shortcode('voice', 'voice');


// SNS
function facebook($atts) {
  $fb_url = get_option('diver_sns_facebook_url',get_theme_mod('facebook_profile'));
  extract(shortcode_atts(array(
        'type' => 'color',
    ), $atts));
    return '<div class="sc_facebook sc_sns '.$type.'"><a href="'.$fb_url.'"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></a></div>';
}
add_shortcode('facebook', 'facebook');

function twitter($atts) {
  $tw_url = get_option('diver_sns_twitter_url',get_theme_mod('twitter_url'));
   extract(shortcode_atts(array(
        'type' => 'color',
    ), $atts));
    return '<div class="sc_twitter sc_sns '.$type.'"><a href="'.$tw_url.'"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></a></div>';
}
add_shortcode('twitter', 'twitter');


function instagram($atts) {
  $insta_url = get_option('diver_sns_instagram_url',get_theme_mod('instagram_url'));
  extract(shortcode_atts(array(
        'type' => 'color',
    ), $atts));
    return '<div class="sc_instagram sc_sns '.$type.'"><a href="'.$insta_url.'"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></a></div>';
}
add_shortcode('instagram', 'instagram');

function googleplus($atts) {
  $googleplus_url = get_theme_mod('googleplus_url');
  extract(shortcode_atts(array(
        'type' => 'color',
    ), $atts));
    return '<div class="sc_googleplus sc_sns '.$type.'"><a href="'.$googleplus_url.'"><i class="fa fa-google-plus fa-fw" aria-hidden="true"></i></a></div>';
}
add_shortcode('googleplus', 'googleplus');

// balloon
function balloon($atts, $content = null) {
    $content = do_shortcode($content);
    extract(shortcode_atts(array(
        'type' => 'left',
    ), $atts));
    return '<div class="sc_balloon '.$type.'">'. $content .'</div>';
}
add_shortcode('balloon', 'balloon');


// badge
function badge($atts) {
    extract(shortcode_atts(array(
        'name' => '参考',
        'color' => '#333'
    ), $atts));

    return '<span class="badge" style="background:'.$color.'">'.$name.'</span>';
}
add_shortcode('badge', 'badge');

// blockquote
function blockquote($atts, $content = null) {
    $content = do_shortcode($content);
    extract(shortcode_atts(array(
        'url' => '',
        'title' => '',
    ), $atts));
    return '<blockquote>'. $content .'<div class="blockquote_ref"><div><a href="'.$url.'" target="_blank">'.$title.'</a></div></div></blockquote>';
}
add_shortcode('bq', 'blockquote');

// marker
function marker($atts, $content = null) {
    $content = do_shortcode($content);
    extract(shortcode_atts(array(
        'color' => '#ffff66',
    ), $atts));
    return '<span class="sc_marker" style="background: linear-gradient(transparent 50%, '.$color.' 50%);">'. $content .'</span>';
}
add_shortcode('marker', 'marker');

// fontsize
function fontsize($atts, $content = null) {
    $content = do_shortcode($content);
    extract(shortcode_atts(array(
        'size' => '4',
    ), $atts));
    return '<span class="fontsize '.$size.'">'. $content .'</span>';
}
add_shortcode('fontsize', 'fontsize');

// color
function color($atts, $content = null) {
    $content = do_shortcode($content);
    extract(shortcode_atts(array(
        'color' => '#ff3333',
    ), $atts));
    return '<span class="fontcolor" style="color:'.$color.';">'. $content .'</span>';
}
add_shortcode('color', 'color');

// bgcolor
function bgcolor($atts, $content = null) {
    $content = do_shortcode($content);
    extract(shortcode_atts(array(
        'color' => '#eee',
    ), $atts));
    return '<span class="fontbackground" style="background:'.$color.';">'. $content .'</span>';
}
add_shortcode('bgcolor', 'bgcolor');

function getpost( $atts ) {
    $retHTML='';
    extract( shortcode_atts( array(
        'id'     => '',
        'title' => '',
        'target' => ''
    ), $atts ) ); 

    $image = get_diver_thumb_id_img($id,apply_filters('diver_scgetpost_thumb_img_size','thumbnail'));
    $post = get_post($id);
    if($post){
	    $post->post_content;

        $target_ = ($target)?' target="'.$target.'"':'';

	    $retHTML.= '<div class="sc_getpost">';
	    $retHTML.= '<a class="clearfix" href="'.get_permalink($id).'" '.$target_.'>';
        if($image){
    	    $retHTML.= '<div class="sc_getpost_thumb post-box-thumbnail__wrap">'.$image.'</div>';
        }
        if($title){
            $retHTML .= '<div class="title"><span class="badge">'.$title.'</span>'.esc_html(get_the_title($id)).'</div>';
        }else{
            $retHTML.= '<div class="title">'.esc_html(get_the_title($id)).'</div>';
        }
        $date_sort = apply_filters('diver_scgetpost_date_sort',get_theme_mod('post_sort','published'));
        $date = ($date_sort=='published')?get_post_time('Y.n.j',null, $post->ID,true):get_post_modified_time('Y.n.j',null, $post->ID,true);
	    $retHTML.= '<div class="date">'.$date.'</div>';
	    $retHTML.= '<div class="substr">'.get_diver_excerpt($id,150). '</div>';
	    $retHTML.= '</a></div>';

        wp_reset_postdata();

	    return $retHTML ;
    }
}
add_shortcode('getpost', 'getpost');

// slidetoggle
function toggle($atts, $content = null) {
    $content = do_shortcode($content);
    extract(shortcode_atts(array(
        'title' => '',
    ), $atts));
    return '<div class="sc_toggle_box"><div class="sc_toggle_title">'.$title.'</div><div class="sc_toggle_content">'. $content .'</div></div>';
}
add_shortcode('toggle', 'toggle');

// barchart
function barchart($atts, $content = null) {
    $content = do_shortcode($content);
    extract(shortcode_atts(array(
        'width' => '',
        'color' => '',
    ), $atts));
    return '<span class="barchart" style="width:'.$width.';background:'.$color.';">'. $content .'</span>';
}
add_shortcode('barchart', 'barchart');

// star
function review_star($atts) {
    extract(shortcode_atts(array(
        'score' => '',
        'size' => '',
    ), $atts));
    $width = '180';
    $height = '33';
    $scorewidth = '36';
    if($size=='big'){
        $height = '51';
        $width = '280';
        $scorewidth = '56';
    }elseif($size=='small'){
        $height = '22';
        $width = '120';
        $scorewidth = '24';
    }

    if($score){
        $score = ($score<=5&&$score>=0) ? $score*$scorewidth : 5 ;
    }

    return '<div class="review_star" style="background-size:'.$width.'px;height:'.$height.'px;width:'.$width.'px"><div class="star" style="width:'.$score.'px;background-size:'.$width.'px;height:'.$height.'px;"></div></div>';
}
add_shortcode('star', 'review_star');

//getArticle
function getArticle($atts, $content = null) {
    extract(shortcode_atts(array(
      "num" => '5',
      "height" => 'auto',
      "category" => '',
      "cat_name" => '0',
      "date" => '0',
      "type" =>  '',
      "orderby" => 'post_date',
      "order" => 'DESC',
      "tag" => '',
      "img" => '1',
      "author" => '0',
      "layout" => 'simple',
      "id" => '',
      "rank" => '',
      'target' => ''
    ), $atts));
    
    // 処理中のpost変数をoldpost変数に退避
    global $post;
    $oldpost = $post;

    $myposts = "";


    if($id){
        $myposts = explode(",", $id);
    }else if($rank){
        $myposts = diver_posts_views_ranking($num,"",$rank);
        $rank = "rank";
    }else{
        $args = array(
        'numberposts' => $num,
        'order' => $order,
        'orderby' => $orderby,
        'category' => $category,
        'tag' => $tag,
        'post_type' => apply_filters('diver_getArticle_post_type','post')
        );
    
        // 記事データ取得
        $myposts = get_posts($args);
    }

    if($myposts) {
        $retHtml = '<ul class="sc_article '.$type.' '.$layout.' '.$rank.'" style="height:'.$height.';">';
        $count = 0;

        foreach($myposts as $postid => $post):

            if($id){
                $post = get_post($post); 
            }else if($rank){
                $post = get_post($postid); 
            }
            setup_postdata($post);

            if($post){

                if($layout=="grid"||$layout=="list"){

                    $target_ = ($target)?' target="'.$target.'"':'';

                    $retHtml .= '<a class="clearfix" href="' . get_permalink() . '" '.$target_ .'><li>';

                    if($img){
                        $retHtml .= '<figure class="post_list_thumb post-box-thumbnail__wrap">';
                        $retHtml .= get_diver_thumb_id_img($post->ID,apply_filters('diver_widget_scArticle_post_thumb','medium'));
                            if($cat_name){
                                $cat = get_the_category($post->ID);
                                $cat = $cat[0];
                                $retHtml.= '<span style="background:'.get_theme_mod($cat->slug).'" class="sc_article_cat">'.$cat->cat_name.'</span>';
                            }
                        $retHtml.= '</figure>';
                    }

                    $retHtml.= '<div class="meta">';

                    $retHtml.= '<div class="sc_article_title">' . the_title("","",false) . '</div>';

                    if($date){
                        $retHtml .= '<div class="sc_article_date">';
                        $retHtml .= get_the_time(get_option( 'date_format' ));
                        $retHtml .= '</div>';
                    }

                    // if($author){
                    //     $author_id = get_post_field( 'post_author', $post->ID );
  
                    //     $retHtml .= '<div class="sc_article_author">';
                    //     $retHtml .= '<span class="post-author-thum">'.get_avatar($author_id, 30).'</span>';
                    //     $retHtml .= "<span class='post-author-name'>".get_the_author_meta('display_name',$author_id )."</span>";
                    //     $retHtml .= '</div>';
                    // }

                    $retHtml.= '</div>';

                    $retHtml.= '</li></a>';

                }else{

                    $retHtml .= '<li class="clearfix">';

                    if($date){
                        $retHtml .= '<div class="sc_article_date">';
                        $retHtml .= get_the_time(get_option( 'date_format' ));
                        $retHtml.= '</div>';
                    }

                    if($cat_name){
                        $cat = get_the_category($post->ID);
                        $cat = $cat[0];
                        $retHtml.= '<a href="'.get_category_link($cat->cat_ID).'" rel="category tag" style="background:'.get_theme_mod($cat->slug).'" class="sc_article_cat">'.$cat->cat_name.'</a>';
                    }

                    $retHtml.= '<div class="sc_article_title">';
                    $retHtml.= '<a href="' . get_permalink() . '" target="'.$target.'">' . the_title("","",false) . '</a>';

                    $retHtml.= '</div>';

                    $retHtml.= '</li>';

                }

                if($rank){
                  $count++;
                  if($num <= $count){break;} 
                }
            }

        endforeach;wp_reset_postdata();
        
        $retHtml.= '</ul>';
    } else {
        // 記事がない場合↓
        $retHtml='<p>記事がありません。</p>';
    }
    

    // oldpost変数をpost変数に戻す
    $post = $oldpost;
    
    return $retHtml;
}
// 呼び出しの指定
add_shortcode("article", "getArticle");

//Diver Rank
function diver_af_ranking($atts, $content = null) {
    $content = do_shortcode($content);
    extract(shortcode_atts(array(
        'rank' => '',
        'star' => '',
        'title' => '',
        'minihead' => '',
        'desc' => '',
        'buy_link' => '',
        'buy_txt' => '',
        'more_link' => '',
        'more_txt' => '',
        'rem' => '',
        'src' => ''
    ), $atts));

    $starheight = '14';
    $starwidth = '80';
    $scorewidth = '16';
    if($star){$score = ($star<=5&&$star>=0) ? $star*$scorewidth : 5 ;}


    $html = '<div class="diver_af_ranking_wrap"><div class="diver_af_ranking">';

    $html .= '<div class="rank_h '.$rank.'"><div class="rank_title">'.$title;

    if($star!=0){
        $html .= '<div class="review_star" style="background-size:'.$starwidth.'px;height:'.$starheight.'px;width:'.$starwidth.'px">
                        <div class="star" style="width:'.$score.'px;background-size:'.$starwidth.'px;height:'.$starheight.'px;"></div>
                </div>';
    }

    $html .= '</div></div><div class="rank_desc_wrap clearfix">';

    if(!empty($src)){
        $html .= '<div class="rank_img"><img src="'.$src.'"></div>';
        $html .= '<div class="rank_desc">';
    }else{
        $html .= '<div class="rank_desc" style="margin:0;padding:0">';
    }


    if(!empty($minihead)){
        $html .= '<div class="rank_minih">'.$minihead.'</div>';
    }
    if(!empty($desc)){
        $html .= '<div class="desc">'.$desc.'</div>';
    }
    $html .= '</div></div></div>';

    if(!empty($rem)){
        $html .= '<div class="rank_rem">'.$rem.'</div>';
    }
    $html .= '<div class="rank_btn_wrap row">';
    if(!empty($buy_link)){
        if(!empty($more_link)){
            $html .= '<div class="rank_buy_link"><a href="'.$buy_link.'" target="_blank">'.$buy_txt.'</a></div>';
        }else{
            $html .= '<div class="rank_buy_link" style="width:100%"><a href="'.$buy_link.'" target="_blank">'.$buy_txt.'</a></div>';
        }
    }
    if(!empty($more_link)){
        if(!empty($buy_link)){
            $html .= '<div class="rank_more_link"><a href="'.$more_link.'" target="_blank">'.$more_txt.'</a></div>';
        }else{
            $html .= '<div class="rank_more_link" style="width:100%"><a href="'.$more_link.'" target="_blank">'.$more_txt.'</a></div>';
        }
    }
    $html .= '</div></div>';
    
    return $html;
}
add_shortcode('diver_af_rank', 'diver_af_ranking');

//Diver voice
function diver_voice($atts, $content = null) {
    $content = do_shortcode($content);
    extract(shortcode_atts(array(
        'star' => '',
        'title' => '',
        'name' => '',
        'src' => ''
    ), $atts));

    $starheight = '14';
    $starwidth = '80';
    $scorewidth = '16';
    if($star){$score = ($star<=5&&$star>=0) ? $star*$scorewidth : 5 ;}

    $html = '<div class="diver_voice_wrap clearfix">';

    if(!empty($src)){
        $html .= '<img src="'.$src.'" class="diver_voice_icon">';
        $html .= '<div class="diver_voice">';
    }else{
        $html .= '<div class="diver_voice" style="width:100%">';
    }


    $html .= '<div class="diver_voice_title">'.$title;
    
    if($star!=0){
        $html .= '<div class="review_star" style="background-size:'.$starwidth.'px;height:'.$starheight.'px;width:'.$starwidth.'px">
                        <div class="star" style="width:'.$score.'px;background-size:'.$starwidth.'px;height:'.$starheight.'px;"></div>
                </div>';
    }

    $html .= '</div>';

    if(!empty($content)){
        $html .= '<div class="diver_voice_content">'.$content.'</div>';
    }

    if(!empty($name)){
        $html .= '<div class="diver_voice_name">'.$name.'</div>';
    }

    $html .= '</div></div>';
    
    return $html;
}
add_shortcode('diver_voice', 'diver_voice');

//Diver relpost
function diver_relpost($atts, $content = null) {
    $content = do_shortcode($content);
    extract(shortcode_atts(array(
        'id' => '',
        'title' => ''
    ), $atts));

    $html = '<div class="editer_diver_kiji">';
    if(!empty($title)){
        $html .= '<div class="editer_diver_kiji_title">'.$title.'</div>';
    }
    $html .= '<ul class="diver_rel_kiji">';

    $ids = explode(',',$id);
    foreach ($ids as $id) {
            if($id){$html.= '<li><a href="'.get_permalink($id).'" title="'.get_the_title($id).'">'.get_the_title($id).'</a></li>';}
        }
    $html .= '</ul></div>';

    
    return $html;
}
add_shortcode('diver_relpost', 'diver_relpost');

//Diver QA
function diver_qa($atts, $content = null) {
    $content = do_shortcode($content);
    extract(shortcode_atts(array(
        'q' => '',
    ), $atts));

    $html = '<div class="diver_qa"><div class="diver_question"><div>'.$q.'</div></div><div class="diver_answer"><div>'.$content.'</div></div></div>';

    
    return $html;
}
add_shortcode('diver_qa', 'diver_qa');

//frame
function sc_frame($atts, $content = null) {
    $content = do_shortcode($content);
    extract(shortcode_atts(array(
        'color' => '',
        'title' => '',
    ), $atts));

    $html = '<div class="sc_frame" style="border-color:'.$color.'">';

    if($title){
        $html .= '<span class="sc_frame_before" style="background:'.$color.'">'.$title.'</span>';
    }

    $html .= $content.'</div>';
    
    return $html;
}
add_shortcode('frame', 'sc_frame');

//gooalead
function diver_gad($atts) {

    $html = diver_option_get_adsence();
    
    return $html;
}
add_shortcode('dgad', 'diver_gad');

//common
function common_content($atts) {
    extract(shortcode_atts(array(
        'id' => '',
        'type' => ''
    ), $atts));
    if($post = get_post( $id )){
        if($post->post_status == 'publish'){
            if($type=='text'){
                $content = do_shortcode($post->post_content);
            }else{
                $content = wpautop(do_shortcode($post->post_content));
            }
            return $content;
        }
    }
}
add_shortcode('common_content', 'common_content');

// amp content
function sw_amp($atts, $content = null) {
    $content = do_shortcode($content);
    if(!is_amp()){
        return;
    }
    return $content;
}
add_shortcode('sw_amp', 'sw_amp');

function sw_no_amp($atts, $content = null) {
    $content = do_shortcode($content);
    if(is_amp()){
        return;
    }
    return $content;
}
add_shortcode('sw_no_amp', 'sw_no_amp');

function is_pc($atts, $content = null )
{
    $content = do_shortcode( $content);
        if(!is_mobile())
            {
            return $content;
            }
}
add_shortcode('pc', 'is_pc');

function is_sp($atts, $content = null )
{
    $content = do_shortcode( $content);
        if(is_mobile())
            {
            return $content;
            }
}
add_shortcode('sp', 'is_sp');

function do_esc_html( $args=array(), $content="" ) {
    return htmlspecialchars( $content, ENT_QUOTES, "UTF-8" ) ;
}
add_shortcode( "esc_html", "do_esc_html" ) ;

function do_author_profile($atts) {
    extract(shortcode_atts(array(
        'id' => '',
        'link' => '記事一覧を見る',
    ), $atts));

    if(is_singular( 'post' ) && in_the_loop() && !$id){
        $id = get_the_author_meta('ID');
    }

    $id = get_the_author_meta( 'ID', $id );

    if($id){

        $facebook = get_the_author_meta( 'facebook',$id);
        $twitter = get_the_author_meta( 'twitter',$id );
        $instagram = get_the_author_meta( 'instagram',$id);
        $youtube = get_the_author_meta( 'youtube',$id);


        $html = "<div class='sc_post_author_user post_author_user clearfix vcard author'>";
        $html .= "<div class='post_thum'>";
        $html .= get_avatar($id, 100);
        $html .= "<ul class='profile_sns'>";

        if($facebook){
            $html .= "<li><a class='facebook' href='".$facebook."'><i class='fa fa-facebook'></i></a></li>";
        }
        if($twitter){
            $html .= "<li><a class='twitter' href='".$twitter."'><i class='fa fa-twitter'></i></a></li>";
        }
        if($instagram){
            $html .= "<li><a class='instagram' href='".$instagram."'><i class='fa fa-instagram'></i></a></li>";
        }

        $html .= "</ul></div>";

        $html .= "<div class='post_author_user_meta'>";

        $html .= "<div class='post-author fn'><a href='".get_author_posts_url($id)."'>".get_the_author_meta('display_name', $id)."</a></div>";

        $html .= "<div class='post-description'>".get_the_author_meta('description',$id)."</div>";

        $html .= "</div>";
        
        $html .= "<div class='post-author-more'><a href='".get_author_posts_url($id)."'>".$link."</a></div>";

        $html .= "</div>";

        return $html;
    }

}
add_shortcode('author_profile', 'do_author_profile');

function do_author_list($atts) {
    extract(shortcode_atts(array(
        'order' => 'DESC',
        'orderby' => 'name',
        'exclude' => '',
        'role' => '',
        'number' => ''
    ), $atts));

    $args = array(
        'exclude' => $exclude,
        'order' => $order,
        'orderby' => $orderby,
        'role' => $role,
        'number' => $number
    );

    $users = get_users( $args );
    $html = '<div class="user_list">';
    foreach ($users as $user) {
        $html .= '<a class="user" href="'.get_author_posts_url($user->ID).'">';
        
        $html .= '<div class="user_avator">'.get_avatar($user->ID,'150').'</div>';
        $html .= '<div class="user_name">'.$user->display_name.'</div>';

        $html .= '</a>';
    }
    $html .= '</div>';

    return $html;
}
add_shortcode('author_list', 'do_author_list');


if( !function_exists('diver_shortcode_empty_paragraph_fix') ){ 
    function diver_shortcode_empty_paragraph_fix($content) {
        $array = array (
            '<p>[' => '[',
            ']</p>' => ']',
            ']<br />' => ']'
        );
     
        $content = strtr($content, $array);
        return $content;
    }
}
add_filter('the_content', 'diver_shortcode_empty_paragraph_fix');

if (!function_exists('diver_audio_shortcode_custom')){
  function diver_audio_shortcode_custom( $html, $atts, $audio, $post_id, $library ) {
      $default_types = wp_get_audio_extensions();

      $fileurl = '';

      foreach ( $default_types as $fallback ) {
      if ( ! empty( $atts[ $fallback ] ) ) {
        if ( empty( $fileurl ) ) {
          $fileurl = $atts[ $fallback ];
        }
      }
    }

      $html = '<p><audio src="'.$fileurl.'" controls="controls"></audio></p>';

      return $html;

  }
}
add_filter( 'wp_audio_shortcode','diver_audio_shortcode_custom',5,10);

 
// editor format ========================================


// function diver_shortcord_editor_format( $return_value ) {
//     $content = get_post_field('post_content', get_the_ID());
    
//     return do_shortcode( $content );
// }
// add_filter( 'format_for_editor', 'diver_shortcord_editor_format' );


// function diver_shortcord_editor_format( $return_value ) {
  
//   $reflect_items = array('[getpost]');
  
//   foreach( $reflect_items as $item ) {
//     $shortcode[] = do_shortcode( $item );
//   }
  
//   return str_replace( $reflect_items, $shortcode, $return_value );
// }
// add_filter( 'format_for_editor', 'diver_shortcord_editor_format' );
