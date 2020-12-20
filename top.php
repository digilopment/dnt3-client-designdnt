<?php

use DntLibrary\Base\Settings;
use DntLibrary\Base\Vendor;

$settings = new Settings();
$vendor = new Vendor();
?>
<div id="left-menu-close-icon"></div>
<!-- MENU ICONS  -->
<div id="left-menu-icon" ></div>
<div id='logo'>
    <?php
    $logo_firmy = $settings->getImage($data['meta_settings']['keys']['logo_firmy']['value']);
    $logo_firmy_2 = $settings->getImage($data['meta_settings']['keys']['logo_firmy_2']['value']);
    $logo_firmy_3 = $settings->getImage($data['meta_settings']['keys']['logo_firmy_3']['value']);

    $logoAlt = "Logo - " . $settings->get("title");

    $logo_url = $data['meta_settings']['keys']['logo_url']['value'];
    $logo_url_2 = $data['meta_settings']['keys']['logo_url_2']['value'];
    $logo_url_3 = $data['meta_settings']['keys']['logo_url_3']['value'];
    ?>

    <?php if ($data['meta_settings']['keys']['logo_firmy']['show'] == 1) { ?>
        <a target="_blank" href="<?php echo $logo_url ?>">
            <img class="logo" src="<?php echo $logo_firmy; ?>" alt="<?php echo $logoAlt; ?>">
        </a>
    <?php } ?>
    <?php if ($data['meta_settings']['keys']['logo_firmy_2']['show'] == 1) { ?>
        <a target="_blank" href="<?php echo $logo_url_2; ?>">
            <img class="logo" src="<?php echo $logo_firmy_2; ?>" alt="<?php echo $logoAlt; ?>">
        </a>
    <?php } ?>
    <?php if ($data['meta_settings']['keys']['logo_firmy_3']['show'] == 1) { ?>
        <a target="_blank" href="<?php echo $logo_url_3; ?>">
            <img class="logo" src="<?php echo $logo_firmy_3; ?>" alt="<?php echo $logoAlt; ?>">
        </a>
    <?php } ?>
</div>
<!-- MENU -->
<?php get_nav_menu($data); ?>
<!-- End Main Menu -->
<section id="left">
    <?php get_slider($data); ?>
</section>

<?php include "dnt-view/layouts/" . $vendor->getLayout() . "/popup.php"; ?>
<!-- LISTA END -->
<?php
if ($data['meta_settings']['keys']['ga_key']['show'] == 1) {
    $ga_key = $data['meta_settings']['keys']['ga_key']['value'];
    ?>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', '<?php echo $ga_key; ?>', 'auto');
        ga('send', 'pageview');
    </script>
    <?php
}
if ($data['meta_settings']['keys']['pixel_retargeting']['show'] == 1) {
    ?>
    <noscript>
    <img height="1" width="1" border="0" alt="" style="display:none" src="<?php echo $data['meta_settings']['keys']['pixel_retargeting']['value']; ?>" />
    </noscript>
<?php } ?>