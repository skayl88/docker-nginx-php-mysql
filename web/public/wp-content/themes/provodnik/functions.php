<?php
/**
 * Функции шаблона (function.php)
 * @package WordPress
 * @subpackage eveXA-clean-theme
 */

remove_action('wp_head','adjacent_posts_rel_link_wp_head');
remove_action( 'wp_head', 'wp_shortlink_wp_head' );

/**
 * Установка HTTP заголовка Last-Modified
 */
 
add_action( 'template_redirect', 'Sheensay_HTTP_Headers_Last_Modified' );

function Sheensay_HTTP_Headers_Last_Modified() {
 
    if ( ( defined( 'DOING_AJAX' ) && DOING_AJAX ) || ( defined( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST ) || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) || ( is_admin() ) ) {
        return;
    }
 
    $last_modified = '';
 
 
    // Для страниц и записей
    if ( is_singular() ) {
        global $post;
 
        if ( !isset( $post -> post_modified_gmt ) ) {
            return;
        }
 
        $post_time = strtotime( $post -> post_modified_gmt );
        $modified_time = $post_time;
 
        // Если есть комментарий, обновляем дату
        if ( ( int ) $post -> comment_count > 0 ) {
            $comments = get_comments( array(
                'post_id' => $post -> ID,
                'number' => '1',
                'status' => 'approve',
                'orderby' => 'comment_date_gmt',
                    ) );
            if ( !empty( $comments ) && isset( $comments[0] ) ) {
                $comment_time = strtotime( $comments[0] -> comment_date_gmt );
                if ( $comment_time > $post_time ) {
                    $modified_time = $comment_time;
                }
            }
        }
 
        $last_modified = str_replace( '+0000', 'GMT', gmdate( 'r', $modified_time ) );
    }
 
 
    // Cтраницы архивов: рубрики, метки, даты и тому подобное
    if ( is_archive() || is_home() ) {
        global $posts;
 
        if ( empty( $posts ) ) {
            return;
        }
 
        $post = $posts[0];
 
        if ( !isset( $post -> post_modified_gmt ) ) {
            return;
        }
 
        $post_time = strtotime( $post -> post_modified_gmt );
        $modified_time = $post_time;
 
        $last_modified = str_replace( '+0000', 'GMT', gmdate( 'r', $modified_time ) );
    }
 
 
    // Если заголовки уже отправлены - ничего не делаем
    if ( headers_sent() ) {
        return;
    }
 
    if ( !empty( $last_modified ) ) {
        header( 'Last-Modified: ' . $last_modified );
 
        if ( !is_user_logged_in() ) {
            if ( isset( $_SERVER['HTTP_IF_MODIFIED_SINCE'] ) && strtotime( $_SERVER['HTTP_IF_MODIFIED_SINCE'] ) >= $modified_time ) {
                $protocol = (isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.1');
                header( $protocol . ' 304 Not Modified' );
            }
        }
    }
}



// отключает иконки с версии 4.2
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
//----- end --

function wp_remove_version() {
return '';
} 
add_filter('the_generator', 'wp_remove_version');

remove_action( 'wp_head', 'wlwmanifest_link' );

// Отключение rss ленты
function fb_disable_feed() {
    wp_redirect(get_option('siteurl'));
}

add_action('do_feed', 'fb_disable_feed', 1);
add_action('do_feed_rdf', 'fb_disable_feed', 1);
add_action('do_feed_rss', 'fb_disable_feed', 1);
add_action('do_feed_rss2', 'fb_disable_feed', 1);
add_action('do_feed_atom', 'fb_disable_feed', 1);

remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
 
function ny_remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'ny_remove_recent_comments_style' );
 
//add_theme_support('title-tag'); // теперь тайтл управляется самим вп

//add_post_type_support( 'page', 'excerpt' );

register_nav_menus(array( // Регистрируем 2 меню
	'top' => 'Верхнее', // Верхнее
	'bottom' => 'Внизу' // Внизу
));

add_theme_support('post-thumbnails'); // включаем поддержку миниатюр
set_post_thumbnail_size(250, 150); // задаем размер миниатюрам 250x150
add_image_size('big-thumb', 400, 400, true); // добавляем еще один размер картинкам 400x400 с обрезкой

register_sidebar(array( // регистрируем левую колонку, этот кусок можно повторять для добавления новых областей для виджитов
	'name' => 'Сайдбар', // Название в админке
	'id' => "sidebar", // идентификатор для вызова в шаблонах
	'description' => 'Обычная колонка в сайдбаре', // Описалово в админке
	'before_widget' => '<div id="%1$s" class="widget %2$s">', // разметка до вывода каждого виджета
	'after_widget' => "</div>\n", // разметка после вывода каждого виджета
	'before_title' => '<span class="widgettitle">', //  разметка до вывода заголовка виджета
	'after_title' => "</span>\n", //  разметка после вывода заголовка виджета
));

if (!class_exists('clean_comments_constructor')) { // если класс уже есть в дочерней теме - нам не надо его определять
	class clean_comments_constructor extends Walker_Comment { // класс, который собирает всю структуру комментов
		public function start_lvl( &$output, $depth = 0, $args = array()) { // что выводим перед дочерними комментариями
			$output .= '<ul class="children">' . "\n";
		}
		public function end_lvl( &$output, $depth = 0, $args = array()) { // что выводим после дочерних комментариев
			$output .= "</ul><!-- .children -->\n";
		}
	    protected function comment( $comment, $depth, $args ) { // разметка каждого комментария, без закрывающего </li>!
	    	$classes = implode(' ', get_comment_class()).($comment->comment_author_email == get_the_author_meta('email') ? ' author-comment' : ''); // берем стандартные классы комментария и если коммент пренадлежит автору поста добавляем класс author-comment
	        echo '<li id="comment-'.get_comment_ID().'" class="'.$classes.' media">'."\n"; // родительский тэг комментария с классами выше и уникальным якорным id
	    	echo '<div class="media-left">'.get_avatar($comment, 64, '', get_comment_author(), array('class' => 'media-object'))."</div>\n"; // покажем аватар с размером 64х64
	    	echo '<div class="media-body">';
	    	echo '<span class="meta media-heading">Автор: '.get_comment_author()."\n"; // имя автора коммента
	    	//echo ' '.get_comment_author_email(); // email автора коммента, плохой тон выводить почту
	    	echo ' '.get_comment_author_url(); // url автора коммента
	    	echo ' Добавлено '.get_comment_date('F j, Y в H:i')."\n"; // дата и время комментирования
	    	if ( '0' == $comment->comment_approved ) echo '<br><em class="comment-awaiting-moderation">Ваш комментарий будет опубликован после проверки модератором.</em>'."\n"; // если комментарий должен пройти проверку
	    	echo "</span>";
	        comment_text()."\n"; // текст коммента
	        $reply_link_args = array( // опции ссылки "ответить"
	        	'depth' => $depth, // текущая вложенность
	        	'reply_text' => 'Ответить', // текст
				'login_text' => 'Вы должны быть залогинены' // текст если юзер должен залогинеться
	        );
	        echo get_comment_reply_link(array_merge($args, $reply_link_args)); // выводим ссылку ответить
	        echo '</div>'."\n"; // закрываем див
	    }
	    public function end_el( &$output, $comment, $depth = 0, $args = array() ) { // конец каждого коммента
			$output .= "</li><!-- #comment-## -->\n";
		}
	}
}

