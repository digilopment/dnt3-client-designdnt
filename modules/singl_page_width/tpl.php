<?php

use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\Image;
use DntLibrary\Base\MultyLanguage;
use DntLibrary\Base\Vendor;

$frontend = new Frontend();
$multyLanguage = new MultyLanguage();
$vendor = new Vendor();

$data = $frontend->get();
include "dnt-view/layouts/" . $vendor->getLayout() . "/tpl_functions.php";
?>
<?php get_top($data); ?>
<body class="home page page-id-243 page-template page-template-homepage page-template-homepage-php custom-background">
    <div id='main' class="gallery">
        <?php include "dnt-view/layouts/" . $vendor->getLayout() . "/top.php"; ?>
        <style>
        </style>
        <section id="gallery-right">
            <div class="wrapper">
                <div id="projects" role="main">
                    <!-- FILTERS -->
                    <div class="wrap">
                        <div class="grids">
                            <div class="grid-12">
                                <!-- CLANKY  -->
                                <h2><?php echo $data['article']['name'] ?></h2>
                                <ul class="meta">
                                    <li class="usericon">
                                        <a href="vyvoj/tomas-doubek">Tomáš Doubek</a>
                                    </li>
                                    <li class="categoryicon">
                                    </li>
                                    <li class="dateicon">
                                        6.5.2015                  
                                    </li>
                                    <li class="tagsicon"> 
                                        <a href="/vyvoj/tomas-doubek" rel="tag">designdnt</a> 
                                    </li>
                                </ul>
                                <p></p>
                                <img class="article-image" src="<?php echo $data['article']['img'] ?>" alt="<?php echo $data['article']['name'] ?>" title="<?php echo $data['article']['name'] ?>">
                                <?php echo $data['article']['perex'] ?>
                                <?php echo $data['article']['content'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="wrap">
                        <div class="grids">
                            <!-- END grid-12 -->
                            <div>
                                <div class="grid-12">
                                    <h2><?php echo $multiLanguage->translate($data, "progress_text", "translate") ?></h2>
                                </div>
                                <?php
                                $posts = new ArticleView;
                                $image = new Image;
                                foreach ($posts->getPosts(1045) as $post) {
                                    $img = $image->getFileImage($post['img'], $path = true, $format = Image::SMALL);
                                    ?>
                                    <div class="grid-4">
                                        <a class="flipanim" href="objednanie-sluzby">
                                            <div class="icon-bg">
                                                <img src="<?php echo $img ?>" alt=""/>
                                            </div>
                                        </a>
                                        <div class="icon-text">
                                            <h4><?php echo $post['name'] ?></h4>
                                            <?php echo $post['perex'] ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <!-- END GRIDS   -->
                        </div>
                        <!-- END WRAPP   -->
                    </div>
                </div>
                <div id="top">
                    <b><small> <?php echo $multiLanguage->translate($data, "data_protection", "translate") ?> | <?php echo date("Y"); ?> | <?php echo $multiLanguage->translate($data, "impressum", "translate") ?></small></b>
                </div>
        </section>
    </div>
    <?php include "dnt-view/layouts/" . $vendor->getLayout() . "/bottom.php"; ?>