<?php
class rpcModulController{
	
	public function run(){
		$rest 		= new Rest;
		$db 		= new Db;
		if($rest->webhook(2) == "json" && $rest->webhook(3) == "contact-form"){
			include "contact-form.php";
		}
		elseif($rest->webhook(2) == "xml" && $rest->webhook(3) == "sitemap"){
			include "sitemap.php";
		}else{
			$rest->loadDefault();
		}
	}
}

rpcModulController::run();

/*
class rpcModulController{
	
	
	protected $run;
	
	protected function sitemap(){
		$rest 		= new Rest;
		if($rest->webhook(2) == "xml" && $rest->webhook(3) == "sitemap"){
			include "sitemap.php";
			$this->run = true;
		}
		$this->run = false;
	}
	
	protected function contactForm(){
		$rest 		= new Rest;
		if($rest->webhook(2) == "json" && $rest->webhook(3) == "contact-form"){
			include "contact-form.php";
			$this->run = true;
		}
		$this->run = false;
	}
	
	public function run(){
		if($this->run){
			$this->run();
		}
	}
}

$rpcModulController = new rpcModulController();
$rpcModulController->run();
*/