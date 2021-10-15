<?

#Template Name: Модуль - Расписание учеников


get_header();

?>

<div class="b1 module module2">
    <div class="container">
        <div class="box">
            <h1 class="page-title">Модуль <br> Расписание учеников</h1>
            <p>
                В OllaBerkana есть все для удобной работы с расписанием. С помощью модуля «расписание учеников» Вы сможете грамотно планировать наполняемость групп и в динамике отслеживать статистику по посещениям в разрезе групп, разовых занятий, абонементов, мультиабонементов и многое другое!снижаемый остаток, списание товаров или расходных материалов в составе услуги.
            </p><p>Оставьте заявку и наши менеджеры ознакомят Вас с возможностями системы и научат ей пользоваться всего за 30 минут! Вы сами поймете насколько это просто!
            </p>
            <div class="btn-box">
          <a  id="btn_quiz" class="btn3  btn_quiz" href="">Пройти обучение</a>
                <a id="btn-demo" class="btn4 v2 btn-demo" href=""><span>Получить 10 дней бесплатно</span></a>
            </div>
        </div>
        <div class="items5-list v2">
            <div class="c1">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/customer.svg" alt="CRM Обычное расписание"></span></div>
                    <p>Обычное расписание</p>
                </div>
            </div>
            <div class="c1">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/calculator.svg" alt="CRM для составного расписания"></span></div>
                    <p>Составное расписание</p>
                </div>
            </div>
            <div class="c1">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/shopping-cart.svg" alt="CRM с учетом абонементов"></span></div>
                    <p>Абонемент</p>
                </div>
            </div>
            <div class="c1">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/accounting.svg" alt="CRM с мультиабонементами"></span></div>
                    <p>Мультиабонемент </p>
                </div>
            </div>
            <div class="c1">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/graph-bar.svg" alt="CRM с учетом пробных занятий"></span></div>
                    <p>Пробные занятия
</p>
                </div>
            </div>
            <div class="c1">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/information.svg" alt="Событийные занятия"></span></div>
                    <p>Событийные занятия</p>
                </div>
            </div>
        </div>
        <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/modul2.png" alt="CRM с модулями" /></div>
    </div>
</div>

<div class="module-desc">
    <div class="container">
        <p>
При разработке модуля «расписание учеников» мы опирались на мнения и пожелания коллег, которые давно занимаются бизнесом в сфере образования. Мы постарались учесть всевозможные вариации расписания, что бы Вы смогли более детально и эффективно работать со своей базой клиентов, а также с легкостью делегировать данный вопрос своим администраторам, так как весь функционал очень прост в освоении и работе.</p>

        <div class="ttl">С модулем «расписание учеников» Вы сможете:
</div>
 
        
        <ul class="ul1">
            <li>Создавать обычные и составные расписания</li>
            <li>Создавать разовые, пробные, повторяющиеся занятия и отработки</li>
            <li>Составлять абонементы, Пакеты абонементов и мультиабонементы</li>
            <li>Анализировать наполняемость групп и кабинетов</li>
			  <li>Автоматически продлевать занятия
</li>
			  <li>Отслеживать наиболее эффективные занятия и направления</li>
        </ul>
        
    </div>
</div>

<?php get_template_part('blocks/bottom', 'buy', ['img' => 'price-img2.png', 'name' => get_the_title()]); ?>

<?get_footer();?>