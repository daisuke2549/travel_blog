<?php
add_action('admin_menu', 'add_custom_inputbox');
add_action('save_post', 'save_custom_postdata');

//投稿ページに表示される"入力欄その１"の設定
function add_custom_inputbox() {
    add_meta_box( 'layout','ページ設定', 'layout_field', 'page', 'side' );
    add_meta_box( 'layout','ページ設定', 'layout_field', 'post', 'side' );
    add_meta_box( 'layout','ページ設定', 'layout_field', 'cat-page', 'side' );
}
//投稿ページに表示されるカスタムフィールド
function layout_field(){
       global $post_ID;
        wp_nonce_field(wp_create_nonce(__FILE__), 'layout_field_nonce');
       //カスタムフィールドの値を取得
        $oldset = get_post_meta($post_ID,'layout_name',true);

        $sidebarset = get_post_meta(get_the_ID(), 'single_sidebar_settings', true);

        if($oldset=="none"||$oldset=="layout_full" && !empty($sidebarset)){
            $sidebarset = 1;
        }
 ?>

<?php if (get_post_type() === 'page'): ?>
    <p><label><input type="checkbox" name="title_hidden" value="on" <?php checked( get_post_meta(get_the_ID(), 'title_hidden', true), "on" ); ?> /> タイトル非表示</label></p>
<?php endif;  ?>

    <p><label><input type="checkbox" name="single_sidebar_settings" value="1" <?php checked($sidebarset, 1 ); ?> /> サイドバー非表示</label></p>

<?php if (get_post_type() === 'cat-page'): 
    $post_box_layout = (get_post_meta($post_ID, 'post_box_layout', true))?get_post_meta($post_ID, 'post_box_layout', true):'default';
?>

    <p>記事一覧レイアウト

    <select name="post_box_layout">
        <option value="default" <?php echo ($post_box_layout === 'default')?'selected':''; ?>>デフォルト</option>
        <option value="list" <?php echo ($post_box_layout === 'list')?'selected':''; ?>>リスト</option>
        <option value="grid" <?php echo ($post_box_layout === 'grid')?'selected':''; ?>>グリッド</option>
        <option value="minilist" <?php echo ($post_box_layout === 'minilist')?'selected':''; ?>>ミニリスト</option>
    </select>
</p>

<?php endif;

}
//#################################
//更新処理
//#################################

function save_custom_postdata($post_id){
     $layout_field_nonce = isset($_POST['layout_field_nonce']) ? $_POST['layout_field_nonce'] : null;
     if(!wp_verify_nonce($layout_field_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
     if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
     if(!current_user_can('edit_post', $post_id)) { return $post_id; }
    
    $sidebarset = isset($_POST['single_sidebar_settings']) ? $_POST['single_sidebar_settings']: null;
    $sidebarset_ex = get_post_meta(get_the_ID(),'single_sidebar_settings',true);

    if($sidebarset){
      update_post_meta($post_id, 'single_sidebar_settings',$sidebarset);
    }else{
      delete_post_meta($post_id, 'single_sidebar_settings',$sidebarset_ex);
    }

    $post_box_layout = isset($_POST['post_box_layout']) ? $_POST['post_box_layout']: null;
    $post_box_layout_ex = get_post_meta(get_the_ID(),'post_box_layout',true);

    if($post_box_layout){
      update_post_meta($post_id, 'post_box_layout',$post_box_layout);
    }else{
      delete_post_meta($post_id, 'post_box_layout',$post_box_layout_ex);
    }

    $title_hidden = isset($_POST['title_hidden']) ? $_POST['title_hidden']: null;
    $title_hidden_ex = get_post_meta($post_id, 'title_hidden', true);

    if ($title_hidden) {
      update_post_meta($post_id, 'title_hidden', $title_hidden);
    }else{
      delete_post_meta($post_id, 'title_hidden',$title_hidden_ex);
    }

}
?>