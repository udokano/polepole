<!doctype html>
<html><head>
	<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
	<![endif]-->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,user-scalable=no">
<title><?php bloginfo('name'); ?></title>
	
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css?<?php echo filemtime( get_stylesheet_directory() . '/css/style.css'); ?>">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tablet.css?aa">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/smart.css?aaaa">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/img/favicon/site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#00aba9">
	<meta name="theme-color" content="#ffffff">
	
	
	<script>
		//WEBフォント
  (function(d) {
    var config = {
      kitId: 'tnu1wdq',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
	</script>
	
 <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
   <div id="wrappre">
     <header class="site-header" id="js-header">
		 <div id="headerInner">
         <h1 class="logo">
			 <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png?3333333sdcfffgg"
					alt="タンザニア・ポレポレクラブ"></a>
		</h1>
    <!--ドロワーメニュー-->
				<button type="button" class="btn_menu smart" id="js-swchi">
				  <span class="bar bar1"></span>
				  <span class="bar bar2"></span>
				  <span class="bar bar3"></span>
				  <span class="menubtn">MENU</span>
				  <span class="close">CLOSE</span>
				</button>

				<div class="headerNavi pc">
					<ul>
						<li><a href="<?php echo home_url('/');?>contact">お問い合わせ</a></li>
						<li><a href="<?php echo home_url('/');?>access">アクセス</a></li>
						<li><a href="<?php echo home_url('/');?>about-english">English</a></li>
					</ul>
				</div>

				<div class="icons pc">
					<ul>
						<li class="button_wrap">
						<a href="<?php the_field("member",7579); ?>"  target="_blank" class="button_text"  id="member">会員になる</a>
						</li>
						<li class="button_wrap">
						<a href="<?php the_field("donation",7579); ?>" target="_blank" class="button_text" id="donation">寄付する</a>
						</li>
						<li><a href="https://www.facebook.com/TanzaniaPolePoleClub" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/img/fb_icon.png" alt="フェイスブックリンク"></a></li>
						<li><a href="https://twitter.com/tanzania_pole2" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/img/tw_icon.png" alt="ツイッターリンク"></a></li>
						<li><a href="https://www.instagram.com/tanzaniapole2club/?hl=ja" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/img/instr_icon.png" alt="インスタグラムリンク"></a></li>
					</ul>
				</div>
			</div><!--ヘッダーインナー終了-->

			<?php if ( is_home() || is_front_page() ) : ?>

<?php else: ?>
<!-- 下層ページようGナビ -->

<?php if (have_rows('gnav_pear',7579)): ?>
<div id="js-gnav" class="gNavi pages-gnav">
    <nav>
      <ul class="navInner pages-gnav__inner">
	  <?php while (have_rows('gnav_pear',7579)) : the_row(); ?>
	  <li class="navInner__item pages-gnav__item">
		<a href="<?php the_sub_field('gnav_pear_link',7579);?>" class="navInner__link <?php the_sub_field('link',7579);?> <?php the_sub_field('have_mega',7579);?>">
		<div class="sss">
		<?php the_sub_field('gnav_pear01',7579);?>
		<br>
		  <span class="naviSub pages-gnav__sub-text">
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





<?php endif; ?>
		</header>




