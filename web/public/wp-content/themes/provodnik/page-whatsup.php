<?
#Template Name: Модуль - whatsapp

get_header();
?>

<div class="b1 b1-2  whatsup
">
    <div class="container">
        <div class="top">

            <div class="box _full">
                <div class="page-title ">Модуль - Интеграция с WhatsApp</div>
                <p class="">

                    Хотите быть ближе к Вашим клиентам и всегда быть на связи? Легко! <br>
                    Команда OLLA Berkana
                    позаботилась об этом благодаря интеграции системы с мессенджерами. <br> Теперь Вы и Ваши сотрудники
                    легко сможетеписать и принимать сообщения в WhatsApp,<br> не выходя из системы CRM. <br>Благодаря
                    встроенному модулю Вы сможете быть всегда на связи с Вашими учениками <br> даже без помощи
                    телефона.<br>
                    Данная функция поможет администраторам вести коммуникацию с родителями и учениками <br> Вашего
                    учебного центра не отвлекаясь от текущих задач. </p>
				<p>Оставьте заявку и наши менеджеры ознакомят Вас с возможностями системы и научат ей пользоваться всего за 30 минут! Вы сами поймете насколько это просто!
            </p>
                <div class="btn-box mb-50">
              <a  id="btn_quiz" class="btn3" href="/promotions">Пройти обучение</a>
                <a id="btn-demo" class="btn4 v2 btn-demo" href=""><span>Получить 10 дней бесплатно</span></a>
                </div>
            </div>
            <div class="items6-list">
                <div class="c1">
                    <div class="box">
                        <div class="ico"><span><img
                                    src="<?php echo get_template_directory_uri(); ?>/img/loyalty-card.svg"
                                    alt=""></span></div>
                        <p>Оперативная связь с клиентом без звонков


                        </p>
                    </div>
                </div>
                <div class="c1">
                    <div class="box">
                        <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/bonus.svg"
                                    alt=""></span></div>
                        <p>Переписка не выходя из системы

                        </p>
                    </div>
                </div>

                <div class="c1">
                    <div class="box">
                        <div class="ico"><span><img
                                    src="<?php echo get_template_directory_uri(); ?>/img/money-transfer.svg"
                                    alt=""></span></div>
                        <p>Удобство общения для Ваших клиентов

                        </p>
                    </div>
                </div>
                <div class="c1">
                    <div class="box">
                        <div class="ico"><span><img
                                    src="<?php echo get_template_directory_uri(); ?>/img/money-transfer.svg"
                                    alt=""></span></div>
                        <p>Сохраненная история сообщений для администраторов

                        </p>
                    </div>
                </div>

            </div>
            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/whatsapp.png" alt="" /></div>
        </div>


        <div class="about-items">
            <div class="roe"></div>
            <div class="col-12">
                <img src="<?php echo get_template_directory_uri(); ?>/img/mocwhatsapp.png" alt="">
            </div>

        </div>
    </div>
</div>




<?php get_template_part('blocks/bottom', 'buy', ['img' => 'price-img16.png', 'name' => get_the_title()]); ?>


<?get_footer();?>