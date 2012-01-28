<?php 
// TODO fix this as has_ancestor() function does not work as intended
// TODO stop last result from echoing <hr>
if(has_ancestor($post->ID,'Dev'))
{
	$title = '<a href="'.get_permalink($post->ID).'"><h2>Dev Center > '.get_the_title().'</h2></a>';
}
elseif(has_ancestor($post->ID,'Support'))
{
	$title = '<a href="'.get_permalink($post->ID).'"><h2>Support Center > '.get_the_title().'</h2></a>';
}
else
{
	$title = '<a href="'.get_permalink($post->ID).'"><h2>'.get_the_title().'</h2></a>';
}
echo $title; ?>
		<?php echo neat_trim(strip_shortcodes(get_the_content()),400); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>Pages:'. '</span>', 'after' => '</div>' ) );
if( ($wp_query->current_post + 1) != $wp_query->post_count ) {
	echo '<hr>';	
}
?>