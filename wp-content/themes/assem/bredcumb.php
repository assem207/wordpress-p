<?php
$all_cat= get_the_category();//Retrieves all post categories.

echo  "<pre>";
print_r($all_cat);
echo  "</pre>";
?>
<div class="bredcrumbs-holder">
   <div class="container">
   <ol class="bredcrumb " >
     <li>
      <a href="<?php echo get_home_url() ?>">
      <?php echo get_bloginfo('name') ?>
     </a>
    </li>
    <li>/
      <a href="<?php echo esc_url(get_category_link($all_cat[0]->term_id)) ?>">
      <?php echo esc_html($all_cat[0]->cat_name) ?>
       <a>
    </li>/
    <li class="active">
      <?php echo get_the_title()?>
    
    </li>
   </ol>
   </div>
  
</div>