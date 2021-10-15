<?php
session_start();

$keys = array('utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term');
foreach ($keys as $row) {
	if (!empty($_GET[$row])) {
		$value = strval($_GET[$row]);
		$value = stripslashes($value);
		$value = htmlspecialchars_decode($value, ENT_QUOTES);
		$value = strip_tags($value);
		$value = htmlspecialchars($value, ENT_QUOTES);
		$_SESSION['utm'][$row] = $value;
	}
}
$order = '';

$url1 = $_SERVER['REQUEST_URI'];
pr($url1)


?>
<!DOCTYPE html>
<html <?php language_attributes();
		?>>

<head>
    <title><?php
			$keysw = array('utm_source', 'utm_medium', 'utm_campaign', 'utm_term');
			$log = date('Y-m-d H:i:s') . ' ' . print_r($keysw, true);
			file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);

			if ($_SERVER['REQUEST_URI'] == '/')
				echo 'CRM программа для детских учебных центров и детских садов';
			elseif ($_SERVER['REQUEST_URI'] == '/czeny/')
				echo 'Купить CRM систему. Цена CRM системы, стоимость, сколько стоит лицензия?';
			//	echo 'Купить CRM систему - Цена, стоимость, сколько стоит CRM';//old
			elseif ($_SERVER['REQUEST_URI'] == '/modul-planirovanie-zadach/')
				echo 'Планировщик задач для компании - CRM программа для планирования расписания';
			elseif ($_SERVER['REQUEST_URI'] == '/modul-uchet-finansov-i-tovarov/')
				echo 'CRM для учета финансов организации - программа автоматизации учета доходов и расходов';
			elseif ($_SERVER['REQUEST_URI'] == '/modul-kassy/')
				echo 'CRM с онлайн-кассой - программа с учетом оплат клиентов';
			elseif ($_SERVER['REQUEST_URI'] == '/modul-planirovanie-zadach/')
				echo 'Планировщик задач для компании - CRM программа для планирования расписания';
			elseif ($_SERVER['REQUEST_URI'] == '/modul-zhurnal-uspevaemosti/')
				echo 'Журнал учета посещаемости и успеваемости в электронном виде';
			elseif ($_SERVER['REQUEST_URI'] == '/berkana-uchebnyj-czentr/')
				echo 'CRM для школы и учебного центра - программа учета образовательных учреждений';
			elseif ($_SERVER['REQUEST_URI'] == '/berkana-detskij-czentr/')
				echo 'CRM-система для детского центра - программа учета в клубах и садах';
			elseif ($_SERVER['REQUEST_URI'] == '/music/')
				echo 'CRM-система для музыкальной школы - программа учета клиентов';
			elseif ($_SERVER['REQUEST_URI'] == '/dance/')
				echo 'CRM-система для танцевальных студий - программа учета в центрах танцев';
			elseif ($_SERVER['REQUEST_URI'] == '/sport/')
				echo 'CRM-система для спортивных школ, центров и кружков - программа учета в секциях спорта';
			elseif ($_SERVER['REQUEST_URI'] == '/modul-uchet-klientov/')
				echo 'Учет клиентов CRM - простая система для учета заказчиков';
			elseif ($_SERVER['REQUEST_URI'] == '/moduli/')
				echo 'Внедрение CRM системы';
			elseif ($_SERVER['REQUEST_URI'] == '/konsultacziya/')
				echo 'Как работать в срм системе - Настройка CRM системы в компании';
			elseif ($_SERVER['REQUEST_URI'] == '/berkana-yazykovaya-shkola/')
				echo 'CRM для школы иностранных языков и языковых курсов - попробовать программу автоматизации учёта';
			elseif ($_SERVER['REQUEST_URI'] == '/berkana-detskij-sad/')
				echo 'CRM для детского сада - программа управления и учета';
			elseif ($_SERVER['REQUEST_URI'] == '/berkana-igrovoj-czentr/')
				echo 'CRM для игрового центра и тайм-зон - программа управления развлекательным центром';
			elseif ($_SERVER['REQUEST_URI'] == '/modul-marketing/')
				echo 'Учет заявок клиентов онлайн - CRM программа';
			elseif ($_SERVER['REQUEST_URI'] == '/o-nas/')
				echo 'Облачная CRM система - программа учета в облаке';
			elseif ($_SERVER['REQUEST_URI'] == '/promotions/')
				echo 'Акции на CRM-системы - получи 1 месяц бесплатно';
			else
				echo wp_get_document_title(); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://mc.yandex.ru">
    <link rel="preconnect" href="https://connect.facebook.net">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/phonecode-master/phonecode.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/build/css/intlTelInput.css">




    <?php wp_head(); // необходимо для работы плагинов и функционала 
	if ($_SERVER['REQUEST_URI'] == '/') {
		echo '<meta name="description" content="⭐⭐⭐ ОллаБеркана - CRM для школ и детских центров. ⭐⭐⭐ Получите бесплатный демо-доступ прямо сейчас!" />';
	} elseif ($_SERVER['REQUEST_URI'] == '/berkana-yazykovaya-shkola/') {
		echo '<meta name="description" content="⭐⭐⭐ Уникальная CRM система для ведения языковых школ и курсов иностранных языков. ⭐⭐⭐ Получите бесплатно демо-доступ к программе для учебных центров прямо сейчас!" />';
	} elseif ($_SERVER['REQUEST_URI'] == '/berkana-detskij-czentr/') {
		echo '<meta name="description" content="⭐⭐⭐ Уникальная CRM система для ведения детских центров. ⭐⭐⭐ Получите бесплатно демо-доступ к программе для бизнеса прямо сейчас!" />';
	} elseif ($_SERVER['REQUEST_URI'] == '/berkana-uchebnyj-czentr/') {
		echo '<meta name="description" content="⭐⭐⭐ Уникальная CRM система для ведения учебных центров. ⭐⭐⭐ Получите бесплатно демо-доступ к программе для образовательных школ прямо сейчас!" />';
	} elseif ($_SERVER['REQUEST_URI'] == '/music/') {
		echo '<meta name="description" content="⭐⭐⭐ Уникальная CRM система для ведения музыкальных кружков. ⭐⭐⭐ Получите бесплатно демо-доступ к программе для музыкальных школ прямо сейчас!" />';
	} elseif ($_SERVER['REQUEST_URI'] == '/dance/') {
		echo '<meta name="description" content="⭐⭐⭐ Уникальная CRM система для ведения школ танцев. ⭐⭐⭐ Получите бесплатно демо-доступ к программе для танцевальных школ прямо сейчас!" />';
	} elseif ($_SERVER['REQUEST_URI'] == '/sport/') {
		echo '<meta name="description" content="⭐⭐⭐ Уникальная CRM система для ведения спортивных секций центров. ⭐⭐⭐ Получите бесплатно демо-доступ к программе для спортивных школ прямо сейчас!" />';
	} elseif ($_SERVER['REQUEST_URI'] == '/czeny/') {
		echo '<meta name="description" content="⭐⭐⭐ Купить уникальную CRM систему для ведения учебных центров. ⭐⭐⭐ Получите бесплатно демо-доступ к программе для игровых центров прямо сейчас!" />';
	} else echo '<meta name="description" content="' . wp_get_document_title() . ' - CRM для школ и детских центров ОллаБеркана. ⭐⭐⭐ Получите бесплатный демо-доступ к CRM прямо сейчас!" />';
	?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" type="image/x-icon">
    <?php the_field('head_code', 'options'); ?>



    <script type="text/javascript">
    ! function() {
        var t = document.createElement("script");
        t.type = "text/javascript", t.async = !0, t.src = "https://vk.com/js/api/openapi.js?168", t.onload =
    function() {
            VK.Retargeting.Init("VK-RTRG-913721-7ElVj"), VK.Retargeting.Hit()
        }, document.head.appendChild(t)
    }();
    </script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-913721-7ElVj" style="position:fixed; left:-999px;"
            alt="" /></noscript>


    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-PMTQ47N');
    </script>
    <!-- End Google Tag Manager -->

