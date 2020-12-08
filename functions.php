<?php

//サムネイル画像有効
add_theme_support( 'post-thumbnails', array( 'post' ) );

//投稿サムネイルサイズ指定
add_image_size('thumb300',300,220,true);

//ナビゲーションメニュー
register_nav_menu( 'globalNavi' , 'グローバルナビ' );
register_nav_menu( 'mabailNavi' , 'モバイルナビ');
register_nav_menu( 'footerNavi' , 'フッターナビ');

//アーカイブページ、ウィジェット
function widgetarea_init() {
  register_sidebar(array(
      'name'=>'リストページ',
      'id' => 'list-widget',

      ));
}
add_action( 'widgets_init', 'widgetarea_init' );

//バナーエリアウィジェット
  register_sidebar(array(
      'name'=>'メインバナー',
      'id' => 'banner-widget',
      'class' => 'bannerImage',
      'before_widget' => '<div class="bannerImage">',
      'after_widget' => '</div>',
	  'before_title' => '<h2 class="banner_title">',
  	  'after_title' => '</h2>',
      ));

/** 「アーカイブ」ウィジェットの表示件数を設定 */
add_filter( 'widget_archives_args','my_archives');
function my_archives( $content ){
	$content['type'] 	= 'yearly';

	return $content;
}
function get_archives_by_fiscal_year( $args = '' ) {
    global $wpdb, $wp_locale;
    $defaults = array (
        'post_type' => 'post',
        'limit' => '',
        'format' => 'html',
        'before' => '',
        'after' => '',
        'show_post_count' => false,
        'echo' => 1
    );
    $r = wp_parse_args( $args, $defaults );
    extract ( $r, EXTR_SKIP );
    if ( '' != $limit ) {
        $limit = absint( $limit );
        $limit = ' LIMIT ' . $limit;
    }
    $arcresults = (array) $wpdb->get_results(
        "SELECT YEAR(ADDDATE(post_date, INTERVAL -3 MONTH)) AS `year`, COUNT(ID) AS `posts`
        FROM $wpdb->posts
        WHERE post_type = '$post_type' AND post_status = 'publish'
        GROUP BY YEAR(ADDDATE(post_date, INTERVAL -3 MONTH))
        ORDER BY post_date DESC
        $limit"
    );
    return $arcresults;
}

//MW FORM パラメーター

function my_mwform_value($value, $name){
    if($name === 'subject' && !empty($_GET['subject']) && !is_array($_GET['subject'])){
        return $_GET['subject'].'参加希望';
    }
    return $value;
}
add_filter('mwform_value_mw-wp-form-165', 'my_mwform_value', 10, 2);

/**
 * パンくず生成関数
 */
function create_breadcrumb() {

  // wpオブジェクト取得
  $wp_obj = get_queried_object();

  // パンくずのどのページでも変わらない部分を出力
  echo
    '<div class="p-breadcrumb">'.
      '<ol class="p-breadcrumb__lists" itemscope itemtype="http://schema.org/BreadcrumbList">'.
        '<li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="p-breadcrumb__item">'.
          '<a itemprop="item" href="' . home_url() . '">'.
            '<span itemprop="name">TOP</span>'.
          '</a>' .
          '<meta itemprop="position" content="1">'.
        '</li>';

  // 固定ページ（page-○○.php）
  if(is_page()){
    echo
      '<li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="p-breadcrumb__item">'.
        '<a itemprop="item" href="' . home_url($_SERVER["REQUEST_URI"]) . '">'.
          '<span itemprop="name">' . single_post_title('', false) . '</span>' .
        '</a>' .
        '<meta itemprop="position" content="2">'.
      '</li>';
  }

  // カスタム投稿 TOPページ（archive-○○.php）
  if(is_post_type_archive()){
    echo
      '<li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="p-breadcrumb__item">'.
        '<a itemprop="item" href="' . home_url($wp_obj->name) . '">'.
          '<span itemprop="name">' . $wp_obj->label . '</span>'.
        '</a>' .
        '<meta itemprop="position" content="2">'.
      '</li>';
  }

  // カスタム投稿 タクソノミー一覧ページ（taxonomy-○○.php）
  if(is_tax()){
    $post_slug = get_post_type();
    $post_label = get_post_type_object($post_slug)->label;
    echo
      '<li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="p-breadcrumb__item">'.
        '<a itemprop="item" href="' . home_url($post_slug) . '">'.
          '<span itemprop="name">' . $post_label . '</span>'.
        '</a>' .
        '<meta itemprop="position" content="2">'.
      '</li>'.
      '<li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="p-breadcrumb__item">'.
        '<a itemprop="item" href="' . home_url($post_slug . '/' . $wp_obj->slug) . '">'.
          '<span itemprop="name">「' . $wp_obj->name . '」カテゴリー一覧</span>'.
        '</a>' .
        '<meta itemprop="position" content="3">'.
      '</li>';
  }

  // カスタム投稿 詳細ページ（single-○○.php）
  if(is_singular() && !is_page()){
    $post_slug = get_post_type();
    $post_label = get_post_type_object($post_slug)->label;
    $post_id = $wp_obj->ID;
    $post_title = $wp_obj->post_title;
    echo
      '<li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="p-breadcrumb__item">'.
        '<a itemprop="item" href="' . home_url($post_slug) . '">'.
          '<span itemprop="name">' . $post_label . '</span>'.
        '</a>' .
        '<meta itemprop="position" content="2">'.
      '</li>'.
      '<li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="p-breadcrumb__item">'.
        '<a itemprop="item" href="' . home_url($post_slug . '/' . $post_id) . '">'.
          '<span itemprop="name">' . $post_title . '</span>'.
        '</a>' .
        '<meta itemprop="position" content="3">'.
      '</li>';
  }

  // 404（404.php）
  if(is_404()){
    echo
      '<li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="p-breadcrumb__item">'.
        '<a itemprop="item" href="' . home_url($_SERVER["REQUEST_URI"]) . '">'.
          '<span itemprop="name">404 Not Found</span>' .
        '</a>' .
        '<meta itemprop="position" content="2">'.
      '</li>';
  }

  // パンくずのどのページでも変わらない部分を出力
  echo
    '</ol>'.
  '</div>';

}

