<?

#Template Name:Инструкция

get_header();

?>

<div class="b1 b1-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="box">
                    <h1 class="page-title">Инструкция</h1>
                    <p>
                        В работе с программой Беркана Вам помогут наши видео-уроки, а так же
                        ответы на наиболее распространенные вопросы, приведенные ниже.
                    </p>
                    <p>
                        Не нашли ответа на ваш вопрос? - Задайте его в службу поддержки
                        OLLA Berkana по адресу <a target="_blank"
                            href="mailto:info@ollaberkana.ru">info@ollaberkana.ru</a>
                    </p>
                    <p>Оставьте заявку и наши менеджеры ознакомят Вас с возможностями системы и научат ей пользоваться
                        всего за
                        30 минут! Вы сами поймете насколько это просто!
                    </p>
                    <div class="btn-box">
                        <a id="btn_quiz" class="btn3  btn_quiz" href="">Пройти обучение</a>
                        <a id="btn-call" class="btn4 v2 btn-call" href=""><span>Заказать звонок</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="video_consult">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/KhloSv22VW8"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    <div class="consult_img">

                    </div>
                </div>

            </div>
        </div>




    </div>
</div>
<?php
function getPageAct($id)
{
	$page_id = get_queried_object_id();
	$class = '';
	if ($id == $page_id) {
		$class = 'on';
	}
	return $class;
}
?>
<div class="container">
    <div class="page-sidebar">
        <div class="sedebar-menu-btn">Открыть меню</div>
        <div class="sidebar">
            <div class="sidebar-menu">
                <div class="item <?php echo getPageAct(24); ?>">
                    <div class="ttl">Расписание</div>
                    <div class="sub">
                        <?php
						$post_content = get_post_field('post_content', 24);


						$dom = new DomDocument();
						$dom->loadHTML('<?xml encoding="utf-8" ?>' . $post_content);
                        $output = array();
                        foreach ($dom->getElementsByTagName('h2') as $item) {
                        $output[] = array(
                        'anchorText' => $item->nodeValue
                        );
                        echo '<a href="' . get_page_link(24) . '#' . sanitize_title($item->nodeValue) . '">' .
                            $item->nodeValue . '</a>';
                        }
                        ?>
                    </div>
                </div>

                <div class="item <?php echo getPageAct(77); ?>">
                    <div class="ttl">Абонемент, разовое занятие, бронирование</div>
                    <div class="sub">
                        <?php
						$post_content = get_post_field('post_content', 77);

						$dom = new DomDocument();
						$dom->loadHTML('<?xml encoding="utf-8" ?>' . $post_content);
                        $output = array();
                        foreach ($dom->getElementsByTagName('h2') as $item) {
                        $output[] = array(
                        'anchorText' => $item->nodeValue
                        );
                        echo '<a href="' . get_page_link(77) . '#' . sanitize_title($item->nodeValue) . '">' .
                            $item->nodeValue . '</a>';
                        }

                        unset($output);
                        ?>
                    </div>
                </div>
                <div class="item <?php echo getPageAct(89); ?>">
                    <div class="ttl">Посещения, отметки, переносы, отработки</div>
                    <div class="sub">
                        <?php
						$post_content = get_post_field('post_content', 89);


						$dom = new DomDocument();
						$dom->loadHTML('<?xml encoding="utf-8" ?>' . $post_content);
                        $output = array();
                        foreach ($dom->getElementsByTagName('h2') as $item) {
                        $output[] = array(
                        'anchorText' => $item->nodeValue
                        );
                        echo '<a href="' . get_page_link(89) . '#' . sanitize_title($item->nodeValue) . '">' .
                            $item->nodeValue . '</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="item <?php echo getPageAct(95); ?>">
                    <div class="ttl">Расчет зарплаты в программе Беркана</div>
                    <div class="sub">
                        <?php
						$post_content = get_post_field('post_content', 95);


						$dom = new DomDocument();
						$dom->loadHTML('<?xml encoding="utf-8" ?>' . $post_content);
                        $output = array();
                        foreach ($dom->getElementsByTagName('h2') as $item) {
                        $output[] = array(
                        'anchorText' => $item->nodeValue
                        );
                        echo '<a href="' . get_page_link(95) . '#' . sanitize_title($item->nodeValue) . '">' .
                            $item->nodeValue . '</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="item <?php echo getPageAct(99); ?>">
                    <div class="ttl">Технические вопросы</div>
                    <div class="sub">
                        <?php
						$post_content = get_post_field('post_content', 99);


						$dom = new DomDocument();
						$dom->loadHTML('<?xml encoding="utf-8" ?>' . $post_content);
                        $output = array();
                        foreach ($dom->getElementsByTagName('h2') as $item) {
                        $output[] = array(
                        'anchorText' => $item->nodeValue
                        );
                        echo '<a href="' . get_page_link(99) . '#' . sanitize_title($item->nodeValue) . '">' .
                            $item->nodeValue . '</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="item <?php echo getPageAct(101); ?>">
                    <div class="ttl">Общие вопросы</div>
                    <div class="sub">
                        <?php
						$post_content = get_post_field('post_content', 101);


						$dom = new DomDocument();
						$dom->loadHTML('<?xml encoding="utf-8" ?>' . $post_content);
                        $output = array();
                        foreach ($dom->getElementsByTagName('h2') as $item) {
                        $output[] = array(
                        'anchorText' => $item->nodeValue
                        );
                        echo '<a href="' . get_page_link(101) . '#' . sanitize_title($item->nodeValue) . '">' .
                            $item->nodeValue . '</a>';
                        }
                        ?>
                    </div>
                </div>

                <div class="item <?php echo getPageAct(103); ?>">
                    <div class="ttl">Мультиабонент</div>
                    <div class="sub">
                        <?php
						$post_content = get_post_field('post_content', 103);


						$dom = new DomDocument();
						$dom->loadHTML('<?xml encoding="utf-8" ?>' . $post_content);
                        $output = array();
                        foreach ($dom->getElementsByTagName('h2') as $item) {
                        $output[] = array(
                        'anchorText' => $item->nodeValue
                        );
                        echo '<a href="' . get_page_link(103) . '#' . sanitize_title($item->nodeValue) . '">' .
                            $item->nodeValue . '</a>';
                        }
                        ?>
                    </div>
                </div>

                <div class="item <?php echo getPageAct(105); ?>">
                    <div class="ttl">Работа с клиентами</div>
                    <div class="sub">
                        <?php
						$post_content = get_post_field('post_content', 105);


						$dom = new DomDocument();
						$dom->loadHTML('<?xml encoding="utf-8" ?>' . $post_content);
                        $output = array();
                        foreach ($dom->getElementsByTagName('h2') as $item) {
                        $output[] = array(
                        'anchorText' => $item->nodeValue
                        );
                        echo '<a href="' . get_page_link(105) . '#' . sanitize_title($item->nodeValue) . '">' .
                            $item->nodeValue . '</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="item <?php echo getPageAct(107); ?>">
                    <div class="ttl">Продукты</div>
                    <div class="sub">
                        <?php
						$post_content = get_post_field('post_content', 107);


						$dom = new DomDocument();
						$dom->loadHTML('<?xml encoding="utf-8" ?>' . $post_content);
                        $output = array();
                        foreach ($dom->getElementsByTagName('h2') as $item) {
                        $output[] = array(
                        'anchorText' => $item->nodeValue
                        );
                        echo '<a href="' . get_page_link(107) . '#' . sanitize_title($item->nodeValue) . '">' .
                            $item->nodeValue . '</a>';
                        }
                        ?>
                    </div>
                </div>


                <div class="item <?php echo getPageAct(109); ?>">
                    <div class="ttl">Рассылки</div>
                    <div class="sub">
                        <?php
						$post_content = get_post_field('post_content', 109);


						$dom = new DomDocument();
						$dom->loadHTML('<?xml encoding="utf-8" ?>' . $post_content);
                        $output = array();
                        foreach ($dom->getElementsByTagName('h2') as $item) {
                        $output[] = array(
                        'anchorText' => $item->nodeValue
                        );
                        echo '<a href="' . get_page_link(109) . '#' . sanitize_title($item->nodeValue) . '">' .
                            $item->nodeValue . '</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="item <?php echo getPageAct(111); ?>">
                    <div class="ttl">Маркетинг</div>
                    <div class="sub">
                        <?php
						$post_content = get_post_field('post_content', 111);


						$dom = new DomDocument();
						$dom->loadHTML('<?xml encoding="utf-8" ?>' . $post_content);
                        $output = array();
                        foreach ($dom->getElementsByTagName('h2') as $item) {
                        $output[] = array(
                        'anchorText' => $item->nodeValue
                        );
                        echo '<a href="' . get_page_link(111) . '#' . sanitize_title($item->nodeValue) . '">' .
                            $item->nodeValue . '</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="item <?php echo getPageAct(114); ?>">
                    <div class="ttl">Модуль штрих</div>
                    <div class="sub">
                        <?php
						$post_content = get_post_field('post_content', 114);


						$dom = new DomDocument();
						$dom->loadHTML('<?xml encoding="utf-8" ?>' . $post_content);
                        $output = array();
                        foreach ($dom->getElementsByTagName('h2') as $item) {
                        $output[] = array(
                        'anchorText' => $item->nodeValue
                        );
                        echo '<a href="' . get_page_link(114) . '#' . sanitize_title($item->nodeValue) . '">' .
                            $item->nodeValue . '</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="item <?php echo getPageAct(116); ?>">
                    <div class="ttl">Модуль бонусы</div>
                    <div class="sub">
                        <?php
						$post_content = get_post_field('post_content', 116);


						$dom = new DomDocument();
						$dom->loadHTML('<?xml encoding="utf-8" ?>' . $post_content);
                        $output = array();
                        foreach ($dom->getElementsByTagName('h2') as $item) {
                        $output[] = array(
                        'anchorText' => $item->nodeValue
                        );
                        echo '<a href="' . get_page_link(116) . '#' . sanitize_title($item->nodeValue) . '">' .
                            $item->nodeValue . '</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="item <?php echo getPageAct(119); ?>">
                    <div class="ttl">Телефонный помощник</div>
                    <div class="sub">
                        <?php
						$post_content = get_post_field('post_content', 119);


						$dom = new DomDocument();
						$dom->loadHTML('<?xml encoding="utf-8" ?>' . $post_content);
                        $output = array();
                        foreach ($dom->getElementsByTagName('h2') as $item) {
                        $output[] = array(
                        'anchorText' => $item->nodeValue
                        );
                        echo '<a href="' . get_page_link(119) . '#' . sanitize_title($item->nodeValue) . '">' .
                            $item->nodeValue . '</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="item <?php echo getPageAct(121); ?>">
                    <div class="ttl">Печать договоров клиентам</div>
                    <div class="sub">
                        <?php
						$post_content = get_post_field('post_content', 121);


						$dom = new DomDocument();
						$dom->loadHTML('<?xml encoding="utf-8" ?>' . $post_content);
                        $output = array();
                        foreach ($dom->getElementsByTagName('h2') as $item) {
                        $output[] = array(
                        'anchorText' => $item->nodeValue
                        );
                        echo '<a href="' . get_page_link(121) . '#' . sanitize_title($item->nodeValue) . '">' .
                            $item->nodeValue . '</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="item <?php echo getPageAct(123); ?>">
                    <div class="ttl">Работа с финансами</div>
                    <div class="sub">
                        <?php
						$post_content = get_post_field('post_content', 123);


						$dom = new DomDocument();
						$dom->loadHTML('<?xml encoding="utf-8" ?>' . $post_content);
                        $output = array();
                        foreach ($dom->getElementsByTagName('h2') as $item) {
                        $output[] = array(
                        'anchorText' => $item->nodeValue
                        );
                        echo '<a href="' . get_page_link(123) . '#' . sanitize_title($item->nodeValue) . '">' .
                            $item->nodeValue . '</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>


        </div>
        <div class="content">
            <div class="page-text consult">
                <div class="ttl"><?php the_title(); ?></div>
                <?php the_content(); ?>

                <!--<div class="vid-popup">
                    <a data-fancybox href="https://www.youtube.com/embed/jr47YisIsz8"><img src="<?php // echo get_template_directory_uri(); 
																								?>/img/co.jpg" alt="" /></a>
                </div>-->
            </div>
        </div>
    </div>
</div>

<? get_footer(); ?>