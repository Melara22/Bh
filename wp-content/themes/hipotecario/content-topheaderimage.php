<?php
/**
 * The template used for displaying home page
 *
 * @package StagFramework
 * @subpackage yttor
 */

$myid = get_the_ID();

$mostrarbanner = get_field("mostrar_banner", $myid );
$bannerimg = get_field("banner", $myid );

$icon_page = get_field("icon_page", $myid);

if($mostrarbanner==1)
{
?>
<div class="top-banner" style="background-image: url(<?php echo $bannerimg;?>); background-size: cover;">
	
	<div class="overlay-banner">
	<div class="dtable w100h100">

		<div class="innerd">
			
			<span class="<?php echo get_field("icon_page", $myid); ?>"></span>
			<h1 class="text-center fw800"><?php echo get_the_title(); ?></h1>

		</div>

	</div>
	</div>
</div>
<?php
}
?>