<?php 
   $data = Frontend::get();
   include "dnt-view/layouts/".Vendor::getLayout()."/tpl_functions.php";
   ?>
<?php get_top($data); ?>
<body class="home page page-id-243 page-template page-template-homepage page-template-homepage-php custom-background">
   <div id='main' class="gallery">
      <?php include "dnt-view/layouts/".Vendor::getLayout()."/top.php"; ?>
      <style>
      </style>
      <section id="gallery-right">
         <div class="wrapper">
            <div class="wrap">
               <div class="grids">
                  <!-- END grid-12 -->
                  <div>
                     <div class="grid-12">
                        <h2><?php echo MultyLanguage::translate($data, "progress_text", "translate")?></h2>
                     </div>
                     <?php
                        $posts = new ArticleView;
                        $image = new Image;
                        foreach($posts->getPosts(1045) as $post){
                        $img = $image->getFileImage($post['img'], $path = true, $format = Image::SMALL);
                        ?>
                     <div class="grid-4">
                        <a class="flipanim" href="objednanie-sluzby">
                           <div class="icon-bg">
                              <img src="<?php echo $img ?>" alt=""/>
                           </div>
                        </a>
                        <div class="icon-text">
                           <h4><?php echo $post['name']?></h4>
                           <?php echo $post['perex']?>
                        </div>
                     </div>
                     <?php
                        }
                        ?>
                  </div>
                  <!-- END GRIDS   -->
               </div>
               <!-- END WRAPP   -->
            </div>
         </div>
         <div id="top">
            <b><small> <?php echo MultyLanguage::translate($data, "data_protection", "translate")?> | <?php echo date("Y"); ?> | <?php echo MultyLanguage::translate($data, "impressum", "translate")?></small></b>
         </div>
      </section>
   </div>
   <?php include "dnt-view/layouts/".Vendor::getLayout()."/bottom.php"; ?>