<?php

// Add Your Menu Locations
function register_my_menus() {
  register_nav_menus(
    array(
    	'blockimagesmenu' => __( 'Block Images Menu' ),   
    	'mainmenu' => __( 'Main Menu' ), 
    	'footermenu' => __( 'Footer Menu' )
    )
  );
} 
add_action( 'init', 'register_my_menus' );

add_filter('acf/settings/show_admin', '__return_false');

/** Step 2 (from text above). */
add_action( 'admin_menu', 'add_menu_imp_planes' );

/** Step 1. */
function add_menu_imp_planes() {
  //add_options_page( 'Importar planes', 'Importar planes', 'manage_options', 'importar-planes', 'process_importar_planes' );
  add_options_page( 'Importar agencias', 'Importar agencias', 'manage_options', 'importar-agencias', 'process_importar_agencias' );
  add_options_page( 'Importar ATMs', 'Importar atms', 'manage_options', 'importar-atms', 'process_importar_atms' );
}

function process_importar_agencias() {
  if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }
  include("process-importar-agencias.php");
}

function process_importar_atms() {
  if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }
  include("process-importar-atms.php");
}


//$api_key_sendgrid = "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";
$api_key_sendgrid = "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";

function generateRandomString($length = 5) {

  return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

}

function gi_getcv_module() {

	global $wpdb;

  if (!function_exists('wp_handle_upload')) {
    require_once(ABSPATH . 'wp-admin/includes/file.php');
  }

  $filegeneratedname = time()."_".generateRandomString();
  $extension = end(explode(".",  $_FILES['file']["name"]));
  $fullgeneratedfilename = $filegeneratedname.".".$extension;

  if( ($extension=="pdf") || ($extension=="doc") || ($extension=="docx") )
  {

    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE data_hojasdevida (
              idreg int(4) NOT NULL AUTO_INCREMENT,
              nombrecompleto varchar(250) NOT NULL,
              estadocivil varchar(25) NOT NULL,
              nacionalidad varchar(2) NOT NULL,
              telefono varchar(8) NOT NULL,
              docidentidad varchar(10) NOT NULL,
              discapacidad varchar(10) NOT NULL,
              fechanacimiento varchar(150) NOT NULL,
              vehiculo varchar(2) NOT NULL,
              genero varchar(25) NOT NULL,
              email varchar(250) NOT NULL,
              gradoacademico1 varchar(350) NOT NULL,
              gradoacademico2 varchar(350) NULL,
              gradoacademico3 varchar(350) NULL,
              intereses1 varchar(350) NOT NULL,
              intereses2 varchar(350) NULL,
              intereses3 varchar(350) NULL,
              fileoriginalname varchar(250) NOT NULL,
              archivocv varchar(100) NOT NULL,
              fecharegistro datetime NOT NULL,
              PRIMARY KEY  (idreg)
            ) $charset_collate; ";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    $to = ABSPATH . "wp-content/themes/hipotecario-child/uploads/cv/";

    if ( ( copy($_FILES["file"]["tmp_name"], $to . $filegeneratedname.".".$extension ) ) ):

      date_default_timezone_set("America/El_Salvador");

      $datatable_hojasdevida = $wpdb->insert( 
        "data_hojasdevida", 
        array(
          "idreg" => 0,
          "nombrecompleto" => trim(strip_tags($_POST["nombre"])),
          "estadocivil" => trim(strip_tags($_POST["estadocivil"])),
          "nacionalidad" => trim(strip_tags($_POST["nacionalidad"])),
          "telefono" => trim(strip_tags($_POST["telefono"])),
          "docidentidad" => trim(strip_tags($_POST["documento"])),
          "discapacidad" => trim(strip_tags($_POST["discapacidad"])),
          "fechanacimiento" => trim(strip_tags($_POST["fnacimiento"])),
          "vehiculo" => trim(strip_tags($_POST["vehiculo"])),
          "genero" => trim(strip_tags($_POST["genero"])),
          "email" => trim(strip_tags($_POST["correoelectronico"])),
          "gradoacademico1" => trim(strip_tags($_POST["grado_academico1"])),
          "gradoacademico2" => trim(strip_tags($_POST["grado_academico2"])),
          "gradoacademico3" => trim(strip_tags($_POST["grado_academico3"])),
          "intereses1" => trim(strip_tags($_POST["intereses1"])),
          "intereses2" => trim(strip_tags($_POST["intereses2"])),
          "intereses3" => trim(strip_tags($_POST["intereses3"])),
          "fileoriginalname" => $_FILES["file"]["name"],
          "archivocv" => $fullgeneratedfilename,
          'fecharegistro' => date("Y-m-d h:i:s")
        ) 
      );



      /*
      global $api_key_sendgrid;

      $body =  "<h3>Nueva Hoja de Vida</h3><br/></br>";
      $body .= "<strong>Nombre completo:</strong>  ".trim(strip_tags($_POST["nombre"]))."<br>";
      $body .= "<strong>Estado civil:</strong>  ".trim(strip_tags($_POST["estadocivil"]))."<br>";
      $body .= "<strong>Nacionalidad:</strong>  ".trim(strip_tags($_POST["nacionalidad"]))."<br>";
      $body .= "<strong>Teléfono:</strong>  ".trim(strip_tags($_POST["telefono"]))."<br>";
      $body .= "<strong>Doc. identidad:</strong>  ".trim(strip_tags($_POST["documento"]))."<br>";
      $body .= "<strong>Discapacidad:</strong>  ".trim(strip_tags($_POST["discapacidad"]))."<br>";
      $body .= "<strong>Fecha de Nac:</strong>  ".trim(strip_tags($_POST["fnacimiento"]))."<br>";
      $body .= "<strong>Posee vehiculo:</strong>  ".trim(strip_tags($_POST["vehiculo"]))."<br>";
      $body .= "<strong>Género:</strong>  ".trim(strip_tags($_POST["genero"]))."<br>";
      $body .= "<strong>Email:</strong>  ".trim(strip_tags($_POST["correoelectronico"]))."<br>";
      $body .= "<strong>Grado Académico A:</strong>  ".trim(strip_tags($_POST["grado_academico1"]))."<br>";
      $body .= "<strong>Grado Académico B:</strong>  ".trim(strip_tags($_POST["grado_academico2"]))."<br>";
      $body .= "<strong>Grado Académico C:</strong>  ".trim(strip_tags($_POST["grado_academico3"]))."<br>";
      $body .= "<strong>Grado Interés A:</strong>  ".trim(strip_tags($_POST["intereses1"]))."<br>";
      $body .= "<strong>Grado Interés B:</strong>  ".trim(strip_tags($_POST["intereses2"]))."<br>";
      $body .= "<strong>Grado Interés C:</strong>  ".trim(strip_tags($_POST["intereses3"]))."<br>";
      $body .= "<strong>Fecha:</strong>  ".date("Y-m-d h:i:s")."<br>";

      require "sendgrid-php/sendgrid-php.php";
      $sendgrid = new SendGrid($api_key_sendgrid);
      $emailA    = new SendGrid\Email();

      $emailtosendA = get_field("correo_a", get_the_ID() );

      $emailA->addTo($emailtosendA)
          ->setFrom("no-reply@bancohipotecario.com.sv")
          ->setSubject("Nueva Hoja de Vida ".trim(strip_tags($_POST["nombre"])))
          ->setHtml($body);

      $sendgrid->send($emailA);

      */




      //echo json_encode(array("status"=>1, "type"=>"success", "title"=>"recibido", "message"=>"todo recibido"));
      echo "success";

    else:
      echo "error";
    endif;

  }else{
    echo "errorext";
  }

	exit(0);
	
}

