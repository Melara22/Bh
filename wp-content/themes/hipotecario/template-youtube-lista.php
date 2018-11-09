<?php
/**
 * Template Name: Youtube lista
 */


get_header() ?>

<?php 
	
	//get_template_part( 'content', 'lineasmenu' );

?>
<header class="entry-custom-header padding-left-15 padding-right-15">
	<h2 class="bluecolor text-center uppercase fw800 entry-title max-width-700px max-width-700px margin-left-right-auto"<?php stag_markup_helper( array( 'context' => 'title' ) ); ?>><?php the_title(); ?></h2>
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

<div class="row no-margin no-padding">
	<input type="hidden" name="channelid" id="channelid" value="UCeYtqmVbsT_JLxHbk6FLrsA">
<?php
if( have_rows("listas") )
{

	$listas = get_field("listas");

	//print_r($listas);
	//$listas[0]["imagen"]["url"]

	for($l=0; $l<count($listas); $l++)
	{
	?>
	<div class="row no-margin padding-top-30 padding-bottom-30 padding-left-15 padding-right-15">
		<h3 class="padding-left-60 padding-right-60"><b><?php echo $listas[$l]["titulo_de_la_lista"]; ?></b></h3>
		<p class="padding-left-60 padding-right-60"><?php echo $listas[$l]["descripcion"]; ?></p>
		<div id="loader-list-<?php echo $l;?>" class="row no-margin padding-top-15 padding-bottom-15 padding-left-60 padding-right-60">
			<div class="loading-list">Cargando lista...</div>
		</div>
		<ul id="list-<?php echo $l;?>" class="single-list hidden padding-left-60 padding-right-60 no-margin" data-idlist="<?php echo $listas[$l]["lista_id_youtube"]; ?>" data-listmaxlimit="<?php echo $listas[$l]["cantidad_max_resultados"]; ?>">

		</ul>
	</div>
	<?php
	}

	

}
?>
</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
