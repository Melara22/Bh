<?php
/**
 * Template Name: Plantilla/Inicio
 */


get_header() ?>

<?php 
	get_template_part( 'content', 'homeslider' );
	get_template_part( 'content', 'homeaccesos' );
	get_template_part( 'content', 'home-links-multimedia' );
?>



<?php //get_sidebar(); ?>
<?php get_footer(); ?>
