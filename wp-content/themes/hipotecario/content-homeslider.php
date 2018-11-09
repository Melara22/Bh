<?php
/**
 * The template used for displaying home page
 *
 * @package StagFramework
 * @subpackage yttor
 */

$HOME_ID = get_option('page_on_front');

$mostrar_hslider = get_field("mostrar_home_slider", $HOME_ID);

$main_slider = get_field("home_slider", $HOME_ID);
//print_r($main_slider);
$mostrar_ebanking_home = get_field("mostrar_ebanking_home");
$mostrar_ebanking_personas_home = get_field("mostrar_ebanking_personas_home");
$url_ebanking_pers_home = get_field("vinculo_ebanking_personas");
$mostrar_ebanking_emp_home = get_field("mostrar_ebanking_empresas_home");
$url_ebanking_emp_home = get_field("vinculo_ebanking_empresas");

?>
<div id="home-slider-container" class="row no-margin no-padding">
	
<?php
if( $mostrar_hslider == 1)
{

	if($mostrar_ebanking_home==1)
	{
	?>
	<ul id="homefloatlinks">
		<li class="f12">
			Accede a  nuestros servicios E-Banking:
		</li>
		<?php if($mostrar_ebanking_personas_home==1):?> 
		<li>
			<a href="<?php echo $url_ebanking_pers_home; ?>" target="_blank"> <span class="icon-icons_ebaninkg-personas"></span>E-Banking Personas</a>
		</li>
		<?php endif; ?>
		<?php if($mostrar_ebanking_emp_home==1):?> 
		<li>
			<a href="<?php echo $url_ebanking_emp_home; ?>" target="_blank"> <span class="icon-icons_ebanking-express"></span>E-Banking Empresas</a>
		</li>
		<?php endif; ?>
	</ul>
	<?php
	}

	if( count($main_slider) > 0 )
	{
	?>
	<div id="homeslider" class="row no-margin no-padding">
		
		<?php 
		for($s=0; $s< count($main_slider); $s++)
		{
			?>
			<div class="single-home-slide">
				<img src="<?php echo $main_slider[$s]["imagen"];?>" class="img-responsive center-block w100">
				<div class=" overlay ">

					<div class="container">
					
					<div class="dtable">
					<div class="innerd">

						<h1 class="fontyellow textshadow"><b><?php echo $main_slider[$s]["titulo"];?></b></h1>
						<div class="fontwhite textshadow"><?php echo $main_slider[$s]["descripcion"];?></div>

					</div>
					</div>

					</div>

				</div>
			</div>
			<?php
		}
		?>

	</div>
	<?php
	}
}
?>
</div>