if (!function_exists('pagination')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
	function pagination() { // функция вывода пагинации
		global $wp_query; // текущая выборка должна быть глобальной
		$big = 999999999; // число для замены
		$links = paginate_links(array( // вывод пагинации с опциями ниже
			'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))), // что заменяем в формате ниже
			'format' => '?paged=%#%', // формат, %#% будет заменено
			'current' => max(1, get_query_var('paged')), // текущая страница, 1, если $_GET['page'] не определено
			'type' => 'array', // нам надо получить массив
			'prev_text'    => 'Назад', // текст назад
	    	'next_text'    => 'Вперед', // текст вперед
			'total' => $wp_query->max_num_pages, // общие кол-во страниц в пагинации
			'show_all'     => false, // не показывать ссылки на все страницы, иначе end_size и mid_size будут проигнорированны
			'end_size'     => 15, //  сколько страниц показать в начале и конце списка (12 ... 4 ... 89)
			'mid_size'     => 15, // сколько страниц показать вокруг текущей страницы (... 123 5 678 ...).
			'add_args'     => false, // массив GET параметров для добавления в ссылку страницы
			'add_fragment' => '',	// строка для добавления в конец ссылки на страницу
			'before_page_number' => '', // строка перед цифрой
			'after_page_number' => '' // строка после цифры
		));
	 	if( is_array( $links ) ) { // если пагинация есть
		    echo '<ul class="pagination">';
		    foreach ( $links as $link ) {
		    	if ( strpos( $link, 'current' ) !== false ) echo "<li class='active'>$link</li>"; // если это активная страница
		        else echo "<li>$link</li>"; 
		    }
		   	echo '</ul>';
		 }
	}
}

add_action('wp_footer', 'add_scripts'); // приклеем ф-ю на добавление скриптов в футер
if (!function_exists('add_scripts')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
	function add_scripts() { // добавление скриптов
	    if(is_admin()) return false; // если мы в админке - ничего не делаем
	    //wp_deregister_script('jquery'); // выключаем стандартный jquery

	    wp_enqueue_script('myjquery', get_template_directory_uri().'/js/jquery-1.12.1.min.js','','',true);
	    wp_enqueue_script('carousel', get_template_directory_uri().'/js/owl.carousel.min.js','','',true);
	   	wp_enqueue_script('imagesloaded', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js','','',true);
	    wp_enqueue_script('masonry', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js','','',true);
	    wp_enqueue_script( 'inputmask', get_template_directory_uri().'/js/jquery.inputmask.bundle.min.js','','',true );
	    wp_enqueue_script('script', get_template_directory_uri().'/js/script.js?v=2','','',true);
		 //wp_enqueue_script('magnific', get_template_directory_uri().'/js/jquery.magnific-popup.min.js','','',true);
	    //wp_enqueue_script('swiper', get_template_directory_uri().'/js/swiper.min.js','','',true);
	    //wp_enqueue_script('fancybox', get_template_directory_uri().'/js/jquery.fancybox.min.js','','',true);
	    //wp_enqueue_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js','','',true);
	    //wp_enqueue_script('script', get_template_directory_uri().'/js/script.js','','',true);
	   


	    //wp_enqueue_script('js', get_template_directory_uri().'/js/js.js','','',true); // добавляем свой
	   
	}
}

add_action('wp_print_styles', 'add_styles'); // приклеем ф-ю на добавление стилей в хедер
if (!function_exists('add_styles')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
	function add_styles() { // добавление стилей
	    if(is_admin()) return false; // если мы в админке - ничего не делаем
	    wp_enqueue_style( 'carousel', get_template_directory_uri().'/owl.carousel.min.css' ); 
	    wp_enqueue_style( 'fancybox', get_template_directory_uri().'/jquery.fancybox.min.css' );
		
		 
		 wp_enqueue_style( 'style', get_template_directory_uri().'/style.css?v=2' ); // основные стили шаблона
	    //wp_enqueue_style( 'swiper', get_template_directory_uri().'/swiper.min.css' );
	    //wp_enqueue_style( 'slick', get_template_directory_uri().'/slick.css' );
	    //wp_enqueue_style( 'fancybox', get_template_directory_uri().'/jquery.fancybox.min.css' );
	    //wp_enqueue_style( 'style', get_template_directory_uri().'/style.css' );
	    //wp_enqueue_style( 'addcss', get_template_directory_uri().'/addcss.css' );
	}
}

if (!class_exists('bootstrap_menu')) {
	class bootstrap_menu extends Walker_Nav_Menu { // внутри вывод 
		private $open_submenu_on_hover; // параметр который будет определять раскрывать субменю при наведении или оставить по клику как в стандартном бутстрапе

		function __construct($open_submenu_on_hover = true) { // в конструкторе
	        $this->open_submenu_on_hover = $open_submenu_on_hover; // запишем параметр раскрывания субменю
	    }

		function start_lvl(&$output, $depth = 0, $args = array()) { // старт вывода подменюшек
			$output .= "\n<ul class=\"dropdown-menu\">\n"; // ул с классом
		}
		function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) { // старт вывода элементов
			$item_html = ''; // то что будет добавлять
			parent::start_el($item_html, $item, $depth, $args); // вызываем стандартный метод родителя
			if ( $item->is_dropdown && $depth === 0 ) { // если элемент содержит подменю и это элемент первого уровня
			   if (!$this->open_submenu_on_hover) $item_html = str_replace('<a', '<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"', $item_html); // если подменю не будет раскрывать при наведении надо добавить стандартные атрибуты бутстрапа для раскрытия по клику
			   $item_html = str_replace('</a>', ' <b class="caret"></b></a>', $item_html); // ну это стрелочка вниз
			}
			$output .= $item_html; // приклеиваем теперь
		}
		function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) { // вывод элемента
			if ( $element->current ) $element->classes[] = 'active'; // если элемент активный надо добавить бутстрап класс для подсветки
			$element->is_dropdown = !empty( $children_elements[$element->ID] ); // если у элемента подменю
			if ( $element->is_dropdown ) { // если да
			    if ( $depth === 0 ) { // если li содержит субменю 1 уровня
			        $element->classes[] = 'dropdown'; // то добавим этот класс
			        if ($this->open_submenu_on_hover) $element->classes[] = 'show-on-hover'; // если нужно показывать субменю по хуверу
			    } elseif ( $depth === 1 ) { // если li содержит субменю 2 уровня
			        $element->classes[] = 'dropdown-submenu'; // то добавим этот класс, стандартный бутстрап не поддерживает подменю больше 2 уровня по этому эту ситуацию надо будет разрешать отдельно
			    }
			}
			parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output); // вызываем стандартный метод родителя
		}
	}
}

