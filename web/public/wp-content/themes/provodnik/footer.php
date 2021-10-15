<?php wp_footer(); ?>

<?php
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

$url1 = $_SERVER['REQUEST_URI'];
pr($utm_term);
?>
<div class="footer-top">
    <img src="<?php echo get_template_directory_uri(); ?>/img/footer-top.png" />
</div>
<div class="footer">
    <div class="container">
        <div class="d-flex mb-3">

            <div class="footer-menu-box">
                <div class="logo2"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="CRM Berkana для детских центров" /></a></div>
                <div class="footer-menu">
                    <a href="https://ollaberkana.ru/berkana-detskij-czentr/">CRM для детских центров</a>
                    <a href="https://ollaberkana.ru/berkana-yazykovaya-shkola/">CRM для языковых школ</a>
                    <a href="https://ollaberkana.ru/berkana-uchebnyj-czentr/">CRM для учебных центра</a>
                    <a href="https://ollaberkana.ru/berkana-detskij-sad/">CRM для детских садов</a>
                    <a href="<?php echo get_page_link(64); ?>">CRM для сети организаций</a>
                    <a href="<?php echo get_page_link(151); ?>">CRM для студий танцев</a>
                    <a href="<?php echo get_page_link(62); ?>">CRM для игровых центров</a>
                    <a href="<?php echo get_page_link(153); ?>">CRM для музыкальных школ</a>
                    <a href="<?php echo get_page_link(155); ?>">CRM для спортивных центров</a>

                </div>
            </div>
            <div class="footer-menu-box">
                <div class="footer-menu">
                    <div class="ttl">Компания</div>
                    <a href="<?php echo get_page_link(22); ?>">О нас</a>
                    <a href="<?php echo get_page_link(28); ?>">Цены</a>
                    <a href="<?php echo get_page_link(52); ?>">Модули</a>
                    <a href="<?php echo get_page_link(24); ?>">Инструкция</a>
                    <a href="<?php echo get_page_link(157); ?>">ОЛЛА Сервисы</a>
                    <a href="/partners/">Партнеры</a>
                    <!--<a href="/blog/">Блог</a>-->
                    <a href="<?php echo get_page_link(26); ?>"><span>Контакты</span></a>

                </div>
            </div>

            <div class="cnt-box">
                <div class="cnt">
                    <div class="ttl">Контакты</div>
                    <div class="item">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/email2.svg" />
                        <span>Техническая поддержка</span>
                        <a href="mailto:support@ollaberkana.ru">support@ollaberkana.ru</a>
                    </div>
                    <div class="item">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/email2.svg" />
                        <span>Отдел продаж</span>
                        <a href="mailto:info@ollaberkana.ru">info@ollaberkana.ru</a>
                    </div>
                    <div class="item">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/call.svg" />
                        <span>Отдел продаж</span>

                        <div class="footer_tel">
                            <p>Россия</p>
                            <a href="tel:88001000632">+78001000632</a>
                        </div>
                        <div class="footer_tel">
                            <p>Украина</p>
                            <a href="tel:+380443395501">+380443395501 </a>
                        </div>
                        <div class="footer_tel">
                            <p>Казахстан</p>
                            <a href="tel:+77172696817">+77172696817 </a>
                        </div>


                    </div>
                    <div class="item">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/maps-and-flags.svg" />
                        <span>Адрес</span>
                        <p>Санкт-Петербург, <br> ул. Профессора Попова, д. 23, офис 222</p>
                    </div>
                </div>
                <div class="cnt">
                    <div class="item">
                        <p class="ttl">
                            Подписывайтесь и следите за новостями в соцсетях:
                        </p>
                    </div>

                </div>

                <div class="soc-box">
                    <a target="_blank" href="https://www.instagram.com/ollaberkana/"><img src="<?php echo get_template_directory_uri(); ?>/img/instagram.svg" alt="Berkana в Instagram" /></a>
                    <? /*<!--<a target="_blank" href="https://vk.com/berkanasoftru"><img src="<?php //echo get_template_directory_uri(); ?>/img/facebook.svg"
                    alt="" /></a>-->*/ ?>
                    <a target="_blank" href="https://vk.com/ollaberkana"><img src="<?php echo get_template_directory_uri(); ?>/img/vk.svg" alt="Berkana в ВКонтакте" /></a>
                    <a target="_blank" href="https://wa.me/79313688577"><img src="<?php echo get_template_directory_uri(); ?>/img/whatsapp.svg" alt="Напишите в Whatsapp" /></a>
                    <a target="_blank" href="https://t.me/crmOllaBerkana"><img src="<?php echo get_template_directory_uri(); ?>/img/telegram.svg" alt="Напишите в Telegram" /></a>
                    <a target="_blank" href="https://ok.ru/group/61016109088879"><img src="<?php echo get_template_directory_uri(); ?>/img/ok.svg" /></a>
                    <a target="_blank" href="https://www.youtube.com/c/OLLABerkana"><img src="<?php echo get_template_directory_uri(); ?>/img/yt_logo.svg" /></a>
                </div>
                <div class="footer-info">
                    <div class="ttl">Реквизиты <a target="_blank" href="<?php echo get_template_directory_uri(); ?>/docs/pay.pdf">Скачать <img src="<?php echo get_template_directory_uri(); ?>/img/direct-download.svg" alt="скачать реквизиты Беркана" /></a></div>
                    <p>ИНН 7816560666</p>
                    <p>ОГРН 1137847162430</p>
                    <p>КПП 781301001</p>

                </div>
            </div>
        </div>
        <div class="pay-icons">
            <img src="<?php echo get_template_directory_uri(); ?>/img/pay1.png" />
            <img src="<?php echo get_template_directory_uri(); ?>/img/pay2.png" />
            <img src="<?php echo get_template_directory_uri(); ?>/img/pay3.png" />
            <img src="<?php echo get_template_directory_uri(); ?>/img/pay4.png" />
            <img src="<?php echo get_template_directory_uri(); ?>/img/pay5.png" />
            <img src="<?php echo get_template_directory_uri(); ?>/img/pay6.png" />
            <img src="<?php echo get_template_directory_uri(); ?>/img/pay7.png" />
            <img src="<?php echo get_template_directory_uri(); ?>/img/pay8.png" />
            <img src="<?php echo get_template_directory_uri(); ?>/img/pay9.png" />
        </div>
        <div class="copy-txt">
            <a target="_blank" href="<?php echo get_template_directory_uri(); ?>/docs/oferta.pdf">Договор - оферта</a>
            <a target="_blank" href="<?php echo get_template_directory_uri(); ?>/docs/soglasie.pdf">Согласие на
                обработку персональных данных</a>
        </div>

        <p class="copy-text-down">
            Работаем 2013-2021. Все права защищены и принадлежат © ООО «Берканасофт»
        </p> 
    </div>
