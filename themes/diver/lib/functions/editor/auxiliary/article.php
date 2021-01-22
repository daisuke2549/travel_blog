<div class="diver_editor_popup_title">記事一覧<a href="media-upload.php?tab=top&type=paka3Type&TB_iframe=true&width=600&height=550">戻る</a></div>
        <div id="diver_editor_popup">
            <form action="" class="diver_voice_form">
            <div class="auxiliary_scroll_area">

                <div class="harf">
                    <div class="harf" style="width: 60px;">
                        <label class="auxiliary_label">取得数</label><input type="number" min="1" max="50" id="editer_diver_postlist_num" name="editer_diver_postlist_num" value="5" style="width:60px">
                    </div>
                    <div class="harf" style="width: 60%;margin-left: 20px;">
                        <label class="auxiliary_label">取得タイプ</label>
                        <input type="radio" id="editer_diver_postlist_gettype" name="editer_diver_postlist_gettype" value="cat" checked="checked">カテゴリー　
                        <input type="radio" id="editer_diver_postlist_gettype" name="editer_diver_postlist_gettype" value="rank">ランキング　
                    </div>
                </div>

                <div class="harf cat_type">
                <label class="auxiliary_label">取得カテゴリー</label>
                <?php
                $args = array(
                    'orderby' => 'order',
                    'order' => 'ASC',
                    'hide_empty' => false,
                    'get' => 'all'
                            );

                $defaults = array(
                    'child_of'            => 0,
                    'current_category'    => 0,
                    'depth'               => 0,
                    'echo'                => 1,
                    'exclude'             => '',
                    'exclude_tree'        => '',
                    'feed'                => '',
                    'feed_image'          => '',
                    'feed_type'           => '',
                    'hide_empty'          => 1,
                    'hide_title_if_empty' => false,
                    'hierarchical'        => true,
                    'order'               => 'ASC',
                    'orderby'             => 'name',
                    'separator'           => '<br />',
                    'show_count'          => 0,
                    'show_option_all'     => '',
                    'show_option_none'    => __( 'No categories' ),
                    'style'               => 'list',
                    'taxonomy'            => 'category',
                    'title_li'            => __( 'Categories' ),
                    'use_desc_for_title'  => 1,
                );

                $r = wp_parse_args( $args, $defaults );

                    $cat_all = get_categories($r);

                    echo '<select id="editer_diver_postlist_cat-name" name="editer_diver_postlist_cat-name" style="width:100%">';
                    echo '<option value="none">未設定</option>';
                    foreach($cat_all as $value):
                    $select = ($catpage_post_slug==$value->slug)?'selected':'';
                    echo '<option value="'.$value->term_id.'" '.$select.'>'.$value->name.'</option>';
                    endforeach;
                    echo '</select>';
                    ?>
                    </div>

                    <div class="harf rank_type" style="display:none;">
                        <label class="auxiliary_label">ランク条件</label>
                        <input type="radio" id="editer_diver_postlist_rank_type" name="editer_diver_postlist_rank_type" value="all" checked="checked">全期間　
                        <input type="radio" id="editer_diver_postlist_rank_type" name="editer_diver_postlist_rank_type" value="month">先月　
                        <input type="radio" id="editer_diver_postlist_rank_type" name="editer_diver_postlist_rank_type" value="week">先週　
                        <input type="radio" id="editer_diver_postlist_rank_type" name="editer_diver_postlist_rank_type" value="day">昨日　
                    </div>
                    <br><br>

                    <div class="cat_type">

                        <div class="harf">
                            <label class="auxiliary_label">並び替え条件</label>
                            <input type="radio" id="editer_diver_postlist_type" name="editer_diver_postlist_type" value="post_date" checked="checked">投稿日　
                            <input type="radio" id="editer_diver_postlist_type" name="editer_diver_postlist_type" value="modified">更新日　
                            <input type="radio" id="editer_diver_postlist_type" name="editer_diver_postlist_type" value="rand">ランダム　
                        </div>
                        <div class="harf">
                            <label class="auxiliary_label">並び替え</label>
                            <input type="radio" id="editer_diver_postlist_sort" name="editer_diver_postlist_sort" value="ASC">昇順　
                            <input type="radio" id="editer_diver_postlist_sort" name="editer_diver_postlist_sort" value="DESC" checked="checked">降順　
                        </div>
                        <br>
                        <br>

                    </div>

                     <div class="harf">
                        <label class="auxiliary_label">表示スタイル</label>
                        <input type="radio" id="editer_diver_postlist_style" name="editer_diver_postlist_style" value="simple" checked="checked">シンプル　
                        <input type="radio" id="editer_diver_postlist_style" name="editer_diver_postlist_style" value="grid">グリッド　
                        <input type="radio" id="editer_diver_postlist_style" name="editer_diver_postlist_style" value="list">リスト　
                    </div>

                    <div class="harf">
                        <label class="auxiliary_label">その他オプション</label>

                        <input type="checkbox" id="editer_diver_postlist_date" value="1" checked="checked"/> <label>日付を表示　</label>
                        <input type="checkbox" id="editer_diver_postlist_cat" value="1" checked="checked"/> <label>カテゴリーを表示</label>
                    </div>
                    <br><br>
                </div>
                <div class="submitbox">
                    <div id="wp-link-cancel">
                        <button type="button" class="button" id="diver_ei_btn_no">キャンセル</button>
                    </div>
                    <div id="wp-link-update">
                        <input type="submit" value="記事一覧を挿入する" class="button button-primary" id="diver_ei_btn_yes">
                    </div>
                </div>
            </form>
        </div>

<script type="text/javascript">
jQuery(document).ready(function($) {
    $('input[name="editer_diver_postlist_gettype"]:radio').on('change', function(){
        if($(this).val()=="rank"){
            $('.rank_type').fadeIn('slow');
            $('.cat_type').hide();
        }else{
            $('.rank_type').hide();
            $('.cat_type').fadeIn('slow');
        }
    });
});
</script>