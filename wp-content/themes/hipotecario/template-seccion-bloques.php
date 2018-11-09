<?php
/**
 * Template Name: Sección bloques
 */


get_header() ?>

<?php 
	
	//get_template_part( 'content', 'lineasmenu' );

?>
<header class="entry-custom-header">
	<h1 class="bluecolor text-center uppercase fw800 entry-title"<?php stag_markup_helper( array( 'context' => 'title' ) ); ?>><?php the_title(); ?></h1>
	<hr class="separator" />
</header>

<div class="row no-margin padding-bottom-40">

	<div class="customcontainer padding-bottom-30">
		<?php
		$postid = get_post( get_the_ID() );
		$content = $postid->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]>', $content);
		echo $content;
		?>
	</div>

</div>

<div class="row no-margin no-padding">
<?php
if( have_rows("secciones") )
{

	$secciones = get_field("secciones");

	//print_r($secciones);

	for($s=0; $s< count($secciones); $s++)
	{

		switch($secciones[$s]["columnas"])
		{
			case "2c":

				?>
				<div class="seccion-bloques backgroundcover col-lg-6 col-md-6 col-sm-6 col-xs-12" style="background-image: url(<?php echo $secciones[$s]["background_a"];?>); ">
					
					<a href="<?php echo get_permalink($secciones[$s]["columna_a"]->ID);?>">
					<div class="dtable">
						<div class="innerd">
							
							<h3 class="text-center uppercase whitecolor fw800"><?php echo $secciones[$s]["columna_a"]->post_title; ?></h3>
							
						</div>
					</div>
					</a>

				</div>
				<div class="seccion-bloques backgroundcover col-lg-6 col-md-6 col-sm-6 col-xs-12" style="background: url(<?php echo $secciones[$s]["background_b"];?>); ">
					
					<a href="<?php echo get_permalink($secciones[$s]["columna_b"]->ID);?>">
					<div class="dtable">
						<div class="innerd">
							
							<h3 class="text-center uppercase whitecolor fw800"><?php echo $secciones[$s]["columna_b"]->post_title;?></h3>
							
						</div>
					</div>
					</a>

				</div>
				<?php

			break;

		}



	}

}
?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
