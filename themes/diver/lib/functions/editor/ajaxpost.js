jQuery(function($) {

$(document).ready(function($) {
    $('#iconpreview').iconpicker('.iconpicker');
    $(document).on("keypress", "input:not(.allow_submit):not([name='s'])", function(event) {
        return event.which !== 13;
      });
});

//初回、ページの読み込みが完了したら実行
$(function(){
  $(window).load(function () {
    $('#getPostsSubmit').trigger("click");
  });
});

//指定した場所を表示したら
//#getPostsSubmitをchick
$(function() {
 $('#getPostsSubmit').trigger("click");
  //基準となる要素を指定する
  var triggerNode = $(".diver_kiji_trigger");
 
  $(".resblock").scroll(function(){
   // alert(triggerNode.offset().top);

    var triggerNodePosition = triggerNode.offset().top-$(".resblock").offset().top - $(".resblock").height(); 
    if ($(".resblock").scrollTop() > triggerNodePosition) {
      
      //#getPostsSubmitをchick
      $('#getPostsSubmit').trigger("click");
    }
  });

  // 画面をスクロールしたときに実行
  $(window).scroll(function(){
    if(triggerNode.length){
      var triggerNodePosition = triggerNode.offset().top - $(window).height(); 
      if ($(window).scrollTop() > triggerNodePosition) {
        //#getPostsSubmitをchick
        // $('#getPostsSubmit').trigger("click");
      }
    }
  });
});

//再読み込みををクリックしたら
//#re_getPostsSubmitをchick
$(document).ready(function(){
 $(document).on('click','#re_getPostsSubmit', function(){
  $("#res").empty();
  $("#paka3getpost_count").val(0);
   $('#getPostsSubmit').trigger("click");
 });
}); 

//読み込み関数
$(document).ready(function(){
    //ローディグ画像の非表示とボタン表示
    $('#loadingmessage').hide();
    $('#getPostsSubmit').removeAttr("disabled");

    $(document).on('click','#getPostsSubmit', function(){

      if($("#paka3getpost_count").val() >=0){
        var $i = $("#paka3getpost_count").val()*1;
        var $keyword = $("#ajaxpost_search_keyword").val();
        var $category = $('[name=ajaxpost_search_category]').val();
        var $type = $("#paka3getpost_type").val();

        var resID = "#res";

        console.log($type);

        //値を-1に実行中は設定する
        $("#paka3getpost_count").val(-1);
        //ローディグ画像の表示とボタン非表示
        $('#loadingmessage').show();
        //$('#loadingmessage').hide();
        
        $('#getPostsSubmit').attr("disabled", "disabled");
        $.post(
           paka3Posts.ajaxurl,
              {
                 action : 'paka3_pgp_action',
                 paka3getpost_count : $i ,
                 ajaxpost_search_keyword : $keyword,
                 ajaxpost_search_category : $category,
                 paka3getpost_type : $type
              },
              function( response ) {

                for(var i in response){
                  $(resID).append( "<li><label for='pgp_chk_"+response[i].ID+"'><span id='pgp_title_" + response[i].ID + "'>"+
                    "<span id='pgp_chk_link_"+$type+"' class='"+response[i].ID+"' href='" + response[i].post_href + "'" +
                    " target='_blank'" +
                    " title='" + response[i].post_title + "'>" +
                    response[i].post_title +" ("+response[i].post_date+")</span></span>");

                  $(resID).append("</label></li>");
                }
                
                if(response.length != 0 ){
                  $("#paka3getpost_count").val(1 + $i);
                }else{
                  $("#paka3getpost_count").val(-1);
                }
                
                 $('#loadingmessage').hide();
                 $('#getPostsSubmit').removeAttr("disabled");
                 //$('#res').show();
                 }
          );
       return false;
      }else{
         $('#getPostsSubmit').hide();
      }
    }); 
  });
});