add_action( 'wp_ajax_gi_getcv', 'gi_getcv_module' );
add_action( 'wp_ajax_nopriv_gi_getcv', 'gi_getcv_module' );


$countries = array (
  'AD' => 'Andorra',
  'AE' => 'Emiratos Árabes Unidos',
  'AF' => 'Afganistán',
  'AG' => 'Antigua y Barbuda',
  'AI' => 'Anguila',
  'AL' => 'Albania',
  'AM' => 'Armenia',
  'AN' => 'Antillas Neerlandesas',
  'AO' => 'Angola',
  'AQ' => 'Antártida',
  'AR' => 'Argentina',
  'AS' => 'Samoa Americana',
  'AT' => 'Austria',
  'AU' => 'Australia',
  'AW' => 'Aruba',
  'AX' => 'Islas Åland',
  'AZ' => 'Azerbaiyán',
  'BA' => 'Bosnia-Herzegovina',
  'BB' => 'Barbados',
  'BD' => 'Bangladesh',
  'BE' => 'Bélgica',
  'BF' => 'Burkina Faso',
  'BG' => 'Bulgaria',
  'BH' => 'Bahréin',
  'BI' => 'Burundi',
  'BJ' => 'Benín',
  'BL' => 'San Bartolomé',
  'BM' => 'Bermudas',
  'BN' => 'Brunéi',
  'BO' => 'Bolivia',
  'BR' => 'Brasil',
  'BS' => 'Bahamas',
  'BT' => 'Bután',
  'BV' => 'Isla Bouvet',
  'BW' => 'Botsuana',
  'BY' => 'Bielorrusia',
  'BZ' => 'Belice',
  'CA' => 'Canadá',
  'CC' => 'Islas Cocos',
  'CD' => 'República Democrática del Congo',
  'CF' => 'República Centroafricana',
  'CG' => 'Congo',
  'CH' => 'Suiza',
  'CI' => 'Costa de Marfil',
  'CK' => 'Islas Cook',
  'CL' => 'Chile',
  'CM' => 'Camerún',
  'CN' => 'China',
  'CO' => 'Colombia',
  'CR' => 'Costa Rica',
  'CS' => 'Serbia y Montenegro',
  'CU' => 'Cuba',
  'CV' => 'Cabo Verde',
  'CX' => 'Isla Christmas',
  'CY' => 'Chipre',
  'CZ' => 'República Checa',
  'DE' => 'Alemania',
  'DJ' => 'Yibuti',
  'DK' => 'Dinamarca',
  'DM' => 'Dominica',
  'DO' => 'República Dominicana',
  'DZ' => 'Argelia',
  'EC' => 'Ecuador',
  'EE' => 'Estonia',
  'EG' => 'Egipto',
  'EH' => 'Sáhara Occidental',
  'ER' => 'Eritrea',
  'ES' => 'España',
  'ET' => 'Etiopía',
  'FI' => 'Finlandia',
  'FJ' => 'Fiyi',
  'FK' => 'Islas Malvinas',
  'FM' => 'Micronesia',
  'FO' => 'Islas Feroe',
  'FR' => 'Francia',
  'GA' => 'Gabón',
  'GB' => 'Reino Unido',
  'GD' => 'Granada',
  'GE' => 'Georgia',
  'GF' => 'Guayana Francesa',
  'GG' => 'Guernsey',
  'GH' => 'Ghana',
  'GI' => 'Gibraltar',
  'GL' => 'Groenlandia',
  'GM' => 'Gambia',
  'GN' => 'Guinea',
  'GP' => 'Guadalupe',
  'GQ' => 'Guinea Ecuatorial',
  'GR' => 'Grecia',
  'GT' => 'Guatemala',
  'GU' => 'Guam',
  'GW' => 'Guinea-Bissau',
  'GY' => 'Guyana',
  'HM' => 'Islas Heard y McDonald',
  'HN' => 'Honduras',
  'HR' => 'Croacia',
  'HT' => 'Haití',
  'HU' => 'Hungría',
  'ID' => 'Indonesia',
  'IE' => 'Irlanda',
  'IL' => 'Israel',
  'IM' => 'Isla de Man',
  'IN' => 'India',
  'IQ' => 'Iraq',
  'IR' => 'Irán',
  'IS' => 'Islandia',
  'IT' => 'Italia',
  'JE' => 'Jersey',
  'JM' => 'Jamaica',
  'JO' => 'Jordania',
  'JP' => 'Japón',
  'KE' => 'Kenia',
  'KG' => 'Kirguistán',
  'KH' => 'Camboya',
  'KI' => 'Kiribati',
  'KM' => 'Comoras',
  'KN' => 'San Cristóbal y Nieves',
  'KP' => 'Corea del Norte',
  'KR' => 'Corea del Sur',
  'KW' => 'Kuwait',
  'KY' => 'Islas Caimán',
  'KZ' => 'Kazajistán',
  'LA' => 'Laos',
  'LB' => 'Líbano',
  'LC' => 'Santa Lucía',
  'LI' => 'Liechtenstein',
  'LK' => 'Sri Lanka',
  'LR' => 'Liberia',
  'LS' => 'Lesoto',
  'LT' => 'Lituania',
  'LU' => 'Luxemburgo',
  'LV' => 'Letonia',
  'LY' => 'Libia',
  'MA' => 'Marruecos',
  'MC' => 'Mónaco',
  'MD' => 'Moldavia',
  'ME' => 'Montenegro',
  'MF' => 'San Martín',
  'MG' => 'Madagascar',
  'MH' => 'Islas Marshall',
  'MK' => 'Macedonia',
  'ML' => 'Mali',
  'MM' => 'Myanmar',
  'MN' => 'Mongolia',
  'MP' => 'Islas Marianas del Norte',
  'MQ' => 'Martinica',
  'MR' => 'Mauritania',
  'MS' => 'Montserrat',
  'MT' => 'Malta',
  'MU' => 'Mauricio',
  'MV' => 'Maldivas',
  'MW' => 'Malaui',
  'MX' => 'México',
  'MY' => 'Malasia',
  'MZ' => 'Mozambique',
  'NA' => 'Namibia',
  'NC' => 'Nueva Caledonia',
  'NE' => 'Níger',
  'NF' => 'Isla Norfolk',
  'NG' => 'Nigeria',
  'NI' => 'Nicaragua',
  'NL' => 'Países Bajos',
  'NO' => 'Noruega',
  'NP' => 'Nepal',
  'NR' => 'Nauru',
  'NU' => 'Isla Niue',
  'NZ' => 'Nueva Zelanda',
  'OM' => 'Omán',
  'PA' => 'Panamá',
  'PE' => 'Perú',
  'PF' => 'Polinesia Francesa',
  'PG' => 'Papúa Nueva Guinea',
  'PH' => 'Filipinas',
  'PK' => 'Pakistán',
  'PL' => 'Polonia',
  'PM' => 'San Pedro y Miquelón',
  'PN' => 'Pitcairn',
  'PR' => 'Puerto Rico',
  'PS' => 'Palestina',
  'PT' => 'Portugal',
  'PW' => 'Palau',
  'PY' => 'Paraguay',
  'QA' => 'Qatar',
  'RE' => 'Reunión',
  'RO' => 'Rumanía',
  'RS' => 'Serbia',
  'RU' => 'Rusia',
  'RW' => 'Ruanda',
  'SA' => 'Arabia Saudí',
  'SB' => 'Islas Salomón',
  'SC' => 'Seychelles',
  'SD' => 'Sudán',
  'SE' => 'Suecia',
  'SG' => 'Singapur',
  'SH' => 'Santa Elena',
  'SI' => 'Eslovenia',
  'SJ' => 'Svalbard y Jan Mayen',
  'SK' => 'Eslovaquia',
  'SL' => 'Sierra Leona',
  'SM' => 'San Marino',
  'SN' => 'Senegal',
  'SO' => 'Somalia',
  'SR' => 'Surinam',
  'ST' => 'Santo Tomé y Príncipe',
  'SV' => 'El Salvador',
  'SY' => 'Siria',
  'SZ' => 'Suazilandia',
  'TC' => 'Islas Turcas y Caicos',
  'TD' => 'Chad',
  'TF' => 'Territorios Australes Franceses',
  'TG' => 'Togo',
  'TH' => 'Tailandia',
  'TJ' => 'Tayikistán',
  'TK' => 'Tokelau',
  'TL' => 'Timor Oriental',
  'TM' => 'Turkmenistán',
  'TN' => 'Túnez',
  'TO' => 'Tonga',
  'TR' => 'Turquía',
  'TT' => 'Trinidad y Tobago',
  'TV' => 'Tuvalu',
  'TW' => 'Taiwán',
  'TZ' => 'Tanzania',
  'UA' => 'Ucrania',
  'UG' => 'Uganda',
  'US' => 'Estados Unidos',
  'UY' => 'Uruguay',
  'UZ' => 'Uzbekistán',
  'VA' => 'Ciudad del Vaticano',
  'VC' => 'San Vicente y las Granadinas',
  'VE' => 'Venezuela',
  'VG' => 'Islas Vírgenes Británicas',
  'VN' => 'Vietnam',
  'VU' => 'Vanuatu',
  'WF' => 'Wallis y Futuna',
  'WS' => 'Samoa',
  'YE' => 'Yemen',
  'YT' => 'Mayotte',
  'ZA' => 'Sudáfrica',
  'ZM' => 'Zambia',
  'ZW' => 'Zimbabue',
  'ZZ' => 'Región desconocida o no válida',
);

