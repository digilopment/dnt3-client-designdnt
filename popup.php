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
         <?php
            $jazyk_typ = array(1=>"HTML, CSS","PHP", "MySQL", "Javascript", "Ajax, jQuery", "Bootstap", "Linux Ubuntu", "Photoshop", "Git");
            $jazyk_percenta = array(1=>"70","92", "68", "75", "82", "71", "53", "86", "77");  
            $pocet = count($jazyk_typ)-1;
            for ($i=1;$i<=$pocet;$i++){
            ?>
         <p class="skilltitle" style="box-sizing: border-box; margin: 0px; text-align: left; color: rgb(46, 46, 46);  font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 23.100000381469727px; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">
            <?php echo $jazyk_typ[$i]; ?>
            <span class="skilllevel" style="box-sizing: border-box; float: right;">
            <?php echo $jazyk_percenta[$i]; ?>%
            </span>
         </p>
         <div class="barwrapper" style="box-sizing: border-box; width: 100%; position: relative; height: 22px; padding: 1px; margin-bottom: 10px; border: 1px dotted rgba(23, 23, 23, 0.498039); color: rgb(46, 46, 46); font-family: latoRegular, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 23.100000381469727px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">
            <div class="bar" style="box-sizing: border-box; height: 20px; width: 0px; width: 100%;">
               <div style="box-sizing: border-box; height: 18px; width:  <?php echo $jazyk_percenta[$i]; ?>%; background: rgb(42, 42, 42);"></div>
            </div>
         </div>
         <?php
            }
            ?>
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