</div>

<div id="btn_overlay"></div>
<!--noindex-->
<div class="social_box">

    <a class="social_link" target="_blank" href="https://t.me/crmOllaBerkana">
        <div class="social_info">
            <div class="social tgm">
                <img src="<?php echo get_template_directory_uri(); ?>/img/telegram.svg" />
            </div>
            <p class="social_txt">Напишите нам в чат</p>
        </div>
    </a>
    <a class="social_link" target="_blank" href="https://wa.me/79313688577">
        <div class="social_info">
            <div class="social whtsp">
                <img src="<?php echo get_template_directory_uri(); ?>/img/whatsapp.svg" />
            </div>
            <p class="social_txt">Напишите нам в чат</p>
        </div>
    </a>
    <div class="social_info ">
        <div class="social_call btn-call">
            <img src="<?php echo get_template_directory_uri(); ?>/img/phone_icon.svg" alt="">
        </div>
        <p class="social_txt text_call">Закажите обратный звонок</p>
    </div>


</div>
<div id="test_popup" class="popup">
    <div class="popup-content">
        <div class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt="" /></div>
        <div class="form-title">
            Получить 10 дней бесплатно
        </div>
        <div class="form1_test">
            <form class="mail_ajax1">
                <input type="hidden" name="type" value="демо-доступ">
                <input type="text" name="name" placeholder="Введите ваше ФИО" />
                <input type="text" name="company" placeholder="Введите название организации" />
                <p class="phone_info">Выбрать код страны для ввода номера Вы можете из выпадающего списка</p>
                <input type="text" class="phone" name="phone" autofocus="true" placeholder="9990000000" required>
                <input type="email" name="email" placeholder="Введите ваш e-mail" required />
                <input type="hidden" name="url" value="<?php echo $url1 ?>" />

                <button class="btn3 demo-sub" type="submit">Оставить заявку</button>
            </form>
        </div>
    </div>
</div>

<div id="callpopup" class="popup">
    <div class="popup-content">
        <div class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt="" /></div>
        <div class="form-title">
            Обратный звонок
        </div>
        <div class="form1">
            <form id="bu_call" class="mail_ajax_call">
                <input type="hidden" name="type" value="Обратный звонок">
                <input type="text" name="name" placeholder="Введите ваше имя" />
                <p class="phone_info">Выбрать код страны для ввода номера Вы можете из выпадающего списка</p>
                <input type="tel" id="phone_call" name="phone" placeholder="Введите ваш телефон" required />
                <input type="hidden" name="url" class="source" value="<?php echo $url1 ?>" />
                <input type="hidden" name="utm_term" class="source" value="<?php echo  $utm_term ?>" />
                <input type="hidden" name="utm_source" class="source" value="<?php echo $utm_source ?>" />
                <input type="hidden" name="utm_medium" class="source" value="<?php echo $utm_medium ?>" />
                <input type="hidden" name="utm_campaing" class="source" value="<?php echo $utm_campaing ?>" />
                <input type="hidden" name="utm_content" class="source" value="<?php echo $utm_content ?>" />
                <button class="btn3 bu-sub" type="submit">Оставить заявку</button>
            </form>
        </div>
    </div>
