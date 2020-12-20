<?php

use DntLibrary\Base\Frontend;
use DntLibrary\Base\Settings;

$frontend = new Frontend();
$settings = new Settings();
$data = $frontend->get($custom_data);
$color = 'color: #7dcdaf;';
$color = 'color: #ff6a9d;';

$colorDef = "333333";
$colorDark = "111111";
$colorGray = "dedede";
$colorGrayDark = "cecece";
$GRADIENT = "background: linear-gradient(180deg, #$colorDef -2.48%, #$colorDark 121.75%);";
$GRAYSCALE = "-webkit-filter: grayscale(100%) !important;filter: grayscale(100%) !important;";
$projectName = "Designdnt | Firma";
?>
<!DOCTYPE html>
<html lang="<?php echo $frontend->getMetaSetting($data, "language"); ?>">
    <head>
        <meta charset="utf-8">
        <title><?php echo $data['title']; ?></title>

        <?php
        foreach ($data['meta'] as $meta) {
            echo $meta;
        }
        ?>
        <meta name="author" content="designdnt">
        <meta name="viewport" content="width=device-width" />
        <?php
        $favicon = $settings->getImage($data['meta_settings']['keys']['favicon']['value']);
        ?>

        <!-- Favicone Icon -->
        <link rel="" type="img/x-icon" href="<?php echo $favicon; ?>" />
        <link rel="" type="img/png" href="<?php echo $favicon; ?>" />
        <link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo $favicon; ?>" />
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900|Playfair+Display:400,700,900" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $data['media_path']; ?>cenawebu/css/fontawesome-all.css" type="text/css">
        <link rel="stylesheet" href="<?php echo $data['media_path']; ?>cenawebu/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $data['media_path']; ?>cenawebu/css/style.css" type="text/css">
        <link rel="stylesheet" href="<?php echo $data['media_path']; ?>cenawebu/css/custom.css" type="text/css">
        <style>
            img {
                -webkit-filter: grayscale(100%) !important; /* Safari 6.0 - 9.0 */
                filter: grayscale(100%) !important;
            }
            h1, h2, h3, h4, h5, h6 {
                color: #3F4658;
            }
            p{
                color: #<?php echo $colorDark; ?>;
            }
            h3{
                color: #<?php echo $colorDark; ?>;
            }
            .header .price {
                font-size: 20px;
            }
            button{
                color: #fff;
            }
            .ref-page{
                color: #3F4658;
            }
            .menu span{
                color: #6b6d84;
            }
            .check{
                color: #ddd;
            }
            .check.checked{
                color: #414459;
            }
            .modal-custom .close{
                color: #a0a0a0;
            }
            .question .desc{
                color: #<?php echo $colorDark; ?>;
            }
            .footer{
                background: rgba(255, 255, 255, 0);
                color: #<?php echo $colorDark; ?>;
            }
            .header .price{
                color: #3F4658;
            }
            .answer .img{
                border: 1px solid #<?php echo $colorGray; ?>;
            }
            .answer .img.active{
                border: 1px solid #<?php echo $colorGrayDark; ?>;
            }
            .summary .email-box input{
                background: #F6F8FD;
                color: #949EB6;
            }
            ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
                color:    #949EB6;
            }
            :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
                color:    #949EB6;
            }
            ::-moz-placeholder { /* Mozilla Firefox 19+ */
                color:    #949EB6;
            }
            :-ms-input-placeholder { /* Internet Explorer 10-11 */
                color:    #949EB6;
            }
            ::-ms-input-placeholder { /* Microsoft Edge */
                color:    #949EB6;
            }
            ::placeholder { /* Most modern browsers support this now. */
                color:    #949EB6;
            }
            .navigation i{
                color: #a9a9a9;
            }
            .navigation i:hover{
                color: #5a5a5a;
            }
            .bd-item-img > div{
                border: 1px solid #ececec;
            }
            .bd-item-txt-question{
                color: #717881;
            }
            .bd-item-txt-answer{
                color: #414459;
            }
            .form-check{
                color: #474b5e;
            }
        </style>

    </head>

    <body>


        <div class="loading active"></div>

        <?php /*
          <div class="about-bh modal-custom">
          <div>
          <h2>designdnt</h2>
          <p>
          Moderná softvérovo hardvérová firma, kde vytvárame cenovo dostupné riešenia pre malé a veľké firmy.
          Aplikujeme moderné dizajnové princípy spolu s najnovšími webovými technológiami a vytvárame riešenia
          šité na mieru, ktoré prinášajú hodnotu tým, že spájajú ľudí so sebou navzájom a so svojimi zákazníkmi.
          V prípade akýchkoľvek otázok nás kontaktujte na
          <a style="<?php echo $color;?>" href="mailto:<?php echo $frontend->getMetaSetting($data, "vendor_email"); ?>"><?php echo $frontend->getMetaSetting($data, "vendor_email"); ?></a>
          alebo navštívte náš web
          <a style="<?php echo $color;?>" href="http://designdnt.query.sk">designdnt.query.sk</a>

          </p>
          <span class="close"><i class="far fa-times"></i></span>
          </div>
          </div>

          <div class="about-project modal-custom">
          <div>
          <h2><?php echo $projectName ?></h2>
          <p>Náš tím mladých programátorov prišiel s nápadom, ktorý pomáha ľudom. Projekt <?php echo $projectName ?> má v prvom rade pomôcť vám a všetkým návštevníkom v prípade, že máte záujem o vlastnú webovú stránku. Zaberie vám to iba minútku no ušetrí kopec času, ktorý by ste stratili pri hľadaní zavádzajúcich odpovedí. Táto stránka má informačný charakter. Tu môžete zistiť čo všetko môže vaša webová stránka obsahovať. </p>
          <p>Dáva prehľad o odhade ceny podľa zvolených odpovedí. Na konci vyplnenia odpovedí máte možnosť si tento cenový odhad prehliadnuť, stiahnuť alebo nám ho odoslať a kontaktovať nás. Náš tím sa s vami následne skontaktujeme a zodpovedá vám na všetky vaše otázky a vysvetlíme vám všetko čo budete potrebovať. Už to zostáva iba vyskúšať. </p>
          <span class="close"><i class="far fa-times"></i></span>
          </div>
          </div>

          <div class="about-other modal-custom">
          <div>
          <p><a class="ref-page" href="http://<?php echo $projectName ?>">www.<b>kolkostojiwebovastranka</b>.sk</a></p>
          <p><a class="ref-page" href="http://kolkostojiaplikacia.sk">www.<b>kolkostojiaplikacia</b>.sk</a></p>
          <p><a class="ref-page" href="http://kolkostojiinformacnysystem.sk">www.<b>kolkostojiinformacnysystem</b>.sk</a></p>
          <p><a class="ref-page" href="http://kolkostojieshop.sk">www.<b>kolkostojieshop</b>.sk</a></p>
          <span class="close"><i class="far fa-times"></i></span>
          </div>
          </div>
         */ ?>

        <div id="content">

            <div class="section section-main section-active section-background main-bg" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/bg.svg')">
                <div class="container-fluid">
                    <div class="row">
                        <div class="offset-lg-2 col-lg-4 order-lg-1 offset-md-1 col-md-10 order-md-2 col-sm-12 order-2">
                            <div class="main-title">

                                <H1>Koľko stojí webová stránka ?</H1>
                                <p>Premýšľali ste už niekedy nad tým, koľko stojí vytvorenie webovej stránky ? Táto šikovná kalkulačka vám pomôže sa zorientovať.</p>
                                <button class="start-exam" style="<?php echo $GRADIENT; ?>">Odhadnúť</button>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 col-md-12 order-md-1 col-sm-12 order-1 cut-15">
                            <div id="sceneBg" class="scene">
                                <div data-depth="0.80"><img src="<?php echo $data['media_path']; ?>cenawebu/img/web/web5.svg"></div>
                                <div data-depth="0.60"><img src="<?php echo $data['media_path']; ?>cenawebu/img/web/web4.svg"></div>
                                <div data-depth="0.40"><img src="<?php echo $data['media_path']; ?>cenawebu/img/web/web3.svg"></div>
                                <div data-depth="0.20"><img src="<?php echo $data['media_path']; ?>cenawebu/img/web/web2.svg"></div>
                                <div data-depth="0.10"><img src="<?php echo $data['media_path']; ?>cenawebu/img/web/web1.svg"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section section-main section-active section-background main-sm" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/bgSm.svg')">
                <div class="container-fluid">
                    <div class="row">
                        <div class="offset-lg-2 col-lg-4 order-lg-1 offset-md-1 col-md-10 order-md-2 col-sm-12 order-2">
                            <div class="main-title">
                                <H1>Koľko stojí webová stránka ?</H1>
                                <p>Premýšľali ste už niekedy nad tým, koľko stojí vytvorenie webovej stránky ? Táto šikovná kalkulačka vám pomôže sa zorientovať.</p>
                                <button class="start-exam" style="<?php echo $GRADIENT; ?>">Štart</button>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 col-md-12 order-md-1 col-sm-12 order-1 cut-15">
                            <div id="sceneSm" class="scene">
                                <div data-depth="0.40"><img src="<?php echo $data['media_path']; ?>cenawebu/img/web/webSm3.svg"></div>
                                <div data-depth="0.20"><img src="<?php echo $data['media_path']; ?>cenawebu/img/web/webSm2.svg"></div>
                                <div data-depth="0.10"><img src="<?php echo $data['media_path']; ?>cenawebu/img/web/webSm1.svg"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section section-exam section-background-question" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/bg_question.svg')">
                <div class="container-fluid">
                    <div class="exam">
                        <div class="question active" data-id="0">
                            <div class="header">
                                <div class="project" style="<?php echo $color; ?>"><a href="<?php echo WWW_PATH; ?>"><?php echo $projectName ?></a></div>
                                <div class="price" data-price="0">0 €</div>
                                <div class="pagination">0 / 10</div>
                            </div>
                            <div class="content">
                                <div class="container">
                                    <div class="mission">
                                        <h2 class="text-center question-title" data-question="Koľko podstránok budete potrebovať ?">Koľko podstránok budete potrebovať ?</h2>
                                        <span class="desc text-center">Pod pojmom podstránka si možete predstaviť napriklad stránku na vašom webe O nás , Portfólio, Služby, Kontakt a pod.</span>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="answer" data-price="300" data-id="1">
                                                    <div class="img active" data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/11.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/11.svg')"></div>
                                                    <h3>1-5</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="500" data-id="2">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/12.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/12.svg')"></div>
                                                    <h3>5+</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="0" data-id="4">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/14.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/14.svg')"></div>
                                                    <h3>Neviem</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="question " data-id="1">
                            <div class="header">
                                <div class="project" style="<?php echo $color; ?>"><?php echo $projectName ?></div>
                                <div class="price" data-price="0">0 €</div>
                                <div class="pagination">0 / 10</div>
                            </div>
                            <div class="content">
                                <div class="container">
                                    <div class="mission">
                                        <h2 class="text-center question-title" data-question="Potrebujete dizajn ?">Potrebujete dizajn ?</h2>
                                        <span class="desc text-center">V prípade, že dizajn pre vašu stránku máte ( grafický návrh, templata ) znamená, že nebudeme potrebovať na funkcionalitu veľa času. V prípade, že dizajn nemáte je potrebné ho navrhnúť, schváliť a sfunkčniť. </span>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="answer" data-price="700" data-id="5">
                                                    <div class="img active" data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/21.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/21.svg')"></div>
                                                    <h3>Áno</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="300" data-id="7">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/22.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/22.svg')"></div>
                                                    <h3>Nie</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="0" data-id="9">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/23.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/23.svg')"></div>
                                                    <h3>Neviem</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="question " data-id="2">
                            <div class="header">
                                <div class="project" style="<?php echo $color; ?>"><?php echo $projectName ?></div>
                                <div class="price" data-price="0">0 €</div>
                                <div class="pagination">0 / 10</div>
                            </div>
                            <div class="content">
                                <div class="container">
                                    <div class="mission">
                                        <h2 class="text-center question-title" data-question="Potrebujete zaregistrovať doménu a hosting ?">Potrebujete zaregistrovať doménu a hosting ?</h2>
                                        <span class="desc text-center">Hosting predstavuje pamäťový priestor, kde bude uložená vaša webová stránka. Doména je jedinečný názov vašej webovej stránky ( www.mojastranka.sk ), podľa ktorého si vás budú môcť vyhľadať na internete.</span>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="answer" data-price="50" data-id="10">
                                                    <div class="img active" data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/31.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/31.svg')"></div>
                                                    <h3>Áno</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="0" data-id="11">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/32.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/32.svg')"></div>
                                                    <h3>Nie</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="0" data-id="12">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/33.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/33.svg')"></div>
                                                    <h3>Neviem</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="question " data-id="3">
                            <div class="header">
                                <div class="project" style="<?php echo $color; ?>"><?php echo $projectName ?></div>
                                <div class="price" data-price="0">0 €</div>
                                <div class="pagination">0 / 10</div>
                            </div>
                            <div class="content">
                                <div class="container">
                                    <div class="mission">
                                        <h2 class="text-center question-title" data-question="Bude vaša stránka viac jazyčná ?">Bude vaša stránka viac jazyčná ?</h2>
                                        <span class="desc text-center">Jednoduchým prekliknutím na vašej webovej stránke sa dostanete na danú stránku v inom jazyku. Všetky preložené texty, ktoré sa nachádazajú na webovej stránke si budete mocť cez adminstráciu doplniť do ľubovoľného jazyka a ostatné za vás vyrieši systém.</span>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="answer" data-price="200" data-id="13">
                                                    <div class="img active" data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/41.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/41.svg')"></div>
                                                    <h3>Áno</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="100" data-id="14">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/42.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/42.svg')"></div>
                                                    <h3>Nie</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="0" data-id="15">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/43.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/43.svg')"></div>
                                                    <h3>Neviem</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="question " data-id="4">
                            <div class="header">
                                <div class="project" style="<?php echo $color; ?>"><?php echo $projectName ?></div>
                                <div class="price" data-price="0">0 €</div>
                                <div class="pagination">0 / 10</div>
                            </div>
                            <div class="content">
                                <div class="container">
                                    <div class="mission">
                                        <h2 class="text-center question-title" data-question="Chcete aby sa návštevníci prihlasovali ?">Chcete aby sa návštevníci prihlasovali ?</h2>
                                        <span class="desc text-center">Ak chcete aby stránka zaznamenávala a uchovávala rôzne údaje návštevníkov ( možnosť komentovania, nákupu, pridávania obsahu ) je toto prihlasovanie nutné.</span>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="answer" data-price="300" data-id="16">
                                                    <div class="img active" data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/51.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/51.svg')"></div>
                                                    <h3>Áno</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="0" data-id="17">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/52.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/52.svg')"></div>
                                                    <h3>Nie</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="0" data-id="18">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/53.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/53.svg')"></div>
                                                    <h3>Neviem</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="question " data-id="5">
                            <div class="header">
                                <div class="project" style="<?php echo $color; ?>"><?php echo $projectName ?></div>
                                <div class="price" data-price="0">0 €</div>
                                <div class="pagination">0 / 10</div>
                            </div>
                            <div class="content">
                                <div class="container">
                                    <div class="mission">
                                        <h2 class="text-center question-title" data-question="Chcete aby vaši užívatelia mali vlastné užívatelské profily ?">Chcete aby vaši užívatelia mali vlastné užívatelské profily ?</h2>
                                        <span class="desc text-center">Užívateľské profily slúžia na identifikáciu osôb, ktoré majú právo pristupovať na webovú stránku. Každý používateľ bude mať pridelené svoje meno a heslo, ktorým sa bude môct prihlásiť do systému a upravovať si svoj profil.</span>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="answer" data-price="300" data-id="19">
                                                    <div class="img active" data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/61.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/61.svg')"></div>
                                                    <h3>Áno</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="0" data-id="20">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/62.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/62.svg')"></div>
                                                    <h3>Nie</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="0" data-id="30">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/63.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/63.svg')"></div>
                                                    <h3>Neviem</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="question " data-id="6">
                            <div class="header">
                                <div class="project" style="<?php echo $color; ?>"><?php echo $projectName ?></div>
                                <div class="price" data-price="0">0 €</div>
                                <div class="pagination">0 / 10</div>
                            </div>
                            <div class="content">
                                <div class="container">
                                    <div class="mission">
                                        <h2 class="text-center question-title" data-question="Vyžadujete online platby ?">Vyžadujete online platby ?</h2>
                                        <span class="desc text-center">Sposob online platieb je rôzny GoPay, PayPal, VISA, MasterCard a dalšie . . .</span>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="answer" data-price="800" data-id="21">
                                                    <div class="img active" data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/71.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/71.svg')"></div>
                                                    <h3>Áno</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="0" data-id="22">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/72.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/72.svg')"></div>
                                                    <h3>Nie</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="0" data-id="31">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/73.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/73.svg')"></div>
                                                    <h3>Neviem</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="question " data-id="7">
                            <div class="header">
                                <div class="project" style="<?php echo $color; ?>"><?php echo $projectName ?></div>
                                <div class="price" data-price="0">0 €</div>
                                <div class="pagination">0 / 10</div>
                            </div>
                            <div class="content">
                                <div class="container">
                                    <div class="mission">
                                        <h2 class="text-center question-title" data-question="Chcete na web stránke vyhľadávanie ?">Chcete na web stránke vyhľadávanie ?</h2>
                                        <span class="desc text-center">Náklady na vytvorenie funkcie vyhľadávania sa môžu veľmi líšiť. Uvedená cena je priemerom pre integráciu vyhľadávania, ktoré prehľadáva hlavné záznamy v databáze.</span>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="answer" data-price="200" data-id="23">
                                                    <div class="img active" data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/81.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/81.svg')"></div>
                                                    <h3>Áno</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="0" data-id="24">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/82.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/82.svg')"></div>
                                                    <h3>Nie</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="0" data-id="32">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/83.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/83.svg')"></div>
                                                    <h3>Neviem</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="question " data-id="8">
                            <div class="header">
                                <div class="project" style="<?php echo $color; ?>"><?php echo $projectName ?></div>
                                <div class="price" data-price="0">0 €</div>
                                <div class="pagination">0 / 10</div>
                            </div>
                            <div class="content">
                                <div class="container">
                                    <div class="mission">
                                        <h2 class="text-center question-title" data-question="Potrebujete systém správy obsahu (CMS) ?">Potrebujete systém správy obsahu (CMS) ?</h2>
                                        <span class="desc text-center">CSM je redakčný systém, čo znamená systém na správu webstránok. Ide vlastne o webovú aplikáciu používanú pri vytváraní, úprave a mazaní obsahu webu bez znalostí programovania. CMS tak umožňuje ušetriť financie do budúcna, ktoré by ste museli zaplatiť programátorom za aktualizáciu stránky. Vašu webovú stránku si takto môžete kedykoľvek aktualizovať sami.</span>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="answer" data-price="800" data-id="25">
                                                    <div class="img active" data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/91.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/91.svg')"></div>
                                                    <h3>Áno</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="200" data-id="26">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/92.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/92.svg')"></div>
                                                    <h3>Nie</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="0" data-id="33">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/93.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/93.svg')"></div>
                                                    <h3>Neviem</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="question " data-id="9">
                            <div class="header">
                                <div class="project" style="<?php echo $color; ?>"><?php echo $projectName ?></div>
                                <div class="price" data-price="0">0 €</div>
                                <div class="pagination">0 / 10</div>
                            </div>
                            <div class="content">
                                <div class="container">
                                    <div class="mission">
                                        <h2 class="text-center question-title" data-question="Kontaktný formulár pre odosielanie e-mailov ?">Kontaktný formulár pre odosielanie e-mailov ?</h2>
                                        <span class="desc text-center">Prepojenie webovej stránky s vaším emailovým serverom a konkrétnym emailom, ktorý bude slúžiť ako odosielateľ správ pre vašich návštevníkov. V prípade, že by ste toto prepojenie nezabezpečili by vašim návštevníkom prišiel email, ktorý sa automaticky uloží do SPAMu.</span>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="answer" data-price="100" data-id="27">
                                                    <div class="img active" data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/101.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/101.svg')"></div>
                                                    <h3>Áno</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="0" data-id="28">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/102.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/102.svg')"></div>
                                                    <h3>Nie</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="answer" data-price="0" data-id="34">
                                                    <div class="img " data-img="<?php echo $data['media_path']; ?>cenawebu/img/web/103.png" style="<?php echo $GRAYSCALE ?> background-image: url('<?php echo $data['media_path']; ?>cenawebu/img/web/103.svg')"></div>
                                                    <h3>Neviem</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navigation">
                        <div class="next-question"><i class="fal fa-chevron-right"></i></div>
                        <div class="prev-question"><i class="fal fa-chevron-left"></i></div>
                    </div>
                </div>
            </div>
            <div class="section section-finish section-background">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title summary">
                                <H1>Odhad vašej webovej stránky.</H1>
                                <span class="summary-price" style="<?php echo $color; ?>">0 €</span>
                                <p>
                                    Vytvárame digitálne riešenia, ktoré sú založené na potrebách našich zákazníkov. Pozrite si naše
                                    <a style="<?php echo $color; ?>" href="<?php echo WWW_PATH . "a/14858" ?>">portfólio</a>.
                                    Ak vás ponuka zaujala kontaktuje nás prostredníctvom <strong><a style="<?php echo $color; ?>" href="<?php echo WWW_PATH . "a/14859" ?>">kontaktného formulára</a>, emailom, alebo telefonicky.</strong>.
                                </p>

                                <!--
        <div class="email-box">
            <input style="" type="email" class="form-control text-center" name="email" id="email" placeholder="Zadajte svoj e-mail, ozveme sa vám">
            <button id="send-email" class="" style="<?php echo $GRADIENT; ?>">Odoslať</button>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="customCheck1">
            <label class="form-check-label" for="customCheck1">
                <i class="check fas fa-circle fa-sm"></i>Súhlasím so spracovaním poskytnutých osobných údajov. Podmienky <a href="http://designdnt.query.skochrana-osobnych-udajov" target="_blank"><b class="gdpr-more" style="<?php echo $color; ?>">Tu</b></a>
            </label>
        </div>
                                -->
                                <div class="menu">
                                    <div class="breakdown-more">
                                        <a title="Zobrazit Odhad">
                                            <span class="btn btn-primary btn-show-offer" style="color:#fff"> Zobraziť odhad</span></a>
                                    </div>
                                    <!--<div class="save-pdf">
                                        <a title="Generovať PDF" id="download"><i class="fas fa-file-pdf fa-sm" style="<?php echo $color; ?>"></i><span>Stiahnúť odhad</span></a>
                                    </div>-->
                                </div>
                                <div class="breakdown"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <b class="" style="<?php echo $colorDark; ?>">powered</b> <span style="font-size: 10px;">by</span> <a href="<?php echo WWW_PATH; ?>"><b class="" style="<?php echo $color; ?>;">designdnt</a></b>
    </div>
    <script src="<?php echo $data['media_path']; ?>cenawebu/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $data['media_path']; ?>cenawebu/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <script src="<?php echo $data['media_path']; ?>cenawebu/js/sweetalert.min.js"></script>

    <script src="<?php echo $data['media_path']; ?>cenawebu/js/script.js"></script>
    <script>
        var typeProject = "web"; //PODLA TYPU DOTAHOVAT DATA PRE TYP STRANKY
        var pdfPath = '';

        var questionCount = 10;
        var actualQuestion = 1;
        var finalExam = [];

        $(document).ready(function () {

            // window.onbeforeunload = function() { return "Your work will be lost."; };

            var sceneBg = document.getElementById('sceneBg');
            var sceneSm = document.getElementById('sceneSm');
            var parallaxInstanceBg = new Parallax(sceneBg);
            var parallaxInstanceSm = new Parallax(sceneSm);


            $('.loading').removeClass('active');

            $(document).on("click", ".form-check-label", function () {
                $('.form-check-label .check').toggleClass('checked');

            });

            $(document).on("click", ".breakdown-more span", function () {
                $('.section.section-finish').addClass('active');
                renderBreakdown();
            });

            $(document).on("click", ".start-exam", function () {
                startExam();
                updateQuestionNum();
            });

            $(document).on("click", ".next-question", function () {
                questionNext();
                updateQuestionNum();
            });

            $(document).on("click", ".prev-question", function () {
                questionPrev();
                updateQuestionNum();
            });

            $(document).on("click", ".answer .img", function () {

                let actualQuestion = $('.question.active').data('id');
                let actualQuestionTitle = $(this).closest('.mission').find('h2').text();
                let answerPrice = $(this).closest('.answer').data('price');
                let answerId = $(this).closest('.answer').data('id');
                let answerText = $(this).closest('.answer').find('h3').text();
                let answerPicture = $(this).closest('.answer').find('.img').data('img');

                finalExam[actualQuestion] = {
                    'question': actualQuestion,
                    'questionTitle': actualQuestionTitle,
                    'answerId': answerId,
                    'answerText': answerText,
                    'answerPicture': answerPicture,
                    'price': answerPrice
                };

                updatePrice();
                questionNext();
                updateQuestionNum();
            });

            $(document).on("click", "#send-email", function () {

                var email = $('#email').val();
                if (!$("#customCheck1").is(":checked")) {
                    swal('Pozor!', 'Musíte súhlasiť s podmienkami GDPR', "error", {
                        buttons: false,
                        timer: 3000,
                    });
                } else {
                    if (email === '' || !isValidEmailAddress(email)) {
                        swal('Pozor!', 'Nesprávne vyplnený e-mail', "error", {
                            buttons: false,
                            timer: 3000,
                        });
                    } else {
                        if (pdfPath == '') {
                            generatePdfFile(sendAttachmentEmail);
                        } else {
                            sendAttachmentEmail(pdfPath);
                        }
                    }
                }

            });

            $(document).on("click", ".save-pdf a", function () {
                savePdfFile();
            });
        });

        function renderBreakdown() {

            $('.breakdown').html('');

            $.each(finalExam, function (key, value) {
                if (finalExam[key] != undefined) {

                    var picUrl = "\'" + value.answerPicture + "\'";
                    var content = '<div class="bd-item">' +
                            '    <div class="bd-item-img">' +
                            '        <div style="<?php echo $GRAYSCALE ?> background-image: url(' + picUrl + ')" ></div>' +
                            '    </div>' +
                            '    <div class="bd-item-txt">' +
                            '        <div class="bd-item-txt-question">' + value.questionTitle + '</div>' +
                            '        <div class="bd-item-txt-answer">' + value.answerText + '</div>' +
                            '    </div>' +
                            '</div>';

                    $('.breakdown').append(content);
                }
            });
        }

        function generatePdfFile(callbackFunction) {
            var pageData = {estimateText: "Odhad ceny Vašej Webovej stránky.", estimatePrice: getEstimatePrice(), estimateColor: "linear-gradient(180deg, #b1ed95 -2.48%, #66b0c4 121.75%);", estimateColorPdf: "#<?php echo $color ?>", webName: "<?php echo $projectName ?>"};
            var dataRequest = {page: pageData, data: finalExam};
            var url_req = document.location.origin + '/' + basePath + '/?do=generatePdf';
            sendRequest(url_req, 'POST', dataRequest, null, null, callbackFunction, null);
        }

        function savePdfFile() {
            if (pdfPath == '') {
                generatePdfFile(downloadFile)
            } else {
                downloadFile(pdfPath)
            }
        }

        function sendAttachmentEmail(path) {
            pdfPath = path;
            var url = document.location.origin + '/' + basePath + '/?do=SendEmail';
            email = $('#email').val();
            var data = {emailUser: email, estimateText: "Odhad ceny Vašej Webovej stránky.", pathPdf: path};
            successSwal = {'title': 'Úspešné', 'desc': 'Odoslanie e-mailu prebehlo úspešne'};
            errorSwal = {'title': 'Chyba', 'desc': 'E-mail sa nepodarilo odoslať'};

            sendRequestEmail(
                    url,
                    'POST',
                    data,
                    successSwal,
                    errorSwal,
                    function () {
                        $('#email').val('');
                    }
            );

        }

        function updateQuestionNum() {
            let actual = $('.question.active').data('id') + 1;
            $('.pagination').html(actual + ' / ' + questionCount);
        }

        function questionNext() {
            if (actualQuestion < questionCount) {
                actualQuestion += 1;
                hideAllQuestion();
                $('.exam .question:nth-child(' + actualQuestion + ')').addClass('active');
            } else {
                finishExam();
            }
        }

        function questionPrev() {
            if (actualQuestion > 1) {
                actualQuestion -= 1;
                hideAllQuestion();
                $('.exam .question:nth-child(' + actualQuestion + ')').addClass('active');
            } else {
                console.log('Na ZACIATKU');
            }
        }

        function finishExam() {
            $('.section-exam').removeClass('section-active');
            $('.section-finish').addClass('section-active');
            showAppBreakdown();
        }

        function startExam() {
            $('.section-main').removeClass('section-active');
            $('.section-exam').addClass('section-active');
        }

        function hideAllQuestion() {
            $('.question').removeClass('active');
        }

        function updatePrice() {
            let newPrice = 0;

            $.each(finalExam, function (key, value) {
                if (finalExam[key] != undefined) {
                    newPrice += value.price;
                }
            });

            $('.question .price').text(newPrice + ' €');
            $('.summary .summary-price').text(newPrice + ' €');
        }

        function getEstimatePrice() {
            let newPrice = 0;

            $.each(finalExam, function (key, value) {
                if (finalExam[key] != undefined) {
                    newPrice += value.price;
                }
            });

            return newPrice;
        }

        function showAppBreakdown() {
            let appBreakdown = '';

            $.each(finalExam, function (key, value) {
                if (finalExam[key] != undefined) {
                    appBreakdown += '<p>' + value.answerText + ' - <b>' + value.price + ' €</b></p>'
                }
            });
        }

        function isValidEmailAddress(emailAddress) {
            var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{ | }~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{ | }~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
            return pattern.test(emailAddress);
        }

        function downloadFile(path) {
            pdfPath = path;
            var name = path.split('/');
            var link = document.createElement('a');
            link.href = document.location.origin + '/' + basePath + path;
            link.download = name[name.length - 1];
            link.dispatchEvent(new MouseEvent('click'));
        }

    </script>

    <script>
        $(document).ready(function () {

            $(document).on("click", ".about-project-b", function () {
                if ($(".about-project").hasClass("active")) {
                    $('.modal-custom').removeClass('active');
                } else {
                    $('.modal-custom').removeClass('active');
                    $('.about-project').addClass('active');
                }
            });

            $(document).on("click", ".about-other-b", function () {
                if ($(".about-other").hasClass("active")) {
                    $('.modal-custom').removeClass('active');
                } else {
                    $('.modal-custom').removeClass('active');
                    $('.about-other').addClass('active');
                }
            });

            $(document).on("click", ".about-bh-b", function () {
                if ($(".about-bh").hasClass("active")) {
                    $('.modal-custom').removeClass('active');
                } else {
                    $('.modal-custom').removeClass('active');
                    $('.about-bh').addClass('active');
                }
            });

            $(document).on("click", ".modal-custom .close", function () {
                $('.modal-custom').removeClass('active');
            });

        });

    </script>
</body>

</html>