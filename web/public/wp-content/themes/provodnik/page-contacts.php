<?

#Template Name: Контакты

get_header();

?>

<div class="b1 b1-6">
    <div class="container">
        <div class="box">
            <h1 class="page-title">Контакты</h1>
        </div>
        <div class="contacts-box">
            <div class="item contacts-tel">
                <p class="contact_info"> Россия</p>
                <a href="tel:8 800 1000 632">
                    +7 800 1000 632</a>

            </div>
            <div class="item contacts-tel">
                <p class="contact_info">Украина</p>
                <a href="tel:380443395501">+380 443 395 501 </a>


            </div>
            <div class="item contacts-tel">
                <p class="contact_info">Казахстан</p>
                <a href="tel:+77172696817">+7 717 269 6817 </a>


            </div>

            <div class="item">
                <img src="<?php echo get_template_directory_uri(); ?>/img/phone2.png" />
                <b>Отдел продаж</b>
                <a href="mailto:info@ollaberkana.ru">info@ollaberkana.ru
                </a>
            </div>
            <div class="item">
                <img src="<?php echo get_template_directory_uri(); ?>/img/phone2.png" />
                <b>Поддержка</b>
                <a href="mailto:support@ollaberkana.ru">support@ollaberkana.ru</a>
            </div>

            <div class="row">
                <div class="col_12">
                    <div class="item position-relative">
                        <img class="location_img"
                            src="https://ollaberkana.ru/wp-content/themes/provodnik/img/maps-and-flags.svg">
                        <b> Адрес</b>
                        <p>Санкт-Петербург, <br> ул. Профессора Попова, д. 23, офис 222</p>
                    </div>

                </div>

            </div>
        </div>

        <div class="contacts-box">
            <div class="soc-box">
                <a target="_blank" href="https://www.instagram.com/ollaberkana/"><img
                        src="https://ollaberkana.ru/rass/inst.png" alt="Berkana в Instagram" /></a>
                <!--<a target="_blank" href="https://vk.com/berkanasoftru"><img src="<?php //echo get_template_directory_uri(); 
                                                                                        ?>/img/facebook.svg" alt="Berkana в Facebook" /></a>-->
                <a target="_blank" href="https://vk.com/ollaberkana"><img src="https://ollaberkana.ru/rass/vk.png"
                        alt="Berkana в VK" /></a>
                <a target="_blank" href="https://wa.me/79313690494"><img src="https://ollaberkana.ru/rass/WA.png"
                        alt="Berkana в Whatsapp" /></a>
                <a target="_blank" href="https://t.me/ollaberkana"><img src="https://ollaberkana.ru/rass/TG.png"
                        alt="Berkana в Telegram" /></a>

            </div>
        </div>
        <div class="btn-box">

            <a id="btn-call" class="btn4 btn-call" href=""><span>Заказать обратный звонок</span></a>
        </div>
        <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/contacts.png" alt="Контакты" /></div>
    </div>
</div>
<? get_footer(); ?>