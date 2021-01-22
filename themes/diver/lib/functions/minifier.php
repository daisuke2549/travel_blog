<?php
if (!function_exists('diver_minifier_file')){
  function diver_minifier_file($src,$mini_src,$type) {
    $origin_file      = get_template_directory() . $src;
    $minify_file      = get_template_directory() . $mini_src;
    $origin_file_uri  = get_template_directory_uri() . $src;
    $minify_file_uri  = get_template_directory_uri() . $mini_src;
    $src              = '';
    $origin_file_date = '';
    $minify_file_date = '';
    $flag = false;

    if( WP_Filesystem() ){
      global $wp_filesystem;

      if ( !file_exists($minify_file) ){
        $wp_filesystem->touch($minify_file);
        $flag = true;
      }

      $origin_file_date = filemtime($origin_file);
      $minify_file_date = filemtime($minify_file);

      if( $minify_file_date < $origin_file_date){
        $flag = true;
      }

      if($flag){
        $src = $wp_filesystem->get_contents($origin_file);

        if($type == 'js'){
            $src = minify_js($src);
        }else if($type == 'html'){
            $src = minify_html($src);
        }else{
            $src = minify_css($src);
        }

        $wp_filesystem->put_contents($minify_file, $src);
      }

      if( file_exists($minify_file) ){
        $file = $minify_file_uri;
      } else {
        $file = $origin_file_uri;
      }
    }
    return $file;
  }
}

if (!function_exists('diver_minifier_amp_css')){
function diver_minifier_amp_css(){
  //オリジナルのcss(絶対パス)
  $origin_file      = get_template_directory() . '/lib/amp/css/style.css';
  //minify後のcss(絶対パス)
  $origin_file_uri  = get_template_directory_uri() . '/lib/amp/css/style.css';
  //cssの中身を入れる変数
  $css              = '';

  //minifyしたファイルの中身を上書きするかどうかの判断に用いる
  $flag = false;

  if( WP_Filesystem() ){
    //$wp_filesystemオブジェクトの呼び出し
    global $wp_filesystem;

    $css = $wp_filesystem->get_contents($origin_file);
    //minifyを取得し、読み込んだライブラリ(php-html-css-js-minifier.php)でminifyする
    $css = minify_css($css);
    

  }else{
    $css = file_get_contents($origin_file_uri);
  }

  return $css;
}
}


if(phpversion() < "5.6.0"){
  if (!function_exists('minify_css')){
    function minify_css($style){
        $style = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $style);
        $style = str_replace(': ', ':', $style);
        $style = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $style);
        return $style;

    }
  }
}