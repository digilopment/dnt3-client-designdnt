<?php

use DntLibrary\Base\ArticleList;
use DntLibrary\Base\ArticleView;
use DntLibrary\Base\DB;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\Image;
use DntLibrary\Base\MultyLanguage;
use DntLibrary\Base\Vendor;

$frontend = new Frontend();
$vendor = new Vendor();
$multiLanguage = new MultyLanguage();
$articleList = new ArticleList();

$data = $frontend->get($custom_data);
include "dnt-view/layouts/" . $vendor->getLayout() . "/tpl_functions.php";
?>
<?php get_top($data); ?>
<!-- Trigger the modal with a button -->

<body class="home page page-id-243 page-template page-template-homepage page-template-homepage-php custom-background">
    <div id='main' class="gallery">
        <?php include "dnt-view/layouts/" . $vendor->getLayout() . "/top.php"; ?>
        <style>
            .modal-backdrop.in {
                filter: alpha(opacity=50);
                opacity: .5;
                z-index: 999999;
            }
            .modal.fade{
                z-index:9999999;
            }

            .modal-dialog {
                width: 60%;
                margin: 30px auto;
                min-width: 600px;
            }
            .modal-content {
                border-radius: 0px;
            }

            @media only screen and (max-width: 595px) {
                .modal-dialog {
                    width: 100%;
                    min-width: 100%;
                }
                .modal-dialog img {
                    margin-bottom:20px;
                }
                .modal-dialog p {
                    text-align: justify;
                }
            }
        </style>
        <section id="gallery-right">
            <div class="wrapper">
                <div id="projects" role="main">

                    <?php /* <ol id="filters">
                      <li data-filter='all' class='active'>Všetko</li>


                      <?php
                      $tags = array(
                      "markiza",
                      "dnt3",
                      "realitna-kancelaria",
                      "special",
                      "typo3",
                      "eshop",
                      "informacny-system",
                      "articles",
                      "platform",
                      "multilanguage",
                      "sms",
                      "chat",
                      "gallery",
                      );
                      foreach($tags as $tag){?>
                      <li data-filter='<?php echo $tag;?>'><?php echo $tag;?></li>
                      <?php } ?>
                      </ol> */ ?>
                    <div class="clear"></div>
                    <!-- GALLERY ITEMS -->
                    <ul id="tiles">


                        <?php
                        $articleView = new ArticleView;
                        $db = new DB();
                        $image = new Image;
                        $query = $articleList->prepare_query(false);
                        foreach ($db->get_results($query) as $row) {
                            $img = $image->getPostImage($row['id'], "dnt_posts");
                            $url = $articleView->detailUrl($row['cat_name_url'], $row['id'], $row['name_url']);

                            $name = $row['name'];
                            $content = $row['perex'] . $row['content'];
                            ?>
                            <li class="all <?php echo str_replace(",", " ", $row['tags']); ?>">
                                <a class="link" data-toggle="modal" data-target="#project_<?php echo $row['id']; ?>">
                                    <img width="200" height="400" src="<?php echo $img ?>" title="<?php echo $row['name'] ?>" class="attachment-medium wp-post-image" alt="<?php echo $row['name'] ?>" />
                                </a>
                                <span class="arccaption"><?php echo $name ?></span>

                            </li>
                            <?php
                        }
                        ?>


                    </ul>

                </div>
            </div>
            <div id="top">
                <b><small> <?php echo $multiLanguage->translate($data, "data_protection", "translate") ?> | <?php echo date("Y"); ?> | <?php echo $multiLanguage->translate($data, "impressum", "translate") ?></small></b>
            </div>
        </section>
    </div>

    <?php
    foreach ($db->get_results($query) as $row) {
        $img = $image->getPostImage($row['id'], "dnt_posts");
        $url = $articleView->detailUrl($row['cat_name_url'], $row['id'], $row['name_url']);
        $detailUrl = WWW_PATH . "" . $row['cat_name_url'] . "/detail/" . $row['id'] . "/project";

        $name = $row['name'];
        $content = $row['perex'] . $row['content'];
        ?>
        <!-- Modal -->
        <div id="project_<?php echo $row['id']; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo $name; ?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4 col-xs-12"><img src="<?php echo $img ?>" title="<?php echo $row['name'] ?>" class="img-responsive" alt="<?php echo $row['name'] ?>" /></div>
                            <div class="col-md-8 col-xs-12">
                                <?php echo $content; ?>
                                <div class="col-xs-12 no-padding">
                                    <a target="_blank" href="<?php echo $detailUrl; ?>"><button type="button" class="button" target="_blank" ><i class="fa fa-external-link"></i>prejsť na detail</button></a>
                                    <a target="_blank" href="<?php echo $url; ?>"><button type="button" class="button" target="_blank" ><i class="fa fa-external-link"></i>Zobrazť projekt</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button" data-dismiss="modal">Zavrieť</button>
                    </div>
                </div>

            </div>
        </div>
        <?php
    }
    ?>
    <?php include "dnt-view/layouts/" . $vendor->getLayout() . "/bottom.php"; ?>