</div>
<div id="message_popup" class="popup  massege">
    <div class="popup-content">
        <div class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt="" /></div>
        <div class="msg_img"><img src="<?php echo get_template_directory_uri(); ?>/img/call_operator.png" alt="">
        </div>
        <div class="form-title">
            <p>Привет, я Анастасия</p>
            <p class="poup_sm_text">Менеджер отдела продаж</p>
        </div>
        <div class="msg_ttl"> ОГРАНИЧЕННОЕ ПРЕДЛОЖЕНИЕ!</div>
        <div class="msg_ttl2">Получи скидку 55% на годовую онлайн версию CRM OLLA Berkana!</div>
        <div class="msg_blue">
            <span class="msg_numb"> 13 500</span> вместо <span class="msg_red_line">30 000</span> рублей
        </div>

    </div>
    <div class="form1">
        <form id="bu_call" class="mail_ajax_call">
            <input type="hidden" name="type" value="Обратный звонок попап">
            <p class="phone_info">Выбрать код страны для ввода номера Вы можете из выпадающего списка</p>
            <input type="tel" id="phone_massege" name="phone" placeholder="" required />
            <input type="hidden" name="url" class="source" value="<?php echo $url1 ?>" />
            <input type="hidden" name="utm_term" class="source" value="<?php echo  $utm_term ?>" />
            <input type="hidden" name="utm_source" class="source" value="<?php echo $utm_source ?>" />
            <input type="hidden" name="utm_medium" class="source" value="<?php echo $utm_medium ?>" />
            <input type="hidden" name="utm_campaing" class="source" value="<?php echo $utm_campaing ?>" />
            <input type="hidden" name="utm_content" class="source" value="<?php echo $utm_content ?>" />
            <div class="massege_btns">
                <a href="/czeny" class="btn2">Узнать подробнее
                </a>

                <button class="btn3 bu-sub" type="submit">Перезвонить мне </button>
            </div>
        </form>
    </div>
</div>
<div id="servicespopup" class="popup">
    <div class="popup-content">
        <div class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt="" /></div>
        <div class="form-title">
            Получить консультацию
        </div>
        <div class="form1">
            <form id="bu_call" class="mail_ajax_services">
                <input type="hidden" name="type" value="Обратный звонок">
                <input type="text" name="name" placeholder="Введите ваше имя" />
                <input type="tel" id="phone_services" name="phone" placeholder="Введите ваш телефон" required />
                <input type="hidden" name="url" class="source" value="<?php echo $url1 ?>" />
                <input type="hidden" name="utm_term" class="source" value="<?php echo  $utm_term ?>" />
                <input type="hidden" name="utm_source" class="source" value="<?php echo $utm_source ?>" />
                <input type="hidden" name="utm_medium" class="source" value="<?php echo $utm_medium ?>" />
                <input type="hidden" name="utm_campaing" class="source" value="<?php echo $utm_campaing ?>" />
                <input type="hidden" name="utm_content" class="source" value="<?php echo $utm_content ?>" />
                <button class="btn3 bu-sub" type="submit">Оставить заявку</button>
            </form>
        </div>
    </div>
</div>

<div id="buypopup" class="popup">
    <div class="popup-content">
        <div class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt="" /></div>
        <div class="form-title">
            Отправить заявку на покупку
        </div>
        <div class="form1">
            <form id="by-sub" class="mail_ajax_by">
                <input type="hidden" name="type" value="Купить">
                <input type="hidden" name="url" id="hid1" value="<?php the_title(); ?>">
                <input type="hidden" name="Версия" id="hid2" value="3 месяца">
                <input type="hidden" name="Цена" id="hid3" value="7 125 ₽">
                <input type="text" name="name" placeholder="Введите ваше ФИО" />
                <p class="phone_info">Выбрать код страны для ввода номера Вы можете из выпадающего списка</p>
                <input type="text" id="phone_by" class="phone" name="phone" autofocus="true" placeholder="9990000000" required>
                <input type="email" name="email" placeholder="Введите ваш e-mail" required />
                <input type="text" name="company" placeholder="Введите название организации" />
                <input type="hidden" name="url" class="source" value="<?php echo $url1 ?>" />
                <input type="hidden" name="utm_term" class="source" value="<?php echo  $utm_term ?>" />
                <input type="hidden" name="utm_source" class="source" value="<?php echo $utm_source ?>" />
                <input type="hidden" name="utm_medium" class="source" value="<?php echo $utm_medium ?>" />
                <input type="hidden" name="utm_campaing" class="source" value="<?php echo $utm_campaing ?>" />
                <input type="hidden" name="utm_content" class="source" value="<?php echo $utm_content ?>" />

                <button class="btn3 by-sub" type="submit">Оставить заявку</button>
            </form>
        </div>
    </div>
