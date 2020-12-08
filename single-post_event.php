<?php get_header(); ?>
<?php if(get_field('pages_header_img')): ?>

  <div class="page-head" id="js-mt-spaece">
  
      <div class="page-head__img">
        <img src="<?php the_field('pages_header_img'); ?>" alt="<?php the_title();?>">
      </div>

      <div class="page-head__inner">
        <h1 class="page-head__ttl">
          <?php the_title();?>
        </h1>
      </div>
  </div>

<?php else: ?>
  <h1 class="page-head-no-img">
      <span class="page-head-no-img__text"><?php the_title();?></span>
  </h1>
<?php endif; ?>
<div class="inner">
  <?php breadcrumb(); ?>
</div>
<div class="content cf space-top">
  <?php if(have_posts()): the_post(); ?>
  <section class="main_area">
    <article>
     
      <div class="category-date-wrap"> 
        <!--投稿日を表示--> 
        <span class="kiji-date"> <i class="fas fa-pencil-alt"></i>
        <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
          <?php the_time('Y/m/d'); ?>
        </time>
        </span> 
      </div>
      <div class="content_area clearfix">
        <?php remove_filter('the_content', 'wpautop'); ?>
        <?php the_content(); ?>
      </div>
      <?php if(get_field('pr_tit')):?>
      <div class="pr_area">
       

        <div class="pr__box__wrap">

            <div class="pr__thumb">
              <img src="<?php the_field('pr_thumb'); ?>" alt="キャッチ画像">
            </div>

            <div class="pr_left">
                
          <h3 class="pr_tit">
            <?php the_field('pr_tit'); ?>
          </h3>

            <div class="pr_desc">
              <?php the_field('pr_desc'); ?>
            </div>      
            </div>


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
      <?php endif; ?>
      <div id="prev_next">
        <?php
        $prevpost = get_adjacent_post( false, '', true ); //前の記事
        $nextpost = get_adjacent_post( false, '', false ); //次の記事
        if ( $prevpost or $nextpost ) { //前の記事、次の記事いずれか存在しているとき
          ?>
        <?php
        if ( $prevpost ) { //前の記事が存在しているとき
          echo '<a href="' . get_permalink( $nextpost->ID ) . '" title="' . get_the_title( $nextpost->ID ) . '" id="prev" >  
							 <div class="thumb">' . get_the_post_thumbnail( $nextpost->ID, array( 100, 100 ) ) . '</div>
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
      <div id="more_mobail"> <a href="<?php home_url(); ?>adout-katudou/news-list/">一覧へ</a> </div>
    </article>
  </section>
  <?php  endif; ?>
  <aside class="right_area">
    <div class="list-wrappre">
      <?php dynamic_sidebar( 'list-widget' ); ?>
    </div>
  </aside>
</div>
<!-- コンテンツエリア終了 !-->

<aside>
  <div class="bannerArea">
    <?php dynamic_sidebar( 'banner-widget' ); ?>
  </div>
</aside>
<?php get_footer(); ?>
