<?

#Template Name: Модуль - Учет финансов и товаров


get_header();

?>

<div class="b1 module module7">
    <div class="container">
        <div class="box">
            <h1 class="page-title">Модуль<br> Учет финансов и товаров</h1>
            <p>
                Учет клиентов, товаров и расходных материалов, если Вы предлагаете не только услуги.
Учет и движение ТМЦ, неснижаемый остаток, списание товаров или расходных
материалов в составе услуги.
            </p>
			<p>Оставьте заявку и наши менеджеры ознакомят Вас с возможностями системы и научат ей пользоваться всего за 30 минут! Вы сами поймете насколько это просто!
            </p>
            <div class="btn-box">
          <a  id="btn_quiz" class="btn3  btn_quiz" href="">Пройти обучение</a>
                <a id="btn-demo" class="btn4 v2 btn-demo" href=""><span>Получить 10 дней бесплатно</span></a>
            </div>
        </div>
        <div class="items6-list">
            <div class="c1">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/customer.svg" alt="Учет клиентов"></span></div>
                    <p>Учет клиентов</p>
                </div>
            </div>
            <div class="c1">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/calculator.svg" alt="Упрощение расчетов"></span></div>
                    <p>Упрощение расчетов </p>
                </div>
            </div>
            <div class="c1">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/shopping-cart.svg" alt="Учет товаров"></span></div>
                    <p>Учет товаров </p>
                </div>
            </div>
            <div class="c1">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/accounting.svg" alt="Ведение клиента"></span></div>
                    <p>Учет</p>
                </div>
            </div>
            <div class="c1">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/graph-bar.svg" alt="Контроль деятельности"></span></div>
                    <p>Контроль деятельности</p>
                </div>
            </div>
            <div class="c1">
                <div class="box">
                    <div class="ico"><span><img src="<?php echo get_template_directory_uri(); ?>/img/information.svg" alt="Сбор и анализ информации"></span></div>
                    <p>Сбор и анализ информации</p>
                </div>
            </div>
        </div>
        <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/modul7.png" alt="Учет финансов и товаров в CRM" /></div>
    </div>
</div>

<div class="module-desc">
    <div class="container">
        <p>Вы зарабатываете не только на услугах? Хотите вести детальный учет расходных материалов на занятиях?<br/>
        Хотите планировать закупки товаров для Вашего центра?</p>

        <div class="ttl">Представляем Вам модуль Учет финансов и товаров</div>
        <p>предназначенный для учета товарно-материальных ценностей<br/>
        Вашего центра!</p>
        
        <div class="httl">Функции модуля:  </div>
        
        <ul class="ul1">
            <li>Количественный и финансовый учет продаж товаров клиентам.</li>
            <li>Количественный и финансовый учет материалов и товаров в составе услуги при ее реализации.</li>
            <li>Страховые (неснижаемые) запасы. Контроль остатков. Отчет по закупкам.</li>
            <li>Инвентаризация  остатков (оприходование, списания).</li>
        </ul>
        
    </div>
</div>


<?php get_template_part('blocks/bottom', 'buy', ['img' => 'price-img7.png', 'name' => get_the_title()]); ?>

<?get_footer();?>