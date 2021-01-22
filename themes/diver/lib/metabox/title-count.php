<?php
// タイトル文字数カウント
add_action( 'admin_head-post.php', 'title_counter' );
add_action( 'admin_head-post-new.php', 'title_counter' );
 
// 処理内容
function title_counter() { 
  global $post;
    if( !isset( $post ) || 'post' != $post->post_type ){
      if('common' == $post->post_type){ 
        global $post_ID;
        ?>
        <script type="text/javascript">
         jQuery(function($) {
            var id = "<?php echo $post_ID; ?>";
           $('#titlewrap').after('<div class="common_shortcode_area">このショートコードをコピーして、投稿、固定ページ、またはテキストウィジェットの内容にペーストしてください。<div class="common_shortcode">[common_content id="'+id+'"]</div></div>')
         });
        </script>
        <style type="text/css">
        .common_shortcode_area{
          margin: 10px 0;
        }
        .common_shortcode{
          color: #fff;
          background-color: #1e8cbe;
          margin-top: 5px;
          padding:5px 1em;
        }
        </style>
      <?php }
    return;
  }
  ?>
<script type="text/javascript">
  TITLE_COUNTER_MAX_LENGTH = 30; //これを超えると赤く表示される（必要ない場合は0）

function strLength(strSrc){
    len = 0;
    strSrc = escape(strSrc);
    for(i = 0; i < strSrc.length; i++, len++){
        if(strSrc.charAt(i) == "%"){
            if(strSrc.charAt(++i) == "u"){
                i += 3;
                len++;
            }
            i++;
        }
    }
    return len;
}
  jQuery(
      function($) {
        // カウンタ更新関数
        function updateTitleCounter() {
      var titleLength = strLength($('#title').val()).toString() / 2;
          var stCounter = $('#title-counter-num').text(titleLength);
          if (TITLE_COUNTER_MAX_LENGTH != 0 && titleLength > TITLE_COUNTER_MAX_LENGTH ) {
            stCounter.addClass( 'title-counter-length-over' );
          } else {
            stCounter.removeClass( 'title-counter-length-over' );
          }
        }
        $('#titlewrap')
            .after('<div id="title-counter"><span>タイトル文字数：</span><span id="title-counter-num"></span></div>')
            .bind('keyup', updateTitleCounter);

        updateTitleCounter();
      });
</script>
<style type='text/css'>
  #title-counter {
    text-align: right;
    float:right;
    padding: 5px 0;
  }
  #title-counter-num {
    background: #fff;
    padding: 5px 10px;
    border: 1px solid #ccc;
  }
  .title-counter-length-over {
    color: #f00;
    font-weight: bold;
  }
</style>
<?php } ?>