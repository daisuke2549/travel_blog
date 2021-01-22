<?php
//クラスにlazyloadを追加
function lazyload_convert_content( $content ){
    global $is_IE;
    
    if( empty($content) || is_feed() || is_admin() || is_Android() || is_amp() || get_option('diver_postsettings_lazyload_on',1)==0 || $is_IE=='1'){
        return $content;
    }
    $exclude_first_img = true;
    $include_iframe = false;
     
    if( $include_iframe ){
        $tag_pattern = '/<(?:img|iframe)\s+.*?>/';
    } else {
        $tag_pattern = '/<img\s+.*?>/';
    }
     
    //コンテンツからimgの配列を作成
    preg_match_all( $tag_pattern, $content, $matches_img );
     
    $pattern_arr = array();
         
    foreach ( $matches_img[0] as $img_html ){
        //画像のとき
        if( strpos($img_html, '<img ' ) !== false ){
            if( empty($exclude_url_img) ){
                $pattern_arr[] = $img_html;
            } else {
                foreach( $exclude_url_img as $url ){
                    if(strpos($img_html, $url) === false){
                        $pattern_arr[] = $img_html;
                    }
                }
            }
        } else { //iframeのとき
            $pattern_arr[] = $img_html;
        }
    }

    if(!$pattern_arr){
        return $content;
    }
     
    if( $exclude_first_img && strpos($pattern_arr[0], '<img ' ) !== false ){
        array_shift($pattern_arr);
            if(!isset($pattern_arr[1])){
                return $content;
            }
    }
     
    //lazySizes対応の属性に変更しclass属性にlazyloadを追加
    foreach ( $pattern_arr as $i => $img_html ){

        if ( strpos($img_html, 'data-src') === false ){
            if ( strpos($img_html, ' class=') === false ){
                $subject_arr[] = preg_replace( array( '/(src|srcset|sizes)/', '/\s?\/?>/' ), array( 'data-$1', ' class="lazyload" />' ), $img_html );
            } else {
                $subject_arr[] = preg_replace( array( '/(src|srcset|sizes)/', '/(\s+?class=(?:"|\').+?)("|\')/' ), array( 'data-$1', '$1 lazyload$2' ), $img_html );
            }
        }else{
            $subject_arr[] = $img_html;
        }
    }

    $content = str_replace($pattern_arr, $subject_arr, $content);   

    return $content;
}
add_filter( 'the_content', 'lazyload_convert_content',20);