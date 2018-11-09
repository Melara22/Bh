<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product hook
		 *
		 * @hooked woocommerce_show_messages - 10
		 */
		//do_action( 'woocommerce_before_single_product' );
	?>

	<div class="main-product-wrapper">

		<div class="product-back-container">
			<a href="javascript:;" class="back-arrow backto">
				<i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>
			</a>
		</div>
		<div class="product-breadcrumb-container padding-15">
			<?php woocommerce_breadcrumb(); ?>
			
			<?php
			/*
			if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('
			<p id="breadcrumbs">','</p>
			');
			}
			*/
			?>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 inner-product-container-lg">
			
			<div class="dtable">
				<div class="innerd">
					<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), "large");?>" class="img-responsive center-block">
				</div>
			</div>

		</div>

		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 right-product-desc padding-bottom-40 padding-left-40 padding-right-40 ">

			<h2 class="fw800"><?php echo get_the_title();?></h2>

			<?php
			$postid = get_the_ID();
			$content = $postid->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]>', $content);
			echo $content;

			$excerpt = get_the_excerpt();
			$excerpt = apply_filters('the_content',$excerpt);

			$postinfo = get_post( get_the_ID() );
			$content = $postinfo->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]>', $content);
			echo $content;
			//echo $excerpt = strip_shortcodes($excerpt);
			//echo $excerpt = strip_tags($excerpt);

			if( have_rows("sellos") )
			{
				
				$sellos = get_field("sellos");
				?>
				<ul class="sellos-list">
				<?php
				for($s=0; $s<count($sellos); $s++)
				{
					?>
					<li>
						<span class="<?php echo $sellos[$s]["sello"];?>"></span>
					</li>
					<?php
				}
				?>
				</ul>
				<?php
			}

			?>

			<ul class="links-products nolist">
				<li>
					<a href="#" class="btn btn-primary fwbold f12 inner-icon donde-comprar">
						<i class="fa fa-map-marker" aria-hidden="true"></i> Dónde comprar
					</a>
				</li>
				<li>
					<a href="#" class="btn btn-primary fwbold f12 inner-icon hoja-tecnica">
						<i class="fa fa-file-text" aria-hidden="true"></i> Hoja Técnica
					</a>
				</li>
				<li>
					<a href="#" class="btn btn-primary fwbold f12 inner-icon msds">
						<i class="fa fa-file-o" aria-hidden="true"></i> MSDS
					</a>
				</li>
				<li>
					<a href="#" class="btn btn-primary fwbold f12 inner-icon fds">
						<i class="fa fa-file-o" aria-hidden="true"></i> FDS
					</a>
				</li>
			</ul>

		</div>

		<div class="product-details-left hidden">
			<?php
				/**
				 * woocommerce_show_product_images hook
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );
			?>
		</div><!-- .product-details-left -->

		<div class="product-details-right hidden">
			<div class="summary entry-summary">

				<?php
					/**
					 * woocommerce_single_product_summary hook
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 */
					do_action( 'woocommerce_single_product_summary' );
				?>

			</div><!-- .summary -->
		</div><!-- .product-details-right -->

	</div><!-- .main-product-wrapper -->

	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		//do_action( 'woocommerce_after_single_product_summary' );
	?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
