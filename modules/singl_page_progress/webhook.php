<?php
class singlPageProgressModulController{
	
	public function run(){
		$article = new ArticleView;
		$rest 		= new Rest;
		$id = $article->getStaticId();
		$articleName = $article->getPostParam("name",  $id);
		$articleImage = $article->getPostImage( $id);

		$custom_data = array(
			"title" =>  $articleName ." | ".Settings::get("title") ,
			"meta" => array(
				 '<meta name="keywords" content="'.$article->getPostParam("tags",  $id).'" />',
				 '<meta name="description" content="'.$articleName.'" />',
				 '<meta content="'.$articleName.'" property="og:title" />',
				 '<meta content="'.SERVER_NAME.'" property="og:site_name" />',
				 '<meta content="article" property="og:type" />',
				 '<meta content="'.$articleImage.'" property="og:image" />',
			),
		);

		if($rest->webhook(2)){ //o jeden vyssi webhook ako maximalnz mozny
			$rest->loadDefault();
		}else{
			include "tpl.php";
		}
	}
	
}

singlPageProgressModulController::run();