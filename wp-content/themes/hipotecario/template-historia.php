<?php
/**
 * Template Name: Historia
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
					<?php the_content(); ?>

					<div class="cronologia">
					<?php

					if( have_rows("cronologia") )
					{

						$cron = get_field("cronologia");

						//print_r($cron);
						//<ul class="years nolist">
						?>
						
						<table width="100%">
						<?php
						for($c=0; $c<count($cron); $c++)
						{

							if($c==0){ $h = ""; $a="active"; }else{ $h = "hidden"; $a=""; }

							//echo "<li><a href='javascript:;' data-n='".$c."'>".$cron[$c]["anhio"]."</a></li>";
							echo "<tr>
									<td width='60px' class='year-container'>
										<a href='javascript:;' data-d='".$c."' class='yearlink ".$a."'>".$cron[$c]["anhio"]."</a>
									</td>
									<td class='relative'>
										<div id='crondesc-".$c."' class='croninfo ".$h."'>".$cron[$c]["descripcion"]."</div>
									</td>
								  </tr>";

						}
						//</ul>
						?>
						</table>
						<?php

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