if (!function_exists('content_class_by_sidebar')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
	function content_class_by_sidebar() { // функция для вывода класса в зависимости от существования виджетов в сайдбаре
		if (is_active_sidebar( 'sidebar' )) { // если есть
			echo 'col-sm-9'; // пишем класс на 80% ширины
		} else { // если нет
			echo 'col-sm-12'; // контент на всю ширину
		}
	}
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
add_theme_support( 'woocommerce' );
}

add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment');

function header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <span class="counter"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
    <?php
    $fragments['.counter'] = ob_get_clean();
    return $fragments;
}


remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'custom_item_loop_link', 10 );
function custom_item_loop_link() {
	global $product;

	$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

	echo '<a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link prod">';
}

//remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

add_filter('woocommerce_show_page_title', '__return_false');

remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
add_action( 'woocommerce_product_thumbnails', 'my_show_product_thumbnails', 20 );

function my_show_product_thumbnails() {
	wc_get_template( 'single-product/product-thumbnails.php' );
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 2 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 5 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );






remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 21 );


remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


function custom_related(){
	?>
	<div class="slider-news slider-news--card" style="    padding-top: 35px;">

				<h2>Похожие товары</h2>

				<div class="slider-new">
					
					<?php 
					$loop = new WP_Query( array(
					    'post_type' => 'product',
					    'posts_per_page' => 12,
					    'order' => 'ASC'
					) );

					if ($loop->have_posts()) {
					    while ($loop->have_posts()): $loop->the_post();
					      $product = wc_get_product($loop->post->ID);
					      ?>
					      	<div class="slider-new__item">
								<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
								<?php $prod_id = $product->get_id(); ?>
								<div class="slider-new__card">
									<img src="<?php echo get_the_post_thumbnail_url($prod_id, 'large'); ?>"  class="first_img" alt="">
		<img src="<?php echo get_field('sec_img'); ?>" class="sec_img" alt="">
									<p><?php the_title();?></p>
									<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
									<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
								</div>
							</div>
					      	

				
					      <?php
					    endwhile;
					}

					wp_reset_postdata();
					?>
					

			

				</div>

			</div>
	
	<!-- Часто покупают  -->



<?php
}


add_action( 'woocommerce_after_single_product_summary', 'custom_related', 20 );


add_action( 'woocommerce_before_add_to_cart_button', 'add_text_after_excerpt_single_product', 25 );
function add_text_after_excerpt_single_product(){
    global $product;

    // Output your custom text
    echo '<div class="product-item__size-data">

							<div class="size-data_left">
								<div class="size-data_bold">
									<p>Артикул</p>
									<p>Бренд</p>
								</div>
								<div class="size-data_thin">
									<p>0629-6325</p>
									<p>Emporio Armani EA7</p>
								</div>
							</div>

							<div class="size-data_right">
								<div class="size-data_bold">
									<p>Страна бренда</p>
									<p>состав</p>
								</div>
								<div class="size-data_thin">
									<p>Италия</p>
									<p>Полиэстер / Вискоза / Эластан</p>
								</div>
							</div>
						</div>';
}




/**
 * Хлебные крошки для WordPress (breadcrumbs)
 *
 * @param  string [$sep  = '']      Разделитель. По умолчанию ' » '
 * @param  array  [$l10n = array()] Для локализации. См. переменную $default_l10n.
 * @param  array  [$args = array()] Опции. См. переменную $def_args
 * @return string Выводит на экран HTML код
 *
 * version 3.3.2
 */
function kama_breadcrumbs( $sep = ' » ', $l10n = array(), $args = array() ){
	$kb = new Kama_Breadcrumbs;
	echo $kb->get_crumbs( $sep, $l10n, $args );
}

class Kama_Breadcrumbs {

	public $arg;

	// Локализация
	static $l10n = array(
		'home'       => 'Главная',
		'paged'      => 'Страница %d',
		'_404'       => 'Ошибка 404',
		'search'     => 'Результаты поиска по запросу - <b>%s</b>',
		'author'     => 'Архив автора: <b>%s</b>',
		'year'       => 'Архив за <b>%d</b> год',
		'month'      => 'Архив за: <b>%s</b>',
		'day'        => '',
		'attachment' => 'Медиа: %s',
		'tag'        => 'Записи по метке: <b>%s</b>',
		'tax_tag'    => '%1$s из "%2$s" по тегу: <b>%3$s</b>',
		// tax_tag выведет: 'тип_записи из "название_таксы" по тегу: имя_термина'.
		// Если нужны отдельные холдеры, например только имя термина, пишем так: 'записи по тегу: %3$s'
	);

