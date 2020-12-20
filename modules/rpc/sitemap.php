<?php

use DntLibrary\Base\Frontend;
$frontend = new Frontend;
$data = $frontend->get();
header('Content-Type: text/xml');

echo '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
foreach ($data['menu_items'] as $item) {
    $name_url = WWW_PATH . "" . $item['name_url'];
    $NAV_NAVIGATION = 1;
    echo '<url>';
    echo '<loc>' . $name_url . '</loc>';
    echo '<lastmod>' . $item['datetime_update'] . '</lastmod>';
    echo '<changefreq>hourly</changefreq>';
    echo '<priority>' . $NAV_NAVIGATION . '</priority>';
    echo '</url>';
}
echo '</urlset>';
