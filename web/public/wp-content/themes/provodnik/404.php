<?php
/**
 * Страница 404 ошибки (404.php)
 * @package WordPress
 * @subpackage eveXA-clean-theme
 */
get_header(); // Подключаем header.php ?>
<section>
	<div class="container">
		<div class="row">
			<div class="<?php content_class_by_sidebar(); // функция подставит класс в зависимости от того есть ли сайдбар, лежит в functions.php ?>">
				<h1>Ошибка 404!</h1>
				
			</div>
			
		</div>
	</div>
</section>
<?php get_footer(); // подключаем footer.php ?>