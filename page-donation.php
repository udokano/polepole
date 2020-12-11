<?php
/*
Template Name: 寄付ページ
*/

 ?>

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


    <div class="p-donation">

        <section class="p-donation-intro">
          <div class="l-inner">
               <h2 class="p-donation-intro__ttl"></h2>
                <p class="p-donation-intro__desc"></p>
          </div>
          <!-- ./inner -->
        </section>

        <div class="p-donation-sticker">
            <div class="p-donation-sticker__img">
              <img src="" alt="">
            </div>
            <!-- ./img -->

            <p class="p-donation-sticker__desc"></p>
            <p class="p-donation-sticker__note"></p>

        </div>
        <!-- ./sticker -->

    </div>
    <!-- ./donation -->

    <section class="p-dn-top">

        <h2 class=""></h2>

        <div class="">
          <img src="" alt="">
        </div>

        <p class=""></p>

        <ul class="c-btn-dn">
          <li class="c-btn-dn__item">
            <a href="" class="c-btn-dn__item"></a>
          </li>
        </ul>

    </section>


<?php get_footer(); ?>
