<!-- WIDGET SECTION  -->
<section id="center">
   <div id="boxes">
      <form method="GET" class="searchbox" id="searchform" 
         action="hladaj/?">
         <input type="text" class="searchtext field" name="s" placeholder="Výraz, ktorý hľadám &hellip;" />
         <input type="hidden" class="searchtext field" name="page" value="1" />
         <input type="submit" class="button"  id="searchsubmit" value="Hľadať" />
      </form>
      <ul id="tabs">
         <li>
            <a href="#" data-rel="tab2">Programátor</a>
         </li>
      </ul>
	<div id="video-widget-2" class="box widget arc">
		 <!-- ======== O MNE ======= -->
		 <img alt="Tomáš Doubek" src="<?php echo WWW_PATH?>dnt-view/data/uploads/57_e51fd6afedd06439aec8b2fbe9257523_o.jpg" style="width: 100%;" />
		 <br/>
		 <br/>
		 <h6 style="">TOMÁŠ DOUBEK</h6>
		 <p style="font-size:14px">
			Programovaniu sa venujem aktívne od roku 2012, popri štúdiu na aplikovanej informatike som úspešne dokončil mnoho webov7ch projektov. Od roku 2015 pracujem ako vívojár pre <b>TV markíza</b> s návštevnosťou webu viac ako <b>200000 návštevníkov</b> za deň. Popri práci sa venujem firme Designdnt, kde som ako hlavný vívojár platformy <b>dnt3</b>. Neustále vivíjam nové inovatívne riešenia pre ľahkú správu obsahu na webe. 
			<br/>
			<a href="<?php echo WWW_PATH."a/14862"?>" ><button class="button">viac</button></a>
		 </p>
	</div>
      <div id="socialicons-widget-2" class="box widget arc">
         <h3 class="widget-title">Kontakt</h3>
         <ul class="social-icons">
            <li>
               <a target="_blank" href="mailto:<?php echo Frontend::getMetaSetting($data, "vendor_email");?>">
               <img class="social-icon" src="<?php echo $data['media_path']; ?>/images/gmail.png" alt="" style="margin: 0 7px;"/>
               </a>
            </li>
            <li>
               <a target="_blank" href="<?php echo $data['meta_settings']['keys']['facebook_page']['value'] ?>">
               <img class="social-icon" src="<?php echo $data['media_path']; ?>/images/social_facebook.png" alt="" style="margin: 0 7px;"/>
               </a>
            </li>
            <li>
               <a target="_self" href="mailto:<?php echo WWW_PATH."a/14859";?>">
               <img class="social-icon" src="<?php echo $data['media_path']; ?>/images/kontakt-form.png" alt="" style="margin: 0 7px;"/>
               </a>
            </li>
            <li>
               <a target="_blank" href="<?php echo $data['meta_settings']['keys']['linked_in']['value'] ?>">
               <img class="social-icon" src="<?php echo $data['media_path']; ?>/images/linkedin.png" alt="" style="margin: 0 7px;"/>
               </a>
            </li>
         </ul>
      </div>
      <div class="clear"></div>
   </div>
   <!-- END BOXES -->
</section>
<!-- =============== OMNE END ====== -->