/*
function getnac($countries, $valorcomparacion)
{
  for($c=0; $c<count($countries); $c++)
  {
    if()
    {

    }
  }
}
*/


function themeslug_enqueue_script() {

	global $post;

	$template = basename(get_page_template());
	
	//if( $post->ID == 120 ){
	if( ( $template == "template-flipbook-2pages.php" ) || ( $template == "template-flipbook-1page.php" ) || ($template == "template-flipbook.php") )
	{

		wp_enqueue_style( 'animate_css', get_template_directory_uri(). '/assets/flipbook/css/style.css', array(), time(), null );

		wp_enqueue_script( 'swfobject2', get_template_directory_uri().'/assets/flipbook/js/swfobject2.js?t='.date("Ymdhis") );
		wp_enqueue_script( 'jquery.easing.1.3', get_template_directory_uri().'/assets/flipbook/js/jquery.easing.1.3.js?t='.date("Ymdhis"), array( 'jquery' ), STAG_THEME_VERSION, true );
		wp_enqueue_script( 'query.turn', get_template_directory_uri().'/assets/flipbook/js/turn.js?t='.date("Ymdhis"), array( 'jquery' ), STAG_THEME_VERSION, true );
		wp_enqueue_script( 'flipbook', get_template_directory_uri().'/assets/flipbook/js/flipbook.js?t='.date("Ymdhis"), array( 'jquery' ), STAG_THEME_VERSION, true );
		wp_enqueue_script( 'jquery.doubletap', get_template_directory_uri().'/assets/flipbook/js/jquery.doubletap.js?t='.date("Ymdhis"), array( 'jquery' ), STAG_THEME_VERSION, true );
		wp_enqueue_script( 'jquery.color', get_template_directory_uri().'/assets/flipbook/js/jquery.color.js?t='.date("Ymdhis"), array( 'jquery' ), STAG_THEME_VERSION, true );

	}

}

