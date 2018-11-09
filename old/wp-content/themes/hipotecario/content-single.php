<?php
/**
 * Template for displaying content on single posts.
 *
 * @package StagFramework
 * @subpackage yttor
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); stag_markup_helper( array( 'context' => 'entry' ) ); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) : ?>
			<figure class="post-thumbnail hidden">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('full'); ?></a>
			</figure>
		<?php endif; ?>

		<div class="entry-meta">
			<?php stag_posted_on(); ?>
		</div><!-- .entry-meta -->

		<h1 class="entry-title"<?php stag_markup_helper( array( 'context' => 'title' ) ); ?>><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
	
	<div class="entry-content"<?php stag_markup_helper( array( 'context' => 'entry_content' ) ); ?>>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'stag' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php get_template_part( 'content', 'gallery' ); ?>

	<?php get_template_part( 'content', 'single-nextprev' ); ?>

	<?php get_template_part( 'content', 'single-related' ); ?>


</article><!-- #post-## -->