</div>

<div id="demopopup" class="popup">
    <div class="popup-content">
        <div class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt="" /></div>
        <div class="form-title">
            Оставьте заявку и получите 10 дней бесплатного доступа
        </div>
        <div class="form1">
            <form id="demo-sub" class="mail_ajax_demo">
                <input type="hidden" name="type" value="демо-доступ">
                <input type="text" name="name" placeholder="Введите ваше ФИО" />
                <p class="phone_info">Выбрать код страны для ввода номера Вы можете из выпадающего списка</p>
                <input type="text" id="phone_demo" name="phone" autofocus="true" placeholder="9990000000" required>
                <input type="email" name="email" placeholder="Введите ваш e-mail" required />
                <input type="text" name="company" placeholder="Введите название организации" />
                <input type="hidden" name="url" class="source" value="<?php echo $url1 ?>" />
                <input type="hidden" name="utm_term" class="source" value="<?php echo  $utm_term ?>" />
                <input type="hidden" name="utm_source" class="source" value="<?php echo $utm_source ?>" />
                <input type="hidden" name="utm_medium" class="source" value="<?php echo $utm_medium ?>" />
                <input type="hidden" name="utm_campaing" class="source" value="<?php echo $utm_campaing ?>" />
                <input type="hidden" name="utm_content" class="source" value="<?php echo $utm_content ?>" />
                <button class="btn3 demo-sub" type="submit">Получить 10 дней бесплатно</button>
            </form>
        </div>
    </div>
</div>

<div id="buyfullpopup" class="popup">
    <div class="popup-content">
        <div class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt="" /></div>
        <div class="form-title">
            Купить установочную версию
        </div>
        <div class="form1">
            <form id="by-sub-local" class="mail_ajax">
                <input type="hidden" name="type" value="Установочная версия">
                <input type="text" name="name" placeholder="Введите ваше ФИО" />
                <p class="phone_info">Выбрать код страны для ввода номера Вы можете из выпадающего списка</p>
                <input type="text" class="phone_by_local" name="phone" autofocus="true" placeholder="9990000000" required>
                <input type="email" name="email" placeholder="Введите ваш e-mail" required />
                <input type="text" name="company" placeholder="Введите название организации" />
                <input type="hidden" name="url" class="source" value="<?php echo $url1 ?>" />
                <input type="hidden" name="utm_term" class="source" value="<?php echo  $utm_term ?>" />
                <input type="hidden" name="utm_source" class="source" value="<?php echo $utm_source ?>" />
                <input type="hidden" name="utm_medium" class="source" value="<?php echo $utm_medium ?>" />
                <input type="hidden" name="utm_campaing" class="source" value="<?php echo $utm_campaing ?>" />
                <input type="hidden" name="utm_content" class="source" value="<?php echo $utm_content ?>" />

                <button class="btn3 by-sub-local " type="submit">Оставить заявку</button>
            </form>
        </div>
    </div>
