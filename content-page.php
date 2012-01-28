<?php 
// Check if id Dev page or has the Dev ancestor
$dev = has_ancestor('Dev',$post->ID);
$support = has_ancestor('Support',$post->ID);
if(is_page('Dev') || $dev)
{
	get_template_part('dev');
} 
elseif(is_page('Support') || $support) 
{
	get_template_part('support');
}
else
{
	the_content();
}
if(is_front_page()){
	// Show the widget footer
	echo '<hr><div class="row">';
	dynamic_sidebar('Home Footer');	
	echo '</div>';
}
?>
