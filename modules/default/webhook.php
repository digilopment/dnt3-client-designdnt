<?php

use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Webhook;

class defaultModulController
{

    public function run()
    {
        $rest = new Rest;
        $webhook = new Webhook;
        $dnt = new Dnt;
		
        $url = $rest->webhook(1);
        $modulDefaultUrl = "";
        $modulDefaultUrl = false;
        foreach ($webhook->getSitemapModules("default") as $modulDefaultUrl) {
            if ($url != $modulDefaultUrl) {
                $dnt->redirect(WWW_PATH . $modulDefaultUrl);
            }
        }
        include "tpl.php";
    }

}

$modul = new defaultModulController;
$modul->run();
