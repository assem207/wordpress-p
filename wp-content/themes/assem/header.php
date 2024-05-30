<!DOCTYPE html>
 <html <?php language_attributes(); ?> >
 <head>
    <meta charset="<?php bloginfo('charset') ?>" />
    <title><?php bloginfo('name'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous">
 </head>
 <body  >
   
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container">
    <a class="navbar-brand" href="<?php bloginfo('url');?>"><?php bloginfo('name');?> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-toggle="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">dd</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
    
        <?php assem_bootstrap_menu();?>
   
    </div>
  </div>
</nav>
 

