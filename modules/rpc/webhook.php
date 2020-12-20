<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\Rest;

class rpcModulController
{

    public function run()
    {
        $rest = new Rest;
        $db = new DB;
        if ($rest->webhook(2) == "json" && $rest->webhook(3) == "contact-form") {
            include "contact-form.php";
        } elseif ($rest->webhook(2) == "xml" && $rest->webhook(3) == "sitemap") {
            include "sitemap.php";
        } else {
            $rest->loadDefault();
        }
    }

}

$modul = new rpcModulController();
$modul->run();
