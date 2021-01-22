<?php 
$diver_footerbar = get_option('diver_footerbar');

if(is_mobile()):

$footermenu = '<table id="footer_sticky_menu">';
$count = 0;

foreach ((array)$diver_footerbar as $key => $value) {
    switch (substr($key, 0, -1)) {

    case 'diver_footerbar_custom_': 
        foreach ($value as $k => $v) {
            if($k=='icon'){
                $icon = $v;
            }elseif($k=='url'){
                $url = $v;
            }elseif($k=='title'){
                $title = $v;
            }
        }
        $count++;
        $footermenu .= '<td class="footermenu_col"><a href="'.$url.'"></a><i class="fa '.$icon.'"></i><div class="footermenu_title">'.$title.'</div></td>';

        break;

    case 'diver_footerbar_drawer_': 
        foreach ($value as $k => $v) {
            if($k=='title'){
                $title = $v;
            }
        }
        $count++;
        $footermenu .= '<td class="footermenu_col"><span class="drawer-nav-btn"><span></span></span><i class="fa fa-bars" aria-hidden="true"></i><div class="footermenu_title">'.$title.'</div></td>';

        break;

    case 'diver_footerbar_top_': 
        foreach ($value as $k => $v) {
            if($k=='title'){
                $title = $v;
            }
        }
        $count++;
        $footermenu .= '<td class="footermenu_col" id="page-top-fm"><a href=""></a><i class="fa fa-chevron-up"></i><div class="footermenu_title">'.$title.'</div></td>';

        break;
    
    case 'diver_footerbar_tel_': 
        foreach ($value as $k => $v) {
            if($k=='tel'){
                $tel = $v;
            }elseif($k=='title'){
                $title = $v;
            }
        }
        $count++;
        $footermenu .= '<td class="footermenu_col"><a href="tel:'.$tel.'"></a><i class="fa fa-phone"></i><div class="footermenu_title">'.$title.'</div></td>';


    break;

    case 'diver_footerbar_sns_':  
        foreach ($value as $k => $v) {
            if($k=='form'){
                $form = $v;
            }elseif($k=='title'){
                $title = $v;
            }
        }
        $count++;

        $shareurl = urlencode((empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);

        $footermenu .= '<div id="diver_footerbar_sns_'.$count.'" class="lity-hide lity_content"><div class="sns footermenu_sns"><ul class="clearfix"><li><a class="line" href="http://line.me/R/msg/text/?'.$shareurl.'" target="_blank"><span class="text">LINE</span></a></li><li><a class="twitter" href="https://twitter.com/intent/tweet?text='.$shareurl.'" target="_blank"><i class="fa fa-twitter"></i><span class="sns_name">Twitter</span></a></li><li><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u='.$shareurl.'" target="_blank"><i class="fa fa-facebook"></i><span class="sns_name">Facebook</span></a></li><li><a class="hatebu" href="https://b.hatena.ne.jp/add?mode=confirm&url='.$shareurl.'" target="_blank"><span class="sns_name">はてブ</span></a></li><li><a class="pocket" href="https://getpocket.com/edit?url='.$shareurl.'"><i class="fa fa-get-pocket"></i><span class="sns_name">Pocket</span></a></li></ul></div></div><td class="footermenu_col"><a href="#diver_footerbar_sns_'.$count.'" data-lity="data-lity"></a><i class="fa fa-share-alt"></i><div class="footermenu_title">'.$title.'</div></td>';
    break;
	}
}
$footermenu .= '</table><style>body{margin-bottom:50px}</style>';
if($count!=0){echo $footermenu;}
endif;
?>