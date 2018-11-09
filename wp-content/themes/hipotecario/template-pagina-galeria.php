<?php
/**
 * Template Name: Página de galería
 */


get_header() ?>

<?php 
	
	//get_template_part( 'content', 'lineasmenu' );

?>
<header class="entry-custom-header padding-left-15 padding-right-15">
	<h3 class="bluecolor text-center uppercase fw800 entry-title max-width-700px max-width-700px margin-left-right-auto"<?php stag_markup_helper( array( 'context' => 'title' ) ); ?>><?php the_title(); ?></h3>
</header>

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

<?php 
$my_id = get_the_ID();
$post_id_5369 = get_post($my_id);
$content = $post_id_5369->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
$contenido = $content;

if($contenido!="")
{
?>
<div class="row no-margin padding-left-15 padding-right-15 padding-top-30 padding-bottom-30">
	<div class="max-width-700px margin-left-right-auto">
		<?php echo $contenido;?>
	</div>
</div>
<?php
}
?>

<div class="row no-margin no-padding">
<?php
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
</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
