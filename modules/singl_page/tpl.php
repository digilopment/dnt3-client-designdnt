<?php

use DntLibrary\Base\Frontend;
use DntLibrary\Base\MultyLanguage;
use DntLibrary\Base\Vendor;

$data = Frontend::get($custom_data);
include "dnt-view/layouts/" . Vendor::getLayout() . "/tpl_functions.php";
$categoryUrl = $rest->webhook(1);
?>
<?php get_top($data); ?>
<body class="home page page-id-243 page-template page-template-homepage page-template-homepage-php custom-background">
    <div id='main'>
        <?php include "dnt-view/layouts/" . Vendor::getLayout() . "/top.php"; ?>
        <section id="right">
            <div class="wrapper">
                <!-- FILTERS -->
                <div class="wrap">
                    <div class="grids">
                        <div class="grid-12">
                            <!-- CLANKY  -->
                            <h2><?php echo $data['article']['name'] ?></h2>
                            <ul class="meta">
                                <li class="usericon">
                                    <a href="<?php echo WWW_PATH . "a/14862" ?>">developer</a>
                                </li>
                                <li class="categoryicon">
                                    <a href="<?php echo WWW_PATH . "a/15011" ?>">odhad ceny</a>
                                </li>
                                <li class="tagsicon"> 
                                    <a href="<?php echo WWW_PATH . "" . $categoryUrl; ?>" rel="tag">prejsť na zoznam</a> 
                                </li>
                            </ul>
                            <p></p>
                            <div class="col-md-6 col-xs-12">
                                <img class="article-image" src="<?php echo $data['article']['img'] ?>" alt="<?php echo $data['article']['name'] ?>" title="<?php echo $data['article']['name'] ?>">
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <?php echo $data['article']['perex'] ?>
                                <?php echo $data['article']['content'] ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div id="top">
                <b><small> <?php echo MultyLanguage::translate($data, "data_protection", "translate") ?> | <?php echo date("Y"); ?> | <?php echo MultyLanguage::translate($data, "impressum", "translate") ?></small></b>
            </div>
        </section>
        <?php include "dnt-view/layouts/" . Vendor::getLayout() . "/bottom.php"; ?>