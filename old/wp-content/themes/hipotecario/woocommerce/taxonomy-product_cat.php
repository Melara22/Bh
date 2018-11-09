<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StagFramework
 * @subpackage yttor
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main"<?php stag_markup_helper( array( 'context' => 'content', 'post_type' => 'post' ) ); ?>>

		<?php if ( have_posts() ) : ?>

			<header class="page-header hidden">
				<h1 class="page-title no-margin">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							the_post();
							printf( __( 'Author: %s', 'stag' ), '<span class="vcard">' . get_the_author() . '</span>' );
							rewind_posts();

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'stag' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'stag' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'stag' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'stag' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'stag');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'stag' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'stag' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'stag' );

						else :
							_e( 'Archives', 'stag' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			


			<?php
			$mostrarproductos = false;
			$tax = $wp_query->get_queried_object();

			$maintopcat = pa_category_top_parent_id($tax->term_id);
			$idpage = buscarPaginaParaHeaderSingleProduct($maintopcat);
			$texto_before_select = get_field("texto_productos_campo_seleccion", $idpage);

			//print_r($tax);

			$catlist = get_categories(
					        array(
						        'taxonomy'		=> "product_cat",
						        'child_of'		=> $tax->term_id,
						        'parent'		=> $tax->term_id,
						        'orderby'		=> 'id',
						        'order'			=> 'ASC',
						        'hide_empty'	=> '0',
						        'hierarchical' => $hierarchical
					        ) 
				        );


			if( $tax->parent>0 )
			{


				get_template_part( 'content', 'lineasmenu' );
			?>
			<div class="product-back-container">
				<a href="<?php echo get_term_link($tax->parent);?>" class="back-arrow backto">
					<i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>
				</a>
			</div>
			<div class="product-breadcrumb-container"><?php woocommerce_breadcrumb(); ?></div>


			<div class="customcontainer subcatcontainer margin-bottom-40">
			<?php
				

			}

			

			if( $tax->parent==0 )
			{

				if( count($catlist)>0 )
				{

					get_template_part( 'content', 'cat-lineastax' );

					/*
					echo "<ul id='list-product-category' class='nolist list-product-category hidden'>";
					foreach($catlist as $list)
					{

						echo "<li>";
						echo "<img src='".do_shortcode("[wp_custom_image_category onlysrc='true' size='full' term_id='".$list->term_id."' alt='my custom alt']")."' class='img-responsive' />";

							echo "<a href='".get_term_link($list->term_id)."'>";

							echo "<div class='text-overlay'>";
								echo "<div class='dtable'>";
									echo "<div class='innerd'>";			
										echo "<h5 class='text-center whitecolor uppercase fwbold textshadow'>".$list->name."</h5>";
									echo "</div>";
								echo "</div>";
							echo "</div>";

							echo "</a>";

						echo "</li>";

					}
					echo "</ul>";
					*/

				}


			}else{

				if( count($catlist)>0 )
				{

					echo "<h2 class='uppercase fw800 padding-bottom-30'>".$tax->name."</h2>";

					echo "<hr class='lineaftercatname' />";

					if( strlen($tax->description) > 0 )
					{

						echo "<div class='padding-bottom-30'>".apply_filters('the_content', $tax->description)."</div>";

					}
		        
			        echo "<h5 class='fw700 letterspacing2px select-system uppercase'>".__( $texto_before_select, 'swreg' )."</h4>";

					echo "<select name='selectsubcat' id='selectsubcat' class='redirect_to uppercase'>";
						echo "<option value='' disabled selected >Seleccionar</option>";
					foreach($catlist as $list)
					{

						//echo "<p>termid: ".$list->term_id."</p>";

						$sel = ($tax->term_id==$list->term_id) ? "selected" : "" ;

						echo "<option value='".get_term_link($list->term_id)."' ".$sel.">";
							echo $list->name;
						echo "</option>";

					}
					echo "</select>";

					/*
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
					*/

				}else{

					$mostrarproductos = true;

					//Volver a escribir select

						$catlist = get_categories(
								        array(
									        'taxonomy'		=> "product_cat",
									        'child_of'		=> $tax->term_id,
									        'parent'		=> $tax->term_id,
									        'orderby'		=> 'id',
									        'order'			=> 'ASC',
									        'hide_empty'	=> '0',
									        'hierarchical' => $hierarchical
								        ) 
							        );

						//print_r($catlist);

						//Get term parent
						$parent = get_term($tax->parent);
						//print_r($parent);

						echo "<h2 class='uppercase fw800 padding-bottom-30'>".$parent->name." </h2>";

						echo "<hr class='lineaftercatname' />";

						if( strlen($parent->description) > 0 )
						{

							echo "<div class='padding-bottom-30 hidden'>".apply_filters('the_content', $parent->description)."</div>";

						}

						if( count($catlist)>0 )
						{
				        
					        echo "<h5 class='fw700 letterspacing2px select-system uppercase'>".__( $texto_before_select, 'swreg' )."</h4>";

							echo "<select name='selectsubcat' id='selectsubcat' class='redirect_to uppercase'>";
								echo "<option value='' disabled selected >Seleccionar</option>";
							foreach($catlist as $list)
							{

								//echo "<p>termid: ".$list->term_id."</p>";

								$sel = ($tax->term_id==$list->term_id) ? "selected" : "" ;

								echo "<option value='".get_term_link($list->term_id)."' ".$sel.">";
									echo $list->name;
								echo "</option>";

							}
							echo "</select>";

						}else{

							//Escribir el select del padre
							$catlist = get_categories(
								        array(
									        'taxonomy'		=> "product_cat",
									        'child_of'		=> $parent->term_id,
									        'parent'		=> $parent->term_id,
									        'orderby'		=> 'id',
									        'order'			=> 'ASC',
									        'hide_empty'	=> '0',
									        'hierarchical' => $hierarchical
								        ) 
							        );

							echo "<h5 class='fw700 letterspacing2px select-system uppercase'>".__( $texto_before_select, 'swreg' )."</h4>";

							echo "<select name='selectsubcat' id='selectsubcat' class='redirect_to uppercase'>";
								echo "<option value='' disabled selected >Seleccionar</option>";
							foreach($catlist as $list)
							{

								//echo "<p>termid: ".$list->term_id."</p>";

								$sel = ($tax->term_id==$list->term_id) ? "selected" : "" ;

								echo "<option value='".get_term_link($list->term_id)."' ".$sel.">";
									echo $list->name;
								echo "</option>";

							}
							echo "</select>";

						}

						echo "<h3 class='uppercase fw800 colorblack padding-bottom-10'>".$tax->name."</h3>";

						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
							printf( '<div class="taxonomy-description">%s</div>', $term_description );
						endif;

				}

			}



			if( $tax->parent>0 )
			{
			?>
			</div>
			<?php
			}

			

			$classusosproycontainer = get_if_is_in_usosproyectos($tax->term_id);
			?>

			

				<?php if( $mostrarproductos ) : ?>


					<div class="row <?php echo $classusosproycontainer;?>">

						<div class="customcontainer">

							<div id="products-container" class="row no-margin padding-top-40 products-container">

					

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to overload this in a child theme then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
						?>

					<?php endwhile; ?>

							</div>

						</div>

					</div>

					

				<?php endif; ?>

			

			<div role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="wrapper-pagination hidden">

				<?php
				/*
					//Custom entries pagination // paginacion para entradas
					$total_pages = $wp_query->max_num_pages;
					$big         = 999999999;

					if ( $total_pages > 1 ) {
						if ( $total_pages > 1 ) {

							//$current_page = max(1, get_query_var('paged'));
							$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;


							$return = paginate_links(array(
								'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format'    => '/page/%#%',
								'current'   => $current_page,
								'total'     => ($current_page + 2),
								'show_all'  => false,
								'end_size'  => 5,
								'mid_size'  => ($current_page - 2),
								//'total'     => 3,
								'prev_next' => false,
								'type'      => 'array'
							));

							echo "<div class='clearfix'>";

								if ( get_previous_posts_link() ){
									 echo previous_posts_link( __( '<span class="fa fa-angle-left"></span>', 'stag' ) );

								}

							//echo "{$return}";
							//echo "total pages: " . 
							$total_pages;
							//."<br/>";
							//echo "current page: " . 
							$current_page;
							//."<br/>";

							if($current_page==1)
							{
								//echo "es igual a 1<br/>";

								for($p=0; $p<2; $p++)
								{
									echo $return[$p];
								}

							}elseif( ($current_page>1) && ($current_page<$total_pages) ){

								//echo "> 1 and < 14 <br/>";
								//echo "UNO MENOR: " . 
								$uno_menor = ($current_page-1);
								//echo "<br/>";
								//echo "UNO MAYOR: " . 
								$uno_mayor = ($current_page+1);
								//echo "<br/>";

								for($p=0; $p<count($return); $p++)
								{
									//echo strip_tags($return[$p])."<br/>";

									if( strip_tags($return[$p]) == $uno_menor ){ echo $return[$p]; }
									if( strip_tags($return[$p]) == $current_page){ echo $return[$p]; }
									if( strip_tags($return[$p]) == $uno_mayor){ echo $return[$p]; }

								}

							}elseif($current_page==$total_pages){

								//echo "es igual a 14<br/>";
								$uno_menor = ($current_page-1);

								for($p=0; $p<count($return); $p++)
								{
									//echo strip_tags($return[$p])."<br/>";

									if( strip_tags($return[$p]) == $uno_menor ){ echo $return[$p]; }
									if( strip_tags($return[$p]) == $current_page){ echo $return[$p]; }

								}

							}

							

							//print_r($return);


								if ( get_next_posts_link() ){
									echo next_posts_link( __( '<span class="fa fa-angle-right"></span>', 'stag' ) );
						 		}

							echo "</div>";
						}
					} else {
						return false;
					}
				*/
				?>
			</div>
			
			

		<?php else: ?>

			<?php
			get_template_part( 'content', 'lineasmenu' );

			$tax = $wp_query->get_queried_object();

			//print_r($tax);

			$catlist = get_categories(
					        array(
						        'taxonomy'		=> "product_cat",
						        'child_of'		=> $tax->term_id,
						        'parent'		=> $tax->term_id,
						        'orderby'		=> 'id',
						        'order'			=> 'ASC',
						        'hide_empty'	=> '0',
						        'hierarchical' => $hierarchical
					        ) 
				        );

			?>
			




			<?php
			$term_description = term_description();
			if ( ! empty( $term_description ) ) :
			?>
			<div class="product-back-container">
				<a href="javascript:;" class="back-arrow backto">
					<i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>
				</a>
			</div>
			<div class="product-breadcrumb-container"><?php woocommerce_breadcrumb(); ?></div>


			<div class="customcontainer subcatcontainer margin-bottom-40">

				<h2 class='uppercase fw800 padding-bottom-30'><?php echo $tax->name;?></h2>

				<hr class='lineaftercatname' />

				<?php printf( '<div class="taxonomy-description">%s</div>', $term_description ); ?>
			</div>
			<?php
			else:

				get_template_part( 'no-results', 'archive' );

			endif;
			?>

			

			













			<?php //get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
