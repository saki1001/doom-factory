<?php
/**
 * Template part for displaying posts as a grid in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Doom_Factory
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail('medium'); ?>

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	</a>
</article><!-- #post-## -->
