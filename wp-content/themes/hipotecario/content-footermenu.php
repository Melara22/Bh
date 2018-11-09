<?php
/**
 * The template used for displaying home page
 *
 * @package StagFramework
 * @subpackage yttor
 */

$HOME_ID = get_option('page_on_front');

$footertextsuscrip = get_field("texto_suscripcion", $HOME_ID);
?>
<div class="subfooter row no-margin bg1d padding-top-40 padding-bottom-40">

	<div class="container">

		<div class="col-lg-10 col-md-12 ">

			<?php
			if ( has_nav_menu( 'footermenu') ) :
				wp_nav_menu( array( 'theme_location' => 'footermenu', 'menu_class'=>'footer-menu', "container"=>false ) );
			else:
	            echo '<li>' . __( 'Definir Footer Menú', 'swreg' ) . '</li>';
	        endif;
			?>

			<?php
			wp_nav_menu( array( 'menu' => 'footer-menu2', 'menu_class'=>'footer-secondary-menu nolist hidden', "container"=>false ) );
			?>

		</div>

		<div class="col-lg-2 col-md-2">

			<h4 class="whitecolor">SÍGUENOS</h4>

			<ul class="sn-list nolist">
				<li>
					<a href="#">
						<i class="fa fa-facebook" aria-hidden="true"></i>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-twitter" aria-hidden="true"></i>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-youtube-play" aria-hidden="true"></i>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-instagram" aria-hidden="true"></i>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-pinterest-p" aria-hidden="true"></i>
					</a>
				</li>
				
			</ul>

			<ul class="colorsnap-list nolist">
				<li class="colorsnap">
					<img src="<?php echo get_template_directory_uri().'/assets/img/color-snap-footer-logo.png'; ?>" class="img-responsive center-block" />
				</li>
				<li class="gplay">
					<a href="#">
						<img src="<?php echo get_template_directory_uri().'/assets/img/color-snap-footer-logo-gplay.png'; ?>" class="img-responsive center-block" />
					</a>
				</li>
				<li class="appstore">
					<a href="#">
						<img src="<?php echo get_template_directory_uri().'/assets/img/color-snap-footer-logo-appstore.png'; ?>" class="img-responsive center-block" />
					</a>
				</li>
			</ul>

		</div>

	</div>

</div>