add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );













/**
* Returns ID of top-level parent category, or current category if you are viewing a top-level
*
* @param	string		$catid 		Category ID to be checked
* @return 	string		$catParent	ID of top-level parent category
*/

function get_if_is_in_usosproyectos($currentcat)
{

	$homeid = get_option('page_on_front');
	$idpageautomotriz = get_field("mainpage_automotriz", $homeid);
	$catauto = get_field("categoria_usos_proyectos", $idpageautomotriz->ID);

	
	if( cat_is_ancestor_of($catauto, $currentcat) )
	{

		return "container-prod-usosproyectos";

	}else{

		return "nocontainer-prod-usosproyectos";

	}
	

}

function pa_category_top_parent_id ($catid) {

	while ($catid) {
		$cat = get_category($catid); // get the object for the catid
		$catid = $cat->category_parent; // assign parent ID (if exists) to $catid
		// the while loop will continue whilst there is a $catid
		// when there is no longer a parent $catid will be NULL so we can assign our $catParent
		$catParent = $cat->cat_ID;
	}

	return $catParent;
}


function generar_select_paises()
{
	?>
	<ul class="nolist">
		<li id="fat-menu" class="dropdown">
			<a href="#" class="dropdown-toggle" id="drop3" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> Seleccionar país <span class="caret"></span> </a>
			<ul class="dropdown-menu country-list" aria-labelledby="drop3">
				<li><a href="#" class="sv">El Salvador</a></li>
				<li><a href="#" class="gt">Guatemala</a></li>
				<li><a href="#" class="hn">Honduras</a></li>
				<li><a href="#" class="ni">Nicaragua</a></li>
				<li><a href="#" class="cr">Costa Rica</a></li>
				<li><a href="#" class="pa">Panamá</a></li>
			</ul>
		</li>
	</ul>
	<?php
}

