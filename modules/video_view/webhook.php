<?php
class articleViewModulController{
	
	public function run(){
		$article = new ArticleView;
		$rest 	 = new Rest;

		$id = $rest->webhook(3);

		$show = AdminContent::getPostParam("show", $id);
		if($show>0 && $rest->webhook(2) && is_numeric($rest->webhook(3)) && $rest->webhook(4)){
			$custom_data = array(
				"post_id" => $id,
				"title" =>  $article->getPostParam("name",  $id)." | ".Settings::get("title") ,
				"meta" => array(
					 '<meta name="keywords" content="'.$article->getPostParam("tags",  $id).'" />',
					 '<meta name="description" content="'.$article->getPostParam("name",  $id).'" />',
					 '<meta content="'.$article->getPostParam("name",  $id).'" property="og:title" />',
					 '<meta content="'.SERVER_NAME.'" property="og:site_name" />',
					 '<meta content="article" property="og:type" />',
					 '<meta content="'.$article->getPostImage($id).'" property="og:image" />',
				),
				"category_url" 	=> $rest->webhook(1),
			);
			
			include "tpl.php";
		}else{
			$rest->loadDefault();
		}
	}
}

articleViewModulController::run();