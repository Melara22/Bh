<div id="main-importar-planes" class="wrap">
	
	<?php
	global $wpdb;


	$to = ABSPATH . "wp-content/themes/hipotecario-child/csv/";

	//if ( ( move_uploaded_file($_FILES["csvfile"]["tmp_name"], $to . $_FILES['csvfile']["name"] ) ) ):
		
		//$ext = end((explode(".", $_FILES["csvfile"]["name"])));
		//$csvfile = $to . $_FILES['csvfile']["name"];
		$csvfile = $to . "agencias-copy.csv";

        $contents = file_get_contents( $csvfile );//Or however you what it
		//echo "RESULTS:<br/>";
		//print_r($contents);

        $num_registros = 0;

        if (($fichero = fopen($csvfile, "r")) !== FALSE) { 


			while (($datos = fgetcsv($fichero, 0, ",")) !== FALSE):


	        		echo '<placemarket>
							<name>"'.$datos[0].'"</name>
							<coordinates>"'.$datos[1].'"</coordinates>
							<description>"'.$datos[2].'"</description>
							<telephone>"'.$datos[3].'"</telephone>
							<horary></horary>
						</placemarket>';

						$num_registros++;
        	endwhile;

        	echo "<p>Total de reg:".$num_registros."</p>";

        }
        else{ echo "<p align='center'>No se puede leer el archivo proporcionado, verifique que existe o que esté disponible para lectura.</p>"; }

	//endif;
	
	?>
</div>