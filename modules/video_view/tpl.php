
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
							<br/>
							<?php echo $data['article']['perex']?>
						</div>
						<div class="col-xs-12">
							<?php echo get_video_embed($data);?>
						</div>
						<div class="col-xs-12">
							<br/>
							<?php echo $data['article']['content']?>
						</div>

                     </div>
                  </div>
               </div>
             
            </div>
         <div id="top">
            <b><small> <?php echo MultyLanguage::translate($data, "data_protection", "translate")?> | <?php echo date("Y"); ?> | <?php echo MultyLanguage::translate($data, "impressum", "translate")?></small></b>
         </div>
      </section>