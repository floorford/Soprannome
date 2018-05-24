<?php
/**
 * The template for displaying all single posts.
 *
 * @package Oblique
 */

get_header(); ?>
	<?php
	$single_classes = apply_filters( 'oblique_main_classes', 'site-main' );
	?>
	<div id="primary" class="content-area">
		<main id="main" class="<?php echo esc_attr( $single_classes ); ?>" role="main">

		<?php
		while ( have_posts() ) :
			the_post();
?>

			<?php get_template_part( 'content', 'singleshow' ); ?>

			<?php do_action( 'oblique_single_post_navigation' ); ?>

		<?php
		endwhile; // end of the loop.
		?>

		</main><!-- #main -->
		<?php do_action( 'oblique_single_sidebar' ); ?>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
