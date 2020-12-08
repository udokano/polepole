

<?php get_header(); ?>



  <?php if( is_year() ) : ?>

        <?php if(get_field('years_archive_header_img',9033)): ?>

        <div class="page-head" id="js-mt-spaece">
            <div class="page-head__img">
              <div class="page-head__img-inner">
                    <img src="<?php the_field('years_archive_header_img',9033); ?>" alt="<?php the_field('years_archive_header_text'); ?>">
              </div>
            </div>

            <div class="page-head__inner">
              <h1 class="page-head__ttl">
              <?php the_field('years_archive_header_text',9033); ?>
              </h1>
            </div>
        </div>

      <?php else: ?>
        <h1 class="page-head-no-img">
            <span class="page-head-no-img__text"><?php the_field('years_archive_header_text',9033); ?></span>
        </h1>
      <?php endif; ?>

   <?php elseif( is_category() ) : ?>

         <?php if(get_field('category_archive_header_img',9033)): ?>

        <div class="page-head" id="js-mt-spaece">
            <div class="page-head__img">
              <div class="page-head__img-inner">
                    <img src="<?php the_field('category_archive_header_img',9033); ?>" alt="<?php the_field('category_archive_header_text'); ?>">
              </div>
            </div>

            <div class="page-head__inner">
              <h1 class="page-head__ttl">
              <?php the_field('category_archive_header_text',9033); ?>
              </h1>
            </div>
        </div>

      <?php else: ?>
        <h1 class="page-head-no-img">
            <span class="page-head-no-img__text"><?php the_field('category_archive_header_text',9033); ?></span>
        </h1>
      <?php endif; ?>

   <?php endif; ?>


  <?php create_breadcrumb(); ?>


		<div class="content cf">



    <section class="content__main">
          <div class="title cf">
              <h2 class="date-category-listTitle">
                 <?php if( is_year() ) : ?>
                  <?php echo get_the_date('Y年'); ?>
                <?php endif; ?>
                <?php if( is_category() ) : ?>
                  <?php single_cat_title(); ?>
                <?php endif; ?>
                の記事一覧
              </h2>

          </div>


  <?php if(have_posts()): while(have_posts()):the_post(); ?>

    <article <?php post_class( 'newsTopic archive-topic' ); ?>>
     <?php if(get_field('anthor_link')): ?>
						<a href="<?php the_field("anthor_link"); ?>" target="_blank">
				<?php else: ?>
						<a href="<?php the_permalink(); ?>">
						<?php endif; ?>


            <!-- カテゴリーの取得の関数が長いので、別ファイル -->
            <?php get_template_part('inc__category-list'); ?>

            <!--投稿日を表示-->
              <span class="kiji-date">
                <i class="fas fa-pencil-alt"></i>
                <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
                  <?php the_time('Y/m/d'); ?>
                </time>
              </span>

            <div class="archive-title">
            <!--タイトル-->
            <h3><?php the_title(); ?></h3>
          </div>

      </a>
    </article>

      <?php endwhile; endif; ?>

      <!--ページネーション追加-->
      <div class="pagination">
        <?php echo paginate_links( array(
          'type' => 'list',
          'mid_size' => '2',
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;'
          ) ); ?>
      </div>
        <?php wp_reset_query(); ?>
</section>
 <?php get_sidebar(); ?>
</div><!-- コンテンツ終了 !-->

<?php get_footer(); ?>
