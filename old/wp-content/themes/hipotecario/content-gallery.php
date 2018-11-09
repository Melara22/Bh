<?php
/**
 * The template used for displaying content in index.php.
 *
 * @package StagFramework
 * @subpackage yttor
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); stag_markup_helper( array( 'context' => 'entry' ) ); ?>>

	<div class="row custom-thumb-container inner-product-container-md">
		<?php if ( has_post_thumbnail() ) : ?>
		<figure class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('medium', array("class"=>"img-responsive center-block w100") ); ?><div class="overlay"><div class="dtable"><div class="innerd"><h6 class="uppercase text-center whitecolor margin-bottom-15"><?php the_title(); ?></h6><div class="uppercase btn gold colorblack display-block margin0auto max-width-150px">ver álbum</div></div></div></div></a>
		</figure>
		<?php endif; ?>
	</div>

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary"<?php stag_markup_helper( array( 'context' => 'entry_content' ) ); ?>>
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content hidden"<?php stag_markup_helper( array( 'context' => 'entry_content' ) ); ?>>

		<?php
		//echo apply_filters('the_content',get_the_content());
		/*
		$post = get_post( get_the_ID() ); 
		$content = apply_filters('the_content', $post->post_content); 
		echo trim(substr($content,0,100))."...";
		*/
		?>

		<?php //the_content( __( 'Read More<span class="meta-nav">&hellip;</span>', 'stag' ) ); ?>
		<?php
			/*wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'stag' ),
				'after'  => '</div>',
			) );*/
		?>
		
		
		
		

	</div><!-- .entry-content -->

	<?php //get_template_part( 'content', 'single-snshare' ); ?>
	
	<?php endif; ?>
</article><!-- #post-## -->


