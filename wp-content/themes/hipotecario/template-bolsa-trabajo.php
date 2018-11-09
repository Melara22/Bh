<?php
/**
 * Template Name: Bolsa de Trabajo
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

					<?php the_content(); ?>

					<div class="row no-margin padding-top-0 padding-bottom-40">

					<form name="form-send-cv" id="form-send-cv" class="form-send-cv" enctype="multipart/form-data">

						<input type="hidden" name="pageid" id="pageid" value="<?php echo get_the_ID();?>">

						<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

							<h5 class="colorblack"><b>Datos personales:</b></h5>

							<div class="<?php echo $colclass;?>">
								<label class="fwnormal">Nombre y Apellidos:</label>
								<input type="text" name="nombre" id="nombre" value="" class="form-control required" />
							</div>

							<div class="<?php echo $colclass;?>">
								<label class="fwnormal">Estado civil:</label>
								<select class="form-control required" name="estadocivil" id="estadocivil">
									<option value="">- seleccionar-</option>
									<option value="soltero">Soltero(a)</option>
									<option value="casado">Casado(a)</option>
									<option value="divorciado">Divorciado(a)</option>
									<option value="viudo">Viudo(a)</option>
								</select>
							</div>

							<div class="<?php echo $colclass;?>">
								<label class="fwnormal">Nacionalidad:</label>
								<select class="form-control required" name="nacionalidad" id="nacionalidad">
									<option value="">- seleccionar -</option>
									<?php
									foreach($countries as $key => $value)
									{
										?>
										<option value="<?php echo $key;?>"><?php echo $value;?></option>
										<?php
									}
									?>
								</select>
							</div>

							<div class="<?php echo $colclass;?>">
								<label class="fwnormal">Teléfono:</label>
								<input type="text" name="telefono" id="telefono" value="" class="form-control required" maxlength="8" />
							</div>

							<div class="<?php echo $colclass;?>">
								<label class="fwnormal">DUI ó Pasaporte:</label>
								<input type="text" name="documento" id="documento" value="" class="form-control required" maxlength="10" />
							</div>

							<div class="<?php echo $colclass;?>">
								<label class="fwnormal">Discapacidad:</label>
								<select class="form-control required" name="discapacidad" id="discapacidad">
									<option value="">- seleccionar -</option>
									<option value="ninguna">Ninguna</option>
									<option value="auditiva">Auditiva</option>
									<option value="cognitiva">Cognitiva</option>
									<option value="visual">Visual</option>
									<option value="viudo">Física</option>
								</select>
							</div>

							<div class="<?php echo $colclass;?>">
								<label class="fwnormal">Fecha de nacimiento:</label>
								<input readonly type="text" name="fnacimiento" id="fnacimiento" value="" class="datepicker form-control required" maxlength="10" placeholder="DD/MM/YYYY" />
							</div>

							<div class="<?php echo $colclass;?>">
								<label class="w100 fwnormal">Posee vehículo:</label>
								<ul class="nolist list-inline">
									<li class="radio-inline">
										<label class="fwnormal">
										<input type="radio" name="vehiculo" id="vehiculo1" value="si" class="required" /> &nbsp;Si
										</label>
									</li>
									<li class="radio-inline">
										<label class="fwnormal">
										<input checked type="radio" name="vehiculo" id="vehiculo2" value="no" class="required" /> &nbsp;No
										</label>
									</li>
								</ul>
								
								
							</div>

							<div class="<?php echo $colclass;?>">
								<label class="fwnormal">Género:</label>
								<select class="form-control required" name="genero" id="genero">
									<option value="">- seleccionar -</option>
									<option value="masculino">Masculino</option>
									<option value="femenino">Femenino</option>
								</select>
							</div>

							<div class="<?php echo $colclass;?>">
								<label class="fwnormal">Correo electrónico:</label>
								<input type="email" name="correoelectronico" id="correoelectronico" value="" class="form-control required" />
							</div>

							<div class="<?php echo $colfwidth;?> no-padding-left margin-top-40">
								<h5 class="colorblack"><b>Estudios o Grados Académicos:</b></h5>
							</div>

							<div class="<?php echo $colfwidth;?>">
								<label class="fwnormal"></label>
								<input type="text" name="grado_academico1" id="grado_academico1" value="" class="form-control required" />
							</div>

							<div class="<?php echo $colfwidth;?>">
								<label class="fwnormal"></label>
								<input type="text" name="grado_academico2" id="grado_academico2" value="" class="form-control" />
							</div>

							<div class="<?php echo $colfwidth;?>">
								<label class="fwnormal"></label>
								<input type="text" name="grado_academico3" id="grado_academico3" value="" class="form-control" />
							</div>

							<div class="<?php echo $colfwidth;?> no-padding-left margin-top-40">
								<h5 class="colorblack"><b>Intereses dentro de la empresa:</b></h5>
							</div>

							<div class="<?php echo $colfwidth;?>">
								<label class="fwnormal"></label>
								<input type="text" name="intereses1" id="intereses1" value="" class="form-control required" />
							</div>

							<div class="<?php echo $colfwidth;?>">
								<label class="fwnormal"></label>
								<input type="text" name="intereses2" id="intereses2" value="" class="form-control" />
							</div>

							<div class="<?php echo $colfwidth;?>">
								<label class="fwnormal"></label>
								<input type="text" name="intereses3" id="intereses3" value="" class="form-control" />
							</div>

							<div class="<?php echo $colfwidth;?> no-padding-left margin-top-40">
								<h5 class="colorblack"><b>Sube tu Curriculum:</b></h5>
							</div>

							<div class="<?php echo $colfwidth;?>">
								<input type="file" name="datafilecv" id="datafilecv" value="" class="form-control" accept=".doc,.docx,.pdf" />
							</div>

							<div class="<?php echo $colfwidth;?> margin-top-40">
								<input type="submit" name="enviar-cv" id="enviar-cv" value="Enviar Curriculum" class="max-width-200px" />
							</div>


						</div>

					</form>
					
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
