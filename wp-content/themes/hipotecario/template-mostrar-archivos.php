<?php
/**
 * Template Name: Mostrar archivos
 */


get_header();

$colclass= "col-lg-6 col-md-6 col-sm-12 col-xs-12";
$colfwidth= "col-lg-12 col-md-12 col-sm-12 col-xs-12";
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

					<?php the_content(); 

					global $post;
				    $post_slug=$post->post_name;
				    ?>

					<div class="row no-margin padding-top-40 padding-bottom-40 <?php echo $post_slug; ?>">

					<?php 
					if(have_rows("archivos"))
					{
						
						$images = get_field("archivos");
						//print_r($images);

						for($i=0; $i < count($images); $i++)
						{

							?>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 single-image-file">
								<a href="<?php echo $images[$i]["imagen"]["url"];?>">
									<img src="<?php echo $images[$i]["imagen"]["sizes"]["medium"];?>" class="img-responsive center-block">
									<p class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $images[$i]["fecha"];?></p>
								</a>
							</div>
							<?php

						}

					}
					?>
					
					</div>

					

					<?php
						/*
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'stag' ),
							'after'  => '</div>',
						) );
						*/


					echo get_field("texto_complementario");
					?>
				</div><!-- .entry-content -->

				<?php //get_template_part( 'content', 'gallery' ); ?>

				<?php //get_template_part( 'content', 'single-nextprev' ); ?>

				<?php //get_template_part( 'content', 'single-related' ); ?>


			</article><!-- #post-## -->

		</main><!-- #main -->
	</div><!-- #primary -->



<?php get_sidebar(); ?>
<?php get_footer(); ?>
