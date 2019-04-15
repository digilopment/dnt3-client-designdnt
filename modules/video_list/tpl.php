<section id="right">
 <div class="wrapper">
	   <!-- FILTERS -->
	   <div class="wrap">
		  <div class="grids">
			 
			 
			 <div class="grid-12">
                        <!-- CLANKY  -->
                        <h2><?php echo $data['article']['name']?></h2>
                        <ul class="meta">
                           <li class="usericon">
                              <a href="<?php echo WWW_PATH."a/14862"?>">developer</a>
                           </li>
                           <li class="categoryicon">
							  <a href="<?php echo WWW_PATH."a/15011"?>">odhad ceny</a>
                           </li>
                           <li class="tagsicon"> 
                              <a href="<?php echo WWW_PATH."".$data['webhook'][1]; ?>" rel="tag">prejsť na zoznam</a> 
                           </li>
                        </ul>
						<div class="col-xs-12">
							<?php echo $data['article']['perex']?>
						</div>

                     </div>
					 
			 <div class="grid-12">
			 <?php 
                  $img = new Image();
                  $i = 0;
                  foreach($data['article_list'] as $item){
                  $date = new DateTime($item['datetime_publish']);
                  $image = $img->getFileImage($item['img'], true, IMAGE::SMALL);
                  $detailUrl = WWW_PATH."".$data['webhook'][1]."/".$this->detailHook."/".$item['id_entity']."/".$item['name_url'];
                  ?>	 
				<div class="post-<?php echo $item['id_entity']?> post type-post status-publish format-standard has-post-thumbnail hentry category-category1 tag-tag1 tag-tag3"  id="post-<?php echo $item['id_entity']?>">
                  <div class="grid-4">
                     <a class="post-link"  href="">
                     <img width="300" height="300" src="<?php echo $image;?>" class="attachment-square-large wp-post-image" alt="" />
                     </a>
                  </div>
                  <div class="grid-8">
                     <h4>
                        <a href="<?php echo $detailUrl;?>"><?php echo $item['name'];?></a>
                     </h4>
                     <h6 class="date"><?php echo $date->format("d.m.Y") ?>   </h6>
                     <?php echo $item['perex'];?>
                        <a class="moretag" href="<?php echo $detailUrl;?>">
							<?php echo MultyLanguage::translate($data, "citat_viac", "translate");?>
                        </a>
                     
                  </div>
               </div>
			   <?php } ?>
			  </div>
			  
		  </div>
	   </div>
	 
	</div>
 <div id="top">
	<b><small> <?php echo MultyLanguage::translate($data, "data_protection", "translate")?> | <?php echo date("Y"); ?> | <?php echo MultyLanguage::translate($data, "impressum", "translate")?></small></b>
 </div>
</section>