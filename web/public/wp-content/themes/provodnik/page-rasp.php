<?
#Template Name: Модуль Расписание


get_header();
?>

<div class="b1 b1-2  rasp
">
    <div class="container">
        <div class="top">




            <div class="box _full">
                <div class="page-title ">Модуль - Виджет “Расписание”</div>
                <p class="">

                    OLLA Berkana заботится не только о своих клиентах, но и о посетителях детских учебных учреждений<br>
                    Для этого мы специально разработали удобный виджет расписания для размещения на Вашем сайте,<br>
                    чтобы родители могли видеть расписание занятий в актуальном времени и иметь возможность записать<br>
                    своего ребенка на интересующее занятие и удобное время. У Вас нет сайта? Это не проблема! <br>Мы
                    поможем Вам создать ссылку на отдельную страницу с расписанием, которую Вы с легкостью сможете
                    разместить в социальных сетях Вашего учебного центра.</p>

                <p> Удобство нашего расписания Вы можете протестировать ниже и оставить заявку в реальном
                    времени.</p>
				<p>Оставьте заявку и наши менеджеры ознакомят Вас с возможностями системы и научат ей пользоваться всего за 30 минут! Вы сами поймете насколько это просто!
            </p>
                 <a  id="btn_quiz" class="btn3" href="/promotions">Пройти обучение</a>
                <a id="btn-demo" class="btn4 v2 btn-demo" href=""><span>Получить 10 дней бесплатно</span></a>
                </div>
         
            <div class="items6-list">
                <div class="c1">
                    <div class="box">
                        <div class="ico"><span><img
                                    src="<?php echo get_template_directory_uri(); ?>/img/loyalty-card.svg"
                                    alt=""></span></div>
                        <p>Расписание занятий в реальном времени



                        </p>
                    </div>
                </div>
                <div class="c1">
                    <div class="box">
                        <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/bonus.svg"
                                    alt=""></span></div>
                        <p>Простая и удобная форма записи для клиентов

                        </p>
                    </div>
                </div>

                <div class="c1">
                    <div class="box">
                        <div class="ico"><span><img
                                    src="<?php echo get_template_directory_uri(); ?>/img/money-transfer.svg"
                                    alt=""></span></div>
                        <p>Легкость использования и настройки для администратора

                        </p>
                    </div>
                </div>
                <div class="c1">
                    <div class="box">
                        <div class="ico"><span><img
                                    src="<?php echo get_template_directory_uri(); ?>/img/money-transfer.svg"
                                    alt=""></span></div>
                        <p>Возможности настройки формы для записи

                        </p>
                    </div>
                </div>

            </div>
            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/note.png" alt="" /></div>
        </div>


        <div class="about-items">
            <div class="roe"></div>
            <div class="col-12">
                <iframe id="raspisanie"
                    style="border:none; background:#fff; width: 100%; overflow: hidden; height: 880px;"
                    src="https://ollaberkana.ru/wall.html" scrolling="no"></iframe>
            </div>

        </div>
    </div>
</div>




<?php get_template_part('blocks/bottom', 'buy', ['img' => 'price-img16.png', 'name' => get_the_title()]); ?>


<?get_footer();?>