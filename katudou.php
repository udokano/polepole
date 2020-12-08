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


 <div class="gNavi pc">
    <nav>
      <ul class="navInner">
        <li><a href="<?php home_url(); ?>">HOME<br>
          <span class="naviSub">最新情報</span></a> </li>
        <li><a href="<?php home_url(); ?>adout">団体概要<br>
          <span class="naviSub">組織/年次報告,計画</span></a>
        </li>
        <li><a href="<?php home_url(); ?>adout-katudou">活動概要<br>
          <span class="naviSub">海外活動/情報一覧</span></a>
          <ul class="sub-menu">
            <li><a href="<?php home_url(); ?>adout-katudou/gaiyou">活動概要(海外/国内)</a></li>
            <li><a href="<?php home_url(); ?>adout-katudou/news-list/">最新情報一覧</a></li>
          </ul>
        </li>
        <li><a href="<?php home_url(); ?>support">支援/参加方法<br>
          <span class="naviSub">個人/企業の皆様へ</span></a>
          <ul class="sub-menu">
            <li><a href="<?php home_url(); ?>">会員になるには</a></li>
            <li><a href="<?php home_url(); ?>">ご寄付（植林/養蜂等）</a></li>
            <li><a href="<?php home_url(); ?>">マンスリーサポータ（会員/寄付）</a></li>
            <li><a href="<?php home_url(); ?>">企業団体のみなさまへ</a></li>
            <li><a href="<?php home_url(); ?>">アルバイト/ボランティア募集</a></li>
            <li><a href="<?php home_url(); ?>">壁紙募金</a></li>
          </ul>
        </li>
        <li><a href="<?php home_url(); ?>yotei">活動予定<br>
          <span class="naviSub">イベント/ミーティング</span></a>
        </li>
        <li><a href="<?php home_url(); ?>contact">お問い合わせ<br>
          <span class="naviSub">お問い合わせフォーム</span></a> </li>
      </ul>
    </nav>
  </div>



  <div class="content cf">
<?php breadcrumb(); ?>
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