</div>
<div id="btn_quiz_popup" class="popup">


    <div class="test" id="test">

        <form id="regForm" class="quest_mail_ajax">
            <div class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt="" /></div>
            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <div class="httl p10">Ответь на 3 вопроса и получи индивидуальное обучение с бесплатным доступом на
                    10
                    дней
                </div>

            </div>
            <div class="tab">

                <div class="httl">Направление вашей сферы деятельности</div>
                <div class="quest">
                    <input type="hidden" name="type" value="Квиз">
                    <p> <input type="radio" id="contactChoice5" name="sfera" value="Учебный центр">
                        <label for="contactChoice5">Учебный центр</label>
                    </p>

                    <P>
                        <input type="radio" id="contactChoice4" name="sfera" value="Детский клуб">
                        <label for="contactChoice4">Детский клуб</label>
                    </P>

                    <P><input type="radio" id="contactChoice1" name="sfera" value="Детский сад">
                        <label for="contactChoice1">Детский сад</label>
                    </P>
                    <P><input type="radio" id="contactChoice2" name="sfera" value="Детский центр">
                        <label for="contactChoice2">Детский центр</label>
                    </P>


                    <p> <input type="radio" id="contactChoice3" name="sfera" value="Языкова школа">
                        <label for="contactChoice3">Языкова школа</label>
                    </p>

                    <p> <input type="radio" id="contactChoice6" name="sfera" value="Танцевальная студия">
                        <label for="contactChoice6">Танцевальная студия</label>
                    </p>

                    <p>
                        <input type="radio" id="contactChoice7" name="sfera" value="Спортивная школа">
                        <label for="contactChoice7">Спортивная школа</label>
                    </p>
                    <p>
                        <input type="radio" id="contactChoice8" name="sfera" value="Музыкальная школа">
                        <label for="contactChoice8">Музыкальная школа</label>
                    </p>
                    <p> <input class="other_inp" type="text" name="sfera_other" placeholder="Другое" />
                    </p>

                </div>

            </div>
            <div class="tab">
                <div class="httl">Какими инструментами пользуетесь для ведения учета клиентов, финансов и посещений
                </div>

                <div class="quest">
                    <p> <input type="radio" id="contactChoice11" name="workin" value="CRM_система">
                        <label for="contactChoice11"> CRM система</label>
                    </p>
                    <P>
                        <input type="radio" id="contactChoice12" name="workin" value="Программа_Exel">
                        <label for="contactChoice12">Программа Exсel</label>
                    </P>
                    <p> <input type="radio" id="contactChoice13" name="workin" value="Google_таблицы">
                        <label for="contactChoice13">Google таблицы</label>
                    </p>

                    <p> <input type="radio" id="contactChoice15" name="workin" value="Бумажные_носители">
                        <label for="contactChoice15">Бумажные носители</label>
                    </p>

                    <p> <input class="other_inp" type="text" name="workin_other" placeholder="Другое" /></P>

                </div>


            </div>
            <div class="tab">
                <div class="httl">Откуда впервые узнали о нас?</div>
                <div class="quest">

                    <p> <input type="radio" id="contactChoice16" name="chanel" value="Лидеры мнений">
                        <label for="contactChoice16">Лидеры мнений</label>
                    </p>

                    <P><input type="radio" id="contactChoice17" name="chanel" value="Обзоры и рейтинги CRM">
                        <label for="contactChoice18">Обзоры и рейтинги CRM</label>
                    </P>

                    <P><input type="radio" id="contactChoice19" name="chanel" value="Через знакомых">
                        <label for="contactChoice19">Через знакомых</label>
                    </P>

                    <P><input type="radio" id="contactChoice20" name="chanel" value="Google">
                        <label for="contactChoice20">Google</label>
                    </P>

                    <p><input type="radio" id="contactChoice21" name="chanel" value="Яндекс">
                        <label for="contactChoice21">Яндекс</label>
                    </p>

                    <p> <input type="radio" id="contactChoice22" name="chanel" value="Социальные сети">
                        <label for="contactChoice22">Социальные сети</label>
                    </p>

                    <p><input type="radio" id="contactChoice23" name="chanel" value="Конференция">
                        <label for="contactChoice23">Конференция</label>
                    </p>

                    <p><input class="other_inp" type="text" name="chanel_other" placeholder="Другое" /></p>
                </div>
            </div>
            <div class="tab" id="form_qvest">
                <div class="httl">
                    Спасибо за Ваши ответы на вопросы! Пожалуйста, оставьте свои контактные данные, чтобы наши
                    менеджеры
                    могли связаться с Вами!
                </div>

                <div class="quest finish">
                    <P> <input type="text" name="name" placeholder="Введите ваше имя" /></P>
                    <p class="phone_info">Выбрать код страны для ввода номера Вы можете из выпадающего списка</p>
                    <p> <input type="text" name="phone" id='phone_qviz' placeholder="Введите ваш телефон" required />
                    </p>
                    <p> <input type="text" name="email" placeholder="Введите почту" required /></p>
                    <p>
                        <input type="hidden" name="url" class="source" value="<?php echo $url1 ?>" />
                        <input type="hidden" name="utm_term" class="source" value="<?php echo  $utm_term ?>" />
                        <input type="hidden" name="utm_source" class="source" value="<?php echo $utm_source ?>" />
                        <input type="hidden" name="utm_medium" class="source" value="<?php echo $utm_medium ?>" />
                        <input type="hidden" name="utm_campaing" class="source" value="<?php echo $utm_campaing ?>" />
                        <input type="hidden" name="utm_content" class="source" value="<?php echo $utm_content ?>" />
                    </p>
                </div>

            </div>
            <div id="error_cont">

                <p>
                <div id="error" class="ttl"> Выберите один из вариантов</div>
                </p>

            </div>
            <div class="down_qwiz" style="overflow:auto;">
                <div class="q_button">
                    <button type="button" id="prevBtn" class="btn1" onclick="nextPrev(-1)">Назад</button>
                    <button type="button" id="nextBtn" class="btn2 txt-b" onclick="nextPrev(1)">Далее</button>
                    <button type="submit" id="SubQuest_Btn" class="btn2 txt-b"> Отправить</button>
                </div>

                <div div id="oferta">

                    <div class="ttl"> *Доступно только новым пользователям</div>
                </div>
                <a class="home close_kviz" href=""> <button type="button" id="btn_home" class="btn1" action="/">Закрыть</button></a>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:30px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>
        </form>

    </div>

</div>
</div>

