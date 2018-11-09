<?php
/**
 * The template used for displaying home page
 *
 * @package StagFramework
 * @subpackage yttor
 */

$HOME_ID = get_option('page_on_front');
?>
<ul class="prevnextentries">
	<li class="prevlink">
		<h4 class=""><?php echo __("Previous Article", 'visithntemplate'); ?></h4>
		<?php previous_post_link('<i class="fa fa-angle-left" aria-hidden="true"></i> %link', '%title', 'true'); ?>
	</li>
	<li class="nextlink">
		<h4 class=""><?php echo __("Next Article", 'visithntemplate'); ?></h4>
		<?php next_post_link('<i class="fa fa-angle-right" aria-hidden="true"></i> %link', '%title', 'true'); ?>
	</li>
</ul>