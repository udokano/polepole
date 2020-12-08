<?php
/*
Template Name: コンタクト-サンクス
*/
?>

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
<h1 class="page-head-no-img" id="js-mt-spaece">
      <span class="page-head-no-img__text"><?php the_title();?></span>
  </h1>
<?php endif; ?>

<div class="inner">
<?php breadcrumb(); ?>
</div> 

  <div class="content">


       <section>
         <article>
         <div class="title cf">
           <h2><?php the_title(); ?></h2>
         </div>

        <div class="content_area">
        <?php echo do_shortcode('[mwform_formkey key="165"]'); ?>
       
        </div>

         </article>
       </section>
  
  </div>

<?php get_footer(); ?>
