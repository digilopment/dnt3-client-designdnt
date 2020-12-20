<?php

use DntLibrary\App\BaseController;
use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Settings;

class homepageModulController extends BaseController
{

    public function run()
    {
        $article = new ArticleView;
        $frontend = new Frontend;
        $settings = new Settings;
        $rest = new Rest;
        $id = $article->getStaticId();
        $articleName = $article->getPostParam("name", $id);
        $articleImage = $article->getPostImage($id);

        $custom_data = array(
            "title" => $articleName . " | " . $settings->get("title"),
            "meta" => array(
                '<meta name="keywords" content="' . $article->getPostParam("tags", $id) . '" />',
                '<meta name="description" content="' . $settings->get("description") . '" />',
                '<meta content="' . $articleName . '" property="og:title" />',
                '<meta content="' . SERVER_NAME . '" property="og:site_name" />',
                '<meta content="article" property="og:type" />',
                '<meta content="' . $articleImage . '" property="og:image" />',
            ),
        );
        $data = $frontend->get($custom_data);
        $this->modulLoader($data, "tpl.php");
    }

}

$modul = new homepageModulController;
$modul->run();
