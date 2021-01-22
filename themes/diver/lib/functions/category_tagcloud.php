<?php
function diver_category_tag_cloud($args) {
  $defaults = array(
    'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
    'format' => 'flat', 'separator' => "\n", 'orderby' => 'name', 'order' => 'ASC',
    'exclude' => '', 'include' => '', 'link' => 'view', 'taxonomy' => 'post_tag', 'echo' => true
  );
  $args = wp_parse_args( $args, $defaults );
 
  global $wpdb;
  $query = "
    SELECT DISTINCT terms2.term_id as term_id, terms2.name as name, t2.count as count
    FROM
      $wpdb->posts as p1
        LEFT JOIN $wpdb->term_relationships as r1 ON p1.ID = r1.object_ID
        LEFT JOIN $wpdb->term_taxonomy as t1 ON r1.term_taxonomy_id = t1.term_taxonomy_id
        LEFT JOIN $wpdb->terms as terms1 ON t1.term_id = terms1.term_id,
      $wpdb->posts as p2
        LEFT JOIN $wpdb->term_relationships as r2 ON p2.ID = r2.object_ID
        LEFT JOIN $wpdb->term_taxonomy as t2 ON r2.term_taxonomy_id = t2.term_taxonomy_id
        LEFT JOIN $wpdb->terms as terms2 ON t2.term_id = terms2.term_id
      WHERE
        t1.taxonomy = 'category' AND p1.post_status = 'publish' AND terms1.term_id = ".$args['cat']." AND
        t2.taxonomy = 'post_tag' AND p2.post_status = 'publish'
        AND p1.ID = p2.ID
  ";
  $tags = $wpdb->get_results($query);
  foreach ( $tags as $key => $tag ) {
    if ( 'edit' == $args['link'] )
      $link = get_edit_tag_link( $tag->term_id, $args['taxonomy'] );
    else
      $link = get_term_link( intval($tag->term_id), $args['taxonomy'] );
    if ( is_wp_error( $link ) )
      return false;
 
    $tags[ $key ]->link = $link;
    $tags[ $key ]->id = $tag->term_id;
    $tags[ $key ]->slug = $tag->name;
  }
 
  $return = wp_generate_tag_cloud( $tags, $args );
  $return = apply_filters( 'wp_tag_cloud', $return, $args );
 
  if ( 'array' == $args['format'] || empty($args['echo']) )
    return $return;
 
  echo $return;
}