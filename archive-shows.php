<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Oblique
 */

 get_header(); ?>

 	<div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">

<!--************** PAGE HEADER **************-->
    <?php do_action( 'oblique_archive_title_top_svg' ); ?>
		<header class="page-header">
		<h1 class="page-title">Upcoming Shows</h1>
    <a id="CTAbutton" href="http://192.168.33.110/contact-us/">Contact Us</a>
		</header><!-- .page-header -->
    <div class="svg-container svg-block page-header-svg">
    <?php do_action( 'oblique_archive_title_bottom_svg' ); ?>
    </div>

<!--************** UPCOMING SHOWS **************-->
  <!-- QUERY SETUP -->
  <?php
 	$today = date('Ymd');
 	$query_args = array(
 		'post_type' 	=> 'shows',
 		'meta_query' => array(
 			array(
 				'key'		=> 'show_date',
 				'compare'	=> '>=',
 				'value'		=> $today,
 			)
 			),
 		'meta_key'	=> 'show_date',
 		'orderby'	=> 'meta_value_num',
 		'order'		=> 'ASC'
 	);
 	$the_query = new WP_Query( $query_args );

 	// OUTPUTTING THE FIRST LOOP
 	if ( $the_query->have_posts() ) {
    do_action( 'oblique_archive_title_top_svg' ); ?>

 			<?php
 			while( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<?php
				/*
				* Include the Post-Format-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Format name) and that will be used instead.
				*/
				get_template_part( 'template-parts/shows', 'content', get_post_format() ); ?>
 			<?php endwhile; // End the loop ?>
      <div class="svg-container svg-block page-header-svg">
      <?php do_action( 'oblique_archive_title_bottom_svg' ); ?>
      </div>

 	<?php
 	wp_reset_query();
 	} else {
    do_action( 'oblique_archive_title_top_svg' ); ?>
    <header class="page-header">
    <h1 class="page-title">No Upcoming Shows</h1>
    </header><!-- .page-header -->
    <div class="svg-container svg-block page-header-svg">
    <?php do_action( 'oblique_archive_title_bottom_svg' ); ?>
    </div> <?php
 	} ?>

<!--************** PREVIOUS SHOWS **************-->
<!-- QUERY SETUP -->
 	<?php
 	$today = date('Ymd');
 	$query_args = array(
 		'post_type' 	=> 'shows',
 		'posts_per_page' => 3,
 		'meta_query' => array(
 			array(
 				'key'		=> 'show_date',
 				'compare'	=> '<',
 				'value'		=> $today,
 			)
 			),
 		'meta_key'	=> 'show_date',
 		'orderby'	=> 'meta_value_num',
 		'order'		=> 'DESC'
 	);
 	$the_query = new WP_Query( $query_args );

 	// OUTPUTTING THE SECOND LOOP

 	if ( $the_query->have_posts() ) { ?>

    <?php do_action( 'oblique_archive_title_top_svg' ); ?>
		<header class="page-header">
			<h1 class="page-title">Previous Shows</h1>
		</header><!-- .page-header -->
    <div class="svg-container svg-block page-header-svg">
      <?php do_action( 'oblique_archive_title_bottom_svg' ); ?>
    </div>
    <?php do_action( 'oblique_archive_title_top_svg' ); ?>

    <?php
    while( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <?php
      /*
      * Include the Post-Format-specific template for the content.
      * If you want to override this in a child theme, then include a file
      * called content-___.php (where ___ is the Post Format name) and that will be used instead.
      */
      get_template_part( 'template-parts/shows', 'content', get_post_format() ); ?>
    <?php endwhile; // End the loop ?>
    <div class="svg-container svg-block page-header-svg">
    <?php do_action( 'oblique_archive_title_bottom_svg' ); ?>
    </div>


 	  <?php wp_reset_query();
 	} else {
    do_action( 'oblique_archive_title_top_svg' ); ?>
		<header class="page-header">
			<h1 class="page-title">No Previous Shows</h1>
		</header><!-- .page-header -->
    <div class="svg-container svg-block page-header-svg">
      <?php do_action( 'oblique_archive_title_bottom_svg' ); ?>
    </div> <?php
 	} ?>


 </div><!-- .content-area -->
 </main><!-- .site-main -->

 <?php get_sidebar(); ?>
 <?php get_footer(); ?>
