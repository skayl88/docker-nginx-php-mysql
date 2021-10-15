<?php get_header();?>
<?php the_post();?>



<div class="module-desc">
  <div class="container">
    
    <div class="httl2"><?php the_title(); ?></div>

    <div class="text-box-white">
      <?php the_content();?>
    </div>

  </div>
</div>









<?php get_footer(); // подключаем footer.php ?>
