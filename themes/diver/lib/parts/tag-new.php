<?php
$hours = get_theme_mod('newlabel',24);
$today = date_i18n('U');
$entry = (get_theme_mod('post_sort','published')=='published')?get_the_date('U'):get_the_modified_date('U');
$kiji = date('U',($today - $entry)) / 3600 ;
if( $hours > $kiji ){
echo '<span class="newlabel"><span>'.get_theme_mod('newlabeltitle','NEW!').'</span></span>';
}
?>