<?php
/*
Template Name: 最新情報
*/
 ?>


<?php get_header(); ?>

<?php if(get_field('archive_header_img',9033)): ?>

        <div class="page-head" id="js-mt-spaece">
            <div class="page-head__img">
              <div class="page-head__img-inner">
                    <img src="<?php the_field('archive_header_img',9033); ?>" alt="<?php the_field('archive_header_text'); ?>">
              </div>
            </div>

            <div class="page-head__inner">
              <h1 class="page-head__ttl">
              <?php the_field('archive_header_text',9033); ?>
              </h1>
            </div>
        </div>

      <?php else: ?>
        <h1 class="page-head-no-img">
            <span class="page-head-no-img__text"><?php the_field('years_archive_header_text',9033); ?></span>
        </h1>
      <?php endif; ?>

	  <?php create_breadcrumb(); ?>

		<div class="content cf">

				<section class="content__main">
          <div class="title cf">
            <h2>最新情報一覧</h2>
          </div>
          <?php
        // WP_Queryのパラメータを指定,新着情報5件抜粋

global $max_num_page;
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$args = array(
				    'posts_per_page' => 10,
            'orderby' => 'date',
            'paged' => $paged,
            		'order' => 'DESC'
				);
				// WP_Queryクラスのインスタンスを作成
				$the_query = new WP_Query( $args );

				// ループ開始
				while ( $the_query->have_posts() ) :
					// カスタムクエリの投稿データをセット
					$the_query->the_post();?>
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
                  <?php endwhile; wp_reset_postdata(); ?>

              <?php
if ($the_query->max_num_pages > 1) {
  echo '<div class="pagination">';
  echo paginate_links( array(
    'base' => get_pagenum_link(1).'%_%',
    'format' => 'page/%#%/',
    'current' => max(1, $paged),
    'total' => $the_query->max_num_pages,
    'type' => 'list',
    'mid_size' => '1',
    'prev_text' => '«',
    'next_text' => '»'
    ) );
  echo '</div>';
}
?>

      </section>

		 <?php get_sidebar(); ?>



    </div><!-- コンテンツ終了 !-->

    <?php get_template_part('banner-area'); ?>

<?php get_footer(); ?>
