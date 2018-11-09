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

			
		


			<div id="articlescontainer" class="row no-margin padding-top-40 products-container">

				hola hola hola

				<?php if( $mostrarproductos ) : ?>

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

				<?php endif; ?>

			</div>

			<div role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="wrapper-pagination">

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
			
			<?php
			if( $tax->parent>0 )
			{
			?>
			</div>
			<?php
			}
			?>

		<?php else: ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