	// Параметры по умолчанию
	static $args = array(
		'on_front_page'   => true,  // выводить крошки на главной странице
		'show_post_title' => true,  // показывать ли название записи в конце (последний элемент). Для записей, страниц, вложений
		'show_term_title' => true,  // показывать ли название элемента таксономии в конце (последний элемент). Для меток, рубрик и других такс
		'title_patt'      => '<span class="kb_title">%s</span>', // шаблон для последнего заголовка. Если включено: show_post_title или show_term_title
		'last_sep'        => true,  // показывать последний разделитель, когда заголовок в конце не отображается
		'markup'          => 'schema.org', // 'markup' - микроразметка. Может быть: 'rdf.data-vocabulary.org', 'schema.org', '' - без микроразметки
										   // или можно указать свой массив разметки:
										   // array( 'wrappatt'=>'<div class="kama_breadcrumbs">%s</div>', 'linkpatt'=>'<a href="%s">%s</a>', 'sep_after'=>'', )
		'priority_tax'    => array('category'), // приоритетные таксономии, нужно когда запись в нескольких таксах
		'priority_terms'  => array(), // 'priority_terms' - приоритетные элементы таксономий, когда запись находится в нескольких элементах одной таксы одновременно.
									  // Например: array( 'category'=>array(45,'term_name'), 'tax_name'=>array(1,2,'name') )
									  // 'category' - такса для которой указываются приор. элементы: 45 - ID термина и 'term_name' - ярлык.
									  // порядок 45 и 'term_name' имеет значение: чем раньше тем важнее. Все указанные термины важнее неуказанных...
		'nofollow' => false, // добавлять rel=nofollow к ссылкам?

		// служебные
		'sep'             => '',
		'linkpatt'        => '',
		'pg_end'          => '',
	);

