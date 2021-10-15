<?php
get_header(); 
?> 

<div class="page-content">
	<div class="container">
		<div class="breadcrumbs">
			<span>Главная</span> > <a href="">Блог</a>
		</div>
		<div class="page-ttl">База знаний OLLA Berkana</div>
		
		<div class="blog-list">
			<div class="row">
				<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
					<?php get_template_part('loop'); // для отображения каждой записи берем шаблон loop.php ?>
				<?php endwhile; // конец цикла
				else: echo '<p>Нет записей.</p>'; endif; // если записей нет, напишим "простите" ?>	 
				<?php pagination(); // пагинация, функция нах-ся в function.php ?>				
			</div>
		</div>
	</div>
</div>

<?php get_footer(); // подключаем footer.php ?>