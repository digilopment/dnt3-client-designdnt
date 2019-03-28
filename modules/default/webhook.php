<?php
class defaultModulController{
	
	public function run(){
		$rest = new Rest;
		$url = $rest->webhook(1);
		$modulDefaultUrl = "";
		$modulDefaultUrl = false;
		foreach(Webhook::getSitemapModules("default") as $modulDefaultUrl){
			if($url != $modulDefaultUrl){
				Dnt::redirect(WWW_PATH.$modulDefaultUrl);
			}
		}
		include "tpl.php";
	}
}

defaultModulController::run();