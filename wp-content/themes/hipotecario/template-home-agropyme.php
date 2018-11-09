<?php
/**
 * Template Name: Home agro-pyme
 */


get_header() ?>

<?php 
	
	//get_template_part( 'content', 'lineasmenu' );

?>
<div class="row no-margin no-padding w100 h100vh relative">

	<div id="videobackg" class=""></div>

	<div class="row w100 title-container-agro">
		<div class="dtable">
			<div class="innerd">
				<h1 class="whitecolor max-width-300px margin0auto text-center uppercase fw800 entry-title"<?php stag_markup_helper( array( 'context' => 'title' ) ); ?>><?php the_title(); ?></h1>

				<a href="javascript:;" class="whitecolor max-width-300px margin-left-right-auto text-center uppercase display-block margin-top-40 scrolldown home-goto-agropyme">ver servicios<span></span></a>
			</div>
		</div>
	</div>
	<div class="innercontent customcontainer hidden">
		

		<?php
		/*
		$args = array(
			'post_parent' => get_the_ID(),
			'post_type'   => 'page', 
			'numberposts' => -1,
			'order' => 'ASC',
			'post_status' => 'publish' 
		);

		$children = get_children( $args );

		//print_r($children);
		?>
		<div class="dtable">
			<div class="innerd">
				<ul class="agropymelist nolist margin-bottom-40 hidden margin-top-50">
					<?php

					$delay = 0.2;
					
					foreach ( $children as $child )
					{
						?>
						<li class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="<?php echo $delay;?>s">
							<a class="" href="<?php echo get_permalink($child->ID); ?>">
								<h4 class="whitecolor uppercase no-margin"><?php echo $child->post_title ; ?></h4>
							</a>
						</li>
						<?php
						$delay = $delay + 0.2;
					}
					?>
				</ul>
			</div>
		</div>
		<?php */ ?>

	</div>

</div>

<div id="servicios-agropyme" class="row no-margin no-padding relative">

	<?php
	$args = array(
		'post_parent' => get_the_ID(),
		'post_type'   => 'page', 
		'numberposts' => -1,
		'order' => 'ASC',
		'post_status' => 'publish' 
	);

	$children = get_children( $args );

	//print_r($children);
	
	foreach ( $children as $child )
	{
		$img =  wp_get_attachment_image_src( get_post_thumbnail_id($child->ID),"full", false);
		//print_r($img);
		?>
		<div class="single-sub-page relative col-lg-3 col-md-3 col-sm-3 col-xs-6" style="background-image: url(<?php echo $img[0]; ?>);">
			<div class="overlay">
				<h5 class="text-center whitecolor uppercase"><?php echo $child->post_title ; ?></h5>
				<a href="<?php echo get_permalink($child->ID); ?>" class="uppercase btn gold margin0auto display-block max-width-200px colorblack">
					Ver información
				</a>
			</div>
		</div>
		<?php
	}
	?>

</div>

<div class="row no-margin padding-bottom-40 hidden">

	<div class="customcontainer padding-bottom-30">
		<?php
		echo "<h1 class='uppercase fwbold yellowcolor no-margin'>".the_title()."</h1>";
		?>
		<div class="row inner-banner breadcrumb">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			}
			?>
		</div>
		<?php
		$postid = get_post( get_the_ID() );
		$content = $postid->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]>', $content);
		echo $content;
		?>
	</div>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