</head>

<body <?php body_class(); // все классы для body 
		?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PMTQ47N" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Rating Mail.ru counter -->
    <script type="text/javascript">
    var _tmr = window._tmr || (window._tmr = []);
    _tmr.push({
        id: "3219412",
        type: "pageView",
        start: (new Date()).getTime()
    });
    (function(d, w, id) {
        if (d.getElementById(id)) return;
        var ts = d.createElement("script");
        ts.type = "text/javascript";
        ts.async = true;
        ts.id = id;
        ts.src = "https://top-fwz1.mail.ru/js/code.js";
        var f = function() {
            var s = d.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(ts, s);
        };
        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }

    })(document, window, "topmailru-code");
    </script><noscript>
        <div>
            <img src="https://top-fwz1.mail.ru/counter?id=3219412;js=na"
                style="border:0;position:absolute;left:-9999px;" alt="Top.Mail.Ru" />
        </div>
    </noscript>
    <!-- //Rating Mail.ru counter -->
    <?php if (!is_front_page() && !is_page(22)  && !is_page(157) && !is_page(52)) { ?>
    <div class="bg2-img"><img src="<?php echo get_template_directory_uri(); ?>/img/bg2.jpg" /></div>
    <?php } ?>

    <script>

    </script>
    <div class="header">
        <div class="container">
            <div class="d-flex">
                <div class="logo"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png"
                            alt="CMS Berkana" /></a></div>
                <div class="header-right">

                    <div class="bottom">
                        <div class="soc-box _1">

                            <a target="_blank" href="https://wa.me/79313688577"><img
                                    src="<?php echo get_template_directory_uri(); ?>/img/whatsapp.svg" /></a>
                            <a target="_blank" href="https://t.me/crmOllaBerkana"><img
                                    src="<?php echo get_template_directory_uri(); ?>/img/telegram.svg" /></a>
                        </div>

                        <div class="txt2"> <a target="_blank" href="mailto:info@ollaberkana.ru">info@ollaberkana.ru</a>
                        </div>
                        <div class="btn_header"> <a id="btn-call" class="btn5 btn-call" href=""><span>Заказать обратный
                                    звонок</span></a></div>

                    </div>
                    <div class="top">
                        <div class="menu-box">
                            <div class="menu">
                                <a href="<?php echo get_page_link(22); ?>">О нас</a>
                                <a class="sale" href="<?php echo get_page_link(28); ?>">Цены</a>
                                <a href="<?php echo get_page_link(52); ?>">Модули</a>
                                <a href="<?php echo get_page_link(24); ?>">Инструкция</a>

                                <a href="/partners/">Партнеры</a>

                                <a href="/blog/">Блог</a>
                                <a href="<?php echo get_page_link(26); ?>"><span>Контакты</span></a>
                                <a id="btn-call" class="btn5 btn-call btn_menu" href=""><span>Заказать обратный
                                        звонок</span></a>
                            </div>
                        </div>
                        <div class="menu-btn"><span></span><span></span><span></span></div>
                    </div>
                </div>
                <?php
				function pr($val)
				{
					$bt   = debug_backtrace();
					$file = file($bt[0]['file']);
					$src  = $file[$bt[0]['line'] - 1];
					$pat = '#(.*)' . __FUNCTION__ . ' *?\( *?(.*) *?\)(.*)#i';
					$var  = preg_replace($pat, '$2', $src);
					echo '<script>console.log("' . trim($var) . '=' .
						addslashes(json_encode($val, JSON_UNESCAPED_UNICODE)) . '")</script>' . "\n";
				}

				$order = '';
				$utm_term = '';
				$utm_source = '';
				$utm_medium = '';
				$utm_campaing = '';
				$utm_content =  '';

				if (!empty($_SESSION['utm'])) {
					$utm_term = $_SESSION['utm']['utm_term'];
					$utm_source = $_SESSION['utm']['utm_source'];
					$utm_medium = $_SESSION['utm']['utm_medium'];
					$utm_campaing = $_SESSION['utm']['utm_campaing'];
					$utm_content = $_SESSION['utm']['utm_content'];
					foreach ($_SESSION['utm'] as $i => $row) {
						$order .= $i . ': ' . $row . "\r\n";
					}
				}

				pr($order);


				?>
            </div>
        </div>
    </div>