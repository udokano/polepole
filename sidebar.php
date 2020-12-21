



<?php if ( is_home() || is_front_page()  ) : ?>

<!-- TOPページのみ表示 -->

<aside class="content__sidebar content__sidebar--top" id="sidebar-top">
<a href="<?php the_field("side_silde_link",7578);?>" class="side_slide_link">

        <div class="side_slide_subject">
                <h2>収集活動にご協力ください!</h2>
                <p>収集活動によって蘇る森<br>
            (同じ植林地の写真です)</p>
        </div>
        <div id="side_slide">
            <div class="bk-img src1"></div>
            <div class="bk-img src2"></div>
            <div class="bk-img src3"></div>
        </div>

</a>

<div class="link-text">
    <a href="<?php the_field("pdf_link",7578);?>" target="_blank" id="download">収集活動チラシダウンロード</a>
    <a href="<?php the_field("pdf_link02",7578);?>" target="_blank" id="corporate-achievements">企業のみなさま協力実績</a>
</div>

<!--

    TOPページのサイドバナーは削除

    <?php if (have_rows('side_banner',7578)): ?>
    <ul class="side_bannar">
      <?php while (have_rows('side_banner',7578)) : the_row(); ?>

        <li class="side_banner_image">
            <a href="<?php the_sub_field('banner_link',7578); ?>" target="_blank">
            <img src="<?php the_sub_field('banner_img',7578); ?>" alt="サイドバナー"></a>
        </li>

      <?php endwhile; ?>
    </ul>
<?php else: ?>
<?php endif; ?>
 -->


 <!-- 寄付のスライドを新たに追加 -->


    <?php if (have_rows('dn_slide_area',7578)): ?>
    <ul class="p-dn-slide" id="js-dn-slide">
      <?php while (have_rows('dn_slide_area',7578)) : the_row(); ?>

        <li class="p-dn-slide__item">
            <a href="<?php the_sub_field('dn_slide_link',7578); ?>" target="_blank" class="p-dn-slide__link">
                <div class="p-dn-slide__img">
                    <img src="<?php the_sub_field('dn_slide_img',7578); ?>" alt="<?php the_sub_field('dn_slide_text',7578); ?>">
                </div>
                <p class="p-dn-slide__ttl"><?php the_sub_field('dn_slide_text',7578); ?></p>
            </a>
        </li>

      <?php endwhile; ?>
    </ul>

    <div id="js-dn-navs" class="p-dn-dots"></div>
<?php else: ?>
<?php endif; ?>


<!-- <ul class="list-wrappre">
<li class="list-wrappre__ttl side_slide_subject">カテゴリー</li>
<?php wp_list_categories('title_li='); ?>
</ul> -->


<!-- 寄付のスライド設置 -->


</aside>


<?php elseif ( is_page("news") || is_category() || is_date() || is_single() ): ?>

<!--記事一覧(カテゴリー別・年別・ALL)と記事ページのサイドバー -->

<aside class="content__sidebar">
<div class="page-list">
        <ul class="list-wrappre">
            <?php dynamic_sidebar( 'list-widget' ); ?>
            <li class="widget">
                <h2 class="widgettitle">アーカイブ</h2>
            <?php
                $archives = get_archives_by_fiscal_year();
                echo '<select onchange="location.href=value;">';
                echo '<option>対象年を選択</option>';
                foreach($archives as $archive):
            ?>

    <option value="<?php echo home_url() ?>/<?php echo esc_html($archive->year) ?>" data-value="<?php echo esc_html($archive->year) ?>">
    <?php echo esc_html($archive->year) ?>年</option>

        <?php
        endforeach;
        ?>
            <?php echo '</select>'; ?>
            </li>
        </ul>

 <!-- 寄付のスライドを新たに追加 -->


    <?php if (have_rows('dn_slide_area',7578)): ?>
    <ul class="p-dn-slide" id="js-dn-slide">
      <?php while (have_rows('dn_slide_area',7578)) : the_row(); ?>

        <li class="p-dn-slide__item">
            <a href="<?php the_sub_field('dn_slide_link',7578); ?>" target="_blank" class="p-dn-slide__link">
                <div class="p-dn-slide__img">
                    <img src="<?php the_sub_field('dn_slide_img',7578); ?>" alt="<?php the_sub_field('dn_slide_text',7578); ?>">
                </div>
                <p class="p-dn-slide__ttl"><?php the_sub_field('dn_slide_text',7578); ?></p>
            </a>
        </li>

      <?php endwhile; ?>
    </ul>
    <div id="js-dn-navs" class="p-dn-dots"></div>
<?php else: ?>
<?php endif; ?>
    </div>
    <!-- ./page-list -->
</aside>



<?php elseif ( is_page() ): ?>

<!-- 通常の固定ページでは非表示 -->



<?php endif; ?>
