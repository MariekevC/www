<?php 
// fixes a bug with post ancestors, patch still not in core release
// see: http://core.trac.wordpress.org/ticket/10381
wp_cache_delete($post->ID, 'posts');

// Format title
if($post->post_type=="post"){
	echo '<a href="'.get_permalink($post->ID).'"><h2>Dev Blog > '.get_the_title().'</h2></a>';
} else if(in_array('15',get_post_ancestors($post->ID))){
	echo '<a href="'.get_permalink($post->ID).'"><h2>Dev Center > '.get_the_title().'</h2></a>';
} else if(in_array('14',get_post_ancestors($post->ID))){
	echo '<a href="'.get_permalink($post->ID).'"><h2> Suppport Centre > '.get_the_title().'</h2></a>';
} else {
	// Dont show pages that aren't in dev, support, or blog (they must be the core ones at the top)	
} 

// Content
echo str_ireplace(get_search_query(),'<strong>'.get_search_query().'</strong>',neat_trim(strip_shortcodes(get_the_content()),400));

?>