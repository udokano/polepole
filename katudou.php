<?php
/*
Template Name: 活動概要
*/

 ?>

<?php get_header(); ?>

 <div class="title_img">
  <img src="<?php echo get_template_directory_uri(); ?>/img/katudou_title.jpg" class="pc tablet" alt="活動概要">
    <img src="<?php echo get_template_directory_uri(); ?>/img/katudou_title_sp.jpg" class="smart" alt="活動概要">
 </div>

<?php breadcrumb(); ?>


  <div class="content cf">

    <?php if(have_posts()): the_post(); ?>
       <section>
         <article class="main_area">
         <div class="title cf">
           <h2><?php the_title(); ?></h2>
         </div>

         <div class="content_area">

         <?php the_content(); ?>

         </div>
         </article>
       </section>
    <?php  endif; ?>

			<aside class="right_area">
				<?php get_sidebar(2); ?>
			</aside>

				<aside>
					<div class="bannerArea">
						<?php dynamic_sidebar( 'banner-widget' ); ?>
					</div>
				</aside>

  </div><!--コンテンツ終了 -->

<?php get_footer(); ?>
