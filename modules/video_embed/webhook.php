<?php

use DntLibrary\Base\AdminContent;
use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\Image;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Settings;

class videoEmbedModulController
{

    public function run()
    {
        $article = new ArticleView;
        $rest = new Rest;
        $image = new Image;
        $adminContent = new AdminContent;
        $settings = new Settings;
        $frontend = new Frontend;

        $id = $rest->webhook(3);
        $show =  $adminContent->getPostParam("show", $id);
        if ($id && $show) {
            $video_id = $article->getPostParam("service_id", $id);
            $video_image = $article->getPostImage($id);
            $custom_data = array(
                "post_id" => $id,
                "title" => $article->getPostParam("name", $id) . " | " . $settings->get("title"),
                "meta" => array(
                    '<meta name="keywords" content="' . $article->getPostParam("tags", $id) . '" />',
                    '<meta name="description" content="' . $article->getPostParam("name", $id) . '" />',
                    '<meta content="' . $article->getPostParam("name", $id) . '" property="og:title" />',
                    '<meta content="' . SERVER_NAME . '" property="og:site_name" />',
                    '<meta content="article" property="og:type" />',
                    '<meta content="' . $video_image . '" property="og:image" />',
                ),
                "video_id" => $video_id,
                "image" => $video_image,
                "video_file" => $image->getFileImage($video_id)
            );
            $data = $frontend->get($custom_data);
            include "tpl.php";
        } else {
            $rest->loadDefault();
        }
    }

}

$modul = new videoEmbedModulController();
$modul->run();
