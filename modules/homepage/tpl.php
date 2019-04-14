<?php 
   $data = Frontend::get($custom_data);
   include "dnt-view/layouts/".Vendor::getLayout()."/tpl_functions.php";
   ?>
<?php get_top($data); ?>
<body class="home page page-id-243 page-template page-template-homepage page-template-homepage-php custom-background">
   <div id='main'>
      <?php include "dnt-view/layouts/".Vendor::getLayout()."/top.php"; ?>
      <section id="right">
         <div class="wrapper">
            <div class="wrap">
               <div class="grids">
			   
                  <div class="grid-12">
                     <h1 class="slogan"><?php echo MultyLanguage::translate($data, "homepage_text", "translate")?> </h1>
                  </div>
				  
				  <?php if($data['article']['img']){?>
				  <div class="grid-12 modul-header-image">
                     <img class="article-image" src="<?php echo $data['article']['img']?>" alt="<?php echo $data['title']?>" title="<?php echo $data['title']?>">
                  </div>
				  <?php } ?>
                  <!-- END grid-12 -->
                  <div>
                     <div class="icons">
                        <!-- CLASS ICON -->	
                        <?php
                           $posts = new ArticleView;
                           $image = new Image;
                           foreach($posts->getPosts(304) as $post){
                           $img = $image->getFileImage($post['img'], $path = true, $format = Image::SMALL);
						   $url = $posts->detailUrl("artilce", $post['id_entity'], $post['name_url']);
                           ?>
                        <div class="grid-4">
                           <a class="flipanim" href="<?php echo $url; ?>">
                              <div class="icon-bg">
                                 <img src="<?php echo $img; ?>" alt=""/>
                              </div>
                           </a>
                           <div class="icon-text">
                              <h4><?php echo $post['name']?></h4>
                              <p style="text-align: justify"><?php echo $post['perex']?></p>
                           </div>
                        </div>
                        <?php
                           }
                           ?>
                     </div>
					 <div class="grid-12">
                        <hr/>
						<h2>Skills</h2>
						<?php getSkills(); ?>
                     </div>
                     <!--KONIEC CLASS ICON -->
                     <div class="grid-12">
                        <hr/>
                        <h2><?php echo $data['article']['name']; ?></h2>
                     </div>
                     <div class="grid-12">
                        <?php echo $data['article']['content']; ?>
                     </div>
                     <div class="grid-12">
                        <h2><?php echo MultyLanguage::translate($data, "progress_text", "translate")?></h2>
                     </div>
                     <?php
                        $posts = new ArticleView;
                        $image = new Image;
                        foreach($posts->getPosts(1045) as $post){
                        $img = $image->getFileImage($post['img'], $path = true, $format = Image::SMALL);
						$url = $posts->detailUrl("artilce", $post['id_entity'], $post['name_url']);
                        ?>
                     <div class="grid-4">
                        <a class="flipanim" href="<?php echo $url; ?>">
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
            <!-- END WRAPPER   -->
         </div>
         <!-- END WRAPPER   -->
         <!-- ICONS  -->
         <div id="top">
            <b><small> <?php echo MultyLanguage::translate($data, "data_protection", "translate")?> | <?php echo date("Y"); ?> | <?php echo MultyLanguage::translate($data, "impressum", "translate")?></small></b>
         </div>
      </section>
   </div>
   <?php include "dnt-view/layouts/".Vendor::getLayout()."/bottom.php"; ?>