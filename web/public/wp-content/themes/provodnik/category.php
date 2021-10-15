<?php
/**
 * Шаблон рубрики (category.php)
 * @package WordPress
 * @subpackage eveXA-clean-theme
 */
get_header(); // подключаем header.php ?> 

<div class="b1 b1-5">
  <div class="container">
    <div class="box">
      <div class="page-title">База знаний OLLA Berkana</div>
      <p>
      Добро пожаловать в базу знаний OLLA Berkana. Здесь мы собрали для Вас всю самую полезную и актуальную информацию, не только о том, как максимально эффективно использовать систему CRM OLLA Berkana для развития и увеличения прибыли Вашего детского учебного образовательного учреждения, но и просто полезные советы, кейсы наших клиентов и экспертные рекомендации по эффективному продвижению и росту компании. Если Вы также хотите поделиться своим успехов, мы будем рады провести с Вами интервью и разместить в нашей базе знаний, а за это мы с удовольствием подарим Вам 1 месяц пользования ОЛЛА Беркана бесплатно!

      </p>
    </div>
	  <div class="blog_img"><img src="http://ollaberkana.ru/wp-content/uploads/2021/07/main_blog.png" alt="blog">
        </div>
	   <div class="btn-box">
				 <a id="btn_quiz" class="btn3" href="/promotions">Пройти обучение</a>
                <a id="btn-demo" class="btn4 v2 btn-demo" href=""><span>Получить 10 дней бесплатно</span></a>
            </div>
  </div>
</div>  

<div class="container">
  <div class="page-sidebar">

    <div class="content">
      <div class="posts-list grid">
        <?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
        <div class="grid-item">
          <a class="item" href="<?php the_permalink(); ?>">
            <div class="img" style="background: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>') center center no-repeat;"></div>
            <div class="desc">
              <div class="ttl"><?php the_title(); ?></div>
              <div class="exerpt">
                <?php echo get_excerpt(110); ?>
              </div>
            </div>
          </a>
        </div>
        <?php endwhile; // конец цикла
        else: echo '<p>Нет записей.</p>'; endif; // если записей нет, напишим "простите" ?>  
          
          
      </div>
      <div class="loading"><?php pagination(); // пагинация, функция нах-ся в function.php ?></div>
    </div>
  </div>
</div>




<?php get_footer(); // подключаем footer.php ?>

<script>
    var $grid = $('.grid').masonry({
      itemSelector: '.grid-item',
      //columnWidth: '.grid-sizer',
      percentPosition: true
    });
    // layout Masonry after each image loads
    $grid.imagesLoaded().progress( function() {
      $grid.masonry('layout');
    });
  </script>