<?

#Template Name: Модуль - Кассы


get_header();

?>

<div class="b1 module module7">
    <div class="container">
        <div class="box">
            <h1 class="page-title">Модуль - Кассы</h1>
            <p>
                Интеграция с онлайн-кассами АТОЛ и аналогами.
Экономит время, сокращает рутинные операции.

            </p>
			<p>Оставьте заявку и наши менеджеры ознакомят Вас с возможностями системы и научат ей пользоваться всего за 30 минут! Вы сами поймете насколько это просто!
            </p>
            <div class="btn-box">
          <a  id="btn_quiz" class="btn3  btn_quiz" href="">Пройти обучение</a>
                <a id="btn-demo" class="btn4 v2 btn-demo" href=""><span>Получить 10 дней бесплатно</span></a>
            </div>
            <div class="txt3">
                <p>Модуль Кассы - это модуль Интеграции с кассами Атол и их аналогами (работающих
                на драйверах Атол). Создавайте абонементы и разовые занятия в программе Беркана
                и отправляйте данные в кассу Атол при помощи модуля Кассы.</p>

                <p>Обратите внимание, что Кассы Атол предполагают сопровождение сторонними
                специалистами. Только ОС Windows.</p>

                <p>Также программа Беркана интегрирована с кассами Эвотор при помощи Модуля Штрих.</p>      
            </div>
        </div>
        <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/modul8.png" alt="Онлайн-кассы в CRM" /></div>
    </div>
</div>



<?php get_template_part('blocks/bottom', 'buy', ['img' => 'price-img8.png', 'name' => get_the_title()]); ?>

<?get_footer();?>