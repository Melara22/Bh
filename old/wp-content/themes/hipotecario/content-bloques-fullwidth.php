<?php
/**
 * The template used for displaying home page
 *
 * @package StagFramework
 * @subpackage yttor
 */

$HOME_ID = get_option('page_on_front');
?>
<div class="row no-margin no-padding">
	<?php
	$bloques = get_field("bloques");

	//print_r($bloques);

	if( have_rows("bloques") )
	{

		for($b=0; $b < count($bloques); $b++)
		{

			$bcolor = $bloques[$b]["background_color"];

			if( $bcolor != "" )
			{
				$style="style='background: ".$bcolor.";'";
			}

			?>
			<div class="row no-margin no-padding" <?php echo $style;?>>

				<?php if($bloques[$b]["mostrar_titulo_de_seccion"]==1){ ?>
					<h2 class="text-center uppercase fw800 margin-top-20 margin-bottom-20">
						<?php echo $bloques[$b]["titulo_seccion"];?>	
					</h2>
				<?php } ?>

				<div class="row no-margin no-padding">
					<?php echo $bloques[$b]["contenido"];?>
				</div>

			</div>
			<?php

		}

	}
	?>
</div>