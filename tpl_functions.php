<?php function get_top($data){?>
<!DOCTYPE html>
<html lang="<?php echo Frontend::getMetaSetting($data, "language"); ?>"  class="js csstransitions">
   <head>
      <meta charset="utf-8">
		<title><?php echo $data['title']; ?></title>
		<?php
		foreach ($data['meta'] as $meta) {
			echo $meta;
		}
		?>
		<meta name="author" content="designdnt">
		<meta name="viewport" content="width=device-width" />
		<?php
		$favicon = Settings::getImage($data['meta_settings']['keys']['favicon']['value']);
		?>
		<!-- Favicone Icon -->
		<link rel="" type="img/x-icon" href="<?php echo $favicon; ?>" />
		<link rel="" type="img/png" href="<?php echo $favicon; ?>" />
		<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo $favicon; ?>" />
      <link rel='stylesheet' href='<?php echo $data['media_path']; ?>/css/bootstrap.min.css?ver=1.0' type='text/css' media='all' />
      <link rel='stylesheet' href='<?php echo $data['media_path']; ?>/css/style.css?ver=1.0' type='text/css' media='all' />
      <link rel='stylesheet' href='<?php echo $data['media_path']; ?>/css/nerveslider.css?ver=1.0' type='text/css' media='all' />
      <link rel='stylesheet' href='<?php echo $data['media_path']; ?>/css/customize.css' type='text/css' media='all' />
      <link rel='stylesheet' href='<?php echo $data['media_path']; ?>/css/custom.css' type='text/css' media='all' />
      <script type='text/javascript' src='<?php echo $data['media_path']; ?>/js/modernizr.custom.97074.js?ver=4.5.2'></script>
      <script type='text/javascript' src='<?php echo $data['media_path']; ?>/js/jquery.js?ver=1.12.3'></script>
      <script type='text/javascript' src='<?php echo $data['media_path']; ?>/js/jquery-migrate.js?ver=1.4.0'></script>
      <script type='text/javascript' src='<?php echo $data['media_path']; ?>/js/jquery.backstretch.min.js?ver=4.5.2'></script>
      <script type='text/javascript' src='<?php echo $data['media_path']; ?>/js/bootstrap.min.js?ver=4.5.2'></script>
	  <script src="<?php echo $data['media_path']; ?>/js/jquery.validate.js"></script>
	  <script src="<?php echo $data['media_path']; ?>/js/additional-methods.min.js"></script>
	  <script src="https://www.google.com/recaptcha/api.js"></script>
   </head>
<?php } ?>
<?php function get_slider($data) {
   ?>
<?php
   $multylanguage = new MultyLanguage;
   $article = new ArticleView;
   $db = new Db;
   $query = "SELECT * FROM dnt_posts WHERE type = 'post' AND cat_id = '" . AdminContent::getCatId("sliders") . "' AND vendor_id = '" . Vendor::getId() . "' AND `show` > 0";
   if ($db->num_rows($query) > 0) {
       ?>
<div id="nerve-slider">
   <?php
      foreach ($db->get_results($query) as $row) {
          if (Dnt::is_external_url($row['name_url'])) {
              $nameUrl = $row['name_url'];
          } else {
              $nameUrl = false;
          }
          $image = $article->getPostImage($row['id_entity']);
          ?>
		  <div><img alt="<?php echo $row['name']; ?>" src="<?php echo $image; ?>"/></div>
   <?php } ?>
</div>
<!-- END Master Slider -->
<?php } ?>
<script type="text/javascript">
   var countimg = jQuery( "#nerve-slider div" ).length;
       var countimgvalue = '';
       if (countimg == 1) {
           countimgvalue = false;
       }
       else {
           countimgvalue = true;
       }
   jQuery(document).ready(function(){
       "use strict";
       jQuery("body").find('#nerve-slider').show();
       jQuery("#nerve-slider").nerveSlider({
           sliderAutoPlay: true,
           slideTransitionDelay: 5000,
           sliderWidth: "100%",
           sliderHeight:  "100%",
           sliderResizable: true,
           sliderKeepAspectRatio: false,
           slideTransition: "fade",
           slideTransitionSpeed: 1000,
           slideTransitionEasing: "easeOutExpo",
           showArrows: countimgvalue,
           showPause: countimgvalue,
           showDots: false
       });
   });
</script>	
<?php } ?>
<?php function get_nav_menu($data){
$rest = new Rest();
?>
<nav class="menu-menu-container">
	<ul id="nav" class="">
	<?php
		foreach (Navigation::getParents() as $row) {
			$name_url_1 = Url::getPostUrl($row['name_url']);
			if ($row['name_url'] == $rest->webhook(1)) {
				$cActive1 = "active current_page_item current-menu-item";
			}else{
				$cActive1 = "";
			}
			?>
			<li class="dropdown home <?php echo $cActive1;?> ">
				<?php if ($row['name_url'] == "no_url") { ?>
					<a class=""><?php echo $article->getPostParam("name", $row['id_entity']); ?></a>
				<?php } else { ?>
					<a class="" href="<?php echo $name_url_1; ?>"><?php echo $row['name']; ?></a>
					<?php } ?>
					<?php if (Navigation::hasChild($row['id_entity'])) { ?>
					<ul class="dropdown-menu">
						<?php
						foreach (Navigation::getChildren($row['id_entity']) as $row2) {
							$name_url_2 = Url::getPostUrl($row2['name_url']);
							if ($row2['name_url'] == $rest->webhook(1)) {
								$cActive2 = "active current_page_item current-menu-item";
							}else{
								$cActive2 = "";
							}
							?>
							<li class="<?php echo $cActive2;?>"><a href="<?php echo $name_url_2; ?>"><?php echo $row2['name']; ?></a></li>
							<?php } ?>
					</ul>
				<?php } ?>
			</li>
		<?php } ?>
	</ul>
 </nav>
<?php } ?>
<?php function get_video_embed($data, $videoId = false){ 
if(!$videoId){
	$videoId = $data['post_id'];
}
$getClor = false;
?>
<style>
.resp-container {position: relative;overflow: hidden;padding-top: 56.25%;}
.resp-iframe {position: absolute;top: 0;left: 0;width: 100%;height: 100%;border: 0;}
</style>
<div class="resp-container">
    <iframe class="resp-iframe" src="<?php echo WWW_PATH; ?>embed/video/<?php echo $videoId."?color=".$getClor; ?>" gesture="media"  allow="encrypted-media" allowfullscreen></iframe>
</div>
<?php } ?>