<div id="thankspopup_services" class="popup">
    <div class="popup-content">
        <div class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt="" /></div>
        <div class="form-title">
            <p class="ttl_form"> Спасибо за Вашу заявку!</p>
            Наши менеджеры свяжутся с Вами в будние дни с 10:00 до 18:00 по московскому времени.
        </div>
        <div class="btn-box  mt50">
            <a id="btn_servis" class="btn1 сlose" href="">Закрыть</a>
        </div>
    </div>
</div>
<div id="thankspopup_call" class="popup">
    <div class="popup-content">
        <div class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt="" /></div>
        <div class="form-title">
            <p class="ttl_form"> Спасибо за Вашу заявку!</p>
            Наши менеджеры свяжутся с Вами в будние дни с 10:00 до 18:00 по московскому времени.
        </div>
        <div class="btn-box  mt50">
            <a id="btn_servis" class="btn1 сlose" href="">Закрыть</a>
        </div>
    </div>

</div>
</div>
<div id="thankspopup" class="popup">
    <div class="popup-content">
        <div class="form-title">
            <p class="ttl_form"> Спасибо за Вашу заявку!</p>
            Наши менеджеры свяжутся с Вами в будние дни с 10:00 до 18:00 по московскому времени.
        </div>
        <div class="btn-box  mt50 ">
            <a id="btn_servis" class="btn1 сlose" href="">Закрыть</a>
        </div>
    </div>

</div>
</div>
<div id="thankspopup_demo" class="popup">
    <div class="popup-content">
        <div class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt="" /></div>
        <div class="form-title">
            <p class="ttl_form"> Спасибо за Вашу заявку!</p>
            Наши менеджеры свяжутся с Вами в будние дни с 10:00 до 18:00 по московскому времени.
        </div>
        <div class="btn-box  ">
            <a id="btn_servis" class="btn1 сlose" href="">Закрыть</a>
        </div>
    </div>

</div>
</div>

<div id="thankspopup_quiz" class="popup">
    <div class="popup-content">
        <div class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt="" /></div>
        <div class="form-title">
            <p class="ttl_form"> Спасибо за Вашу заявку!</p>
            Наши менеджеры свяжутся с Вами в будние дни с 10:00 до 18:00 по московскому времени.
        </div>
        <div class="btn-box  ">
            <a id="btn_servis" class="btn1 сlose" href="">Закрыть</a>
        </div>
    </div>

</div>
</div>
<!--/noindex-->

