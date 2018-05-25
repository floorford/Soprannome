<?php
/**
 * The template part for displaying show page content
 *
 * @package Oblique
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!--***************** SHOW TITLE *******************-->
	<div class="entry-content">
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="page-title"><a class="page-title" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header>

<!--**************** SHOW POSTER *******************-->
		<div class="entry-thumb">
			<?php $image = get_field('show_poster');
				if( get_field('show_poster') ) { ?>
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /> <?php
				} ?>
		</div>
<!--***************** SHOW INFO ********************-->

		<?php $date = get_field('show_date');
		$date2 = date("F j, Y", strtotime($date)); ?>

		<h3 class="page-title"><?php echo $date2;?></h3>

		<h3 class="page-title"><?php the_field('show_venue'); ?></h3>
		<br>
		<p><?php the_field('show_description'); ?></p>
		<p><a href="<?php the_field('buy_tickets')?>">Buy Tickets</a></p>
		<br>
		<hr class="style14">
		<br>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
