                  <?php if (have_rows('top_banner',7578)): ?>
				<aside class="bannerArea">

				<ul class="bannerArea__list">
					<?php while (have_rows('top_banner',7578)) : the_row(); ?>

						<li class="bannerArea__item">
							<a href="<?php the_sub_field('banner_link',7578); ?>" target="_blank">
                  <div class="bannerArea__img-wrap">
                    <img src="<?php the_sub_field('banner_img',7578); ?>" alt="サイドバナー" class="bannerArea__img">
                  </div>
                <p class="bannerArea__ttl"><?php the_sub_field('banner_text',7578); ?></p>
              </a>
						</li>

					<?php endwhile; ?>
					</ul>
					</aside>
					<?php else: ?>
			<?php endif; ?>



<footer>

  <div class="footerInner">

  </div>
  <!-- フッターインナー終了!-->



  <div id="copy">
    <p id="copyRight"><small>※当サイトに掲載している、記事、写真等の無断転用を禁止します。<br>
      Copyright&copy;タンザニア・ポレポレクラブ All Rights Reserved.</small>
    </p>
  </div>

</footer>

    <div id="pagetop"><span class="top_triangle"></span></div><!--ページトップボタン-->


</div><!-- ラッパー終了 !-->


<!--[if lt IE 9]>
<script type="text/javascript" src="js/respond.js"></script>
<![endif]-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/style.js?<?php echo filemtime(get_template_directory() . '/js/style.js'); ?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/css_browser_selector.js"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDumlHvu4kuFwoQZ6TutbeYojeBRTzOlRQ&callback=initMap">
</script>
<?php wp_footer(); ?>
</body>
</html>