	function get_crumbs( $sep, $l10n, $args ){
		global $post, $wp_query, $wp_post_types;

		self::$args['sep'] = $sep;

		// Фильтрует дефолты и сливает
		$loc = (object) array_merge( apply_filters('kama_breadcrumbs_default_loc', self::$l10n ), $l10n );
		$arg = (object) array_merge( apply_filters('kama_breadcrumbs_default_args', self::$args ), $args );

		$arg->sep = '<span class="kb_sep">'. $arg->sep .'</span>'; // дополним

		// упростим
		$sep = & $arg->sep;
		$this->arg = & $arg;

		// микроразметка ---
		if(1){
			$mark = & $arg->markup;

			// Разметка по умолчанию
			if( ! $mark ) $mark = array(
				'wrappatt'  => '<div class="kama_breadcrumbs">%s</div>',
				'linkpatt'  => '<a href="%s">%s</a>',
				'sep_after' => '',
			);
			// rdf
			elseif( $mark === 'rdf.data-vocabulary.org' ) $mark = array(
				'wrappatt'   => '<div class="kama_breadcrumbs" prefix="v: http://rdf.data-vocabulary.org/#">%s</div>',
				'linkpatt'   => '<span typeof="v:Breadcrumb"><a href="%s" rel="v:url" property="v:title">%s</a>',
				'sep_after'  => '</span>', // закрываем span после разделителя!
			);
			// schema.org
			elseif( $mark === 'schema.org' ) $mark = array(
				'wrappatt'   => '<div class="kama_breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">%s</div>',
				'linkpatt'   => '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="%s" itemprop="item"><span itemprop="name">%s</span></a></span>',
				'sep_after'  => '',
			);

			elseif( ! is_array($mark) )
				die( __CLASS__ .': "markup" parameter must be array...');

			$wrappatt  = $mark['wrappatt'];
			$arg->linkpatt  = $arg->nofollow ? str_replace('<a ','<a rel="nofollow"', $mark['linkpatt']) : $mark['linkpatt'];
			$arg->sep      .= $mark['sep_after']."\n";
		}

		$linkpatt = $arg->linkpatt; // упростим

		$q_obj = get_queried_object();

		// может это архив пустой таксы?
		$ptype = null;
		if( empty($post) ){
			if( isset($q_obj->taxonomy) )
				$ptype = & $wp_post_types[ get_taxonomy($q_obj->taxonomy)->object_type[0] ];
		}
		else $ptype = & $wp_post_types[ $post->post_type ];

		// paged
		$arg->pg_end = '';
		if( ($paged_num = get_query_var('paged')) || ($paged_num = get_query_var('page')) )
			$arg->pg_end = $sep . sprintf( $loc->paged, (int) $paged_num );

		$pg_end = $arg->pg_end; // упростим

		$out = '';

		if( is_front_page() ){
			return $arg->on_front_page ? sprintf( $wrappatt, ( $paged_num ? sprintf($linkpatt, get_home_url(), $loc->home) . $pg_end : $loc->home ) ) : '';
		}
		// страница записей, когда для главной установлена отдельная страница.
		elseif( is_home() ) {
			$out = $paged_num ? ( sprintf( $linkpatt, get_permalink($q_obj), esc_html($q_obj->post_title) ) . $pg_end ) : esc_html($q_obj->post_title);
		}
		elseif( is_404() ){
			$out = $loc->_404;
		}
		elseif( is_search() ){
			$out = sprintf( $loc->search, esc_html( $GLOBALS['s'] ) );
		}
		elseif( is_author() ){
			$tit = sprintf( $loc->author, esc_html($q_obj->display_name) );
			$out = ( $paged_num ? sprintf( $linkpatt, get_author_posts_url( $q_obj->ID, $q_obj->user_nicename ) . $pg_end, $tit ) : $tit );
		}
		elseif( is_year() || is_month() || is_day() ){
			$y_url  = get_year_link( $year = get_the_time('Y') );

			if( is_year() ){
				$tit = sprintf( $loc->year, $year );
				$out = ( $paged_num ? sprintf($linkpatt, $y_url, $tit) . $pg_end : $tit );
			}
			// month day
			else {
				$y_link = sprintf( $linkpatt, $y_url, $year);
				$m_url  = get_month_link( $year, get_the_time('m') );

				if( is_month() ){
					$tit = sprintf( $loc->month, get_the_time('F') );
					$out = $y_link . $sep . ( $paged_num ? sprintf( $linkpatt, $m_url, $tit ) . $pg_end : $tit );
				}
				elseif( is_day() ){
					$m_link = sprintf( $linkpatt, $m_url, get_the_time('F'));
					$out = $y_link . $sep . $m_link . $sep . get_the_time('l');
				}
			}
		}
		// Древовидные записи
		elseif( is_singular() && $ptype->hierarchical ){
			$out = $this->_add_title( $this->_page_crumbs($post), $post );
		}
		// Таксы, плоские записи и вложения
		else {
			$term = $q_obj; // таксономии

			// определяем термин для записей (включая вложения attachments)
			if( is_singular() ){
				// изменим $post, чтобы определить термин родителя вложения
				if( is_attachment() && $post->post_parent ){
					$save_post = $post; // сохраним
					$post = get_post($post->post_parent);
				}

				// учитывает если вложения прикрепляются к таксам древовидным - все бывает :)
				$taxonomies = get_object_taxonomies( $post->post_type );
				// оставим только древовидные и публичные, мало ли...
				$taxonomies = array_intersect( $taxonomies, get_taxonomies( array('hierarchical' => true, 'public' => true) ) );

				if( $taxonomies ){
					// сортируем по приоритету
					if( ! empty($arg->priority_tax) ){
						usort( $taxonomies, function($a,$b)use($arg){
							$a_index = array_search($a, $arg->priority_tax);
							if( $a_index === false ) $a_index = 9999999;

							$b_index = array_search($b, $arg->priority_tax);
							if( $b_index === false ) $b_index = 9999999;

							return ( $b_index === $a_index ) ? 0 : ( $b_index < $a_index ? 1 : -1 ); // меньше индекс - выше
						} );
					}

					// пробуем получить термины, в порядке приоритета такс
					foreach( $taxonomies as $taxname ){
						if( $terms = get_the_terms( $post->ID, $taxname ) ){
							// проверим приоритетные термины для таксы
							$prior_terms = & $arg->priority_terms[ $taxname ];
							if( $prior_terms && count($terms) > 2 ){
								foreach( (array) $prior_terms as $term_id ){
									$filter_field = is_numeric($term_id) ? 'term_id' : 'slug';
									$_terms = wp_list_filter( $terms, array($filter_field=>$term_id) );

									if( $_terms ){
										$term = array_shift( $_terms );
										break;
									}
								}
							}
							else
								$term = array_shift( $terms );

							break;
						}
					}
				}

				if( isset($save_post) ) $post = $save_post; // вернем обратно (для вложений)
			}

			// вывод

			// все виды записей с терминами или термины
			if( $term && isset($term->term_id) ){
				$term = apply_filters('kama_breadcrumbs_term', $term );

				// attachment
				if( is_attachment() ){
					if( ! $post->post_parent )
						$out = sprintf( $loc->attachment, esc_html($post->post_title) );
					else {
						if( ! $out = apply_filters('attachment_tax_crumbs', '', $term, $this ) ){
							$_crumbs    = $this->_tax_crumbs( $term, 'self' );
							$parent_tit = sprintf( $linkpatt, get_permalink($post->post_parent), get_the_title($post->post_parent) );
							$_out = implode( $sep, array($_crumbs, $parent_tit) );
							$out = $this->_add_title( $_out, $post );
						}
					}
				}
				// single
				elseif( is_single() ){
					if( ! $out = apply_filters('post_tax_crumbs', '', $term, $this ) ){
						$_crumbs = $this->_tax_crumbs( $term, 'self' );
						$out = $this->_add_title( $_crumbs, $post );
					}
				}
				// не древовидная такса (метки)
				elseif( ! is_taxonomy_hierarchical($term->taxonomy) ){
					// метка
					if( is_tag() )
						$out = $this->_add_title('', $term, sprintf( $loc->tag, esc_html($term->name) ) );
					// такса
					elseif( is_tax() ){
						$post_label = $ptype->labels->name;
						$tax_label = $GLOBALS['wp_taxonomies'][ $term->taxonomy ]->labels->name;
						$out = $this->_add_title('', $term, sprintf( $loc->tax_tag, $post_label, $tax_label, esc_html($term->name) ) );
					}
				}
				// древовидная такса (рибрики)
				else {
					if( ! $out = apply_filters('term_tax_crumbs', '', $term, $this ) ){
						$_crumbs = $this->_tax_crumbs( $term, 'parent' );
						$out = $this->_add_title( $_crumbs, $term, esc_html($term->name) );                     
					}
				}
			}
			// влоежния от записи без терминов
			elseif( is_attachment() ){
				$parent = get_post($post->post_parent);
				$parent_link = sprintf( $linkpatt, get_permalink($parent), esc_html($parent->post_title) );
				$_out = $parent_link;

				// вложение от записи древовидного типа записи
				if( is_post_type_hierarchical($parent->post_type) ){
					$parent_crumbs = $this->_page_crumbs($parent);
					$_out = implode( $sep, array( $parent_crumbs, $parent_link ) );
				}

				$out = $this->_add_title( $_out, $post );
			}
			// записи без терминов
			elseif( is_singular() ){
				$out = $this->_add_title( '', $post );
			}
		}

		// замена ссылки на архивную страницу для типа записи
		$home_after = apply_filters('kama_breadcrumbs_home_after', '', $linkpatt, $sep, $ptype );

		if( '' === $home_after ){
			// Ссылка на архивную страницу типа записи для: отдельных страниц этого типа; архивов этого типа; таксономий связанных с этим типом.
			if( $ptype && $ptype->has_archive && ! in_array( $ptype->name, array('post','page','attachment') )
				&& ( is_post_type_archive() || is_singular() || (is_tax() && in_array($term->taxonomy, $ptype->taxonomies)) )
			){
				$pt_title = $ptype->labels->name;

				// первая страница архива типа записи
				if( is_post_type_archive() && ! $paged_num )
					$home_after = sprintf( $this->arg->title_patt, $pt_title );
				// singular, paged post_type_archive, tax
				else{
					$home_after = sprintf( $linkpatt, get_post_type_archive_link($ptype->name), $pt_title );

					$home_after .= ( ($paged_num && ! is_tax()) ? $pg_end : $sep ); // пагинация
				}
			}
		}

		$before_out = sprintf( $linkpatt, home_url(), $loc->home ) . ( $home_after ? $sep.$home_after : ($out ? $sep : '') );

		$out = apply_filters('kama_breadcrumbs_pre_out', $out, $sep, $loc, $arg );

		$out = sprintf( $wrappatt, $before_out . $out );

		return apply_filters('kama_breadcrumbs', $out, $sep, $loc, $arg );
	}

	function _page_crumbs( $post ){
		$parent = $post->post_parent;

		$crumbs = array();
		while( $parent ){
			$page = get_post( $parent );
			$crumbs[] = sprintf( $this->arg->linkpatt, get_permalink($page), esc_html($page->post_title) );
			$parent = $page->post_parent;
		}

		return implode( $this->arg->sep, array_reverse($crumbs) );
	}

	function _tax_crumbs( $term, $start_from = 'self' ){
		$termlinks = array();
		$term_id = ($start_from === 'parent') ? $term->parent : $term->term_id;
		while( $term_id ){
			$term       = get_term( $term_id, $term->taxonomy );
			$termlinks[] = sprintf( $this->arg->linkpatt, get_term_link($term), esc_html($term->name) );
			$term_id    = $term->parent;
		}

		if( $termlinks )
			return implode( $this->arg->sep, array_reverse($termlinks) ) /*. $this->arg->sep*/;
		return '';
	}

