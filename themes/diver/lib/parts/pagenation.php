<?php if(get_next_posts_link() || get_previous_posts_link()): ?>
<div class="pagination">
    <?php 
    if(!is_mobile()):
        global $wp_rewrite;
        $paginate_base = get_pagenum_link(1);
        if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()):
            $paginate_format = '';
            $paginate_base = add_query_arg('paged','%#%');
        else:
            $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
            user_trailingslashit('page/%#%/','paged');;
            $paginate_base .= '%_%';
        endif;
        echo paginate_links(array(
            'base' => $paginate_base,
            'format' => $paginate_format,
            'total' => $wp_query->max_num_pages,
            'mid_size' => 3,
            'current' => ($paged ? $paged : 1),
            'prev_text' => '',
            'next_text' => '',
        ));
    else:

    $pages = $wp_query->max_num_pages;

    global $paged;
    if(empty($paged)) {
        $paged = 1;
    }

    if($pages === '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages) {
            $pages = 1;
        }
    }

    if($paged > 2) {
        echo '<a href="'.get_pagenum_link(1).'" class="page-numbers prev"></a>';
    }
    if($paged > 1) {
        echo '<a href="'.get_pagenum_link($paged - 1).'" class="page-numbers prev1"></a>';
    }
    echo '<span class="current">'.$paged.' / '.$pages.'</span>';
    if ($paged < $pages) {
        echo '<a href="'.get_pagenum_link($paged + 1).'" class="page-numbers next1"></a>';
    }
    if ($paged < $pages-1) {
        echo '<a href="'.get_pagenum_link($pages).'" class="page-numbers next"></a>';
    }

    endif;
?>
</div>
<?php endif; ?>