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
			// HOMEPAGE
			if( is_front_page() || is_home() ) :

				// Slideshow and other page content
				echo do_shortcode(get_post_field('post_content'));

				// Feature Products
				$featured_products = get_field('featured_products');
				
				if( !empty($featured_products) ):
			?>
				<div class="products">
			<?php
					foreach( $featured_products as $product ) :
						global $post; 
						$post = get_post( $product->ID );
						setup_postdata( $post );

						get_template_part( 'template-parts/content/content', 'grid' );

						wp_reset_postdata();
					endforeach;
			?>
				</div><!-- .products -->
			<?php
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
