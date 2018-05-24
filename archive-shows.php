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

 		<?php
 		// output the contents of the talk page
 		$query_args = array(
 			'page_id' => '274'
 		);

 		$result = new WP_Query( $query_args );

 		if ( $result->have_posts() ) {
 			while ( $result->have_posts() ) : $result->the_post(); ?>
 				<header class="entry-header">
 					<h1 class="entry-title"><?php the_title(); ?></h1>
 				</header>
 				<div class="hentry entry-content">
 					<?php the_content(); ?>
 				</div>
 			<?php endwhile; // End the loop
 		}
 		wp_reset_query();
 		// output of talks page complete
 		?>
 	</main><!-- .site-main -->

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

 	// The Loop
 	if ( $the_query->have_posts() ) { ?>
 		<div class="next-talks-wrapper">
 			<div class="header-wrapper">
 				<header class="page-header">
 						<h1 class="entry-title">Where am I next?</h1>
 				</header><!-- .page-header -->
 			</div>
 			<?php

 			while( $the_query->have_posts() ) : $the_query->the_post(); ?>
 				<div class="talk-wrapper">
 					<div class="talk">
 					<div class="talk-content">
 						<?php
 						/*
 						* Include the Post-Format-specific template for the content.
 						* If you want to override this in a child theme, then include a file
 						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
 						*/
 						get_template_part( 'template-parts/shows', 'content' );
 						?>
 					</div>
 					</div>
 				</div>
 			<?php endwhile; // End the loop ?>
 		</div> <!-- end next-talks-wrapper -->
 	<?php
 	wp_reset_query();
 	} else {
 		get_template_part( 'content', 'none' );
 	} ?>

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

 	// The Loop
 	if ( $the_query->have_posts() ) { ?>
 		<div class="next-talks-wrapper">
 			<div class="header-wrapper">
 				<header class="page-header">
 						<h1 class="entry-title">What have I been up to?</h1>
 				</header><!-- .page-header -->
 			</div>
 			<?php

 			while( $the_query->have_posts() ) : $the_query->the_post(); ?>
 				<div class="talk-wrapper">
 					<div class="talk">
 					<div class="talk-content previous-talk">
 						<h2>
 						<?php
 						if (get_field('show_poster') ) {
 						?>
 							<a href=" <?php the_field('show_venue'); ?> " target="blank"><?php the_field('show_name'); ?></a>
 						<?php } else {
 							the_field('show_name');
 						}
 						?></h2><?php
 						$date = get_field('show_date');
 						$date2 = date("F j, Y", strtotime($date));

 						?> <div class="date"><?php echo $date2;?></div> <?php
 						the_field('show_description'); ?>

 					</div>
 					</div>
 				</div>
 			<?php endwhile; // End the loop ?>
 		</div> <!-- end next-talks-wrapper -->
 	<?php
 	wp_reset_query();
 	} else {
 		get_template_part( 'content', 'none' );
 	} ?>


 </div><!-- .content-area -->

 <?php get_sidebar(); ?>
 <?php get_footer(); ?>
