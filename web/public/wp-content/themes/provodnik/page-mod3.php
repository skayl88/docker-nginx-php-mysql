<?

#Template Name: Модуль Планирование задач


get_header();

?>

<div class="b1 module module3">
    <div class="container">
        <div class="box">
            <h1 class="page-title">Модуль  <br> Планирование задач</h1>
            <p>
                Подробное планирование расписания и задач в одном модуле, удобен
для логопедов, психологов, для индивидуальных занятий.

            </p>
            <p>Оставьте заявку и наши менеджеры ознакомят Вас с возможностями системы и научат ей пользоваться всего за 30 минут! Вы сами поймете насколько это просто!
            </p>
            <div class="btn-box">
          <a  id="btn_quiz" class="btn3  btn_quiz" href="">Пройти обучение</a>
                <a id="btn-demo" class="btn4 v2 btn-demo" href=""><span>Получить 10 дней бесплатно</span></a>
            </div>
            <div class="txt2">
                Модуль Планировщик пришел на замену модулю Календарь,
и позволяет проводит работу с расписаниями и задачами
в одном разделе.
            </div>
        </div>
        <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/modul3.png" alt="" /></div>
    </div>
</div>

<div class="module-desc">
    <div class="container">
        
        <div class="httl">Функции модуля:  </div>
        
        <ul class="ul1">
            <li>Просмотр расписания на месяц по курсу/педагогу/кабинету или общее в календарном виде;</li>
            <li>Печать и перенос в excel расписания;</li>
            <li>Возможность добавления детей на занятия (по абонементам, разовым занятиям или броням) через календарь Планировщика;</li>
            <li>Просмотр расписания на неделю с разбивкой по кабинетам;</li>
            <li>Добавление сетки приемных часов для специалиста;</li>
            <li>Быстрая запись клиентов на индивидуальные занятия через календарь Планировщика;</li>
            <li>Просмотр календаря с задачами по ответственному или в общем;</li>
            <li>Постановка задач через календарь Планировщика.</li>
        </ul>
        
    </div>
</div>

<?php get_template_part('blocks/bottom', 'buy', ['img' => 'price-img.png', 'name' => get_the_title()]); ?>

<?get_footer();?>