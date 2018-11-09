<?php
/**
 * The template used for displaying home page
 *
 * @package StagFramework
 * @subpackage yttor
 */

$HOME_ID = get_option('page_on_front');

$homeaccesos = get_field("home_accesos_principales", $HOME_ID);

//print_r($homeaccesos);
if(have_rows("home_accesos_principales"))
{
?>
<div id="home-accesos" class="row no-margin no-padding">

	<ul id="homelinks">
		<?php
		for($a=0; $a < count($homeaccesos); $a++)
		{
			?>
			<li class=" hover-zoom" style="background-image: url(<?php echo $homeaccesos[$a]["imagen"];?>);">
				<a href="<?php echo get_permalink($homeaccesos[$a]["pagina_vincular"]);?>">
				<div class="dtable w100h100">
					<div class="innerd text-center">
						
							<span class="<?php echo $homeaccesos[$a]["icono"];?>"></span>
							<?php echo $homeaccesos[$a]["titulo"];?>
						
					</div>
				</div>
				</a>
			</li>
			<?php
		}
		?>
	</ul>

</div>
<?php } ?>