	// добалвяет заголовок к переданному тексту, с учетом всех опций. Добавляет разделитель в начало, если надо.
	function _add_title( $add_to, $obj, $term_title = '' ){
		$arg = & $this->arg; // упростим...
		$title = $term_title ? $term_title : esc_html($obj->post_title); // $term_title чиститься отдельно, теги моугт быть...
		$show_title = $term_title ? $arg->show_term_title : $arg->show_post_title;

		// пагинация
		if( $arg->pg_end ){
			$link = $term_title ? get_term_link($obj) : get_permalink($obj);
			$add_to .= ($add_to ? $arg->sep : '') . sprintf( $arg->linkpatt, $link, $title ) . $arg->pg_end;
		}
		// дополняем - ставим sep
		elseif( $add_to ){
			if( $show_title )
				$add_to .= $arg->sep . sprintf( $arg->title_patt, $title );
			elseif( $arg->last_sep )
				$add_to .= $arg->sep;
		}
		// sep будет потом...
		elseif( $show_title )
			$add_to = sprintf( $arg->title_patt, $title );

		return $add_to;
	}

}

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
  
function custom_override_checkout_fields( $fields ) {
  unset($fields['billing']['billing_country']);  //удаляем! тут хранится значение страны оплаты
  unset($fields['shipping']['shipping_country']); ////удаляем! тут хранится значение страны доставки
 
  return $fields;
}

//add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment');


add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments){
    ob_start();
    ?>
    <span class="counter"><?php echo sprintf($woocommerce->cart->cart_contents_total); ?></span>
    <?php
        $fragments['.counter'] = ob_get_clean();
    return $fragments;
}

// Get Woocommerce variation price based on product ID
function get_variation_price_by_id($product_id, $variation_id){
	$currency_symbol = get_woocommerce_currency_symbol();
	$product = new WC_Product_Variable($product_id);
	$variations = $product->get_available_variations();
	$var_data = [];
	foreach ($variations as $variation) {
		if($variation['variation_id'] == $variation_id){
			$display_regular_price = $variation['display_regular_price'].'<span class="currency">'. $currency_symbol .'</span>';
			$display_price = $variation['display_price'].'<span class="currency">'. $currency_symbol .'</span>';
		}
	}

	//Check if Regular price is equal with Sale price (Display price)
	if ($display_regular_price == $display_price){
		$display_price = false;
	}

	$priceArray = array(
		'display_regular_price' => $display_regular_price,
		'display_price' => $display_price
	);
	$priceObject = (object)$priceArray;
	return $priceObject;
}


function get_variation_id_from_attributes( $product_id, $size, $color ) {

        $color = strtolower($color);
        $size = strtolower($size);

        $variation_id = find_matching_product_variation_id ( $product_id, array( 
            'attribute_pa_czvet'    => $color,
            'attribute_pa_razmer' => $size
            ));

        return $variation_id;
}
function find_matching_product_variation_id($product_id, $attributes)
    {
        return (new \WC_Product_Data_Store_CPT())->find_matching_product_variation(
            new \WC_Product($product_id),
            $attributes
        );
    }

function get_variation_by($variable_product_id, $size) {
			  $var_prod = wc_get_product( $variable_product_id );     

			  $avail_vars = $var_prod->get_available_variations();

			  
			  foreach ($avail_vars as $v)
			    if ($v["attributes"]["attribute_pa_razmer"] == $size)
			      return $v['variation_id'];

			  return null;
			}



//ADD TO CART FUNCTION

