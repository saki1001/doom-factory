<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Doom_Factory
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php

			// find todays date
			$date = date('Ymd');

			if( is_front_page() || is_home() ) :

				// Include page content as intro?
				the_content();

				// args
				$args = array(
					'numberposts'	=> -1,
					'posts_per_page' => -1,
					'post_type'		=> 'product',
					'orderby'   => 'date',
					'order' => 'DESC'
				);

				// query
				$the_query = new WP_Query( $args );
				
				if( $the_query->have_posts() ):

					while ( $the_query->have_posts() ) : $the_query->the_post();
						get_template_part( 'template-parts/content/content', 'grid' );
					endwhile;
				else :
					get_template_part( 'template-parts/content/content', 'none' );
				endif;

				wp_reset_query();

			else :
				while ( have_posts() ) : the_post();
					
					get_template_part( 'template-parts/content/content', 'page' );

				endwhile; // End of the loop.
			endif;

			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
