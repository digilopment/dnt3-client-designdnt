<?php

use DntLibrary\Base\AdminContent;
use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Settings;
use DntLibrary\Base\Vendor;

class videoListModulController extends ArticleView
{

    protected $detailHook = "video-detail";

    public function run()
    {
        $rest = new Rest;
        if ($rest->webhook(2) == $this->detailHook) {
            $this->detail();
        } else {
            $this->listing();
        }
    }

    private function listing()
    {
        $article = new ArticleView;
        $rest = new Rest;
        $id = $article->getStaticId();
        $articleName = $article->getPostParam("name", $id);
        $service_id = $article->getPostParam("service_id", $id);
        $articleImage = $article->getPostImage($id);

        $custom_data = array(
            "title" => $articleName . " | " . Settings::get("title"),
            "meta" => array(
                '<meta name="keywords" content="' . $article->getPostParam("tags", $id) . '" />',
                '<meta name="description" content="' . Settings::get("description") . '" />',
                '<meta content="' . $articleName . '" property="og:title" />',
                '<meta content="' . SERVER_NAME . '" property="og:site_name" />',
                '<meta content="article" property="og:type" />',
                '<meta content="' . $articleImage . '" property="og:image" />',
            ),
            "article_list" => $this->order($this->getPosts($service_id), "datetime_publish", "desc"),
        );
        $data = Frontend::get($custom_data);

        include "dnt-view/layouts/" . Vendor::getLayout() . "/tpl_functions.php";
        get_top($data);
        echo '<body class="home page page-id-243 page-template page-template-homepage page-template-homepage-php custom-background">';
        echo '<div id="main">';
        include "dnt-view/layouts/" . Vendor::getLayout() . "/top.php";
        include "tpl.php";
        include "dnt-view/layouts/" . Vendor::getLayout() . "/bottom.php";
    }

    private function detail()
    {
        $rest = new Rest;
        $id = $rest->webhook(3);
        $show = AdminContent::getPostParam("show", $id);
        $type = AdminContent::getPostParam("type", $id);
        if ($show > 0 && $type == "video") {
            $custom_data = array(
                "post_id" => $id,
                "title" => $this->getPostParam("name", $id) . " | " . Settings::get("title"),
                "meta" => array(
                    '<meta name="keywords" content="' . $this->getPostParam("tags", $id) . '" />',
                    '<meta name="description" content="' . $this->getPostParam("name", $id) . '" />',
                    '<meta content="' . $this->getPostParam("name", $id) . '" property="og:title" />',
                    '<meta content="' . SERVER_NAME . '" property="og:site_name" />',
                    '<meta content="article" property="og:type" />',
                    '<meta content="' . $this->getPostImage($id) . '" property="og:image" />',
                ),
            );
            $data = Frontend::get($custom_data);


            include "dnt-view/layouts/" . Vendor::getLayout() . "/tpl_functions.php";
            get_top($data);
            echo '<body class="home page page-id-243 page-template page-template-homepage page-template-homepage-php custom-background">';
            echo '<div id="main">';
            include "dnt-view/layouts/" . Vendor::getLayout() . "/top.php";
            include "dnt-view/layouts/" . Vendor::getLayout() . "/modules/video_view/tpl.php";
            include "dnt-view/layouts/" . Vendor::getLayout() . "/bottom.php";
        } else {
            $rest->loadDefault();
        }
    }

    private function order($data, $column = "id", $sort = "ASC")
    {

        $sortArray = array();
        foreach ($data as $item) {
            foreach ($item as $key => $value) {
                if (!isset($sortArray[$key])) {
                    $sortArray[$key] = array();
                }
                $sortArray[$key][] = $value;
            }
            if ($column == "datetime_publish") {
                $sortArray['datetime'][] = strtotime($item[$column]);
                $orderby = "datetime";
            }
        }

        $orderby = $column;

        if ($sort == "ASC" || $sort == "asc") {
            array_multisort($sortArray[$orderby], SORT_ASC, $data);
        } else {
            array_multisort($sortArray[$orderby], SORT_DESC, $data);
        }
        return $data;
    }

}

$modul = new videoListModulController();
$modul->run();