add_action('wp_footer', 'my_custom_wc_button_script', 100);
function my_custom_wc_button_script() {
	?>
	<script>
		jQuery(document).ready(function($) {

			var ajaxurl = "<?php echo esc_attr( admin_url( 'admin-ajax.php' ) ); ?>";
			$.ajaxSetup({
		        beforeSend: function(xhr) {
		                 $('.ajaxloader').css('display', 'block');
		             }
		       
		    });

		    $( "#sender_vet" ).submit(function( event ) {
		      event.preventDefault();
		      var fdata = new FormData($(this)[0]);
		      for (var pair of fdata.entries()) {
		            console.log(pair[0]+ ', ' + pair[1]); 
		        }


		      fdata.append("action", "add_card_1");

		        jQuery.ajax({
		            url: ajaxurl,
		            type: 'POST',
		            data: fdata, 
		            cache: false,
		            processData: false, 
		            contentType: false,     
		            success: function(data) {
		                console.log(data);
		                window.location.href = "/cabinet/";
		            },
		            error: function(data){
		            	console.log(data);
		            	alert('Ошибка, попробуйте позже');
		            }
		        });

		    });

		    $( "#sender_clinic" ).submit(function( event ) {
		      event.preventDefault();
		      var fdata = new FormData($(this)[0]);
		      for (var pair of fdata.entries()) {
		            console.log(pair[0]+ ', ' + pair[1]); 
		        }


		      fdata.append("action", "add_card_2");

		        jQuery.ajax({
		            url: ajaxurl,
		            type: 'POST',
		            data: fdata, 
		            cache: false,
		            processData: false, 
		            contentType: false,     
		            success: function(data) {
		                console.log(data);
		                window.location.href = "/cabinet/";
		            },
		            error: function(data){
		            	console.log(data);
		            	alert('Ошибка, попробуйте позже');
		            }
		        });

		    });


		    $( "#reg_form" ).submit(function( event ) {
		      event.preventDefault();
		      var fdata = new FormData($(this)[0]);
		      for (var pair of fdata.entries()) {
		            console.log(pair[0]+ ', ' + pair[1]); 
		        }


		      fdata.append("action", "add_order");

		        jQuery.ajax({
		            url: ajaxurl,
		            type: 'POST',
		            data: fdata, 
		            cache: false,
		            processData: false, 
		            contentType: false,     
		            success: function(data) {
		                console.log(data);
		                window.location.href = "/cabinet/";
		            },
		            error: function(data){
		            	console.log(data);
		            	alert(data.message);
		            }
		        });

		    });
			
		});
	</script>
	<?php
}
add_action('wp_ajax_add_card_1', "add_card_1");
add_action('wp_ajax_nopriv_add_card_1', "add_card_1");
function add_card_1() {
	$retval = array(
		'success' => false,
		'message' => ""
	);
	
	$user_id = get_current_user_id();
	$fio = $_POST['fio'];
	$about = $_POST['about'];
	$inst = $_POST['inst'];
	$obr_1 = $_POST['o_title'];
	$obr_2 = $_POST['o_year'];
	$obr_3 = $_POST['o_type'];

	$vet_cat = $_POST['veterinari_category'];
	$a_cat = $_POST['animal'];

	$city = $_POST['city'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

	$post_data = array(
		'post_title' => $fio,
		'post_content' => '',
		'post_type' => 'veterinari',
		'post_status'   => 'pending',
		'post_author'   => 1,
	);

	// Вставляем данные в БД
	$post_id = wp_insert_post( wp_slash($post_data) );

	if($post_id){
		$retval['success'] = true;
		$retval['message'] = $obr_1.' '.$obr_2.' '.$obr_3;

		wp_set_object_terms( $post_id, $vet_cat, 'veterinari_category' );
		wp_set_object_terms( $post_id, $a_cat, 'animal' );

		update_field('field_5fcdead06d712', $fio, $post_id); //fio
		update_field('field_5fcdeaf36d713', $about, $post_id);
		update_field('field_5fcdeaff6d714', $inst, $post_id);
		update_field('field_5fcdebd66d720', $city, $post_id);
		update_field('field_5fcdebe16d721', $email, $post_id);
		update_field('field_5fcdebe96d722', $phone, $post_id);

		update_field('field_5fd024d3ae955', $post_id, 'user_'.$user_id);

		$attachment_id = media_handle_upload( 'file_1', $post_id );
		$attachment_id_2 = media_handle_upload( 'file_2', $post_id );
		$attachment_id_3 = media_handle_upload( 'file_3', $post_id );


		if( !is_wp_error( $attachment_id ) ){
			$img_1 = wp_get_attachment_url( $attachment_id );
			update_field( 'field_5fcdeb9f6d71d', $attachment_id, $post_id );
		}

		if( !is_wp_error( $attachment_id_2 ) ){
			$img_2 = wp_get_attachment_url( $attachment_id_2 );
			update_field( 'field_5fcdebb16d71e', $attachment_id_2, $post_id );
		}

		if( !is_wp_error( $attachment_id_3 ) ){
			$img_3 = wp_get_attachment_url( $attachment_id_3 );
			update_field( 'field_5fcdebcc6d71f', $attachment_id_3, $post_id );
		}

		if($post_id){
			$retval['success'] = true;
			$retval['message'] = $attachment_id;
		}

		}
		else {
			$retval['success'] = false;
			$retval['message'] = 'error';
		}


	echo json_encode( $retval );
	wp_die();
}


add_action('wp_ajax_add_card_2', "add_card_2");
add_action('wp_ajax_nopriv_add_card_2', "add_card_2");
function add_card_2() {
	$retval = array(
		'success' => false,
		'message' => ""
	);
	
	$user_id = get_current_user_id();
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$worktime = $_POST['worktime'];
	$num = $_POST['num'];
	
	$clin_cat = $_POST['clinics_category'];
	$ser_cat = $_POST['services'];

	$adres = $_POST['adres'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

	$post_data = array(
		'post_title' => $title,
		'post_content' => '',
		'post_type' => 'clinics',
		'post_status'   => 'pending',
		'post_author'   => 1,
	);

	// Вставляем данные в БД
	$post_id = wp_insert_post( wp_slash($post_data) );

	if($post_id){
		$retval['success'] = true;

		wp_set_object_terms( $post_id, $clin_cat, 'clinics_category' );
		wp_set_object_terms( $post_id, $ser_cat, 'services' );

		//update_field('field_5fcdead06d712', $title, $post_id); //fio
		update_field('field_5fcf93529e35a', $desc, $post_id);
		update_field('field_5fcf8f8e0f208', $worktime, $post_id);
		update_field('field_5fcdf12cd7465', $num, $post_id);
		update_field('field_5fcf8f890f207', $adres, $post_id);
		update_field('field_5fcf8f990f209', $phone, $post_id);

		update_field('field_5fd024d3ae955', $post_id, 'user_'.$user_id);

		$attachment_id = media_handle_upload( 'file_4', $post_id );


		if( !is_wp_error( $attachment_id ) ){
			$img_1 = wp_get_attachment_url( $attachment_id );
			update_field( 'field_5fcdf14bd9bc5', $attachment_id, $post_id );
		}


		if($post_id){
			$retval['success'] = true;
			$retval['message'] = $attachment_id;
		}

		}
		else {
			$retval['success'] = false;
			$retval['message'] = 'error';
		}


	echo json_encode( $retval );
	wp_die();
}


add_action( 'wp_ajax_add_order', 'add_order' ); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
add_action( 'wp_ajax_nopriv_add_order', 'add_order' );

function add_order(){

	$user_name = $_POST['log'];
	$user_email = $_POST['log'];
	$user_pass = $_POST['pwd'];

	$response = array(
    	'error' => false,
    	'message' => '',
    );

	if ( !is_user_logged_in() ) {
		$random_password = $user_pass;
		$user_id = wp_create_user( $user_name, $random_password, $user_email );

		if ( is_wp_error( $user_id ) ) {
			$response['error'] = true;
			$error_string = $user_id->get_error_code();

			$error_msg = '';
			switch ($error_string) {
				case 'existing_user_login':
					$error_msg = 'Указанный e-mail уже зарегистрирован!';
					break;
				
				case 'empty_user_login':
					$error_msg = 'Поле e-mail не может быть пустое. Укажите ваш e-mail.';
					break;
			}
			$response['error_message'] = 'Ошибка регистрации нового пользователя. '.$error_msg;

			exit(json_encode($response));
		}
		else {
			clean_user_cache($user_id);
			wp_clear_auth_cookie();
			wp_set_current_user($user_id);
			wp_set_auth_cookie($user_id, true, false);
			    
			$user = get_user_by('id', $user_id);
			update_user_caches($user);
			//wp_new_user_notification( $user_id, 'user' );
		}
	}

 
 	
 	

    exit(json_encode($response));
}


add_filter( 'woocommerce_get_item_data', 'display_cart_item_custom_meta_data', 10, 2 );
function display_cart_item_custom_meta_data( $item_data, $cart_item ) {
    $meta_key = 'PR CODE';
    if ( isset($cart_item['size']) ) {
        $item_data[] = array(
            'key' => 'Размер',
            'value'     => $cart_item['size'],
        );
    }
    return $item_data;
}


add_action('wp_ajax_delete_from_cart_event', "delete_from_cart_event");
add_action('wp_ajax_nopriv_delete_from_cart_event', "delete_from_cart_event");
function delete_from_cart_event() {
	$retval = array(
		'success' => false,
		'message' => ""
	);
	if( !function_exists( "WC" ) ) {
		$retval['message'] = "woocommerce not installed";
	} elseif( empty( $_POST['cart_item_id'] ) ) {
		$retval['message'] = "no product id provided";
	} else {
		$cart_item_id = $_POST['cart_item_id'];

		$retval['success'] = WC()->cart->remove_cart_item($cart_item_id);

			if( !$retval['success'] ) {
				$retval['message'] = "product could not be removed from cart";
			} else {
				$retval['message'] = "product removed from cart";
			}
		//}
	}
	echo json_encode( $retval );
	wp_die();
}


function my_custom_cart_contains( $product_id ) {
	$cart = WC()->cart;
	$cart_items = $cart->get_cart();
	if( $cart_items ) {
		foreach( $cart_items as $item ) {
			$product = $item['data'];
			if( $product_id == $product->id ) {
				return true;
			}
		}
	}
	return false;
}

if ( ! function_exists( 'attribute_slug_to_title' ) ) {
	function attribute_slug_to_title( $attribute ,$slug ) {
		global $woocommerce;
		if ( taxonomy_exists( esc_attr( str_replace( 'attribute_', '', $attribute ) ) ) ) {
			$term = get_term_by( 'slug', $slug, esc_attr( str_replace( 'attribute_', '', $attribute ) ) );
			if ( ! is_wp_error( $term ) && $term->name )
				$value = $term->name;
		} else {
			$value = apply_filters( 'woocommerce_variation_option_name', $value );
		}
		return $value;
	}
}






// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
function fetch(){

	var symb = jQuery('#keyword').val();

    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: { action: 'data_fetch', keyword: symb },
        success: function(data) {
        	console.log(data);
        	if(symb.length >= 3){
	        	jQuery('#datafetch').css( 'display', 'block' );
	            jQuery('#datafetch').html( data );
        	}
        	else {
        		jQuery('#datafetch').css( 'display', 'none' );
        	}
        }
    });

}
</script>

