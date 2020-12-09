<ul class="list-wrappre">
  <?php if(is_page('adout') ): ?>
    <li><a href="<?php home_url(); ?>adout" class="txt-top">団体概要</a></li>
    <li><a href="<?php home_url(); ?>">HOME</a></li>
    <li><a href="<?php home_url(); ?>adout-katudou">活動概要</a></li>
	<li><a href="<?php home_url(); ?>support">支援参加方法</a></li>
	  <li><a href="<?php home_url(); ?>yotei">活動予定</a></li>
	  <li><a href="<?php home_url(); ?>contact">お問い合わせ</a></li>
  <?php elseif(is_page('yotei') ): ?>
	 <li><a href="<?php home_url(); ?>yotei" class="txt-top">活動予定</a></li>
	    <li><a href="<?php home_url(); ?>">HOME</a></li>
    <li><a href="<?php home_url(); ?>adout">団体概要</a></li>

    <li><a href="<?php home_url(); ?>adout-katudou">活動概要</a></li>
	<li><a href="<?php home_url(); ?>support">支援参加方法</a></li>
	  <li><a href="<?php home_url(); ?>contact">お問い合わせ</a></li>
  <?php elseif(is_page() ): ?>
  <?php
  // 子ページのあるページ
  $postid = get_the_ID();
  $parent = $postid;
  $args = array(
    'child_of' => $parent
  );
  $pages = get_pages( $args );
  if ( $pages ) {
    $pageids = array();
    foreach ( $pages as $page ) {
      $pageids[] = $page->ID;
    }
    $args = array(
      'title_li' => '',
      'include' => $parent . ',' . implode( ",", $pageids )
    );
    wp_list_pages( $args );
  }
  ?>
  <?php endif; ?>
</ul>
