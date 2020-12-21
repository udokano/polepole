<?php if((get_field("anthor_link"))): ?>

<!-- 外部ページのリンクがあったらそのページへリダイレクト -->

<script>


location.href="<?php the_field('anthor_link'); ?>";

</script>

      <?php endif; ?>

<?php get_header(); ?>

<?php if(get_field('pages_header_img')): ?>

  <div class="page-head" id="js-mt-spaece">

      <div class="page-head__img">
         <div class="page-head__img-inner">
            <img src="<?php the_field('pages_header_img'); ?>" alt="<?php the_title();?>">
        </div>
      </div>

      <div class="page-head__inner">
        <h1 class="page-head__ttl">
          <?php the_title();?>
        </h1>
      </div>
  </div>

<?php else: ?>
  <h1 class="page-head-no-img" id="js-mt-spaece">
      <span class="page-head-no-img__text"><?php the_title();?></span>
  </h1>
<?php endif; ?>

  <?php create_breadcrumb(); ?>



<div class="content cf space-top">
  <?php if(have_posts()): the_post(); ?>
  <section class="content__main">
    <article>



      <div class="category-date-wrap">
         <span class="kiji-date">
            <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
              <?php the_time('Y/m/d'); ?>
            </time>
        </span>
          <!-- カテゴリーの取得の関数が長いので、別ファイル -->
          <?php get_template_part('inc__category-list'); ?>
      </div>
      <!-- ./category-date-wrap -->
      <div class="content_area clearfix">
        <?php remove_filter('the_content', 'wpautop'); ?>
        <?php the_content(); ?>
      </div>

      <?php if(get_field('pr_tit')):?>
      <div class="pr">
        <div class="pr__top">
              <div class="pr__left">

                  <h3 class="pr__tit">
                    <?php the_field('pr_tit'); ?>
                  </h3>

                   <div class="pr__thumb">
              <img src="<?php the_field('pr_thumb'); ?>" alt="キャッチ画像">
            </div>

                    <div class="pr__desc">
                      <?php the_field('pr_desc'); ?>
                    </div>

                                    <?php
                        $btn_type = get_field( 'btn_type' );
                        if ( $btn_type == 'red' ) {
                          ?>
                        <a href="<?php the_field('pr_link'); ?>" class="pr_btn red">
                        <?php the_field('btn_txt'); ?>
                        </a>
                        <?php } elseif($btn_type =='blue'){ ?>
                        <a href="<?php the_field('pr_link'); ?>" class="pr_btn blue">
                        <?php the_field('btn_txt'); ?>
                        </a>
                        <?php } elseif($btn_type =='green'){ ?>
                        <a href="<?php the_field('pr_link'); ?>" class="pr_btn green">
                        <?php the_field('btn_txt'); ?>
                        </a>
                        <?php } elseif($btn_type =='yellow'){ ?>
                        <a href="<?php the_field('pr_link'); ?>" class="pr_btn yellow">
                        <?php the_field('btn_txt'); ?>
                        </a>
                        <?php }?>
                      </div>

              </div>
        </div>
        <?php endif; ?>

      <div id="prev_next">
        <?php
        $prevpost = get_adjacent_post( false, '', true ); //前の記事
        $nextpost = get_adjacent_post( false, '', false ); //次の記事
        if ( $prevpost or $nextpost ) { //前の記事、次の記事いずれか存在しているとき
          ?>
        <?php
        if ( $prevpost ) { //前の記事が存在しているとき
          echo '<a href="' . get_permalink( $prevpost->ID ) . '" title="' . get_the_title( $prevpost->ID ) . '" id="prev" >
							 <div class="thumb">' . get_the_post_thumbnail( $prevpost->ID, array( 100, 100 ) ) . '</div>
							 <div class="box"><div id="next_title">前の記事へ</div>
							<p>' . get_the_title( $prevpost->ID ) . '</p></div></a>';
        } else { //前の記事が存在しないとき
          echo '<div id="prev_no"><a href="' . home_url( '/' ) . '"><div id="prev_next_home"><i class="fa fa-home"></i>
							</div></a></div>';
        }


        if ( $nextpost ) { //次の記事が存在しているとき
          echo '<a href="' . get_permalink( $nextpost->ID ) . '" title="' . get_the_title( $nextpost->ID ) . '" id="next" >
							 <div class="thumb">' . get_the_post_thumbnail( $nextpost->ID, array( 100, 100 ) ) . '</div>
							 <div class="box"><div id="next_title">次の記事へ</div>
							<p>' . get_the_title( $nextpost->ID ) . '</p></div></a>';
        } else { //次の記事が存在しないとき
          echo '<div id="next_no"><a href="' . home_url( '/' ) . '"><div id="prev_next_home"><i class="fa fa-home"></i>
							</div></a></div>';
        }
        ?>
        <?php } ?>
      </div>
      <a href="<?php echo home_url('/'); ?>news" class="c-btn-toList">一覧へ</a>
    </article>
  </section>
  <?php  endif; ?>
  <?php get_sidebar(); ?>

</div>
<!-- コンテンツエリア終了 !-->

<?php get_template_part('banner-area'); ?>
<?php get_footer(); ?>