<?php
}

// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'veterinari' ) );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>

            <a href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a><br/>

        <?php endwhile;
        wp_reset_postdata();  
    endif;

    die();
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Настройки сайта',
	));

	
}


function mb_htmlsitemap( $atts ) {
    global $post;


    echo '<ul class="htmlsitemap-list">' . "\n";
    $pages = get_pages(array('posts_per_page' => '-1'));
    foreach ($pages as $page) {
            echo "\t" . '<li><a href="' . get_permalink($page->ID) . '">'."$page->post_title" . '</a></li>' . "\n";
        }
    echo '</ul>' . "\n";

}

add_shortcode( 'htmlsitemap', 'mb_htmlsitemap' );


function get_excerpt( $count ) {
$permalink = get_permalink($post->ID);
$excerpt = get_the_content();
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, $count);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = '<p>'.$excerpt.'...</p>';
return $excerpt;
}

add_filter( 'body_class','halfhalf_body_class' );
function halfhalf_body_class( $classes ) {
 
    if ( is_page_template( 'page-home.php' ) ) {
        $classes[] = 'bg1';
    }

    if ( is_page_template( 'page-about.php' ) ) {
        $classes[] = 'bg1';
    }
		if ( is_page_template( 'page-bot.php' ) ) {
        $classes[] = 'bg2';
    }
	if ( is_page_template( 'page-whatsup.php' ) ) {
        $classes[] = 'bg2';
    }
	if ( is_page_template( 'page-rasp.php' ) ) {
        $classes[] = 'bg2';
    }

    if ( is_page_template( 'page-consult.php' ) ) {
        $classes[] = 'bg2';
    }

    if ( is_page_template( 'page-contacts.php' ) ) {
        $classes[] = 'bg2';
    }

    if ( is_page_template( 'page-mod1.php' ) ) {
        $classes[] = 'bg2';
    }

		if ( is_page_template( 'page-reviews.php' ) ) {
			$classes[] = 'bg2';
	}

    if ( is_page_template( 'page-mod2.php' ) ) {
        $classes[] = 'bg2';
    }

    if ( is_page_template( 'page-mod3.php' ) ) {
        $classes[] = 'bg2';
    }

    if ( is_page_template( 'page-mod4.php' ) ) {
        $classes[] = 'bg2';
    }

    if ( is_page_template( 'page-mod5.php' ) ) {
        $classes[] = 'bg2';
    }

    if ( is_page_template( 'page-mod6.php' ) ) {
        $classes[] = 'bg2';
    }

    if ( is_page_template( 'page-mod7.php' ) ) {
        $classes[] = 'bg2';
    }
	 if ( is_page_template( 'page-partners.php' ) ) {
        $classes[] = 'bg2';
    }

    if ( is_page_template( 'page-mod8.php' ) ) {
        $classes[] = 'bg2';
    }

    if ( is_page_template( 'page-modules.php' ) ) {
        $classes[] = 'bg1';
    }

    if ( is_page_template( 'page-mod9.php' ) ) {
        $classes[] = 'bg2';
    }

    if ( is_page_template( 'page-mod10.php' ) ) {
        $classes[] = 'bg2';
    }
	if ( is_page_template( 'page-services.php' ) ) {
        $classes[] = 'bg1';
    }
     if ( is_page_template( 'page-comp1.php' ) ||  is_page_template( 'page-comp2.php' ) || is_page_template( 'page-comp3.php' ) || is_page_template( 'page-comp4.php' ) || is_page_template( 'page-comp5.php' ) || is_page_template( 'page-comp6.php' ) || is_page_template( 'page-comp7.php' )|| is_page_template( 'page-comp8.php' ) || is_page_template( 'page-comp9.php' )) {
        $classes[] = 'bg2';
    }

    if ( is_page_template( 'page-prices.php' ) ) {
        $classes[] = 'bg2';
    }
	 if ( is_page_template( 'page-qwiz.php' ) ) {
        $classes[] = 'bg2';
    }

    if( is_category() ) {
		$classes[] = 'bg2';
    }

    if( is_single() ) {
		$classes[] = 'bg2';
    }
     
    return $classes;
    
     
}



