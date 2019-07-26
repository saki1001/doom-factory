<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Doom_Factory
 */
	$permalink = get_the_permalink();
	$title = get_the_title();
	$buyButton = get_field('buy_button');
	$ID = get_the_ID();
	$featured_image = get_the_post_thumbnail($ID);
	$images = get_field('images');
?>

<article id="post-<?php echo $ID; ?>">
	<section class="product-content">
		<h1 class="title">
			<?php echo $title; ?>
		</h1>

		<div id="product"></div><!-- #product -->
		<script type="text/javascript">
			productID = <?php echo get_field('product_id', $ID); ?>;
		</script>
		<?php
			// echo $buyButton;
		?>
		<script type="text/javascript" src="/wp-content/themes/doomfactory/js/buy-button.js"></script>
	</section>

	<section class="product-images">
		<?php
			if( !empty($images) ) :
				foreach( $images as $image ) :
					$size = 'large';
					$source = $image['sizes']['large'];
					$width = $image['sizes'][$size . '-width'];
					$height = $image['sizes'][$size . '-height'];
					$caption = $imageArray['caption'];
		?>
				<div class="image">
					<img src="<?php echo $source; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="<?php echo $caption; ?>" />
					<figcaption><?php echo $caption; ?></figcaption>
				</div>
		<?php
				endforeach;

			elseif( $featured_image ) :
		?>
				<div class="image">
					<?php echo $featured_image; ?>
				</div>
		<?php
			else :
				// do nothing
			endif;	
		?>

	</section><!-- .product-images -->
</article><!-- #post-## -->
