<?php
/**
 * Template Name: Bloques Full width
 */


get_header() ?>

<?php 
	
	//get_template_part( 'content', 'lineasmenu' );

?>
<header class="entry-custom-header">
	<h1 class="bluecolor text-center uppercase fw800 entry-title"<?php stag_markup_helper( array( 'context' => 'title' ) ); ?>><?php the_title(); ?></h1>
	<hr class="separator" />
</header>


<div class="row no-margin breadcrumb hidden">

	<div class="customcontainer">
	<?php
	if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('
	<p id="breadcrumbs">','</p>
	');
	}
	?>
	</div>
</div>


<?php
if( get_field("mostrar_logo_seccion") == 1 )
{
	?>
	<div class="row no-margin no-padding">
		<img src="<?php echo get_field("logo_seccion"); ?>" class="margin-top-30 img-responsive center-block">
	</div>
	<?php
}
?>

<?php
if( get_field("mostrar_sub_banner") == 1 )
{
	?>
	<div class="row no-margin padding-top-30 no-padding-left no-padding-right">
		<img src="<?php echo get_field("sub_banner"); ?>" class="img-responsive center-block">
	</div>
	<?php
}
?>

<div class="row no-margin no-padding">

	
	<?php 
	$my_id = get_the_ID();
	$post_id_5369 = get_post($my_id);
	$content = $post_id_5369->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]>', $content);
	echo $content;
	?>

	

</div>


<?php get_template_part( 'content', 'bloques-fullwidth' ); ?>


<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 padding-top-50 padding-left-40 padding-right-40 hidden">
		<?php
		echo "<h2 class='fwbold'>".get_field("titulo_beneficios")."</h2>";
		$ben = get_field("beneficios");

		if( have_rows("beneficios") )
		{
			?>
			<ul id="beneficios-club-pintor" class="nolist hidden">
			<?php
			for($b=0; $b < count($ben); $b++)
			{

				?>
				<li>
					<img src="<?php echo $ben[$b]["url"]; ?>" class="img-responsive center-block" />
				</li>
				<?php

			}
			?>
			</ul>
			<p>&nbsp;</p>
			<?php
		}

		echo $texto_complem = get_field("texto_complemento");
		?>

	</div>


<?php
/*
$preg = get_field("programa_regional");

if($preg!="")
{
	?>
	<div class="row no-margin no-padding">
		<img src="<?php echo $preg; ?>" class="img-responsive center-block" style="width:100%; ">
	</div>
	<?php
}
*/
?>

<div class="tabs-container row no-margin hidden">

	<div class="customcontainer">
		


		<ul class="nav nav-tabs yellow" role="tablist">
		    <li role="presentation" class="active"><a href="#online" aria-controls="online" role="tab" data-toggle="tab">En línea</a></li>
		    <li role="presentation"><a href="#visitus" aria-controls="visitus" role="tab" data-toggle="tab">Visítanos</a></li>
		    <li role="presentation"><a href="#callus" aria-controls="callus" role="tab" data-toggle="tab">Llámanos</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="online">
		    	
				<div class="col-lg-6 col-md-6 padding-top-30 padding-bottom-30">
		    		<h2>En línea:</h2>
		    		<p>Llena los siguientes campos y posteriormente un asesor de Sherwin-Williams se estará comunicando para brindarte más detalles. </p>
		    		<p class="f12">(Te recomendamos descargar y leer los *términos y condiciones antes de llenar el formulario).</p>
		    	</div>
		    	<div class="col-lg-12 col-md-12">

		    		<div class="col-lg-3 col-md-3 col-sm-3 padding-bottom-30">
		    			<p>Nombres:</p>
						<input type="text" name="nombres" id="nombres" value="" class="w100 form-control" />
		    		</div>

		    		<div class="col-lg-3 col-md-3 col-sm-3 padding-bottom-30">
		    			<p>Apellidos:</p>
						<input type="text" name="apellidos" id="pellidos" value="" class="w100 form-control"  />
		    		</div>

		    		<div class="col-lg-6 col-md-6 col-sm-6 padding-bottom-30">
		    			<p>Dirección:</p>
						<input type="text" name="direccion" id="direccion" value="" class="w100 form-control"  />
		    		</div>

		    		<div class="col-lg-3 col-md-3 col-sm-3 padding-bottom-30">
		    			<p>Fecha de Nacimiento:</p>
						<input type="text" name="fnacimiento" id="fnacimiento" value="" class="w100 form-control"  />
		    		</div>

		    		<div class="col-lg-3 col-md-3 col-sm-3 padding-bottom-30">
		    			<p>Documento de identidad:</p>
						<input type="text" name="docidentidad" id="docidentidad" value="" class="w100 form-control"  />
		    		</div>

		    		<div class="col-lg-3 col-md-3 col-sm-3 padding-bottom-30">
		    			<p>Teléfono celular:</p>
						<input type="text" name="telcelular" id="telcelular" value="" class="w100 form-control"  />
		    		</div>

		    		<div class="col-lg-3 col-md-3 col-sm-3 padding-bottom-30">
		    			<p>Correo electrónico:</p>
						<input type="email" name="correoelectronico" id="correoelectronico" value="" class="w100 form-control"  />
		    		</div>

		    		<div class="col-lg-12 col-md-12 col-sm-12 padding-bottom-30">

		    			<p class="f12 no-margin"><label><input type="checkbox" name="acepto" id="acepto" value="1"> * Acepto <a>términos y condiciones</a></label></p>

		    			<p class="fwbold f12">* Campos obligatorios </p>

		    			<input type="submit" name="afiliacion-en-linea" id="afiliacion-en-linea" value="Enviar datos" class="btn btn-primary fwbold f12" />

		    			<input type="reset" class="btn btn-primary fwbold f12" name="resetear" id="resetear" value="Cancelar" />

		    		</div>
				
		    	</div>
		    </div>

		    <div role="tabpanel" class="tab-pane" id="visitus">
		    	
		    	<?php echo get_field("tab_visitanos"); ?>

		    </div>

		    <div role="tabpanel" class="tab-pane" id="callus">
		    	
		    	<?php echo get_field("tab_llamanos"); ?>

		    </div>
		</div>





	</div>

</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
