<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">.
 *
 * @package StagFramework
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>
<body <?php body_class(); stag_markup_helper( array( 'context' => 'body' ) ); ?>>

<?php
$HOME_ID = get_option('page_on_front');

$toptext = get_field("texto_barra_superior", $HOME_ID);
$fburl = get_field("vinculo_facebook", $HOME_ID);
$twurl = get_field("vinculo_twitter", $HOME_ID);
$yturl = get_field("vinculo_youtube", $HOME_ID);
$igurl = get_field("vinculo_instagram", $HOME_ID);
?>

<div id="page" class="hfeed site">




<!-- hide -->
<div class="clearfix active  animated fadeIn" id="wrapper">

    <div id="sidebar-wrapper" class="clearfix ">


    <!--LogoMenu-->
    <div class="clearfix text-center sidebar-wrapper-logo hidden">
      <a  href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
      <img class="animated bounceIn margin-auto" src="<?php echo stag_get_option('general_custom_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>" />
      </a>
    </div>
    <!--end-->

      <div class="clearfix padding-top-30">
      	
        <nav id="spy" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 sidebar-menu-right animated bounceInDown hide padding-top-15">

              <ul class="sidebar-nav nav"></ul>
            	<?php
              	

          		wp_nav_menu(
          			array(
          					//"menu" => "footer-menu",
          					"menu" => "menu-principal",
          					"container" => false
          				)
          			);

  		        ?>
  		        
        </nav>
      </div>
    </div>

    <div id="page-content-wrapper">

	<?php
	is_archive();

	if( is_archive() )
	{

		

	}else{

		

	}

	
	?>

	<header id="masthead" class=" site-header <?php echo $classheader;?>"<?php stag_markup_helper( array( 'context' => 'header' ) ); ?>>

		<!--site-branding.logo-->
		<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12 no-padding hidden">

			<ul class="menu-main">
				<li>
					<a id="menu-toggle" href="#" class="glyphicon glyphicon-align-justify btn-menu toggle">
	                    <i class="fa fa-bars" aria-hidden="true"></i>
	                </a>
				</li>
				<li>
					<div class="dtable w100h100">
						<div class="innerd">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="mainlogolistcontainer">
								<?php if ( 'off' == stag_get_option( 'general_text_logo' ) && stag_get_option( 'general_custom_logo' ) != '' ) : ?>
								<img src="<?php echo stag_get_option('general_custom_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>">
								<?php else : ?>
								<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
								<?php endif; ?>
								<p class="site-description"><?php bloginfo( 'description' ); ?></p>
							</a>
						</div>
					</div>
				</li>
			</ul>
			
		</div>
		<!-- .site-branding -->
		<?php
		    /*
		    wp_nav_menu( array( 'theme_location' => 'menu-main',
		    	'container' => '','items_wrap' => '%3$s' ) );
		    */

		?>

		<div class="row no-margin darkblue2 gray-top-bar">
			<div class="container">

				<ul class="top-menu-second">
					<?php if($toptext!=""): ?>
					<li>
						<i class="fa fa-phone" aria-hidden="true"></i> <?php echo $toptext;?>
					</li>
					<?php endif; ?>
					<?php if($fburl!=""): ?>
					<li>
						<a href="<?php echo $fburl;?>" target="_blank">
							<i class="fa fa-facebook" aria-hidden="true"></i>
						</a>
					</li>
					<?php endif; ?>
					<?php if($twurl!=""): ?>
					<li>
						<a href="<?php echo $twurl;?>" target="_blank">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</li>
					<?php endif; ?>
					<?php if($yturl!=""): ?>
					<li>
						<a href="<?php echo $yturl;?>" target="_blank">
							<i class="fa fa-youtube-play" aria-hidden="true"></i>
						</a>
					</li>
					<?php endif; ?>
					<?php if($igurl!=""): ?>
					<li>
						<a href="<?php echo $igurl;?>" target="_blank">
							<i class="fa fa-instagram"></i>
						</a>
					</li>
					<?php endif; ?>
				</ul>

			</div>
		</div>

		<nav class="navbar navbar-inverse backgwhite">
			<div class="container relative">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			    <span class="sr-only">Toggle navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			  </button>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="navbar-brand">
					<?php if ( 'off' == stag_get_option( 'general_text_logo' ) && stag_get_option( 'general_custom_logo' ) != '' ) : ?>
					<img src="<?php echo stag_get_option('general_custom_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>" class="img-responsive main-top-logo">
					<?php else : ?>
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
					<?php endif; ?>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">

				<?php
				wp_nav_menu(
          			array(
          					//"menu" => "footer-menu",
          					"menu" => "menu-principal",
          					"container" => false,
          					"menu_class" => "nav navbar-nav main-top-menu"
          				)
          			);
				?>
			  <ul class="nav navbar-nav hidden">
			    <li class="active"><a href="#">Inicio</a></li>
			    <li class="dropdown">
			      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Información corporativa <span class="caret"></span></a>
			      <ul class="dropdown-menu">
			        <li><a href="#">Quiénes somos</a></li>
			        <li><a href="#">Gobierno corporativo</a></li>
			        <li><a href="#">Gestión integral de riesgos</a></li>
			        <li><a href="#">Se parte de nuestros proveedores</a></li>
			      </ul>
			    </li>
			    <li class="dropdown">
			      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nuestros servicios <span class="caret"></span></a>
			      <ul class="dropdown-menu">
			        <li><a href="#">Servicio1</a></li>
			        <li><a href="#">Servicio2</a></li>
			        <li><a href="#">Servicio3</a></li>
			        <li><a href="#">Servicio4</a></li>
			      </ul>
			    </li>
			    <li class="dropdown">
			      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Canales y productos <span class="caret"></span></a>
			      <ul class="dropdown-menu">
			        <li><a href="#">Producto1</a></li>
			        <li><a href="#">Producto2</a></li>
			        <li><a href="#">Producto3</a></li>
			        <li><a href="#">Producto4</a></li>
			      </ul>
			    </li>
			    <!--
			    <li><a href="#about">Sitios de interés</a></li>
			    <li><a href="#contact">Contáctanos</a></li>
			    <li><a href="#contact">Chat en línea</a></li>
			    -->
			  </ul>
			</div><!--/.nav-collapse -->
			</div>
		</nav>

	</header><!-- #masthead -->

	<?php

	if( (!is_home()) && (!is_front_page()) )
	{

		$classfullcont = "";

		if( is_page() )
		{

			$classfullcont = "with-banner";

			showtopbanner( get_the_ID() );

		}

		if( ( is_archive() ) || ( is_singular( 'galeria' ) ) )
		{

			$classfullcont = "with-banner";

			showtopbannerarchive( get_post_type() );
		}

	}

	

	?>

	<div class="nocontainer entirecontainer row no-padding <?php echo $classfullcont; ?>">
		<?php //get_template_part('_helper-background'); ?>

		<div id="content" class="site-content">
