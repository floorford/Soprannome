<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>


<h2><?php the_field('show_name');?></h2>

<?php $date = get_field('show_date');
$date2 = date("F j, Y", strtotime($date)); ?>

<div class="date"><?php echo $date2;?></div>

<?php $image = get_field('show_poster');

		if(get_field('show_poster')) { ?>
		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /> <?php
	} ?>

<?php the_field('show_venue'); ?>
<?php the_field('show_description'); ?>

<a href="http://192.168.33.110/contact-us/">Book Us For A Show</a>
