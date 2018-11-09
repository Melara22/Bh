<?php
/**
 * Template Name: Contacto BH
 */


get_header() ?>


<div id="primary" class="content-area">
		<main id="main" class="site-main"<?php stag_markup_helper( array( 'context' => 'content', 'post_type' => 'page' ) ); ?>>

		
		<div class="customcontainer">

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

						
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 padding-top-20 padding-bottom-20 padding-left-0 padding-right-0">

						<form id="contacto-bh" name="contacto-bh" class="contacto-bh">

							<input type="hidden" name="pageid" id="pageid" value="<?php echo get_the_ID();?>">

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

								<div class="form-group">
									<label for="nombre_completo">* Nombre completo:</label>
									<input type="text" class="form-control required" id="nombre_completo" name="nombre_completo" placeholder="Nombre completo:" maxlength="250">
								</div>

								<div class="form-group">
									<label for="email">* Correo electrónico:</label>
									<input type="email" class="form-control required" id="email" name="email" placeholder="Correo electrónico:" maxlength="150">
								</div>

								<div class="form-group">
									<label for="telefono">* Teléfono:</label>
									<input type="text" class="form-control required" id="telefono" name="telefono" placeholder="Teléfono:" maxlength="10">
								</div>

								<div class="form-group">
									<label for="departamento">Departamento:</label>
									<select name="departamento" id="departamento" class="form-control required">
										<option value="san-salvador" selected>San Salvador</option>
										<option value="sonsonate">Sonsonate</option>
										<option value="ahuachapan">Ahuachapán</option>
										<option value="santa-ana">Santa Ana</option>
										<option value="chalatenango">Chalatenango</option>
										<option value="la-libertad">La Libertad</option>
										<option value="morazan">Morazán</option>
										<option value="san-miguel">San Miguel</option>
										<option value="usulutan">Usulután</option>
										<option value="cabanas">Cabañas</option>
										<option value="cuscatlan">Cuscatlán</option>
										<option value="san-vicente">San Vicente</option>
										<option value="morazan">Morazán</option>
										<option value="la-union">La Unión</option>
									</select>
								</div>

							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

								<div class="form-group">
									<label for="tipo-consulta">Tipo de consulta:</label>
									<select name="tipo-consulta" id="tipo-consulta" class="form-control required">
										<option value="dudas" selected>Dudas</option>
										<option value="quejas">Quejas</option>
										<option value="sugerencias">Sugerencias</option>
										<option value="otros">Otros</option>
									</select>
								</div>

								<div class="form-group">
									<label for="consulta">Consulta:</label>
									<textarea class="form-control required" id="consulta" name="consulta" placeholder="Consulta:" style="height: 116px; " maxlength="350"></textarea>
								</div>

								<div class="form-group margin-top-40">
									* Campos obligatorios

									<input type="submit" name="enviar" id="enviar" value="Enviar" class="btn btn-default bluebh no-border-radius max-width-100px fr" />
								</div>

							</div>

						</form>

						</div>
											
						
					
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

		</div>

		</main><!-- #main -->
	</div><!-- #primary -->



<?php get_sidebar(); ?>
<?php get_footer(); ?>
