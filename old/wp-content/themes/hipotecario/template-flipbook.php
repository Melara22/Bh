<?php
/**
 * Template Name: Flipbook
 */


get_header() ?>

<?php 
include_once(get_template_directory().'/assets/flipbook/php/settings.php');
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
					<?php the_content(); ?>

					<div class="row no-margin no-padding">

						
											
						<div id="flipbook-container-1" class="flipbook-container">
							
							<!-- Flip book -->
							<div id="flipbook-1" class="flipbook">
								<!-- Start Flip Book Pages -->
								
								<!-- Cover -->
								<div class="fb-page">
									<div class="page-content">
										<div class="container">
											<?php 
											$portada = get_field("imagen_portada");
											//print_r($portada);
											?>
											<img src="<?php echo $portada["sizes"]["medium_large"];?>" class="bg-img" />
											<img src="<?php echo $portada["url"];?>" class="bg-img zoom-large"/>
										</div>
									</div>
								</div>

								<?php
								if( have_rows("book") )
								{

									$dpages = get_field("book");
									//print_r($dpages);

									for($p=0; $p < count($dpages); $p++ )
									{
									?>
									<div class="fb-page double">
										<div class="page-content">
											<div class="container">
												<img src="<?php echo $dpages[$p]["single_image"]["sizes"]["medium_large"];?>" class="bg-img"/>
												<img src="<?php echo $dpages[$p]["single_image"]["url"];?>" class="bg-img zoom-large"/>
											</div>
										</div>
									</div>
									<?php
									}

								}
								?>
								

								<?php 
								$pagebackcover = get_field("imagen_contraportada");
								//print_r($pagebackcover);

								if($pagebackcover)
								{
								?>
								<!-- Back Cover -->
								<div class="fb-page">
									<div class="page-content">
										<div class="container">
											<img src="<?php echo $pagebackcover["sizes"]["medium_large"];?>" class="bg-img" />
											<img src="<?php echo $pagebackcover["url"];?>" class="bg-img zoom-large"/>
										</div>
									</div>
								</div>
								<?php } ?>
								
								<!-- end Flip Book Pages -->
								
							</div> <!-- end Flip Book -->
							
							<!-- Flip Book Navigation -->
							<div id="fb-nav-1" class="fb-nav mobile spread">
								<ul>
									<!-- <li class="toc round">Table Of Content</li> -->
									<li class="zoom round">Zoom</li>
									<li class="slideshow round">Slide Show</li>
									<li class="show-all round">Show All Pages</li>
								</ul>
										
							</div> <!-- end FLip Book Nav -->
						</div> <!-- end Flip Book Container -->
					
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
