<?php 


?>

<div class="sidbar-php">
    <div class="widget">
        <h3 class="widget-title"><?php  single_cat_title(); ?> statistics<h3>
            <div class="widget-content">
           <ul>
             <li>
               <span>comments count :</span> <?php echo assem_category_comment_count()?>
             </li>
             <li>
               <span>posts count :</span><?php echo assem_get_category_posts_count() ?>
             </li>
           </ul>
            </div>
    </div>
    <div class="widget">
        <h3 class="widget-title">latest html posts<h3>
            <div class="widget-content">
               
                <ul>
                <?php
                 $post_arg=array(
                 'posts_per_page'=> 5,
                 'cat'=>9,
                 );
               $query= new WP_Query( $post_arg);
               if($query->have_posts()){
                while($query->have_posts()){
                    $query->the_post()?>
                    <li>
                     <a href="<?php the_permalink() ?>"> <?php  the_title(); ?></a>
                   </li>
               <?php  }}wp_reset_postdata() ?>
                </ul>
            </div>
    </div>
    <div class="widget">
        <h3 class="widget-title">hot posts by comments<h3>
            <div class="widget-content">
            <ul>
                <?php
                 $hotpost_arg=array(
                 'posts_per_page'=> 4,
                 'orderby' => 'comment_count'
                 );
               $hot_query= new WP_Query($hotpost_arg);
               if( $hot_query->have_posts()){
                while($hot_query->have_posts()){
                    $hot_query->the_post()?>
                    <li>
                     <a href="<?php the_permalink() ?>"> <?php  the_title(); ?></a>
                   </li>
                   <hr>
               <?php  }}wp_reset_postdata() ?>
                </ul>
            </div>
    </div>
</div>