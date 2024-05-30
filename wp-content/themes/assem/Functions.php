<?php
//require_once('wp-bootstrap-navwalker.php');
//require_once(get_template_directory() . "/wp-bootstrap-navwalker.php");
//require_once(realpath(dirname(__FILE__) . '/wp-bootstrap-navwalker.php'));
//require_once get_template_directory() . '/wp-bootstrap-navwalker.php';
//require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

//require_once('wp-includes/foundation-walker.php') ;
function register_navwalker(){
  require_once get_template_directory() . '/wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );
/** function  to add custom style
 **wp_enqueue_style
  **/
 function assem_add_styles(){//ممكن تسمية الفانكشن باي اسم
   /** function  to add custom style
   **wp_enqueue_style
     **/
    wp_enqueue_style('bootstrap-css',get_template_directory_uri() .'/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome-css',get_template_directory_uri() .'/css/fontawesome.min.css');
    wp_enqueue_style('main-css',get_template_directory_uri() .'/css/main.css');

 }
  function assem_add_script()
  {//ممكن تسمية الفانكشن باي اسم

      wp_deregister_script('jquery');//remove registreation for old jquery
      wp_register_script('jquery',includes_url('/js/jquery.js'),false,'',true);//register a new jqquery
      wp_enqueue_script('jquery');//enqueue ne jquery
       ////////////////////////////////////////////////////////////////
      wp_enqueue_script('bootstrap-js',get_template_directory_uri() .'/js/bootstrap.min.js',array(),false,true);//اخر ترو عرض السكريبت فياخرالصفحة
      wp_enqueue_script('main-js',get_template_directory_uri() .'/js/main.js',array(),false,true);
      wp_enqueue_script('bundle-js',get_template_directory_uri() .'/js/bootstrap.bundle.min.js',array(),false,true);
      //////////////////////////////
       wp_enqueue_script('html5shiv-js',get_template_directory_uri() .'/js/html5shiv.min.js');
    
      wp_script_add_data('html5shiv-js','conditional','if lt IE 9');
       wp_enqueue_script('respond-js',get_template_directory_uri() .'/js/respond.min.js');
      wp_script_add_data('respond-js','conditional','if lt IE 9');
      /*wp_enqueue_script( $handle, $src, $deps, $ver, $args );

      $handle is the name for the script.
           $src defines where the script is located.
      $deps is an array that can handle any script that your new script depends on, such as jQuery.
      $ver lets you list a version number.
      $args an array of arguments that define footer printing (via an in_footer key) and script loading strategies (via a strategy key) such as defer or async. This replaces/overloads the $in_footer parameter as of WordPress version 6.3.
     */

     /** add action */
   }

     /**
      * add custom menu support
      *
     */
    function assem_register_menus() { 
      register_nav_menus(
          array(
              'bootstrap-menu' => 'Navigation Bar',//location
              'footer-menu' => 'Footer Menu',
          )
      ); 
  }
  
add_action( 'init', 'register_navwalker' );
  // register_nav_menu(  'bootstrap-menu', __('Navigation Bar')); NAME  DESCRIPION
  function assem_bootstrap_menu(){
    wp_nav_menu(array(
                'theme_location'=>'bootstrap-menu',
                'menu_class'=>'nav navbar-nav  ml-auto ',
                'container' => 'false',
                'depth'     =>  2 ,
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'    => new wp_bootstrap_navwalker() 
    ));
  }
  add_theme_support('post-thumbnails');


   add_action( 'wp_enqueue_scripts', 'assem_add_styles' );
   add_action( 'wp_enqueue_scripts', 'assem_add_script' );
   add_action( 'init', 'assem_register_menus' );

  
// add Featured Images 
//add_theme_support( 'post-thumbnails' );
//By default, excerpt length is set to 55 words. To change excerpt length to 20 words using the excerpt_length filter,
function wporg_fcs_excerpt_more( $more ) {
  return '...';
}
add_filter( 'excerpt_more', 'wporg_fcs_excerpt_more' );

function mytheme_custom_excerpt_length( $length ) {
  if(is_author()){// in author page
    return 30 ;
  }else{
    return 70 ;
  }

 }
  add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length' );
// numbering pagination
function numbering_pagination(){
  global $wp_query ; //object) The global instance of the Class_Reference/WP_Query class.
  $all_pags = $wp_query->max_num_pages;// get all pages
  $current_page = max(1,get_query_var('paged'));//get_query_ver('paged') رقم الصفحة الي انت فيها
     if( $all_pags >1){
      return paginate_links(array(
        'base'=> get_pagenum_link() . '%_%',
         'format'=> 'page/%#%',
         'current'=> $current_page ,
         'end_size'=> 1,//How many numbers on either the start and the end list edges. Default 1.
        
         'mid_size'=>1, //How many numbers to either side of the current pages. Default 2.
         //'total' => $all_pags , //default,
      ));
     }
}

// register sidepar
function assem_main_saidebar(){

  register_sidebar(array(
     'name'=> 'main sidebar',
     'id'=> 'main-sidebar',
     'description'=> 'main sidebare appear evreywhar',
     'class' => 'main-sidebar',
     'before_widget'=> '<div class="contnt-widet">', // code html
     'after_widget'=> '</div>',
     'before_title' =>'<h3 class="tite-widget">',
     'after_title' =>'</h3 >',
          ));
}
add_action('widgets_init','assem_main_saidebar');

// get category comments count
function assem_category_comment_count(){
  $argument_comment=array(
    'stauts'=>'approve',
    );
    $acomment_count=0;
    $all_comments= get_comments($argument_comment);
    foreach($all_comments as $comment){
    $post_id =  $comment->comment_post_ID ;
    if(! in_category('php',$post_id)){
        continue;
    }
    $acomment_count++;
   
  
    
    }
    return  $acomment_count;
}
//get category posts count
function assem_get_category_posts_count(){
  $cat = get_queried_object();// get full object properties
  $post_count = $cat->count;// get posts count
  return $post_count;
}

 //echo  "<pre>";
  //print_r($cat);
  //echo  "</pre>";
function assem_remove_pargraph($content){
  remove_filter('the_content','wpautop');
  return $content;
}
add_filter('the_content','assem_remove_pargraph',0);
?>