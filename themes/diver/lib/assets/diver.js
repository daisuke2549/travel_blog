jQuery(function($) {

    var UA = window.navigator.userAgent.toLowerCase();
    if (UA.indexOf('msie') != -1 || UA.indexOf('trident') != -1 ) {
        objectFitImages();
    }

    if(typeof Swiper !== 'undefined'){

        var mySwiper = new Swiper ('#main-wrap #pickup_posts_container',{
            mode:'horizontal',
            loop: true,
            pagination: {
                el:'.swiper-pagination',
                type:'bullets'
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            speed: 1000,
            slidesPerView:4,
            spaceBetween: 5,
            autoplay:{
                delay:3000,
                disableOnInteraction: true
            },
            preventClicks: false, 
            preventClicksPropagation: false, 
            breakpoints: {
                599: {
                    slidesPerView: 2
                  },
                768: {
                  slidesPerView: 3,
                },
                989: {
                  slidesPerView: 4,
                }
            }
        });

        var mySwiper = new Swiper('#big_pickup_slider.pickup_slider_size_big #pickup_posts_container',{
            mode:'horizontal',
            loop: true,
            pagination: {
                el:'.swiper-pagination',
                type:'bullets'
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            speed: 1000,
            preventClicks: false, 
            preventClicksPropagation: false, 
            slidesPerView:2,
            centeredSlides : true,
            slideToClickedSlide: true,
            spaceBetween: 0,
            autoplay:{
                delay:6000,
                disableOnInteraction: true
            },
            breakpoints: {
                768: {
                  slidesPerView: 1,
                }
            }
        });

        var mySwiper = new Swiper('#big_pickup_slider.pickup_slider_size_medium #pickup_posts_container',{
            mode:'horizontal',
            loop: true,
            pagination: {
                el:'.swiper-pagination',
                type:'bullets'
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            speed: 1000,
            preventClicks: false, 
            preventClicksPropagation: false, 
            slidesPerView:3,
            centeredSlides : true,
            slideToClickedSlide: true,
            spaceBetween: 0,
            autoplay:{
                delay:6000,
                disableOnInteraction: true
            },
            breakpoints: {
                599: {
                    slidesPerView: 1
                  },
                768: {
                  slidesPerView: 2,
                },
                989: {
                  slidesPerView: 3,
                }
            }
        });

        var mySwiper = new Swiper('#big_pickup_slider.pickup_slider_size_small #pickup_posts_container',{
            mode:'horizontal',
            loop: true,
            pagination: {
                el:'.swiper-pagination',
                type:'bullets'
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            speed: 1000,
            preventClicks: false, 
            preventClicksPropagation: false, 
            slidesPerView:5,
            centeredSlides : true,
            slideToClickedSlide: true,
            spaceBetween: 0,
            autoplay:{
                delay:6000,
                disableOnInteraction: true
            },
            breakpoints: {
                599: {
                    slidesPerView: 2
                  },
                768: {
                  slidesPerView: 3,
                },
                989: {
                  slidesPerView: 4,
                }
            }
        });
    }

    $('article .post-box-contents,.sticky-post-box').click(function(e){
        if($(this).data('href')&&e.target.nodeName != 'A'){
            window.location = $(this).data('href');
            return false;
        }
    });

    // toggle
    $(".sc_toggle_box .sc_toggle_title").on("click", function() {
        $(this).next().slideToggle('fast');
        $(this).toggleClass("active");//追加部分
    });

    // tab
    $('.tab_area div').click(function() {
        var index = $('.tab_area div').index(this);
        $('.content_area').css('display','none');
        $('.content_area').eq(index).fadeIn();
        $('.tab_area div').removeClass('select');
        $(this).addClass('select')
    });

    if($('#inputid2').length){
        $('#inputid2').iconpicker(".iconpicker");
    }

    function ios_ver (){
      var ios_ua = navigator.userAgent;
        if( ios_ua.indexOf("iPhone") > 0 ) {
          ios_ua.match(/iPhone OS (\w+){1,3}/g);
          var version = (RegExp.$1.replace(/_/g, '')+'00').slice(0,3);
          return version;
        }
      }

    var current_scrollY;

    $('.drawer-nav-btn').click(function () {
        current_scrollY = $( window ).scrollTop(); 

        $( 'body' ).css( {
            position: 'fixed',
            width: '100%',
            top: -1 * current_scrollY
          } );


        $('.drawer-nav').toggleClass('active');
        $('.drawer-overlay').toggleClass('active');
    });

    $('.drawer-overlay').click(function (e) {
        $( 'body' ).attr( { style: '' } );
        $( 'html, body' ).prop( { scrollTop: current_scrollY } );
            
        $('.drawer-nav').removeClass('active');
        $('.drawer-overlay').removeClass('active');
    });

    var movefun = function( event ){
        event.preventDefault();
    }
    // スクロール停止の処理
    window.addEventListener( 'touchmove' , movefun , { passive: false } );
    // スクロール停止することを停止する処理
    window.removeEventListener( 'touchmove' , movefun, { passive: false } );

     // sticky
    var nav = $('#nav_fixed');
    var navHeight = nav.length ? (nav.innerHeight()/2)+15 : 15 ;
    
    if(!navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)){
            // sticky
        if($('#fix_sidebar').length){
            $('#fix_sidebar').fitSidebar({wrapper : '#main-wrap',responsiveWidth : 767,offset_top:navHeight});
            $('#main').css('min-height',$('#fix_sidebar').innerHeight()+10);
        }
        if($('#share_plz').length){
            $('#share_plz').fitSidebar({wrapper : '#content_area',responsiveWidth : 767,offset_top:navHeight});
        }
    }


    if($('#diver_firstview_ytplayer').length){
        var tag = document.createElement('script');
        tag.src = 'https://www.youtube.com/iframe_api';
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        // YouTubeの埋め込み
        function onYouTubeIframeAPIReady() {
          ytPlayer = new YT.Player(
            'youtube_firstview',
            {
              videoId: 'RLQ_rgxIx3A', 
              width:'100%',
              height:'100%',
              playerVars: {
                loop: 1,
                controls: 0, 
                autoplay: 1,
                rel: 0,
                disablekb:1,
                iv_load_policy:3,
                modestbranding:1,
                showinfo: 0,
              },
              events: {
                'onReady': onPlayerReady
              }
            }
          );
        }
        function onPlayerReady(event) {
          event.target.setVolume(0);
        }
        $('#diver_firstview_ytplayer').YTPlayer();

    }

        //表示位置
    var navTop = 600;
    var showFlag = false;
    nav.css('top', -navHeight+'px');
    //ナビゲーションの位置まできたら表示
    $(window).scroll(function () {
        var winTop = $(this).scrollTop();
        if (winTop > navTop) {
            if (showFlag == false) {
                showFlag = true;
                TweenMax.to(nav.addClass('fixed'),1,{top:'0px'});
            }
        } else if (winTop < navTop) {
            if (showFlag) {
                showFlag = false;
                TweenMax.to(nav,1,{top:-navHeight+'px'},function(){
                    nav.removeClass('fixed');
                });
            }
        }
    });


    ///////////////////////////

    var topBtn = $('#page-top');  
    var footermenu = $('#footer_sticky_menu');    
    var fcta = $("#footer_cta");
    var ctashowFlag = true;
    var topBtnpos = 10;  

    ///////////////////////////

    //
    // footer menu
    //
    if(footermenu.length){
        topBtnpos += 50;
        $(window).scroll(function () {
            TweenMax.globalTimeScale(2);
            if ($(this).scrollTop() > 400) {
                    TweenMax.to(footermenu,1,{bottom:'0px'});
            } else {
                    TweenMax.to(footermenu,1,{bottom:'-200px'});
            }
        });
    }
    
    //
    // footer cta
    //

    if(fcta.length){
        topBtnpos += fcta.outerHeight();
        var opena = $("a.fcta_open");
        var ctabottom = 0;

        $(window).on("scroll", function(){
            if(ctashowFlag){
                if ($(this).scrollTop() > 500) { //scroll量
                    if(footermenu.length){
                        ctabottom = 50;
                    }
                    TweenMax.to(fcta.addClass("fixed"),1,{bottom:ctabottom+"px"});
                    fcta.fadeIn();
                    TweenMax.to(opena,1,{bottom:"10px"});
                    opena.fadeOut();

                } else {
                    TweenMax.to(fcta,1,{bottom:"-115px"});
                    fcta.fadeOut();
                }
            }
        });


        $(window).on("scroll", function(){
            var docHeight = $(document).innerHeight(), //ドキュメントの高さ
                windowHeight = $(window).innerHeight(), //ウィンドウの高さ
                pageBottom = docHeight - windowHeight; //ドキュメントの高さ - ウィンドウの高さ
            if(pageBottom <= $(window).scrollTop()) {
              //ウィンドウの一番下までスクロールした時に実行
                TweenMax.to(fcta,1,{bottom:-fcta.outerHeight()+5});
                fcta.fadeOut();
                TweenMax.to(opena,1,{bottom:"10px"});
                opena.fadeIn();
                if(ctashowFlag){
                    topBtnpos -= fcta.outerHeight();
                    TweenMax.to(topBtn,1,{bottom:(topBtnpos)+'px'});
                }
                ctashowFlag = false;
            }
        });

        $("#footer_cta a.close").click(function(){
            ctashowFlag = false;
            TweenMax.to(fcta,1,{bottom:-fcta.outerHeight()+5});
            fcta.fadeOut();
            TweenMax.to(opena,1,{bottom:"10px"});
            opena.fadeIn();
            topBtnpos -= fcta.outerHeight();
            TweenMax.to(topBtn,1,{bottom:(topBtnpos)+'px'});
        });

        opena.click(function(){
            ctashowFlag = true;
            fcta.fadeIn();
            opena.fadeOut();
            TweenMax.to(opena,1,{bottom:"-50px"});
            TweenMax.to(fcta.addClass("fixed"),1,{bottom:"0px"});
            topBtnpos += fcta.outerHeight();
            if($(this).scrollTop() > 800){
                TweenMax.to(topBtn,1,{bottom:(topBtnpos)+'px'});
            }
        });
    }


    //
    // ページ上部に
    //

    $(window).scroll(function () {
        TweenMax.globalTimeScale(2);
        if ($(this).scrollTop() > 800) {
                TweenMax.to(topBtn,1,{bottom:topBtnpos+'px'});
            } else {
                TweenMax.to(topBtn,1,{bottom:'-100px'});
        }
    });
    //スクロールしてトップ
    topBtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });

    // var topBtnfm = $('#page-top-fm');  
    // if(topBtnfm.length){
    //     topBtn.hide();
    //     topBtnfm.click(function () {
    //         $('body,html').animate({
    //             scrollTop: 0
    //         }, 500);
    //         return false;
    //     });
    // }

    $(window).scroll(function (){
        $(".sc_marker-animation").each(function(){
          var position = $(this).offset().top; //ページの一番上から要素までの距離を取得
          var scroll = $(window).scrollTop(); //スクロールの位置を取得
          var windowHeight = $(window).height(); //ウインドウの高さを取得
          if (scroll > position - windowHeight + 150){ //スクロール位置が要素の位置を過ぎたとき
            $(this).addClass('active'); //クラス「active」を与える
          }
        });
    });
});