function showtopbannerarchive($cptslug)
{

  $homeid = get_option('page_on_front');

  switch($cptslug)
  {
    case "galeria":
      $bannerimg = get_field("archive_gallery_image_banner", $homeid );
    break;
  }

	?>
	<div class="top-banner animated fadeIn" style="background-image: url(<?php echo $bannerimg;?>); " data-stellar-background-ratio="0.8">
		
		<div class="overlay-banner">
		<div class="dtable w100h100">

			<div class="innerd">

				<div class="container">
				<?php
				$pinfo = get_post($myid); 
				//print_r($pinfo);

				?>
        <h1 class='uppercase fwbold yellowcolor no-margin'>
          <?php if( is_archive() ){ post_type_archive_title(); } if( is_singular( ) ){ echo get_post_type(); } ?>
        </h1>
					<div class="row inner-banner breadcrumb">
						<?php
						if ( function_exists('yoast_breadcrumb') ) {
      						yoast_breadcrumb('
      						<p id="breadcrumbs">','</p>
						');
						}
						?>
					</div>
				</div>

			</div>

		</div>
		</div>
	</div>
	<?php

}


function showtopbanner($myid)
{

	$mostrarbanner = get_field("mostrar_banner", $myid );
	$bannerimg = get_field("banner", $myid );

	if($mostrarbanner==1)
	{
    //data-stellar-background-ratio="1"
	?>
	<div class="top-banner animated fadeIn" style="background-image: url(<?php echo $bannerimg;?>);" data-stellar-background-ratio="0.8">
		
		<div class="overlay-banner">
		<div class="dtable w100h100">

			<div class="innerd">

				<div class="container">
				<?php
				$pinfo = get_post($myid); 
				//print_r($pinfo);

				if($pinfo->post_parent>0)
				{

					echo "<h1 class='uppercase fwbold yellowcolor no-margin'>".get_the_title($pinfo->post_parent)."</h1>";

				}else
				{

					echo "<h1 class='uppercase fwbold yellowcolor no-margin'>".get_the_title($pinfo->post_title)."</h1>";

				}
				?>
					<div class="row inner-banner breadcrumb">
						<?php
						if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('
						<p id="breadcrumbs">','</p>
						');
						}
						?>
					</div>
				</div>

			</div>

		</div>
		</div>
	</div>
	<?php
	}

}

function get_producttermid()
{
	$cat = get_queried_object();
	$cat->term_id;
	return $catid = $cat->term_id;
}

function buscarPaginaParaHeaderSingleProduct()
{	

	$HOME_ID = get_option('page_on_front');
	$maincats = get_field("relacionar_categoria_pagina", $HOME_ID);

	//print_r($maincats);

	global $post;
	$terms = get_the_terms( $post->ID, 'product_cat' );

	//print_r($terms);

	foreach ($terms as $term) {

		//obtener id de cat padre

	    for($ci = 0; $ci < count($maincats); $ci++)
	    {

	    	if($maincats[$ci]["categoria"] == $term->term_id)
	    	{

	    		//echo "<p>".$maincats[$ci]["categoria"]." == ".$term->term_id."</p>";
	    		// retornado: $maincats[$ci]["pagina"]->ID;
	    		return $maincats[$ci]["pagina"]->ID;
	    		break;

	    	}

	    }

	}

}

function getidforproductcategory($catid)
{

	$HOME_ID = get_option('page_on_front');

	if( have_rows("relacionar_categoria_pagina", $HOME_ID) )
	{

		$catpag = get_field("relacionar_categoria_pagina", $HOME_ID);

		//print_r($catpag);

		for($cp = 0; $cp < count($catpag); $cp++)
		{

			if( $catid == $catpag[$cp]["categoria"])
			{

				$pageid = $catpag[$cp]["pagina"]->ID;
				return $pageid;
				break;

			}

		}

	}else{

		return 0; 

	}


}



function gi_receiveformcontacto_module() {

	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$HOME_ID = get_option('page_on_front');

	$nombrecompleto = trim(strip_tags($_POST["nombre_completo"]));
	$correoelectronico = trim(strip_tags($_POST["email"]));
	$telefono = trim(strip_tags($_POST["telefono"]));
	$departamento = trim(strip_tags($_POST["departamento"]));
	$tipoconsulta = trim(strip_tags($_POST["tipo-consulta"]));
  $consulta = trim(strip_tags($_POST["consulta"]));
	//$pageid = trim(strip_tags($_POST["pid"]));
	$emailtosend = get_field("correo_receptor", get_the_ID() );
	$sitename = get_bloginfo( 'name' );

	$sql = "CREATE TABLE data_formcontacto (
			  idreg int(4) NOT NULL AUTO_INCREMENT,
			  nombrecompleto varchar(250) NOT NULL,
			  correoelectronico varchar(250) NOT NULL,
			  telefono varchar(10) NOT NULL,
			  departamento varchar(50) NOT NULL,
			  tipoconsulta varchar(25) NOT NULL,
			  consulta varchar(350) NOT NULL,
			  fecharegistro datetime NOT NULL,
			  textoadicional text,
			  PRIMARY KEY  (idreg)
			) $charset_collate; ";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );

	date_default_timezone_set("America/El_Salvador");

	$suscripcion_clubpintor = $wpdb->insert( 
		"data_formcontacto", 
		array(
			'idreg' => 0,
			'nombrecompleto' => $nombrecompleto, 
			'correoelectronico' => $correoelectronico, 
			'telefono' => $telefono, 
			'departamento' => $departamento, 
			'tipoconsulta' => $tipoconsulta, 
			'consulta' => $consulta, 
			'fecharegistro' => date("Y-m-d h:i:s"), 
			'textoadicional' => ""
		) 
	);

  /*
	
	//Enviar correo
	global $api_key_sendgrid;

	$body =  "<h3>Nuevo Contacto - ".$sitename."</h3><br/></br>";
	$body .= "<strong>Nombre completo:</strong>  ".$nombrecompleto."<br>";
	$body .= "<strong>Correo Electrónico:</strong>  ".$correoelectronico."<br>";
	$body .= "<strong>Teléfono:</strong>  ".$telefono."<br>";
	$body .= "<strong>Departamento:</strong>  ".$departamento."<br>";
	$body .= "<strong>Tipo de consulta:</strong>  ".$tipoconsulta."<br>";
	$body .= "<strong>Consulta:</strong>  ".$consulta."<br>";
	$body .= "<strong>Fecha registro:</strong>  ".date("Y-m-d h:i:s")."<br>";

	require "sendgrid-php/sendgrid-php.php";
	$sendgrid = new SendGrid($api_key_sendgrid);
	$email    = new SendGrid\Email();

	$email->addTo($emailtosend)
	    ->setFrom("no-reply@sherwinca.com")
	    ->setSubject("Nuevo Contacto - ".$sitename)
	    ->setHtml($body);

	$sendgrid->send($email);
	

	if( $suscripcion_clubpintor )
	{

		echo json_encode(array("status"=>1, "type"=>"success", "title"=>"Contacto", "message"=>"Gracias por escribirnos, hemos recibido tus comentarios. Pronto nos pondremos en contacto."));

	}else{

		echo json_encode(array("status"=>0, "type"=>"warning", "title"=>"Contacto", "message"=>"Ha ocurrido un error al recibir los datos, por favor inténtalo de nuevo."));
	}
  */

  echo json_encode(array("status"=>1, "type"=>"success", "title"=>"Contacto", "message"=>"Gracias por escribirnos, hemos recibido tus comentarios. Pronto nos pondremos en contacto."));

	exit(0);
}

