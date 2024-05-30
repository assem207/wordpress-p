

<?php get_header(); ?>
<div class="container ">
   <div class="row home-page bg-light mb-3 ">
   
    
     <div class="col-md-6 ">
        <h1 class=" title-category"> <?php  single_cat_title(); ?></h1>
       </div>
      <div class="col-md-6 ">
      <p class="cateory-description"><?php echo category_description() ?> </p>
      </div>
      
      
      
    <div class="clearfix"></div>
    </div>
    
   <!-------------------->
   <div class="row">

<?php  if(have_posts()){ 
      while(have_posts()){
   the_post();  ?>
   <div class="col-sm-6 ">

             <div class="main-post">
               <h3 class="post-title">
                  <a href="<?php the_permalink(); ?>">
                     <?php the_title(); ?>
                   </a>
               </h3>
               <span class="post-author">
                  <i   class="fa fa-user fa-border " aria-hidden="true"></i> <?php the_author_posts_link(); ?> ,
                <span  class="post-date">
                  <i  class="fa fa-calendar fa-border" aria-hidden="true"></i><?php the_date(); ?>  at<?php the_time(); ?> , 
               </span>
               <span  class="post-comments">
                  <i  class="fa fa-comment fa-border" aria-hidden="true"></i> <?php comments_popup_link(false,false,false,'comment_url','comment disable') ; ?><!--class = comment_url--> <!--https://developer.wordpress.org/reference/functions/comments_popup_link/ -->

               </span>
               <?php the_post_thumbnail('medium',['class'=>'img-thumbnail img-responsive', 'title' => 'Feature image' ]) ; ?>
               <div class="post-content">
               <?php the_excerpt() //mytheme_custom_excerpt_length( 55 ) ;//the_excerpt()مقتطفات  55أول 55حرف?>
                  <?php //the_content();//the_excerpt()مقتطفات  55أول 55حرف?>
                  <?php // the_content(' ...    more  ' .   get_the_title());?>
                 <?php //echo wp_trim_words(get_the_excerpt(), 55); ?> 
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
       </div> 
       <?php }}?>

       <div class=" post_pagination ">
         <?php
        
       if(get_previous_posts_link()){
         previous_posts_link(' <!-- HTML !-->
         <button class="button-24" role="button"> <i class="fa fa-chevron-left fa-fw fa-lg" aria-hidden="true"></i> PREV</button>
          ');
         }else{
            echo' <span class="previous-span">PREV</span>';
         }
         if(get_next_posts_link()){
            next_posts_link('<button class="button-24" role="button">
            NEXT <i class="fa fa-chevron-right fa-fw fa-lg" aria-hidden="true"></i>
            </button>');
         }else{
        echo' <span class="next-span"> NEXT</span>';
         }
     
       ?>
              <div >
                          <?php    echo numbering_pagination(); ?>
                   </div>
               </div>
              
         </div>
   </div>
   <?php// numbering_pagination() ?>
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