<?php
/*
Template Name: アクセスページ
*/
 ?>

<?php  get_header(); ?>

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



  <?php create_breadcrumb(); ?>


<div class="gmap_wrap space-top">



  <?php if(have_posts()): while(have_posts()): the_post(); ?>
<div class="title">
      <h2><?php the_title(); ?></h2>
</div>


<?php the_content();?>

  <?php endwhile; endif; ?><!--ループ終了-->

    <div id="map"></div>


<script>//gmap設定

  function initMap() {
    var uluru = {lat: 35.656544, lng: 139.580533};

    var map = new google.maps.Map(
      document.getElementById('map'), {
        zoom: 15,
        center: {lat: 35.656544, lng: 139.580533},

      });

  var marker = new google.maps.Marker({
      position:  {lat: 35.656544, lng: 139.580533},
      map: map,
      });

  var infowindow = new google.maps.InfoWindow({
    content: "<h2>タンザニアポレポレクラブ</h2><p>東京都調布市東つつじケ丘2-39-11アザレアヒルズ203</p>"
  });
      marker.addListener("mouseover", function() {
        infowindow.open(map,marker);
      });

   }//end

   </script>
</div>

<?php get_footer(); ?>