add_action( 'wp_ajax_gi_receiveformcontacto', 'gi_receiveformcontacto_module' );
add_action( 'wp_ajax_nopriv_gi_receiveformcontacto', 'gi_receiveformcontacto_module' );





function gi_receiveformacademiapintor_module() {

	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$HOME_ID = get_option('page_on_front');

	$nombres = trim(strip_tags($_POST["nombres"]));
	$apellidos = trim(strip_tags($_POST["apellidos"]));
	$direccion = trim(strip_tags($_POST["direccion"]));
	$fnacimiento = trim(strip_tags($_POST["fnacimiento"]));
	$docidentidad = trim(strip_tags($_POST["docidentidad"]));
	$telcelular = trim(strip_tags($_POST["telcelular"]));
	$correoelectronico = $_POST["correoelectronico"];
	$pageid = trim(strip_tags($_POST["pid"]));
	$idpais = get_field("idpais", $HOME_ID);
	$emailtosend = get_field("correo_recibe", $pageid);
	$sitename = get_bloginfo( 'name' );

	$sql = "CREATE TABLE data_suscripcion_academia_pintor (
			  idusracademiapintor int(4) NOT NULL AUTO_INCREMENT,
			  idpais int(2) NOT NULL,
			  nombres varchar(250) NOT NULL,
			  apellidos varchar(250) NOT NULL,
			  direccion varchar(350) NOT NULL,
			  fnacimiento varchar(10) NOT NULL,
			  docidentidad varchar(20) NOT NULL,
			  telcelular varchar(10) NOT NULL,
			  email varchar(150) NOT NULL,
			  fecharegistro datetime NOT NULL,
			  textoadicional text,
			  PRIMARY KEY  (idusracademiapintor)
			) $charset_collate; ";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );

	date_default_timezone_set("America/El_Salvador");

	$suscripcion_clubpintor = $wpdb->insert( 
		"data_suscripcion_academia_pintor", 
		array(
			'idusracademiapintor' => 0,
			'idpais' => $idpais, 
			'nombres' => $nombres, 
			'apellidos' => $apellidos, 
			'direccion' => $direccion, 
			'fnacimiento' => $fnacimiento, 
			'docidentidad' => $docidentidad, 
			'telcelular' => $telcelular, 
			'email' => $correoelectronico, 
			'fecharegistro' => date("Y-m-d h:i:s"), 
			'textoadicional' => ""
		) 
	);

	//Enviar correo
	global $api_key_sendgrid;

	$body =  "<h3>Nueva Suscripción Academia del Pintor - ".$sitename."</h3><br/></br>";
	$body .= "<strong>Nombres:</strong>  ".$nombres."<br>";
	$body .= "<strong>Apellidos:</strong>  ".$apellidos."<br>";
	$body .= "<strong>Dirección:</strong>  ".$direccion."<br>";
	$body .= "<strong>F. Nac.:</strong>  ".$fnacimiento."<br>";
	$body .= "<strong>Doc. identidad:</strong>  ".$docidentidad."<br>";
	$body .= "<strong>Tel. Celular:</strong>  ".$telcelular."<br>";
	$body .= "<strong>Correo Electrónico:</strong>  ".$correoelectronico."<br><br><br>";
	$body .= "<strong>Fecha registro:</strong>  ".date("Y-m-d h:i:s")."<br>";

	require "sendgrid-php/sendgrid-php.php";
	$sendgrid = new SendGrid($api_key_sendgrid);
	$email    = new SendGrid\Email();

	$email->addTo($emailtosend)
	    ->setFrom("no-reply@sherwinca.com")
	    ->setSubject("Nueva Suscripción Academia del Pintor - ".$sitename)
	    ->setHtml($body);

	$sendgrid->send($email);
	

	if( $suscripcion_clubpintor )
	{

		echo json_encode(array("status"=>1, "type"=>"success", "title"=>"Suscripción Academia del Pintor", "message"=>"Hemos recibido tus datos. Pronto nos pondremos en contacto."));

	}else{

		echo json_encode(array("status"=>0, "type"=>"warning", "title"=>"Suscripción Academia del Pintor", "message"=>"Ha ocurrido un error al recibir los datos, por favor inténtalo de nuevo."));
	}

	exit(0);
}

add_action( 'wp_ajax_gi_receiveformacademiapintor', 'gi_receiveformacademiapintor_module' );
add_action( 'wp_ajax_nopriv_gi_receiveformacademiapintor', 'gi_receiveformacademiapintor_module' );

















































?>