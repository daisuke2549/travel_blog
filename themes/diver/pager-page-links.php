<?php
$args = array(
  'before' => '<div class="next-page-link">',
  'after' => '</div>',
'next_or_number'   => 'next',
'nextpagelink'     => __( '次のページを読む >>' ),
'previouspagelink' => __( '' ),
);
wp_link_pages($args); ?>
 
<?php
$args = array(
  'before' => '<div class="page-link">',
  'after' => '</div>',
  'link_before' => '<span>',
  'link_after' => '</span>',
);
wp_link_pages($args);

global $post;
$pages = explode( '<!--nextpage-->', $post->post_content );
var_dump($page);