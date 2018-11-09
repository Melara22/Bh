<?php
/**
 * Template Name: Mapa
 */


get_header() ?>


<div id="primary" class="content-area">
		<main id="main" class="site-main"<?php stag_markup_helper( array( 'context' => 'content', 'post_type' => 'page' ) ); ?>>

		
		

			<article id="post-<?php the_ID(); ?>" <?php post_class(); stag_markup_helper( array( 'context' => 'entry' ) ); ?>>
				
				<div class="entry-content"<?php stag_markup_helper( array( 'context' => 'entry_content' ) ); ?>>
					<?php the_content(); ?>

					<div class="row no-margin padding-15 backgblack hidden">

						<div class="customcontainer">

							<ul class="nolist select-map-container">
								<li class="col-lg-4">
									<select class="form-control tipo-centro-servicio" name="centro-servicio" id="centro-servicio">
										<option value="puntos-servicios">Puntos de Servicios</option>
										<option value="cajeros-autom">Cajeros Automáticos</option>
									</select>
								</li>
								<li class="col-lg-4">
									<select class="form-control departamento" name="departamento" id="departamento">
										<option value="puntos-servicios">Puntos de Servicios</option>
										<option value="cajeros-autom">Cajeros Automáticos</option>
									</select>
								</li>
								<li class="col-lg-4">
									<select class="form-control sucursal" name="sucursal" id="sucursal">
										<option value="puntos-servicios">Puntos de Servicios</option>
										<option value="cajeros-autom">Cajeros Automáticos</option>
									</select>
								</li>
							</ul>

						</div>

					</div>

					<div class="row no-margin no-padding">

						<div class="clearfix wrapper-buscar-map backgblack">

							<?PHP 
							$filename = get_field("file_xml");
		                    include 'includes/xml2array/xml2array.php';
		                    //$restaurantes = @file_get_contents('https://yttor.com/apps/mapshop/xml/ddhn.xml');
		                    $restaurantes = @file_get_contents(get_template_directory()."/xml/".$filename);
		                    $sucursales = xml2array($restaurantes);
		                    $sucursales = $sucursales['document']['country'];
		                    $sucursal_cordenada_pais = explode(",", $sucursales["coordinates"]['value']);

		                    $ciudades = $sucursales['city'];

		                    //print_r($ciudades);

		                 	?>

		                    <div class="col-lg-12 wrapper-aux">
		                        <h1 class="text-center"><?php //the_title(); ?></h1>

		                        <form class="col-lg-12">

		                        	<div class="form-group col-lg-4">
		                        		<select class="form-control tipo-centro-servicio redirect_to" name="centro-servicio" id="centro-servicio">
		                        			<?php
		                        			$HOME_ID = get_option('page_on_front');
		                        			if(have_rows("centros_de_servicio", $HOME_ID))
		                        			{

		                        				$cservicios = get_field("centros_de_servicio", $HOME_ID);
		                        				$idcurrentpage = get_the_ID();
		                        				
		                        				for($c=0; $c<count($cservicios); $c++)
		                        				{
		                        					if($cservicios[$c]["pagina_centro_servicio"]->ID==$idcurrentpage)
		                        					{
		                        						$csel="selected";
		                        					}else{
		                        						$csel="";
		                        					}
		                        					?>
		                        					<option value="<?php echo get_permalink($cservicios[$c]["pagina_centro_servicio"]->ID);?>" <?php echo $csel;?>><?php echo $cservicios[$c]["pagina_centro_servicio"]->post_title;?></option>
		                        					<?php
		                        				}



		                        			}

		                        			print_r($cservicios);
		                        			
		                        			?>
										</select>
		                        	</div>

		                          <div class="form-group col-lg-4">
		                            <select class="form-control" name="departamento">
		                              <option disabled selected>Departamento</option>
		                              <?php 
		                              for( $i=0; $i<count($ciudades); $i++ ){
		                                $temp_coordenadas = explode(",", $ciudades[$i]['coordinates']['value']);
		                                echo "<option data-lt='".$temp_coordenadas[0]."' data-ln='".$temp_coordenadas[1]."' value='".$i."'>".$ciudades[$i]['name']['value']."</option>";
		                              }
		                              ?>
		                            </select>
		                          </div>
		                          <div class="form-group col-lg-4">
		                            <select class="form-control " name="sucursal">
		                              <option disabled selected>Sucursal</option>
		                              <?php 

		                             for( $j=0; $j<count($ciudades); $j++ ){

		                                  echo '<optgroup id="s'.$j.'" label="'.$ciudades[$j]['name']['value'].'" class="hide" >';
		                                  if($ciudades[$j]['placemarket']['name']['value'] != ""){
		                                    $temp_coordenadas = explode(",", $ciudades[$j]['placemarket']['coordinates']['value']);
		                                    echo "<option id='0' data-lt ='".$temp_coordenadas[0]."' data-ln ='".$temp_coordenadas[1]."'  data-horario='".$ciudades[$j]['placemarket']['horario']['value']."' data-telefono='".$ciudades[$j]['placemarket']['telephone']['value']."' data-description='".$ciudades[$j]['placemarket']['description']['value']."' data-name='".$ciudades[$j]['placemarket']['name']['value']."'>".$ciudades[$j]['placemarket']['name']['value']."</option>";
		                                  }else{
		                                    for( $i=0; $i<count($ciudades[$j]['placemarket']); $i++ ){
		                                        $temp_coordenadas = explode(",", $ciudades[$j]['placemarket'][$i]['coordinates']['value']);
		                                        echo "<option id='".$i."' data-lt ='".$temp_coordenadas[0]."' data-ln ='".$temp_coordenadas[1]."'  data-horario='".$ciudades[$j]['placemarket'][$i]['horario']['value']."' data-telefono='".$ciudades[$j]['placemarket'][$i]['telephone']['value']."' data-description='".$ciudades[$j]['placemarket'][$i]['description']['value']."' data-name='".$ciudades[$j]['placemarket'][$i]['name']['value']."'>".$ciudades[$j]['placemarket'][$i]['name']['value']."</option>";
		                                      }
		                                  }    
		                                  echo '</optgroup>'; 
		                              } 

		                              ?>

		                            </select>
		                          </div>


		                        </form>



		                    </div>
		                </div>

						
						<div class=" section-centros-atencion">

							
		                 <script>
		                 var sucursal_cordenada_pais = [];
		                 sucursal_cordenada_pais['lat'] = '<?php echo $sucursal_cordenada_pais[0];  ?>';
		                 sucursal_cordenada_pais['lng'] = '<?php echo $sucursal_cordenada_pais[1];  ?>';

		                 </script>

		                

		                <div id="map-restaurantes" ></div>
		                <div id="overlay">
		                    <div class="row">
		                        <i class="fa fa-arrow-up fa-3"></i>                        
		                        <h3 class="clearfix">
		                            Seleccionar algún departamento para ver los centros de atención
		                        </h3>
		                    </div>
		                </div>
						
						</div>
						
					
					</div>
					<?php
						/*
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'stag' ),
							'after'  => '</div>',
						) );
						*/


					echo get_field("texto_complementario");
					?>
				</div><!-- .entry-content -->

				<?php //get_template_part( 'content', 'gallery' ); ?>

				<?php //get_template_part( 'content', 'single-nextprev' ); ?>

				<?php //get_template_part( 'content', 'single-related' ); ?>


			</article><!-- #post-## -->


		</main><!-- #main -->
	</div><!-- #primary -->



