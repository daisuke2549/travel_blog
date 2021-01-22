<?php 
global $post,$pages, $page, $numpages;
$paged = (get_query_var('page')) ? get_query_var('page') : 1;

$title = '次のページ';


if($numpages > $paged){
	$page_content = explode( '<!--nextpage-->', $post->post_content );
	preg_match_all('/<h[2-6]>.+<\/h[2-6]>/u', $page_content[$paged], $matches);
	if($matches[0]){
		$title = '<span class="sp_hide">次ページ：</span>'.strip_tags($matches[0][0]);
	}
}

$args = array(
	'before' => '<div class="page-link">',
	'after' => '</div>',
	'link_before' => '',
	'link_after' => '',
	'next_or_number' => 'next',
	'nextpagelink' => '<span class="page-links_tp">'.$title.'</span>', 
	'previouspagelink' => '',
);
wp_link_pages($args); 

$args = array(
  'before' => '<div class="page-link">',
  'after' => '</div>',
  'link_before' => '<span class="paged">',
  'link_after' => '</span>',
);
wp_link_pages($args); 