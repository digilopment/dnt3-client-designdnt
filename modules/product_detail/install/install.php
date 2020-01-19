<?php

function defaultModuleMetaDataConfiguration($postId, $service)
{

    $defaultContent = "Content";
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
