<?php
/**
 * Template Name: Activos Extraordinarios
 */


get_header() ?>


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

					<div class="row no-margin padding-top-40 padding-bottom-40">

						<?php
							$currentpage = get_post(get_the_ID());
							//print_r($currentpage);

							$parent = $currentpage->post_parent;

							$my_wp_query = new WP_Query();
							$all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'posts_per_page' => '-1', "order"=>"asc"));

							// Filter through all pages and find Portfolio's children
							$childrenpages = get_page_children( $parent, $all_wp_pages );

							//print_r($childrenpages);
							?>
						<select name="activos-ext" id="activos-ext" class="form-control margin-bottom-40 margin-center display-block max-width-300px redirect_to" >
							
							<?php
							foreach ($childrenpages as $singlep) {

								if( $singlep->ID == get_the_ID() )
								{

									$s="selected";

								}else{

									$s="";

								}
								?>
								<option value="<?php echo get_permalink($singlep->ID);?>" <?php echo $s;?>><?php echo $singlep->post_title;?></option>
								<?php
							}
							?>
							
						</select>

						<?php
						if( have_rows("inmuebles") )
						{

							$mb = get_field("inmuebles");
							//print_r($mb);
							?>
							<div class="row no-margin head-act-ext">
								<div class="descripcion fwbold">
									<p>Descripción</p>
								</div>
								<div class="terreno fwbold">
									<p>Terreno</p>
								</div>
								<div class="construccion fwbold">
									<p>Construcción</p>
								</div>
								<div class="precio-venta fwbold">
									<p>Precio</p>
								</div>
							</div>
							<?php

							for($i=0; $i < count($mb); $i++ )
							{
							?>
							<div class="row no-margin single-inmueble">
								<div class="descripcion">
									<label>Descripción:</label>
									<?php echo $mb[$i]["descripcion"]; ?>
								</div>
								<div class="terreno">
									<label>Terreno:</label>
									<?php echo $mb[$i]["terreno"]; ?>
								</div>
								<div class="construccion">
									<label>Construcción:</label>
									<?php echo $mb[$i]["construccion"]; ?>
								</div>
								<div class="precio-venta">
									<label>Precio de venta:</label>
									<?php echo $mb[$i]["precio_venta"]; ?>
								</div>
							</div>
							<?php
							}

						}
						?>
					
					</div>

					<?php the_content(); ?>

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
