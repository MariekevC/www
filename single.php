<?php
get_header();
while ( have_posts() ) : the_post(); 
?>
<div class="page-header">
	<a href="<?php get_permalink(14); ?>">
		<h1><?php the_title(); ?> <small><?php the_date(); ?></small></h1>
	</a>
</div> 
<?php 
the_content();
endwhile; // end of the loop. 
get_footer(); ?>