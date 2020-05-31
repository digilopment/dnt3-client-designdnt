<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\GoogleCaptcha;
use DntLibrary\Base\Mailer;
use DntLibrary\Base\MultyLanguage;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Settings;
use DntLibrary\Base\Vendor;

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$rest = new Rest;
$mailer = new Mailer;
$mail = new Dnt;
$data = Frontend::get();
$db = new DB;
$siteKey = $data['meta_settings']['keys']['gc_site_key']['value'];
$secretKey = $data['meta_settings']['keys']['gc_secret_key']['value'];
$gc = new GoogleCaptcha($siteKey, $secretKey);

if ($rest->post("sent_msg")) {

    if ($data['meta_settings']['keys']['gc_secret_key']['show'] == 1 && $data['meta_settings']['keys']['gc_site_key']['show'] == 1) {
        $NO_CAPTCHA = 0;
        $gc->setCheckedOptions($_POST['g-recaptcha-response']);
    } else {
        $NO_CAPTCHA = 1;
    }

    if ($gc->getResult() || $NO_CAPTCHA) {

        $predmet = "" . $rest->post("predmet");
        $meno = "" . $rest->post("meno");
        $priezvisko = "" . $rest->post("priezvisko");
        $firma = "" . $rest->post("firma");
        $email = "" . $rest->post("email");
        $tel_c = "" . $rest->post("tel_c");
        $ulica = "" . $rest->post("ulica");
        $psc = "" . $rest->post("psc");
        $mesto = "" . $rest->post("mesto");
        $produkt = "" . $rest->post("produkt");
        $od_meno = Settings::get("vendor_email") . " - " . $predmet;
        $sprava = $rest->post("sprava");



        $msg = "
		<h3>" . $predmet . "</h3><br/>
		<b>Meno:</b>" . $meno . " " . $priezvisko . "<br/>
		<b>Telefón:</b>" . $tel_c . "<br/>
		<b>Email:</b>" . $email . "<br/>
		<b>SPRÁVA</b>:
		" . $sprava . "<br/><br/><b>Kontaktný email odosielateľa: <a href=\"mailto:" . $email . "\">" . $email . "</a></b>";

        if (Frontend::getMetaSetting($data, "notifikacny_email")) {
            $senderEmail = Frontend::getMetaSetting($data, "notifikacny_email");
            $messageTitle = Frontend::getMetaSetting($data, "title") . " | " . $meno . " " . $priezvisko . " | " . MultyLanguage::translate($data, "formular", "translate");

            $mailer->set_recipient(array($senderEmail));
            $mailer->set_msg($msg);
            $mailer->set_subject($messageTitle);
            $mailer->set_sender_name("Info");
            $mailer->set_sender_email("info@noreply.sk");
            $mailer->sent_email();
        }



        $name = $predmet . ", " . $meno . " " . $priezvisko;

        /**
         * ZAPIS DO POSTOV
         * */
        $insertedData = array(
                    'vendor_id' => Vendor::getId(),
                    'cat_id' => "306",
                    'sub_cat_id' => "",
                    '`type`' => "post",
                    'datetime_creat' => Dnt::datetime(),
                    'datetime_update' => Dnt::datetime(),
                    'datetime_publish' => Dnt::datetime(),
                    'name' => $name,
                    'name_url' => Dnt::name_url($name),
                    'content' => $msg,
                    '`show`' => '0'
        );
        $db->insert('dnt_posts', $insertedData);
        $RESPONSE = 1;
    } else {
        $RESPONSE = 2;
        $CUSTOM = "no captcha";
        $ATTACHMENT = false;
    }
} else {
    $RESPONSE = 0;
    $NO_CAPTCHA = 0;
}

echo '{
      "success": "' . $RESPONSE . '",
      "request": "POST (via AJAX)",
      "response": "' . $RESPONSE . '",
      "protokol": "REST",
      "n_c": "' . $NO_CAPTCHA . '",
      "generator": "Designdnt 3",
      "service": "rpc",
      "message": "Silence is golden, speech is gift :)"
    }';

