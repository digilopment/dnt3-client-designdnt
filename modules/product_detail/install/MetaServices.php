<?php

namespace DntView\Layout\Modul\Install;

class MetaServices
{

    protected $content = '0';

    public function init($postId, $service)
    {
        $defaultContent = $this->content;
        $insertedData[] = array(
            '`post_id`' => $postId,
            '`service`' => $service,
            '`vendor_id`' => Vendor::getId(),
            '`key`' => "price",
            '`value`' => $defaultContent,
            '`content_type`' => "text",
            '`cat_id`' => "2",
            '`description`' => "Cena produktu",
            '`order`' => "100",
            '`show`' => "1",
        );
        $insertedData[] = array(
            '`post_id`' => $postId,
            '`service`' => $service,
            '`vendor_id`' => Vendor::getId(),
            '`key`' => "category",
            '`value`' => $defaultContent,
            '`content_type`' => "text",
            '`cat_id`' => "2",
            '`description`' => "Kategória",
            '`order`' => "100",
            '`show`' => "1",
        );
        return $insertedData;
    }

}
