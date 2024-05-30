

<?php get_header();
include(get_template_directory(). "/bredcumb.php")
?>
 
<div class="container ">


         <?php  if(have_posts()){ 
          while(have_posts()){
              the_post()  ?>


             <div class="main-post single-post">
                <?php edit_post_link('EDIT <i class="fa fa-pencil"></i>');?>
               <h3 class="post-title">
                  <a href="<?php the_permalink(); ?>">
                     <?php the_title(); ?>
                   </a>
               </h3>
               <span class="post-author">
                <!--  <i   class="fa fa-user fa-border " aria-hidden="true"></i>--> <?php //the_author_posts_link(); ?> 
                <span  class="post-date">
                  <i  class="fa fa-calendar fa-border" aria-hidden="true"></i><?php the_date(); ?>  at<?php the_time(); ?> , 
               </span>
               <span  class="post-comments">
                  <i  class="fa fa-calendar fa-border" aria-hidden="true"></i> <?php comments_popup_link(false,false,false,'comment_url','comment disable') ; ?><!--class = comment_url--> <!--https://developer.wordpress.org/reference/functions/comments_popup_link/ -->

               </span>
               <?php the_post_thumbnail('medium',['class'=>'img-thumbnail img-responsive', 'title' => 'Feature image' ]) ; ?>
               <div class="post-content">
                  <?php the_content();//the_excerpt()مقتطفات  55أول 55حرف?>
                  <?php // the_content(' ...    more  ' .   get_the_title());?>
                 <?php //echo wp_trim_words(get_the_excerpt(), 15); ?> 
                </div>
               <hr>
                <p class="post_categories">
                 <i class="fa fa-tags" aria-hidden="true"></i>
                  <?php  the_category(' , '); ?>
               </p>
                <p class="post_tags">
                  <?php if(has_tag()){
                  the_tags();
                  }else{
                     echo "not tags";
                  }
                  ?>
                </p>
           </div>
           <!------------------------------------>
           <?php
                //get  post id =  echo get_queried_object_id();
               //gategories id  print_r(wp_get_post_categories(get_queried_object_id()));
              $post_argument=array(
               'posts_per_page'=> 3,
               'orderby'       =>'rand',
               'category__in'   => wp_get_post_categories(get_queried_object_id()),
               'post__not_in' =>array(get_queried_object_id()),
              );
              $random_post = new WP_Query($post_argument);
              if($random_post->have_posts()){
               while($random_post->have_posts()){
                  $random_post->the_post();?>
                  <div class="author-posts">
      
                  <h3 class="post-title">
                    <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                      </a>
                  </h3>
                  <hr>
                 
              </div> 
              <?php }};
                 wp_reset_postdata() ;
              ?>
                 <!--end loop-->
               
              <!------------------------------------------------>
           <div class="row">
            <div class="col-md-2">
                  <?php 
                                $argument_avatar= array(
                   'class'=> 'img-responsive img-thumbnail center-block'
                  );

                
                  echo get_avatar(get_the_author_meta('id'),125,'','user-avatar',  $argument_avatar) ; ?>
               </div>
                <div class="col-md-10 auther-info mt-3">
                <h4>
                 <?php  the_author_meta('first_name') ; ?>
                 <?php  the_author_meta('last_name') ; ?>
                  (<span class="nickname"><?php  the_author_meta('nickname') ; ?></span>)
                 
                </h4>
                    <div class="auther-stats my-2">
                      User posts count : <span class="posts-count "><?php echo count_user_posts(get_the_author_meta('id'))  ?></span> ,
                      User profile linke <span class=""> <?php the_author_posts_link()?> </span>
                     </div>
                <?php if  (get_the_author_meta('description')){ ?>
                    <p><?php the_author_meta('description') ; ?></p>
                   <?php  }else{
                        echo " there is not description";
                   }?>
               </div>  
          
          </div> 
        
          <?php }}?>
       </div>
       <hr>
       <div class="post_single_pagination ">
          <?php
            
            if(get_next_post_link()){
            next_post_link('%link', ' <button class="button-24" role="button"> 
            <i class="fa fa-chevron-left fa-fw fa-lg" aria-hidden="true"></i>PREVIOUS: %title
           </button>' );
             }else{
             echo' <span class="next-span"> NEXT</span>';
            }

            if(get_previous_post_link()){
               previous_post_link('%link', ' <button class="button-24" role="button">
               NEXT: %title <i class="fa fa-chevron-right fa-fw fa-lg" aria-hidden="true"></i>
               </button>');
       }else{
      echo' <span class="previous-span">PREV</span>';
       }
            ?>
          
        </div>
         <div class="comment-seaprator"> 
         <?php comments_template(); ?>
         </div>
        
         
       
        

          <!-- <div class="col-sm-6">
             <div class="main-post">
                <h3 class="post-title"> this post main1</h3>
                <span class="post-author"><i   class="fa fa-user fa-border " aria-hidden="true"></i> assem , </span>
                <span  class="post-date"><i  class="fa fa-calendar fa-border" aria-hidden="true"></i> 13/3/2024 , </span>
                <img class="img-fluid "style="width: 600px; height: 200px;" src="https://www.verdict.co.uk/wp-content/uploads/2019/04/php-attacks.jpg"alt=""/>
                <p class="post-content">Female Brutally Slaps Her Exes Mother Multiple Times - 
                man watches over his neighbour’s house after hearing a series of sound and he got..Reports Say She</p>
                   <hr>
                
                <p class="categories">
                <i class="fa fa-circle" aria-hidden="true"></i>
                html,css,javascript</p>
       
             
  -->
<!--< get_sidebar();bloginfo('description'); get_search_form(); ?>--> 
     
<?php get_footer(); ?>  