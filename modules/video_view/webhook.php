<?php

use DntLibrary\Base\AdminContent;
use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Settings;
use DntLibrary\Base\Vendor;

class articleViewModulController
{

	public function __construct(){
		$this->adminContent = new AdminContent();
		$this->vendor = new Vendor();
		$this->frontend = new Frontend();
		$this->settings = new Settings();
	}
	
    public function run()
    {
        $article = new ArticleView;
        $rest = new Rest;

        $id = $rest->webhook(3);

        $show = $this->adminContent->getPostParam("show", $id);
        if ($show > 0 && $rest->webhook(2) && is_numeric($rest->webhook(3)) && $rest->webhook(4)) {
            $custom_data = array(
                "post_id" => $id,
                "title" => $article->getPostParam("name", $id) . " | " . $this->settings->get("title"),
                "meta" => array(
                    '<meta name="keywords" content="' . $article->getPostParam("tags", $id) . '" />',
                    '<meta name="description" content="' . $article->getPostParam("name", $id) . '" />',
                    '<meta content="' . $article->getPostParam("name", $id) . '" property="og:title" />',
                    '<meta content="' . SERVER_NAME . '" property="og:site_name" />',
                    '<meta content="article" property="og:type" />',
                    '<meta content="' . $article->getPostImage($id) . '" property="og:image" />',
                ),
                "category_url" => $rest->webhook(1),
            );

            $data = $this->frontend->get($custom_data);
            include "dnt-view/layouts/" . $this->vendor->getLayout() . "/tpl_functions.php";
            get_top($data);
            echo '<body class="home page page-id-243 page-template page-template-homepage page-template-homepage-php custom-background">';
            echo '<div id="main">';
            include "dnt-view/layouts/" . $this->vendor->getLayout() . "/top.php";
            include "tpl.php";
            include "dnt-view/layouts/" . $this->vendor->getLayout() . "/bottom.php";
        } else {
            $rest->loadDefault();
        }
    }

}

$modul = new articleViewModulController();
$modul->run();