//段落挿入と改行入れ替え

add_filter( 'tiny_mce_before_init', 'custom_tiny_mce_forced_root_block' );
function custom_tiny_mce_forced_root_block( $settings ) {
  $settings[ 'forced_root_block' ] = false;
  return $settings;
}

//エディタ用CSS挿入

add_editor_style( 'admin/editor-style.css' );


//管理画面にメニュー追加

/*メニューにトップページ管理*/
function add_page_to_admin_menu()
{
    add_menu_page('トップページ管理', 'トップページ管理', 'edit_posts', 'post.php?post=7578&action=edit', '', 'dashicons-format-gallery
', 3);

add_menu_page('ナビゲーション管理', 'ナビゲーション管理', 'edit_posts', '/post.php?post=7579&action=edit', '', 'dashicons-format-gallery
', 3);
}
add_action('admin_menu', 'add_page_to_admin_menu');



function my_tinymce($settings) {
	$settings['block_formats'] = '段落=p;見出し1=h2;見出し2=h3;見出し3=h4;見出し4=h5;';
	$settings['indent_use_margin'] = true; /*インデントのpadding-leftをmargin-leftに変える*/
	$settings['indentation'] = '2px';          /*インデント量を1文字にする。1emを使わないのは文字サイズでインデント量を変えない為*/
	$settings['fontsize_formats'] = "10px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px";
	$settings['font_formats'] ='メイリオ=Meiryo;游ゴシック=Yu Gothic;游ゴシック Medium=Yu Gothic Medium;Arial=Arial;Verdana=Verdana;Times New Roman=Times New Roman;GEORGIA=GEORGIA;Myriad=Myriad;Menlo=Menlo;ＭＳ ゴシック=ＭＳ ゴシック';
	$settings['cache_suffix'] = 'v='.time();
	return $settings;}
add_filter( 'tiny_mce_before_init', 'my_tinymce' );

function modify_formats($settings){
   $formats = array(
     'bold' => array('inline' => 'b'),
     'italic' => array('inline' => 'i')
    );
    $settings['formats'] = json_encode( $formats );
    return $settings;
}
add_filter('tiny_mce_before_init', 'modify_formats');


//TinyMCE Advanced独自ボタン追加
//　ビジュアルエディタで任意クラスを付与
function _my_tinymce($initArray) {
    $style_formats = array(
        array(
            'title' => '強調',
            'inline' => 'strong',
            'classes' => 'strong-text'
        ),
        array(
            'title' => 'マーカー',
            'inline' => 'span',
            'classes' => 'marker'
        ),
         array(
            'title' => '文章',
            'block' => 'p',
            'classes' => 'blog-articles'
        ),
        array(
            'title' => '見出し1',
            'block' => 'h2',
            'classes' => 'blog-title01'
        ),
        array(
            'title' => '見出し2',
            'block' => 'h3',
            'classes' => 'blog-title02'
        ),
        array(
            'title' => '見出し3',
            'block' => 'h4',
            'classes' => 'blog-title03'
        ),
        array(
            'title' => '見出し4',
            'block' => 'h5',
            'classes' => 'blog-title04'
        ),
        array(
            'title' => 'グレーボックス',
            'block' => 'div',
            'classes' => 'blog-gray-box'
        ),
    );
    $initArray['style_formats'] = json_encode($style_formats);
    return $initArray;
}
add_filter('tiny_mce_before_init', '_my_tinymce', 10000);
