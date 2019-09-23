<?php
/**
 * The template for displaying the Home Page.
 *
 * @package Doom_Factory
 */
?>
			<div class="slideshow-container">
			<?php
				// Slideshow and other page content
				echo do_shortcode(get_post_field('post_content'));
			?>
				<div class="frame"></div>
			</div><!-- .slideshow-container -->
			<?php
				// Featured Products
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