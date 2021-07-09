
                         <?php
                    $cats = $sort = array();
                    $post_cats = get_the_category();
                    foreach ($post_cats as $cat) {
                    $layer = count(get_ancestors($cat->term_id, 'category'));
                    $cats[] = array(
                    'name' => $cat->name,
                    'slug' => $cat->slug,
                    'id' => $cat->term_id,
                    'ID' => $cat->cat_ID
                    );
                    $sort[] = $layer;
                    }
                    array_multisort($sort, SORT_ASC, $cats);

                     //カスタムフィールドのカラーを取得
                    $cat_id = $cat->cat_ID;
                    $term_idsp = 'category_'.$cat_id;

                    echo '<div class="caregory-list">';

                     foreach ($cats as $cat) {
                    echo '<span class="category-area '.$cat['slug']. '" style="background-color:'.get_field("cat_bg",'category_'. $cat['ID']).';">'.$cat['name'].'</span>';
                    }

                    echo '</div>';
                    ?>