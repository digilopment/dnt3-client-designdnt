<?php

use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\GoogleCaptcha;
use DntLibrary\Base\MultyLanguage;
use DntLibrary\Base\Vendor;

$data = Frontend::get($custom_data);
include "dnt-view/layouts/" . Vendor::getLayout() . "/tpl_functions.php";
$multylanguage = new MultyLanguage;
$article = new ArticleView;

$translate['sidlo'] = MultyLanguage::translate($data, "sidlo", "translate");
$translate['kontakt'] = MultyLanguage::translate($data, "kontakt", "translate");
$translate['meno'] = MultyLanguage::translate($data, "meno", "translate");
$translate['ulica'] = MultyLanguage::translate($data, "ulica", "translate");
$translate['mesto'] = MultyLanguage::translate($data, "mesto", "translate");
$translate['email'] = MultyLanguage::translate($data, "email", "translate");
$translate['tel_c'] = MultyLanguage::translate($data, "tel_c", "translate");
$translate['pobocka'] = MultyLanguage::translate($data, "pobocka", "translate");
$translate['nazov'] = MultyLanguage::translate($data, "nazov", "translate");
$translate['thankyou_for_registration'] = MultyLanguage::translate($data, "thankyou_for_registration", "translate");
$translate['odoslat_btn'] = MultyLanguage::translate($data, "odoslat_btn", "translate");
$translate['field_word_err'] = MultyLanguage::translate($data, "field_word_err", "translate");
$translate['predmet'] = MultyLanguage::translate($data, "predmet", "translate");
$translate['priezvisko'] = MultyLanguage::translate($data, "priezvisko", "translate");
$translate['sprava'] = MultyLanguage::translate($data, "sprava", "translate");
$translate['formular'] = MultyLanguage::translate($data, "formular", "translate");
?>
<?php get_top($data); ?>
<body class="home page page-id-243 page-template page-template-homepage page-template-homepage-php custom-background">
    <div id='main'>
        <?php include "dnt-view/layouts/" . Vendor::getLayout() . "/top.php"; ?>
        <section id="right">
            <div class="wrapper">
                <div class="wrap">
                    <div class="grids">
                        <div class="grid-12">
                            <h1>Napíšte nám</h1>
                            <hr/>
                            <!-- FLEX MAP  -->             
                            <div class="grid-6">
                                <h3><?php echo $translate["kontakt"] ?></h3>
                                <p><strong><?php echo $translate['nazov'] ?>:</strong> <?php echo Frontend::getMetaSetting($data, "vendor_company"); ?></p>
                                <p><strong><?php echo $translate['ulica'] ?>:</strong> <?php echo Frontend::getMetaSetting($data, "vendor_street"); ?></p>
                                <p><strong><?php echo $translate['mesto'] ?>:</strong> <?php echo Frontend::getMetaSetting($data, "vendor_psc"); ?> <?php echo Frontend::getMetaSetting($data, "vendor_city"); ?></p>
                                <p><strong><?php echo $translate['tel_c']; ?></strong>  <?php echo Frontend::getMetaSetting($data, "vendor_tel"); ?></p>
                                <p><strong><?php echo $translate['email']; ?></strong>  <?php echo Frontend::getMetaSetting($data, "vendor_email"); ?></p>
                                <p><strong>Facebook:</strong>  <a href="https://www.facebook.com/dynatom/" target="blank_">www.facebook.com/dynatom</a></p>
                                <p><strong>IČO:</strong>  <?php echo Frontend::getMetaSetting($data, "vendor_ico"); ?></p>
                            </div>
                            <div class="grid-6">
                                <h3 id="kontaktny-formular">Info</h3>
                                <?php echo $data['article']['perex'] ?>
                                <br/>
                            </div>
                            <div class="grid-12" style="margin-bottom: 30px!important;">
                                <h3 ><?php echo $translate['formular']; ?></h3>
                                <script type="text/javascript">
                                    jQuery(document).ready(function () {
                                        jQuery("#form-request").validate({
                                            rules: {
                                                meno: {
                                                    required: true,
                                                    minlength: 1
                                                },
                                                priezvisko: {
                                                    required: true,
                                                    minlength: 1
                                                },
                                                tel_c: {
                                                    required: true,
                                                    minlength: 1
                                                },
                                                predmet: {
                                                    required: true,
                                                    minlength: 1
                                                },
                                                email: {
                                                    required: true,
                                                    email: true
                                                },
                                                sprava: {
                                                    required: true,
                                                    minlength: 1
                                                },
                                            },
                                            messages: {
                                                meno: "<?php echo $translate['field_word_err']; ?>",
                                                priezvisko: "<?php echo $translate['field_word_err']; ?>",
                                                tel_c: "<?php echo $translate['field_word_err']; ?>",
                                                predmet: "<?php echo $translate['field_word_err']; ?>",
                                                email: "<?php echo $translate['field_word_err']; ?>",
                                                sprava: "<?php echo $translate['field_word_err']; ?>",

                                            },
                                            submitHandler: function (form) {
                                                jQuery.ajax({
                                                    type: "POST",
                                                    url: '<?php echo WWW_PATH; ?>rpc/json/contact-form',
                                                    data: jQuery(form).serialize(),
                                                    timeout: 10000,
                                                    dataType: "json",
                                                    success: function (data) {
                                                        console.log(data);
                                                        if (data.success == 1) {
                                                            jQuery("#form-request").hide();
                                                            jQuery("#form_ok").show();
                                                        } else if (data.success == 0) {
                                                            alert("Bat token");
                                                        } else if (data.success == 2) {
                                                            alert("Prosím kliknite na Captchu");
                                                        } else {
                                                            writeError(data.message);
                                                        }
                                                    },
                                                    error: function () {
                                                        alert("Momentálne sme zaneprázdnený.");
                                                    }
                                                });
                                                return false;
                                            }
                                        });

                                        function writeError(message) {
                                            jQuery("#form-result").html("<div class=\"alert alert-error\">" + message + "</div>");
                                        }
                                    });

                                </script>

                                <form class="form-horizontal" id="form-request" action="" novalidate="novalidate">
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label" ><?php echo $translate['meno']; ?>:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="meno" class="form-control"  value=""  placeholder="<?php echo $translate['meno']; ?>:">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label" ><?php echo $translate['priezvisko']; ?>:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="priezvisko" class="form-control"  value=""  placeholder="<?php echo $translate['priezvisko']; ?>:">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label" ><?php echo $translate['predmet']; ?>:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="predmet" class="form-control"  value=""  placeholder="<?php echo $translate['predmet']; ?>:">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label"><?php echo $translate['email']; ?>:</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control"  value=""  placeholder="<?php echo $translate['email']; ?>:">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label"><?php echo $translate['tel_c']; ?>:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="tel_c" class="form-control"  value=""  placeholder="<?php echo $translate['tel_c']; ?>:">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label"><?php echo $translate['sprava']; ?>:</label>
                                        <div class="col-sm-10">
                                            <textarea name="sprava" class="form-control"   style="height:100px;" placeholder="<?php echo $translate['sprava']; ?>:"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                            <?php
                                            if ($data['meta_settings']['keys']['gc_site_key']['show'] == 1 && $data['meta_settings']['keys']['gc_secret_key']['show'] == 1) {
                                                $siteKey = $data['meta_settings']['keys']['gc_site_key']['value'];
                                                $secretKey = $data['meta_settings']['keys']['gc_secret_key']['value'];
                                                $gc = new GoogleCaptcha($siteKey, $secretKey);
                                                $captcha = '<br/><div class="g-recaptcha" data-sitekey="' . $gc->publicToken . '"></div>';
                                                echo $captcha;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                            <input type="submit" class="button" name="sent_msg" value="<?php echo $translate['odoslat_btn']; ?>" />
                                        </div>
                                    </div>

                                </form>
                                <div id="form_ok" style="display: none;">
                                    <div class="grid-12 no-padding no-margin" style="margin: 0px !important;padding: 0px !important;">
                                        <h3><i class="rounded-x fa fa-check"></i><?php echo $translate['thankyou_for_registration']; ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-12">
                                <h3 ><?php echo MultyLanguage::translate($data, "mapa", "translate"); ?></h3>
                                <div class="flex-video widescreen gmap">

                                    <?php
                                    $googleMapsUrl = $data['meta_settings']['keys']['google_map']['value'];
                                    $mapLocation = Dnt::getMapLocation($googleMapsUrl);
                                    $map_first = $mapLocation[0];
                                    $map_second = $mapLocation[1];
                                    $zoom = "12";
                                    ?>
                                    <iframe style="width: 100%; height: 400px; border: none; border-radius: 5px;" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $map_first; ?>%2C%20<?php echo $map_second; ?>&key=AIzaSyDgCVlyp5VJW0VazAYxi70omj3Cv1UjNfk"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END WRAPPER   -->
            </div>
            <!-- END WRAPPER   -->
            <!-- ICONS  -->
            <div id="top">
                <b><small> <?php echo MultyLanguage::translate($data, "data_protection", "translate") ?> | <?php echo date("Y"); ?> | <?php echo MultyLanguage::translate($data, "impressum", "translate") ?></small></b>
            </div>
        </section>
    </div>
    <?php include "dnt-view/layouts/" . Vendor::getLayout() . "/bottom.php"; ?>