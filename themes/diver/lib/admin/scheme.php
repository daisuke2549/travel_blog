<?php
add_action('wp_head','insert_json_ld');
function insert_json_ld (){
    if (is_single()) {
        if (have_posts()) : while (have_posts()) : the_post();
        global $post;
              $context = 'http://schema.org';
              $type = 'Article';
              $name = esc_attr(get_the_title());
              $authorType = 'Person';
              $authorName = get_the_author();
              $dataPublished = get_the_date(DATE_ISO8601);
              $dateModified = get_the_modified_date(DATE_ISO8601);
              $thumbnail_id = get_post_thumbnail_id($post->ID);
              $image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
              if(!$image){
                $thumbnail_id = attachment_url_to_postid(get_option('thumbreplaceimg-uploader_img'));
                $image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
              }
              $imageurl = isset($image[0])?$image[0]:"";
              $imagewidth = isset($image[1])?$image[1]:"";
              $imageheight = isset($image[2])?$image[2]:"";
              $category_info = get_the_category();
              $articleSection = ($category_info)?$category_info[0]->name:'';
              $articleBody = get_the_content();
              $url = get_permalink();
              $publisherType = 'Organization';
              $publisherName = get_bloginfo('name');
              $description = get_diver_excerpt($post->ID,100,false);
              $desc_val = get_post_meta($post->ID,'diver_single_metadescription',true);
              $description = ($desc_val)?$desc_val:$description;
              $description = esc_attr(strip_tags($description));  
              $logosrc = get_theme_mod("diver_logo",get_template_directory_uri()."/images/logo.png");

 
              $json= "
              \"@context\" : \"{$context}\",
              \"@type\" : \"{$type}\",
              \"mainEntityOfPage\":{ 
                    \"@type\":\"WebPage\", 
                    \"@id\":\"{$url}\" 
                  }, 
              \"headline\" : \"{$name}\",
              \"author\" : {
                   \"@type\" : \"{$authorType}\",
                   \"name\" : \"{$authorName}\"
                   },
              \"datePublished\" : \"{$dataPublished}\",
              \"dateModified\" : \"{$dateModified}\",
              \"image\" : {
                   \"@type\" : \"ImageObject\",
                   \"url\" : \"{$imageurl}\",
                   \"width\" : \"{$imagewidth}\",
                   \"height\" : \"{$imageheight}\"
                   },
              \"articleSection\" : \"{$articleSection}\",
              \"url\" : \"{$url}\",
              \"publisher\" : {
                   \"@type\" : \"{$publisherType}\",
                   \"name\" : \"{$publisherName}\",
                \"logo\" : {
                     \"@type\" : \"ImageObject\",
                     \"url\" : \"{$logosrc}\"}
                },
                \"description\" : \"{$description}\"";
            echo '<script type="application/ld+json">{'.$json.'}</script>';
        endwhile; endif;
        rewind_posts();
    }
}