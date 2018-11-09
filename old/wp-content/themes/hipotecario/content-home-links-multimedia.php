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

$homeyt_video = get_field("home_slider", $HOME_ID);

//print_r($main_slider);
?>
<div id="otherlinks-multimedia" class="row no-margin no-padding backgwhite">

	<div class="container">

		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

			<ul id="otherlinks">

				<li>
					<a href="<?php echo get_permalink(get_field("pagina_tasas_intereses",$HOME_ID));?>">
						<span class="icon-icons_tazas-interes"></span>
						<div class="dtable w100h100">

							<div class="innerd">
							Tasas de interés, comisiones y recargos
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo get_permalink(get_field("pagina_calculadora_prestamos",$HOME_ID));?>">
						<span class="icon-icons_calculadora-prestamos"></span>
						<div class="dtable w100h100">

							<div class="innerd">
							Calculadora de préstamos
							</div>

						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo get_permalink(get_field("pagina_informe_financiero",$HOME_ID));?>">
						<span class="icon-icons_informe-financiero"></span>
						<div class="dtable w100h100">

							<div class="innerd">
							Informe Financiero
							</div>
						</div>
					</a>
				</li>
				<li class="hidden">
					<a href="#">
						<span class="icon-icons_tdr-cultura"></span>
						<div class="dtable w100h100">

							<div class="innerd">
							TDR'S Cultura emprendedora
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo get_permalink(get_field("pagina_listado_de_activos_ext",$HOME_ID));?>">
						<span class="icon-icons_activos-extraordinarios"></span>
						<div class="dtable w100h100">

							<div class="innerd">
							Listado de activos extraordinarios
							</div>
						</div>
					</a>
				</li>
				<li class="hidden">
					<a href="#">
						<span class="icon-icons_tdr-fortalecimiento"></span>
						<div class="dtable w100h100">

							<div class="innerd">
							TDR’S Fortalecimiento de productos financieros
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo get_permalink(get_field("pagina_medidas_de_seguridad",$HOME_ID));?>">
						<span class="icon-icons_medidas-seguridad"></span>
						<div class="dtable w100h100">

							<div class="innerd">
							Medidas de seguridad
							</div>
						</div>
					</a>
				</li>
				<li class="hidden">
					<a href="#">
						<span class="icon-icons_tdr-desarrollo"></span>
						<div class="dtable w100h100">

							<div class="innerd">
							TDR'S Desarrollo de capacidades
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="<?php echo get_permalink(get_field("pagina_museo_bh",$HOME_ID));?>">
						<span class="icon-icons_museo"></span>
						<div class="dtable w100h100">

							<div class="innerd">
							Museo Banco Hipotecario
							</div>
						</div>
					</a>
				</li>
				<li class="gray">
					<?php $rsedata = get_field("pagina_rse",$HOME_ID); ?>
					<a href="<?php echo get_permalink($rsedata->ID);?>" class="line-height-15px uppercase">
						<span class="icon-icons_rse"></span>
						<div class="dtable w100h100">
							<div class="innerd">
							<?php echo get_field("titulo_pagina_rse",$HOME_ID);?>
							</div>
						</div>
					</a>
				</li>
				<li class="gray">
					<?php $saladata = get_field("pagina_sala_de_prensa",$HOME_ID); ?>
					<a href="<?php echo get_permalink($saladata->ID);?>" class="line-height-15px uppercase">
						<span class="icon-icons_prensa"></span>
						<div class="dtable w100h100">
							<div class="innerd">
							<?php echo get_field("titulo_pagina_sala_prensa",$HOME_ID);?>
							</div>
						</div>
					</a>
				</li>
				<li class="hidden">
					<a href="#">
						<span class="icon-icons_subasta"></span>
						<div class="dtable w100h100">

							<div class="innerd">
							Subasta FOSAFFI
							</div>
						</div>
					</a>
				</li>
				<li class="hidden">
					<a href="#">
						<span class="icon-icons_chat"></span>
						<div class="dtable w100h100">

							<div class="innerd">
							E-Chat de servicio E-Banking
							</div>
						</div>
					</a>
				</li>
				<li class="hidden">
					<a href="#">
						<span class="icon-icons_mercado-valores"></span>
						<div class="dtable w100h100">

							<div class="innerd">
							Mercado de Valores SSF
							</div>
						</div>
					</a>
				</li>

			</ul>

		</div>

		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 multimedia-container ">

			<div class="home-yt-container">
				<iframe src="https://www.youtube.com/embed/<?php echo get_field("home_youtube_id_video");?>?rel=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
			</div>

			<ul class="nolist home-2access hidden">
				<?php $rsedata = get_field("pagina_rse",$HOME_ID); ?>
				<li class="one">
					<a href="<?php echo get_permalink($rsedata->ID);?>" class="line-height-15px uppercase">
						<span class="icon-icons_rse"></span>
						<?php echo get_field("titulo_pagina_rse",$HOME_ID);?>
					</a>
				</li>
				<li class="two">
					<?php $saladata = get_field("pagina_sala_de_prensa",$HOME_ID); ?>
					<a href="<?php echo get_permalink($saladata->ID);?>" class="line-height-15px uppercase">
						<span class="icon-icons_prensa"></span>
						<?php echo get_field("titulo_pagina_sala_prensa",$HOME_ID);?>
					</a>
				</li>
			</ul>

		</div>

		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 multimedia-container hidden">

			

			<ul id="hometabsmedia" class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Fotos</a></li>
				<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Videos</a></li>
				<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Prensa</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="home">
					
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/galeria1.jpg" class="img-responsive">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/galeria2.jpg" class="img-responsive">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/galeria3.jpg" class="img-responsive">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/galeria4.jpg" class="img-responsive">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/galeria5.jpg" class="img-responsive">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/galeria6.jpg" class="img-responsive">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/galeria7.jpg" class="img-responsive">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/galeria8.jpg" class="img-responsive">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-padding">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/galeria9.jpg" class="img-responsive">
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 button-container">

						<a href="#" class="btn btn-default btn-block backg2b">VER GALERÍA DE FOTOS</a>

					</div>

				</div>
				<div role="tabpanel" class="tab-pane" id="profile">
					
					<iframe class="" src="https://www.youtube.com/embed/2IMUcL0qICk?rel=0" frameborder="0" allowfullscreen></iframe>

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 button-container">

						<a href="#" class="btn btn-default btn-block backg2b">VER GALERÍA DE VIDEOS</a>

					</div>

				</div>
				<div role="tabpanel" class="tab-pane" id="messages">
					
					<div class="singlenew">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/galeria9.jpg" class="img-responsive" align="left" style=""> <b>Phasellus lobortis odio eu massa tincidunt eleifend</b> 
						<div class="date">03/12/2017</div>
						Aliquam felis eros, molestie eget enim id, porta tincidunt turpis. Ut tortor elit, faucibus eu nibh vel, iaculis. 
						<a href="#">VER MÁS</a> 
					</div>

					<div class="singlenew">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/galeria9.jpg" class="img-responsive" align="left" style=""> <b>liquam felis eros, molestie eget enim</b> 
						<div class="date">03/12/2017</div>
						Porta tincidunt turpis. Ut tortor elit, faucibus eu nibh vel, iaculis pellentesque turpis. 
						<a href="#">VER MÁS</a> 
					</div>

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 button-container">

						<a href="#" class="btn btn-default btn-block backg2b">VER MÁS</a>

					</div>

				</div>
			</div>

		</div>

	</div>

</div>