<script>
    jQuery("form.mail_ajax_by").submit(function() { //Change
        var form = $(this);
        var field = form.find("input[name=phone]");
        let code = document.querySelector('#buypopup').querySelector('.iti__selected-dial-code').textContent;
        console.log(code);
        let num = field.val();

        field.val(field.val().replace(num, code + num));

        var th = jQuery(this);

        jQuery.ajax({
            type: "POST",
            url: "/cforms/send.php", //Change
            data: th.serialize()
        }).done(function() {
            $("#btn_overlay").hide();
            $(".popup").hide();
            $("#btn_overlay").show();
            var scroll = $(window).scrollTop();
            $("#thankspopup").css("top", scroll - 40 + "px");
            $("#thankspopup").show();
            setTimeout(function() {
                // Done Functions
                th.trigger("reset");
            }, 1000);
        });
        return false;
    });
    jQuery("form.mail_ajax_services").submit(function() { //Change
        var form = $(this);
        var field = form.find("input[name=phone]");
        let code = document.querySelector('#servicespopup').querySelector('.iti__selected-dial-code').textContent;
        console.log(code);
        let num = field.val();

        field.val(field.val().replace(num, code + num));

        var th = jQuery(this);

        jQuery.ajax({
            type: "POST",
            url: "/mail.php", //Change
            data: th.serialize()
        }).done(function() {
            $("#btn_overlay").hide();
            $(".popup").hide();
            $("#btn_overlay").show();
            var scroll = $(window).scrollTop();
            $("#thankspopup_services").css("top", scroll + 80 + "px");
            $("#thankspopup_services").show();
            setTimeout(function() {
                // Done Functions
                th.trigger("reset");
            }, 1000);
        });
        return false;
    });
    jQuery("form.mail_ajax_call").submit(function() { //Change
        var form = $(this);
        var field = form.find("input[name=phone]");
        let code = document.querySelector('#bu_call').querySelector('.iti__selected-dial-code').textContent;
        console.log(code);
        let num = field.val();

        field.val(field.val().replace(num, code + num));

        var th = jQuery(this);

        jQuery.ajax({
            type: "POST",
            url: "/cforms/send.php", //Change
            data: th.serialize()
        }).done(function() {
            $("#btn_overlay").hide();
            $(".popup").hide();
            $("#btn_overlay").show();
            var scroll = $(window).scrollTop();
            $("#thankspopup_call").css("top", scroll + 80 + "px");
            $("#thankspopup_call").show();
            setTimeout(function() {
                // Done Functions
                th.trigger("reset");
            }, 1000);
        });
        return false;
    });
    jQuery("form.mail_ajax_demo").submit(function() { //Change



        var form = $(this);
        var field = form.find("input[name=phone]");
        let code = document.querySelector('#demo-sub').querySelector('.iti__selected-dial-code').textContent
        console.log(code);
        let num = field.val();

        field.val(field.val().replace(num, code + num));

        num = field.val();

        var th = jQuery(this);

        jQuery.ajax({
            type: "POST",
            url: "/cforms/send.php", //Change
            data: th.serialize()
        }).done(function() {
            $("#btn_overlay").hide();
            $(".popup").hide();
            $("#btn_overlay").show();
            var scroll = $(window).scrollTop();
            $("#thankspopup_demo").css("top", scroll + 80 + "px");
            $("#thankspopup_demo").show();
            setTimeout(function() {
                // Done Functions
                th.trigger("reset");
            }, 1000);
        });
        return false;
    });


    jQuery("form.quest_mail_ajax").submit(function() { //Change
        var form = $(this);
        var field = form.find("input[name=phone]");
        let code = document.querySelector('#regForm').querySelector('.iti__selected-dial-code').textContent;
        console.log(code);
        let num = field.val();

        field.val(field.val().replace(num, code + num));

        var th = jQuery(this);

        console.log('sub');
        var th = jQuery(this);
        jQuery.ajax({
            type: "POST",
            url: "/cforms/send.php", //Change
            data: th.serialize()
        }).done(function() {
            document.getElementById('error').style.display = "none";
            $(".quest").hide();
            $("#prevBtn").hide();
            $("#nextBtn").hide();
            $(".home").show();
            $("#SubQuest_Btn").hide();
            $("#form_qvest").attr('id', 'closequiz');
            $(".httl").html(
                " Спасибо за вашу заявку! Наши менеджеры свяжутся с Вами в рабочее время и проведут индивидуальную презентацию системы, с предоставлением доступа на 10 дней!"
            )
            setTimeout(function() {
                // Done Functions
                th.trigger("reset");
            }, 1000);
        });
        return false;
    });
    $('[name=phone]').bind('change keyup input click', function() {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });
    jQuery("#demo-sub").submit(function() {


        fbq('track', 'Lead');
        VK.Goal('lead');
        VK.Retargeting.Event('lead');
        console.log('demo');

    });

    jQuery("#by-sub").submit(function() {


        VK.Retargeting.Event('lead');
        VK.Goal('lead');

        fbq('track', 'Lead');
        console.log('buy');
    });

    jQuery("#by-sub-local").submit(function() {

        fbq('track', 'Lead');
        VK.Goal('lead');
        console.log('buy-local');
    });

    jQuery("#regForm").submit(function() {
        document.querySelector('#regForm').className = ('sub_quest');
        fbq('track', 'Lead');
        VK.Goal('lead');
        VK.Retargeting.Event('lead');
        console.log('kviz');
    });
    $('.btn-demo_test').click(function(event) {
        console.log('btn');
        event.preventDefault();
        $("#btn_overlay").show();
        var scroll = $(window).scrollTop();
        $("#test_popup").css("top", scroll + 40 + "px");
        $("#test_popup").show();

    });
    jQuery("form.mail_ajax1").submit(function() { //Change

        var th = jQuery(this);

        jQuery.ajax({
            type: "POST",
            url: "/cforms/send.php", //Change
            data: th.serialize()
        }).done(function() {
            $("#btn_overlay").hide();
            $(".popup").hide();
            $("#btn_overlay").show();
            var scroll = $(window).scrollTop();
            $("#thankspopup").css("top", scroll + 40 + "px");
            $("#thankspopup").show();
            setTimeout(function() {
                // Done Functions
                th.trigger("reset");
            }, 111000);
        });
        return false;
    });
</script>
<?php the_field('foot_code', 'options'); ?>

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
            document.getElementById("oferta").style.display = "block";
            document.getElementById("nextBtn").style.display = "block";

        } else {
            document.getElementById("prevBtn").style.display = "inline";
            document.getElementById("oferta").style.display = "none";
            document.getElementById("SubQuest_Btn").style.display = "none";
            document.getElementById("nextBtn").style.display = "block";
        }
        if (n == (x.length - 1)) {
            document.getElementById("SubQuest_Btn").style.display = "inline";
            document.getElementById("nextBtn").style.display = "none";

        } else {
            document.getElementById("SubQuest_Btn").style.display = "none";
            document.getElementById("nextBtn").style.display = "block";
            document.getElementById("nextBtn").innerHTML = "Далее";

        }
        // ... and run a function that displays the correct step indicator:
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var z, x, y, i, j, valid = true;
        x = document.getElementsByClassName("tab");

        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:

        for (i = 0; i < y.length; i++) {
            if (y[i].checked !== true && y[i].value == "") {
                valid = false;

                document.getElementById('error').style.display = "inline";
            }
            if (y[i].checked == true) {
                valid = true;

                return valid;
            }
            // If a field is empty...

        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {}
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        document.getElementById('error').style.display = "none";
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
    }
