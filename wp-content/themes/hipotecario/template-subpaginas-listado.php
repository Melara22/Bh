<?php
/**
 * Template Name: Sub páginas listado
 */


get_header() ?>

<?php 
	
?>


<div id="primary" class="content-area">
		<main id="main" class="site-main"<?php stag_markup_helper( array( 'context' => 'content', 'post_type' => 'page' ) ); ?>>



			<article id="post-<?php the_ID(); ?>" <?php post_class(); stag_markup_helper( array( 'context' => 'entry' ) ); ?>>
				<header class="entry-header">
					<?php if ( has_post_thumbnail() ) : ?>
						<figure class="post-thumbnail hidden">
							<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('full'); ?></a>
						</figure>
					<?php endif; ?>

					<div class="entry-meta hidden">
						<?php stag_posted_on(); ?>
					</div><!-- .entry-meta -->

					<h1 class="entry-title"<?php stag_markup_helper( array( 'context' => 'title' ) ); ?>><?php the_title(); ?></h1>
				</header><!-- .entry-header -->
				
				<div class="entry-content"<?php stag_markup_helper( array( 'context' => 'entry_content' ) ); ?>>
					
					<?php
					$args = array(
						'post_parent' => get_the_ID(),
						'post_type'   => 'page', 
						'numberposts' => -1,
						'order' => 'ASC',
						'post_status' => 'publish' 
					);

					$children = get_children( $args );

					//print_r($children);
					?>
					<ul class="nolist margin-bottom-40">
						<?php
						
						foreach ( $children as $child )
						{
							?>
							<li>
								<a class="uppercase" href="<?php echo get_permalink($child->ID); ?>">
									<?php echo $child->post_title ; ?>
								</a>
							</li>
							<?php
						}
						?>
					</ul>

				</div><!-- .entry-content -->

				<?php //get_template_part( 'content', 'gallery' ); ?>

				<?php //get_template_part( 'content', 'single-nextprev' ); ?>

				<?php //get_template_part( 'content', 'single-related' ); ?>


			</article><!-- #post-## -->

		</main><!-- #main -->
	</div><!-- #primary -->



<?php get_sidebar(); ?>
<?php get_footer(); ?>
