<?php
function custom_modules($webhook = false){
	//$webhook = new Modul();
	//$webhook->getSitemap(New Client());
	if(!$webhook){
		$webhook = new Webhook;
	}
	/*
	custom modul listeners
	*/
	$custom_modules = array(
		"default" => array_merge(
				array(), $webhook->getSitemapModules("default")
		),
		"homepage" => array_merge(
				array(), $webhook->getSitemapModules("homepage")
		),
		"singl_page" => array_merge(
				array(), $webhook->getSitemapModules("singl_page")
		),
		"singl_page_progress" => array_merge(
				array(), $webhook->getSitemapModules("singl_page_progress")
		),
		"singl_page_width" => array_merge(
				array(), $webhook->getSitemapModules("singl_page_width")
		),
		"projects" => array_merge(
				array(), $webhook->getSitemapModules("projects")
		),
		"cena_webu" => array_merge(
				array(), $webhook->getSitemapModules("cena_webu")
		),
		"article_view" => array_merge(
				array(), $webhook->getSitemapModules("article_view")
		),
		"video_list" => array_merge(
				array(), $webhook->getSitemapModules("video_list")
		),
		"search" => array_merge(
				array(), $webhook->getSitemapModules("search")
		),
		"clean" => array_merge(
				array(), $webhook->getSitemapModules("clean")
		),
		"contact" => array_merge(
				array(), $webhook->getSitemapModules("contact")
		),
		"static_redirect" => array_merge(
				array(), $webhook->getSitemapModules("static_redirect")
		),
		
		//DETAIL
		"article_view" => array_merge(
			array(), array("{alphabet}/detail/{digit}/{alphabet}")
		),
		//AUTOREDIRECT
		"auto_redirect" => array_merge(
			array(), array("a/{digit}")
		),			
		//VIDEO EMBED
		"video_embed" => array_merge(
			array(), array("embed/video/{digit}")
		),
		
		//RPC
		"rpc" => array_merge(
				array(), array("rpc/json/{alphabet}")
		),
	);
	return $custom_modules;
}

function modulesConfig(){
	return array(
		"default" => array(
			"service_name" => "Error 404",
			"sql" => ""
		),
		"homepage" => array(
			"service_name" => "Homepage",
			"sql" => ""
		),
		"singl_page" => array(
			"service_name" => "Singl Page",
			"sql" => ""
		),
		"singl_page_progress" => array(
			"service_name" => "Singl Page Progress",
			"sql" => ""
		),
		"singl_page_width" => array(
			"service_name" => "Singl Page Width",
			"sql" => ""
		),
		"projects" => array(
			"service_name" => "Projekty",
			"sql" => ""
		),
		"cena_webu" => array(
			"service_name" => "Odhad ceny webu",
			"sql" => ""
		),
		"article_view" => array(
			"service_name" => "Detail článku",
			"sql" => ""
		),
		"video_list" => array(
			"service_name" => "Zoznam videi",
			"sql" => ""
		),
		"search" => array(
			"service_name" => "Vyhľadávanie",
			"sql" => ""
		),
		"clean" => array(
			"service_name" => "Clean",
			"sql" => ""
		),
		"contact" => array(
			"service_name" => "Kontakt",
			"sql" => ""
		),
		"static_redirect" => array(
			"service_name" => "Presmerovanie",
			"sql" => ""
		),
	);
}
function websettings(){
	$insertedData[] = array(
		'`type`' 			=> "social_wall", 
		'`key`' 			=> "facebook_page_sw", 
		'`value`' 			=> "", 
		'`content_type`' 	=> "text", 
		'`description`' 	=> "Facebook Page Social Wall", 
		'`vendor_id`' 		=> Vendor::getId(), 
		'`show`' 			=> '0',
		'`order`' 			=> '10',
	);
	$insertedData[] = array(
		'`type`' 			=> "social_wall", 
		'`key`' 			=> "facebook_post_sw", 
		'`value`' 			=> "", 
		'`content_type`' 	=> "text", 
		'`description`' 	=> "Facebook Post Social Wall", 
		'`vendor_id`' 		=> Vendor::getId(), 
		'`show`' 			=> '0',
		'`order`' 			=> '10',
	);
	$insertedData[] = array(
		'`type`' 			=> "social_wall", 
		'`key`' 			=> "instagram_sw", 
		'`value`' 			=> "", 
		'`content_type`' 	=> "text", 
		'`description`' 	=> "Instagram Post Social Wall", 
		'`vendor_id`' 		=> Vendor::getId(), 
		'`show`' 			=> '0',
		'`order`' 			=> '10',
	);
	$insertedData[] = array(
		'`type`' 			=> "social_wall", 
		'`key`' 			=> "youtube_sw", 
		'`value`' 			=> "", 
		'`content_type`' 	=> "text", 
		'`description`' 	=> "Youtube Social Wall", 
		'`vendor_id`' 		=> Vendor::getId(), 
		'`show`' 			=> '0',
		'`order`' 			=> '10',
	);
	$insertedData[] = array(
		'`type`' 			=> "social_wall", 
		'`key`' 			=> "twitter_sw", 
		'`value`' 			=> "", 
		'`content_type`' 	=> "text", 
		'`description`' 	=> "Twitter Social Wall", 
		'`vendor_id`' 		=> Vendor::getId(), 
		'`show`' 			=> '0',
		'`order`' 			=> '10',
	);
	$insertedData[] = array(
		'`type`' 			=> "keys", 
		'`key`' 			=> "send_grid_api_key", 
		'`value`' 			=> "", 
		'`content_type`' 	=> "text", 
		'`description`' 	=> "Api key pre Send grid", 
		'`vendor_id`' 		=> Vendor::getId(), 
		'`show`' 			=> '0',
		'`order`' 			=> '10',
	);
	$insertedData[] = array(
		'`type`' 			=> "keys", 
		'`key`' 			=> "send_grid_api_template_id", 
		'`value`' 			=> "", 
		'`content_type`' 	=> "text", 
		'`description`' 	=> "Template ID pre Send grid", 
		'`vendor_id`' 		=> Vendor::getId(), 
		'`show`' 			=> '0',
		'`order`' 			=> '10',
	);
	$insertedData[] = array(
		'`type`' 			=> "keys", 
		'`key`' 			=> "automatic_voucher", 
		'`value`' 			=> "", 
		'`content_type`' 	=> "text", 
		'`description`' 	=> "Automatické odosielanie voucherov", 
		'`vendor_id`' 		=> Vendor::getId(), 
		'`show`' 			=> '0',
		'`order`' 			=> '10',
	);
	
	return $insertedData;
}