
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

<div class="inner">
<?php breadcrumb(); ?>

</div>

 
<div class="content cf">

  <?php if(have_posts()): the_post(); ?>


<?php if(get_field('side_ttl')): ?>

  <section class="content__main">

   <article class="main_area">
      <div class="content_area">
        <?php the_content(); ?>
      </div>
    </article>
  </section>

<?php get_sidebar(); ?>

<?php else: ?>


 <section class="content__main content__main--center">

   <article class="main_area">
      <div class="content_area">
        <?php the_content(); ?>
      </div>
    </article>
  </section>

<?php endif; ?>

  <?php  endif; ?>

  
</div>
<!-- ./contents -->

<?php get_template_part('banner-area'); ?>
<?php get_footer(); ?>
