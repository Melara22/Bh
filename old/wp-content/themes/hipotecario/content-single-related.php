<?php
/**
 * The template used for displaying home page
 *
 * @package StagFramework
 * @subpackage yttor
 */

$HOME_ID = get_option('page_on_front');
?>

<?php 
$orig_post = $post;
global $post;
$categories = get_the_category($post->ID);
if ($categories) {

	$category_ids = array();

	foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

		$args = array(
					'category__in' => $category_ids,
					'post__not_in' => array($post->ID),
					'posts_per_page'=> 3, // Number of related posts that will be shown.
					'caller_get_posts'=>1
				);

		$my_query = new wp_query( $args );
		if( $my_query->have_posts() ) 
		{
			
			?>
			<div id="related_posts" class="margin-bottom">
			<h3><?php echo __("Related Posts", 'visithntemplate');?></h3>
			<?php
			while( $my_query->have_posts() ) 
			{
				$my_query->the_post();?>
				<div class="col-lg-4">
					<div class="relatedthumb">
						<a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
						</a>
					</div>
					<div class="relatedcontent">
					<h3>
						<a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php the_title(); ?>
						</a>
					</h3>
				<?php the_time('M j, Y') ?>
					</div>
				</div>
			<?
			}
			echo '</ul></div>';
		}
}

$post = $orig_post;
wp_reset_query(); 

?>