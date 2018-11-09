<?php
/**
 * Template Name: Rows Gray + Children bottom
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



				</div><!-- .entry-content -->

					
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

			$animatedclass = array(
				0 => array(
					"leftToRight" => "slideInLeft",
					"righToLeft" => "slideInRight"
				),
				1 => array(
					"leftToRight" => "slideInRight",
					"righToLeft" => "slideInLeft"

				)
			);

			$cclass = 0;

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
							<h2 class="uppercase text-center max-width-700px margin0auto"><?php echo $row[$r]["titulo_general"];?></h2>
							<div class="row display-block margin0auto max-width-500px padding-15">
								<?php echo $row[$r]["descripcion_general"];?>
							</div>
						</div>
						<?php
					}	
					?>

					<div class="customcontainer">

						<div class="left-content col-lg-6 col-md-6 col-sm-6 col-xs-12 wow <?php echo $animatedclass[$r]["leftToRight"];?>" data-wow-duration=".5s" data-targetimage="<?php echo $r;?>">

							<?php if($row[$r]["titulo"]!=""):?>
								<h4 class="uppercase margin-top-10"><?php echo $row[$r]["titulo"];?></h4>
							<?php endif; ?>

							<div>
								<?php echo $row[$r]["descripcion"];?>
							</div>

						</div>

						<div class="right-content col-lg-6 col-md-6 col-sm-6 col-xs-12 wow <?php echo $animatedclass[$r]["righToLeft"];?>" data-wow-delay=".8s" data-wow-duration=".5s">

							<div class="right-image image-<?php echo $r;?> row no-padding" style="background-image: url(<?php echo $row[$r]["imagen"];?>); height:400px; "></div>
							
						</div>

					</div>
				</div>
				<?php
				$cclass++;

				if($cclass==3){ $cclass=0; }

			}

		}
		?>

		<div id="subpages" class="entry-content"<?php stag_markup_helper( array( 'context' => 'entry_content' ) ); ?>>
					
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
			
			foreach ( $children as $child )
			{
				$img =  wp_get_attachment_image_src( get_post_thumbnail_id($child->ID),"full", false);
				//print_r($img);
				?>
				<div class="single-sub-page relative col-lg-5-12" style="background-image: url(<?php echo $img[0]; ?>);">
					<div class="overlay">
						<h5 class="text-center whitecolor uppercase"><?php echo $child->post_title ; ?></h5>
						<a href="<?php echo get_permalink($child->ID); ?>" class="uppercase btn gold margin0auto display-block max-width-200px colorblack">
							Ver información
						</a>
					</div>
				</div>
				<?php
			}
			?>

		</div><!-- .entry-content -->

		</main><!-- #main -->
	</div><!-- #primary -->



<?php get_sidebar(); ?>
<?php get_footer(); ?>
