<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package StagFramework
 * @subpackage yttor
 */
?>
		</div><!-- #content -->
	</div><!-- .content-wrapper -->

	<?php
		/**
		 * @hooked stag_display_static_content() - Displays static content in footer.
		 */
		do_action( 'before_footer' );
	?>

	<div class="overflow-hidden order-top-1px-solid-253d container-fluid color-white padding-top-20 padding-bottom-20 f12 backgdarkblue">
		<footer id="colophon" class="site-footer color-white container no-padding"<?php stag_markup_helper( array( 'context' => 'footer' ) ); ?>>

			<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
				<div class="inside">
					<div class="grids footer-widget-area">
						<?php dynamic_sidebar( 'sidebar-2' ); ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav class="footer-menu-wrapper"<?php stag_markup_helper( array( 'context' => 'nav' ) ); ?>>
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footer-menu navigation', 'container' => false ) ); ?>
			</nav>
			<?php endif; ?>

			<div class="container">
				<?php
				$HOME_ID = get_option('page_on_front');
				$fburl = get_field("vinculo_facebook", $HOME_ID);
				$twurl = get_field("vinculo_twitter", $HOME_ID);
				$yturl = get_field("vinculo_youtube", $HOME_ID);
				$igurl = get_field("vinculo_instagram", $HOME_ID);
				?>

				<?php
				wp_nav_menu(
          			array(
          					//"menu" => "footer-menu",
          					"menu" => "footer-menu",
          					"container" => false,
          					"menu_class" => "footer-menu"
          				)
          			);
				?>
			<ul id="" class="footer-menu hidden">
				<li id="footer-social">
					Síguenos en las redes
					<ul class="sn">
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
				</li>

			</ul>

		</div>

			

		</footer><!-- #colophon -->
	</div>

	<div class="overflow-hidden order-top-1px-solid-253d container-fluid color-white padding-top-20 padding-bottom-20 f12 backgdarkblue2">
		<div class="container">
			<?php
			$footer_text = stag_get_option('general_footer_text');
			if ( $footer_text != '' ) :
			?>
			<div class="site-info ">
				<div class="inside">
					<?php echo stripslashes($footer_text); ?>
				</div>
			</div><!-- .site-info -->
			<?php endif; ?>
		</div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>
</div><!--end#page-content-wrapper-->
</div><!--end#wrapper-->

</body>
</html>
