<?php
/**
 * Template Name: Rows Gray inners sections
 */


get_header() ?>


<div id="primary" class="content-area">
		<main id="main" class="site-main"<?php stag_markup_helper( array( 'context' => 'content', 'post_type' => 'page' ) ); ?>>

		
		<div class="customcontainer">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); stag_markup_helper( array( 'context' => 'entry' ) ); ?>>
				<header class="entry-header padding-top-50">

					<div class="entry-meta hidden">
						<?php stag_posted_on(); ?>
					</div><!-- .entry-meta -->

					<h1 class="entry-title no-margin"<?php stag_markup_helper( array( 'context' => 'title' ) ); ?>><?php the_title(); ?></h1>
				</header><!-- .entry-header -->
				
				<div class="entry-content"<?php stag_markup_helper( array( 'context' => 'entry_content' ) ); ?>>
					

					<div class="row no-margin padding-bottom-50">

						<?php the_content(); ?>
						
					</div>

					
					<?php
						/*
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'stag' ),
							'after'  => '</div>',
						) );
						*/

					?>
				</div><!-- .entry-content -->

				<?php //get_template_part( 'content', 'gallery' ); ?>

				<?php //get_template_part( 'content', 'single-nextprev' ); ?>

				<?php //get_template_part( 'content', 'single-related' ); ?>


			</article><!-- #post-## -->

		</div>

		<?php
		if(have_rows("seccion"))
		{
			
			$row = get_field("seccion");

			//print_r($row);
			
			for($r=0; $r<count($row); $r++)
			{

				?>
				<div class="row alternate-section no-margin padding-top-40 padding-bottom-40">

					<?php 
					if($row[$r]["agregar_info_general"]==1)
					{
						?>
						<div class="row no-margin padding-bottom-40 wow fadeIn" data-wow-duration=".5s">
							<h2 class="uppercase text-center margin-top-10"><?php echo $row[$r]["titulo_general"];?></h2>
							<div class="row display-block margin0auto max-width-500px padding-15">
								<?php echo $row[$r]["descripcion_general"];?>
							</div>
						</div>
						<?php
					}


					for($i=0; $i < count($row[$r]["inner_services"]); $i++)
					{
					?>

					<div class="customcontainer inner-sub-service padding-bottom-30 margin-bottom-30 border-bottom-1px-dashed-e1">

						<div class="left-content col-lg-6 col-md-6 col-sm-6 col-xs-12" data-targetimage="<?php echo $r."-".$i;?>">

							<?php if($row[$r]["inner_services"][$i]["titulo"]!=""):?>
								<h3 class="margin-top-10"><?php echo $row[$r]["inner_services"][$i]["titulo"];?></h3>
							<?php endif; ?>

							<div>
								<?php echo $row[$r]["inner_services"][$i]["descripcion"];?>
							</div>

						</div>

						<div class="right-content col-lg-6 col-md-6 col-sm-6 col-xs-12">

							<div class="right-image image-<?php echo $r."-".$i;?> row no-padding" style="background-image: url(<?php echo $row[$r]["inner_services"][$i]["imagen"];?>); height:400px; "></div>
							
						</div>

					</div>
					<?php
					}
					?>

				</div>
				<?php

			}

		}
		?>

		</main><!-- #main -->
	</div><!-- #primary -->



<?php get_sidebar(); ?>
<?php get_footer(); ?>
