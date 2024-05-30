
<?php get_header() ?>
 <div class="container auther-page">
      <h1 class=" profile-header text-center">
      <?php  the_author_meta('nickname') ; ?>
      </h1>
      <div class="author-main-info">
      <!-- START ROW-->
    <div class="row">
        <div class="col-md-3">
        <?php 
                                $argument_avatar= array(
                   'class'=> 'img-responsive img-thumbnail center-block'
                  );

                
                  echo get_avatar(get_the_author_meta('id'),196,'','user-avatar',  $argument_avatar) ; ?>
        </div>
        <div class="col-md-9">
              <ul class="list-unstyled">
                <li>FIRST NAME :  <span> <?php  the_author_meta('first_name')  ?> </span> </li>
                 <li>  LAST NAME : <span> <?php the_author_meta('last_name') ?></span> </li>
                 <li>  LAST NAME : <span> <?php the_author_meta('nickname') ?></span> </li>
              </ul>
              <hr>
              <?php if  (get_the_author_meta('description')){ ?>
                    <p> <?php the_author_meta('description') ; ?></p>
                   <?php  }else{
                        echo " there is not description";
                   }?>
        </div>
    </div>
       <!-- END   ROW-->
       </div>
          <!-- START ROW-->
          <div class="row author-stats">
            <div class="col-md-3">
                <div class="stats">
                POSTS COUNT :  <span> <?php echo count_user_posts(get_the_author_meta('id'))  ?></span>
                </div>
        </div>
            <div class="col-md-3">
            <div class="stats">
            COMMENTS COUNT:
                 <span> 
                    <?php
                    $comments_conut_argument= array(
                        'user_id'=> get_the_author_meta('id'),
                        'count' => true,
                    );
                    echo get_comments( $comments_conut_argument);

                     ?>
                 </span>
                </div>
               </div>
            <div class="col-md-3">
            <div class="stats">
                    <span> total posts view:</span>
                </div>
            </div>
            <div class="col-md-3">
            <div class="stats">
                    <span> TESTING</span>
                </div>
            </div>
          </div>
             <!-- END ROW-->


           
       
             <?php 
             $auther_per_page = 3;
                $author_posts_argument = array(
                  'author'=> get_the_author_meta('id'),
                  'posts_per_page'=>$auther_per_page,
                 );
                 $author_posts = new WP_Query( $author_posts_argument );
              if( $author_posts -> have_posts()){ ?>
            
                <h3 class="title-auhor">latest  <?php   echo $auther_per_page ?> posts of <?php  the_author_meta('nickname') ?>  <h3>
                <?php  while( $author_posts -> have_posts()){
                 $author_posts -> the_post();  ?>
                 <div class="author-posts">
               <div class="row ">  
                <div class="col-sm-2 mt-3">
                  <?php the_post_thumbnail('medium',['class'=>'img-thumbnail img-responsive', 'title' => 'Feature image' ]) ; ?>
                </div>
                 <div class="col-sm-10 mt-3">
                   <h3 class="post-title">
                    <a href="<?php the_permalink(); ?>">
                     <?php the_title(); ?>
                        </a>
                    </h3>
                    <span  class="post-date">
                   <i  class="fa fa-calendar fa-border" aria-hidden="true"></i><?php the_date(); ?>  at<?php the_time(); ?>  </span>,  
                     <span  class="post-comments">
                        <i  class="fa fa-comment fa-border" aria-hidden="true"></i> <?php comments_popup_link(false,false,false,'comment_url','comment disable') ; ?>    </span><!--class = comment_url--> <!--https://developer.wordpress.org/reference/functions/comments_popup_link/ -->
                    <div class="post-content">
                    <?php the_excerpt()// the_content()?>
                        <?php // mytheme_custom_excerpt_length( 20 ) ;//the_excerpt()مقتطفات  55أول 55حرف?>
                    <?php // the_content(' ...    more  ' .   get_the_title());?>
                    <?php //echo wp_trim_words(get_the_excerpt(), 30); ?> 
               
            
                 
                    </div> 
          
            </div> 
            <div class="clearflix"></div>
         <?php }}
           wp_reset_postdata() ?>
       </div> 
       </div>
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
              </div>
             </div>

<!----->
 
<!---- end pagination --->

  <?php 
 
           $comments_per_page =4;
                $comments_argument = array(
                  'user_id'=> get_the_author_meta('id'),
                  'status'=>'approve',
                  'number'=> $comments_per_page ,
                  'post_staus'=> 'publish',
                  'post_type' =>'post',
                 ); 
                 $comments= get_comments($comments_argument);
                 //  echo $comment->comment_post_ID . '<br>';
                  if($comments){
                    foreach($comments as $comment){?>
                    <div class="comment-author">
                      <a href="<?php the_permalink($comment->comment_post_ID); ?>">
                 <?php echo get_the_title($comment->comment_post_ID)  ?>
                </a>
                <br>
                <div class="date">
                <?php echo $comment->comment_date ; ?>
                </div>
              <div class="comment">
              <?php echo $comment->comment_content ; ?>
              </div>
             
                
                </div>
               <?php } 
                  }else{
                           echo "this authoor not comments" ;}?>
                </div>
             
<?php //get_footer(); ?>  