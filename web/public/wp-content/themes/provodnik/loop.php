<?php
/**
 * Запись в цикле (loop.php)
 * @package WordPress
 * @subpackage eveXA-clean-theme
 */ 
?>
<div class="col-lg-4 col-sm-6">
	<a href="<?php the_permalink(); ?>" class="item">
		<div class="img" style="background: url('<?php echo get_the_post_thumbnail_url(); ?>') center top no-repeat;"></div>
		<div class="bottom">
			<div class="ttl"><?php the_title();?></div>
			<div class="txt">
				<?php the_excerpt();?>
			</div>
		</div>
	</a>
</div>