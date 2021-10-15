<?php
/**
 * Шаблон поиска (search.php)
 * @package WordPress
 * @subpackage eveXA-clean-theme
 */
get_header(); // подключаем header.php ?> 

<section class="section_catalog">
    <div class="container">
      <div class="title_page">
        <h1><?php printf('Поиск по строке: %s', get_search_query()); // заголовок поиска ?> </h1>
      </div>
      <?php 
      //print_r($_GET['pa_vstroennaya-pamyat']); 
      ?>
       
      

      <article class="article">
        
        
        <div class="div_catalog">

        	
          <?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp
          $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); ?>
					<div class="products_item"> <span class="span_star"></span><a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" alt=""></a>
		            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		            <div class="div_price"><?php echo number_format(get_post_meta( get_the_ID(), '_price', true ), 0, '', ' '); ?> <span class="rubl">a</span></div>
		          </div>
				<?php endwhile; // конец цикла
				else: echo '<p>Нет записей.</p>'; endif; // если записей нет, напишим "простите" ?>	 
				<?php pagination(); // пагинация, функция нах-ся в function.php ?>
          

        </div>
      </article>
    </div>
  </section>

  <section class="section_tags">
    <div class="container">
      <ul class="ul_tags">
        <li><a href="#">#Новые часы Apple Watch 5</a></li>
        <li><a href="#">#Чехлы для новых Iphone 11/Pro/Max</a></li>
        <li><a href="#">#Дешевые AirPods</a></li>
        <li><a href="#">#Новые IPad 11</a></li>
        <li><a href="#">#Стекла для iPhone</a></li>
        <li><a href="#">#Новые Apple AirPods 2</a></li>
        <li><a href="#">#Чехлы для Iphone X</a></li>
        <li><a href="#">#MacBook Pro</a></li>
        <li><a href="#">#iMac Retina 2019</a></li>
      </ul>
    </div>
  </section>
  <section class="section_discounts">
    <div class="container">
      <div class="div_discounts">
        <div class="discounts_left">
          <h4>Макбуки <br>
            со скидками до <span>20%</span></h4>
          <a href="/product-category/noutbuki/" class="link_macbuk"></a> </div>
        <div class="discounts_right">
          <h4><span>Полная <br>
            коллекция </span>аксессуаров Apple</h4>
          <a href="/product-category/aksessuary/" class="link_macbuk"></a> </div>
      </div>
    </div>
  </section>
  <section class="section_whatch">
    <div class="container">
      <div class="div_whatch">
        <h2>Apple Whatch <span>на каждый день</span></h2>
        <img src="<?php echo get_template_directory_uri(); ?>/images/div_whatch.jpg" alt=""> </div>
    </div>
  </section>


<?php get_footer(); // подключаем footer.php ?>