</script>



<script src="<?php echo get_template_directory_uri(); ?>/build/js/intlTelInput.js"></script>
<script>
    var input = document.querySelector("#phone_qviz");
    window.intlTelInput(input, {
        preferredCountries: ['ru'],
        localizedCountries: {
            'az': 'Азербайджан',
            'ru': 'Россия',
            'am': 'Армения',
            'by': 'Беларусь',
            'kz': 'Казахстан',
            'ua': 'Украина',
            'md': 'Молдова',
            'tj': 'Таджикистан',
            'tm': 'Туркменистан',

        },
        separateDialCode: true,
        onlyCountries: ['ru', 'az', 'am', 'by', 'kz', 'ua', 'md', 'tj', 'tm'],
    });
    var input = document.querySelector("#phone_demo");
    window.intlTelInput(input, {
        preferredCountries: ['ru'],
        separateDialCode: true,
        localizedCountries: {
            'az': 'Азербайджан',
            'ru': 'Россия',
            'am': 'Армения',
            'by': 'Беларусь',
            'kz': 'Казахстан',
            'ua': 'Украина',
            'md': 'Молдова',
            'tj': 'Таджикистан',
            'tm': 'Туркменистан',

        },

        onlyCountries: ['ru', 'az', 'am', 'by', 'kz', 'ua', 'md', 'tj', 'tm'],


    });
    var input = document.querySelector("#phone_call");
    window.intlTelInput(input, {
        preferredCountries: ['ru'],
        separateDialCode: true,
        localizedCountries: {
            'az': 'Азербайджан',
            'ru': 'Россия',
            'am': 'Армения',
            'by': 'Беларусь',
            'kz': 'Казахстан',
            'ua': 'Украина',
            'md': 'Молдова',
            'tj': 'Таджикистан',
            'tm': 'Туркменистан',

        },

        onlyCountries: ['ru', 'az', 'am', 'by', 'kz', 'ua', 'md', 'tj', 'tm'],


    });

    var input = document.querySelector("#phone_massege");
    window.intlTelInput(input, {
        preferredCountries: ['ru'],
        separateDialCode: true,
        localizedCountries: {
            'az': 'Азербайджан',
            'ru': 'Россия',
            'am': 'Армения',
            'by': 'Беларусь',
            'kz': 'Казахстан',
            'ua': 'Украина',
            'md': 'Молдова',
            'tj': 'Таджикистан',
            'tm': 'Туркменистан',

        },

        onlyCountries: ['ru', 'az', 'am', 'by', 'kz', 'ua', 'md', 'tj', 'tm'],


    });
    var input = document.querySelector("#phone_services");
    window.intlTelInput(input, {
        preferredCountries: ['ru'],
        separateDialCode: true,
        localizedCountries: {
            'az': 'Азербайджан',
            'ru': 'Россия',
            'am': 'Армения',
            'by': 'Беларусь',
            'kz': 'Казахстан',
            'ua': 'Украина',
            'md': 'Молдова',
            'tj': 'Таджикистан',
            'tm': 'Туркменистан',

        },

        onlyCountries: ['ru', 'az', 'am', 'by', 'kz', 'ua', 'md', 'tj', 'tm'],


    });
    var input = document.querySelector("#phone_by");
    window.intlTelInput(input, {
        preferredCountries: ['ru'],
        separateDialCode: true,
        localizedCountries: {
            'az': 'Азербайджан',
            'ru': 'Россия',
            'am': 'Армения',
            'by': 'Беларусь',
            'kz': 'Казахстан',
            'ua': 'Украина',
            'md': 'Молдова',
            'tj': 'Таджикистан',
            'tm': 'Туркменистан',

        },

        onlyCountries: ['ru', 'az', 'am', 'by', 'kz', 'ua', 'md', 'tj', 'tm'],


    });
</script>
<script>
    (function(w, d, u) {
        var s = d.createElement('script');
        s.async = true;
        s.src = u + '?' + (Date.now() / 60000 | 0);
        var h = d.getElementsByTagName('script')[0];
        h.parentNode.insertBefore(s, h);
    })(window, document, 'https://cdn-ru.bitrix24.ru/b13500078/crm/tag/call.tracker.js');
</script>
<style src="https://atuin.ru/demo/ui-slider/jquery-ui.css"></style>
<link rel="stylesheet" href="https://cdn.envybox.io/widget/cbk.css">
<script type="text/javascript" src="https://cdn.envybox.io/widget/cbk.js?wcb_code=7f05b82f1c2e0ff4f98b5f659c129993" charset="UTF-8" async></script>
</body>

</html>