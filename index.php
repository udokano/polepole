<?php
/*
Template Name: フロントページ
*/
 ?>

<?php get_header(); ?>

<!-- ファーストビュースライド設定 -->
<?php if (have_rows('top__slide',7578)): ?>
<div class="key_visual" id="js-mt-spaece">
			<ul class="key_visual__slides cf" id="js-slide">
			<?php while (have_rows('top__slide',7578)) : the_row(); ?>
			<li class="key_visual__item">
				   <a href="<?php the_sub_field('slide__link',7578);?>" class="key_visual__link">
					 <img data-lazy="<?php the_sub_field('slide_img',7578);?>" alt="PCスライド３" class="pc-display"/>
					 <img data-lazy="<?php the_sub_field('slide_img_sp',7578);?>" alt="SPスライド3" class="sp-display"/>

					 <div class="key_visual__text-box">
						 <p class="key_visual__text-inner">
								 <span class="key_visual__text-desc key_visual__text-desc--large"><?php the_sub_field('slide_cach__text',7578);?></span>
								 <?php the_sub_field('slide__text__sub',7578);?>

						 </p>
							 <div class="key_visual__btn">
							   <p class="key_visual__btn-text">詳しくはこちら</p>
							 </div>
					  </div>
				 </a>
				 </li>
				 <?php endwhile; ?>
			</ul>
		</div>
		<?php else: ?>
 <?php endif; ?>


 <!--　グローバルメニュー設定 -->

<?php if (have_rows('gnav_pear',7579)): ?>
<div id="js-gnav" class="gNavi">
    <nav>
      <ul class="navInner">
	  <?php while (have_rows('gnav_pear',7579)) : the_row(); ?>
	  <li class="navInner__item">
		<a href="<?php the_sub_field('gnav_pear_link',7579);?>" class="navInner__link <?php the_sub_field('link',7579);?> <?php the_sub_field('have_mega',7579);?>">
		<div class="sss">
		<?php the_sub_field('gnav_pear01',7579);?>
		<br>
		  <span class="naviSub">
			  <?php the_sub_field('gnav_pear_sub_text',7579);?>
		  </span>
		</div>
		
		</a>
		   <!-- サブリピートスタート メガメニュー-->
		   <?php if (have_rows('gnav_child')): ?>
   
				<div class="mega-menu">
					<ul class="mega-menu__list">
					<?php while (have_rows('gnav_child', 7579)) : the_row(); ?>
						<li class="mega-menu__item">
							<a href="<?php the_sub_field('gnav_child_link', 7579); ?>" class="mega-menu__link">
							<div class="mega-menu__thumb">
							<img src="<?php the_sub_field('gnav_child_thumb', 7579); ?>" alt="メガメニュー">
							</div>
							<p class="mega-menu__text"><?php the_sub_field('gnav_child_text', 7579); ?></p>
							</a>
						</li>
						<?php endwhile; ?>
					</ul>
				</div>
       
        <?php endif; ?>
        <!--  サブリピートEND-->
	</li>
	  <?php endwhile; ?>
	  </ul>
	  </nav>
  </div>
<?php else: ?>
<?php endif; ?>

		<div class="content content--top cf" id="front">

		<section class="content__main content__main-top" id="top">

			<a href="#more_mobail" >aaaaaaaaaa</a>

			  <div class="title cf">
				<h2>WHAT'S NEW<span class="newsSub">最新情報</span></h2>
			
			  </div>

				
		<?php
				// WP_Queryのパラメータを指定,新着情報5件抜粋
				$args = array(
				    'posts_per_page' => 5,
				    'orderby' => 'date',
            		'order' => 'DESC'
				);
				// WP_Queryクラスのインスタンスを作成
				$the_query = new WP_Query( $args );

				// ループ開始
				while ( $the_query->have_posts() ) :
					// カスタムクエリの投稿データをセット
					$the_query->the_post();?>

				<article <?php post_class( 'newsTopic' ); ?>>
						<a href="<?php the_permalink(); ?>">
										<!--画像を追加-->
						  <div class="thumbnail-wrap">
							<?php if( has_post_thumbnail() ): ?>
							<?php the_post_thumbnail('thumb300'); ?>

							　<?php else: ?>
								<img src="<?php echo get_template_directory_uri(); ?>/img/no-image.gif" alt="no-img"/>
							　<?php endif; ?>
						  </div>
						  <div class="newsText">
							<!--カテゴリ-->
							 <span class="category-area <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->slug; } ?>">
                  <?php $postcat=get_the_category(); echo $postcat[0]->name; ?>
                  </span>
							<!--投稿日を表示-->
							  <span class="kiji-date">
								<time datetime="<?php echo get_the_date( 'Y/m/d' ); ?>">
									<?php the_time('Y/m/d'); ?>
								</time>
							  </span>

							<!--タイトル-->
							  <h3><?php the_title(); ?></h3>
						    </div>
						</a>
				 </article>

    		<?php endwhile;
    				// ループ終了
    				// メインクエリの投稿データに戻す
    		wp_reset_postdata(); ?>
			
					<div id="more_mobail" class="smart">
						<a href="<?php home_url(); ?>adout-katudou/news-list/">一覧へ</a>
					</div>
				</section>


			<?php get_sidebar(); ?>

			
				<?php if (have_rows('top_banner',7578)): ?>
				<aside>
			
				<ul class="bannerArea">
					<?php while (have_rows('top_banner',7578)) : the_row(); ?>

						<li class="bannerArea__item">
							<a href="<?php the_sub_field('banner_link',7578); ?>" target="_blank">
							<img src="<?php the_sub_field('banner_img',7578); ?>" alt="サイドバナー"></a>
						</li>

					<?php endwhile; ?>
					</ul>
					</aside> 
					<?php else: ?>
					<?php endif; ?>
			
	

	</div><!-- コンテンツ終了 !-->
<?php get_footer(); ?>