<?php get_sidebar(); ?>

<script>

jQuery(document).ready(function(){
	
	var map;
    var mapOptions;
    var markers=[];
    var infowindow =[];

	  var style_map_paledawn = [{"stylers":[{"visibility":"on"},{"saturation":-100},{"gamma":0.54}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#4d4946"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"gamma":0.48}]},{"featureType":"transit.station","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"gamma":7.18}]}];

	  var mapOptions = {
	    zoom: 7,
	    center: new google.maps.LatLng(sucursal_cordenada_pais['lat'],sucursal_cordenada_pais['lng']),
	    mapTypeId: google.maps.MapTypeId.ROADMAP,
	    styles: style_map_paledawn,
	    scaleControl:false,
	    streetViewControl: false,
	    mapTypeControlOptions:{
	          style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
	          position: google.maps.ControlPosition.LEFT_CENTER,
	          mapTypeIds: [
	          google.maps.MapTypeId.ROADMAP,
	          google.maps.MapTypeId.SATELLITE
	          ]
	    },
	    zoomControlOptions: {
	      style: google.maps.ZoomControlStyle.SMALL,
	      position: google.maps.ControlPosition.LEFT_CENTER,
	    },
	    panControlOptions: {

	      position: google.maps.ControlPosition.LEFT_CENTER,
	    }
	  };

	   

	  map = new google.maps.Map(document.getElementById('map-restaurantes'), mapOptions); 



	  jQuery('.wrapper-buscar-map select[name="departamento"]').on('change', function(){

	      jQuery('.section-centros-atencion #overlay').animate({'opacity':0}, 2000, function(){
	        jQuery(this).remove();
	      });

	      if(markers!=[]){
	        for (var i = 0; i < markers.length; i++ ) {
	          markers[i].setMap(null);
	        }
	        markers=[];
	      } 
	      

	      var optionSelected = jQuery("option:selected", this);
	      var valueSelected = this.value;

	      jQuery('.wrapper-buscar-map select[name="sucursal"] optgroup').addClass('hide');
	      jQuery('.wrapper-buscar-map select[name="sucursal"]').find( jQuery( 'optgroup#s'+this.value ) ).removeClass('hide');
	      

	      map.panTo( new google.maps.LatLng( parseFloat( optionSelected.attr('data-lt') ), parseFloat( optionSelected.attr('data-ln') ) ) );
	      map.setZoom(13);

	      markers = [];

	      jQuery('select[name="sucursal"] optgroup#s'+this.value+' option').each(function(index){

	        var data_temp = "";
	        if( jQuery(this).attr('data-telefono') != ""){
	          data_temp = data_temp + "<strong>Teléfono:</strong> "+jQuery(this).attr('data-telefono')+'<br/>';
	        }

	        if( jQuery(this).attr('data-horario') != ""){
	          data_temp = data_temp + "<strong>Horarios:</strong>"+jQuery(this).attr('data-horarios')+'<br/>';
	        }

	          var marker = new google.maps.Marker({
	                        position: new google.maps.LatLng(parseFloat(jQuery(this).attr('data-lt')), parseFloat(jQuery(this).attr('data-ln'))), 
	                        map: map,
	                        draggable: false,
	                        id_branch:jQuery(this).attr('id'),
	                        //icon: "https:/latininteractive.digital/clients/hipotecario/website/wp-content/themes/hipotecario/xml/bbhh.png",
	                        html: "<h2>"+jQuery(this).attr('data-name')+"</h2>"+"<p>"+jQuery(this).attr('data-description')+"</p>"+data_temp,
	                        //animation: google.maps.Animation.DROP
	                        });

	          markers[parseInt(jQuery(this).attr('id'))] = marker;


	          infowindow = new google.maps.InfoWindow({
	            content: "Cargando..."
	          });

	          google.maps.event.addListener(marker, 'click', function(){
	            infowindow.setContent(this.html);
	            infowindow.open(map, this);

	            map.panTo(this.position);
	            map.setZoom(18);

	          });


	          //marker.setAnimation(google.maps.Animation.BOUNCE);
	          jQuery('.section-centros-atencion #overlay').remove();

	      });


	  });

	  jQuery('select[name="sucursal"]').on('change', function(){
	    var optionSelected = jQuery("option:selected", this);
	    var valueSelected = this.value;


	    map.panTo(markers[parseInt(optionSelected.attr('id'))].position);
	    map.setZoom(18);

	    infowindow.setContent(markers[parseInt(optionSelected.attr('id'))].html);
	    infowindow.open(map, markers[parseInt(optionSelected.attr('id'))] );

	  });

});
</script>
<style>
.hide{ display: none;}


.section-centros-atencion h1, 
.section-centros-atencion h2,
.section-centros-atencion h3,
.section-centros-atencion h4,
.section-centros-atencion h5,
.section-centros-atencion h6    
{
	color: #333;
}

.section-centros-atencion #overlay h3{ color: white; }

.select-dropdown{ width: 95%; color: #fff;}
.section-centros-atencion {
    background: #333;
    min-height: 550px;
    position: relative;
}
#map-restaurantes {
    height: 550px;
    margin: 0px;
    padding: 0px;
    width: 100%;
    z-index: 1;
    position: relative;
    transform: translateZ(0px); background-color: rgb(229, 227, 223);"
}

.section-centros-atencion #overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.8);
    z-index: 1;
}

.section-centros-atencion #overlay .row {
    color: #fff;
    text-align: center;
    top: 55%;
    margin-top: -50px;
    position: absolute;
    width: 100%;
    margin-right: 0; 
    margin-left: 0;
}

.section-centros-atencion .wrapper-buscar-map {
    /*position: absolute;*/
    z-index: 2;
    top: 0;
    width: 100%;
}

.section-centros-atencion #overlay i {
    font-size: 1.5em;
}
</style>
<?php get_footer(); ?>
