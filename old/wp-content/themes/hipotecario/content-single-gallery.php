<?php
/**
 * Template for displaying content on single posts.
 *
 * @package StagFramework
 * @subpackage yttor
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); stag_markup_helper( array( 'context' => 'entry' ) ); ?>>
	
	<div class="entry-content"<?php stag_markup_helper( array( 'context' => 'entry_content' ) ); ?>>
		<?php //the_content(); ?>
		<?php
			/*
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'stag' ),
				'after'  => '</div>',
			) );
			*/

			if( have_rows("galeria") )
			{

				$galeria = get_field("galeria");

				//print_r($galeria);
				?>
				<img src="<?php echo $galeria[0]["imagen"]["url"];?>" class="img-responsive center-block w100 hidden">
				<div class="row no-margin no-padding loader-bh">

					<div id="show-single-full-image-gallery" class="row no-margin no-padding relative" style="background-image: url(<?php echo $galeria[0]["imagen"]["url"];?>);">

						<div class="overlar-text">
							<h4 id="title-image" class="yellowcolor"><?php echo $galeria[0]["titulo"];?></h4>
							<div id="description-image" class="whitecolor"><?php echo $galeria[0]["texto_adicional"];?></div>
						</div>
						
					</div>

				</div>
				<?php //echo "singular: " . is_singular( 'galeria' ). " - PT: ".get_post_type();?>
				<ul id="gallery-list" class="nolist">
				<?php
				for($g=0; $g<count($galeria); $g++)
				{

					if($g==0){ $cactive="active"; }else{ $cactive=""; }

					?>
					<li>
						<a href="javascript:;" data-largeimage="<?php echo $galeria[$g]["imagen"]["url"];?>" class="<?php echo $cactive; ?>" data-titleimage="<?php echo $galeria[$g]["titulo"];?>" data-descriptionimage="<?php echo $galeria[$g]["texto_adicional"];?>">
						<img src="<?php echo $galeria[$g]["imagen"]["sizes"]["medium"];?>" class="img-responsive center-block">
						<div class="overlay">
							<div class="dtable">
								<div class="innerd">
									<i class="fa fa-search-plus display-block margin0auto" aria-hidden="true"></i>
								</div>
							</div>
						</div>
						</a>
					</li>
					<?php

				}
				?>
				</ul>
				<?php

			}

		?>
	</div><!-- .entry-content -->

	<?php //get_template_part( 'content', 'gallery' ); ?>

	<?php //get_template_part( 'content', 'single-nextprev' ); ?>

	<?php //get_template_part( 'content', 'single-related' ); ?>


</article><!-- #post-## -->
