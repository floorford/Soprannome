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

		<?php do_action( 'oblique_archive_title_top_svg' ); ?>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/shows', 'content', get_post_format() );?>
			<div class="svg-container svg-block page-header-svg">
			<?php do_action( 'oblique_archive_title_bottom_svg' ); ?>
			</div>

			<?php do_action( 'oblique_single_post_navigation' ); ?>

		<?php
		endwhile; // end of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
