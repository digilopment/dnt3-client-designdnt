<?php

use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Settings;

class contactModulController
{

    public function run()
    {
        $article = new ArticleView;
        $frontend = new Frontend;
		$rest = new Rest;
		$settings = new Settings;
				
        $custom_data = array(
            "title" => $article->getPostParam("name", $article->getStaticId()) . " | " . $settings->get("title"),
        );
        $data = $frontend->get($custom_data);
        //include "tpl.php";
        if ($rest->webhook(2)) { //o jeden vyssi webhook ako maximalnz mozny
            $rest->loadDefault();
        } else {
            include "tpl.php";
        }
    }

}

$modul = new contactModulController();
$modul->run();
