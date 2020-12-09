

<?php get_header(); ?>

<!-- 本番ではID 9068 ローカル 9033 -->

<?php if(get_field('event_archive_header_img',9068)): ?>

        <div class="page-head" id="js-mt-spaece">
            <div class="page-head__img">
              <div class="page-head__img-inner">
                    <img src="<?php the_field('event_archive_header_img',9068); ?>" alt="<?php the_field('event_archive_header_text'); ?>">
              </div>
            </div>

            <div class="page-head__inner">
              <h1 class="page-head__ttl">
              <?php the_field('event_archive_header_text',9068); ?>
              </h1>
            </div>
        </div>

      <?php else: ?>
        <h1 class="page-head-no-img">
            <span class="page-head-no-img__text"><?php the_field('event_archive_header_text',9068); ?></span>
        </h1>
      <?php endif; ?>


  <?php create_breadcrumb(); ?>


		<div class="content content--event cf">




          <div class="title cf">
              <h2 class="date-category-listTitle">
                活動予定一覧
              </h2>
          </div>


  <?php if(have_posts()): while(have_posts()):the_post(); ?>

    <article class="achive-event">

    <h3 class="achive-event__name"><?php the_field("event_ttl");?></h3>

       <div class="achive-event__box">
         <div class="achive-event__top">


         <div class="achive-event__thumb">
           <img src="<?php the_field("event_thumb");?>" alt="イベントサムネイル">
         </div>
         <div class="achive-event__table">
              <?php if(get_field('event_day')): ?>
                <dl class="achive-event__row">
                  <dt class="achive-event__ttl">日時</dt>
                  <dd class="achive-event__desc">
                  <?php the_field("event_day");?>
                  </dd>
                </dl>
              <?php endif;?>
              <?php if(get_field('event_space')): ?>
                <dl class="achive-event__row">
                  <dt class="achive-event__ttl">場所</dt>
                  <dd class="achive-event__desc">
                  <?php the_field("event_space");?>
                  </dd>
                </dl>
              <?php endif;?>
               <?php if(get_field('event_price')): ?>
                <dl class="achive-event__row">
                  <dt class="achive-event__ttl">参加費</dt>
                  <dd class="achive-event__desc achive-event__desc--price">
                  <?php the_field("event_price");?>円
                  </dd>
                </dl>
              <?php endif;?>
         </div>

         </div>



            <?php if(get_field('event_contents')): ?>
                <dl class="achive-event__row achive-event__row--bottom">
                  <dt class="achive-event__ttl achive-event__ttl--bottom">内容</dt>
                  <dd class="achive-event__desc achive-event__desc--bottom">
                  <?php the_field("event_contents");?>
                  </dd>
                </dl>
              <?php endif;?>

              <?php if(get_field('event_other')): ?>
                <dl class="achive-event__row achive-event__row--bottom" >
                  <dt class="achive-event__ttl achive-event__ttl--bottom">備考</dt>
                  <dd class="achive-event__desc achive-event__desc--bottom">
                  <?php the_field("event_other");?>
                  </dd>
                </dl>
              <?php endif;?>







        <!--  <?php
        $btn_type = get_field( 'btn_read' );
        if ( $btn_type == 'on' ) {
          ?>
        <a href="<?php the_permalink() ?>" class="event-btn">
          詳しく見る
        </a>
        <?php } elseif($btn_type =='off'){ ?>

        <?php }?> -->

        <?php
        $btn_type = get_field( 'btn_contact' );
        if ( $btn_type == 'on' ) {
          ?>
        <a href="<?php echo home_url('/');?>contact?subject=<?php the_field("event_ttl");?>" class="event-btn">参加する</a>
        <?php } elseif($btn_type =='off'){ ?>

        <?php }?>
       </div>

    </article>

      <?php endwhile; endif; ?>

      <!--ページネーション追加-->
      <div class="pagination">
        <?php echo paginate_links( array(
          'type' => 'list',
          'mid_size' => '2',
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;'
          ) ); ?>
      </div>
        <?php wp_reset_query(); ?>


</div><!-- コンテンツ終了 !-->

<?php get_footer(); ?>
