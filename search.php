<?php
get_header();
if ( have_posts() ) :
global $wp_query;
$total_results = $wp_query->found_posts;
?>
<div class="page-header"><h1>Search results for: "<?php echo get_search_query(); ?>" <small><?php echo $total_results; ?> results found</small></h1>
	<form role="search" method="get" class="headersearch" id="searchform" action="<?php echo home_url( '/' ); ?>">
	    <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
	    <input type="submit" id="searchsubmit" class="btn" value="Search" />
	</form>
</div>
<?php while ( have_posts() ) : the_post(); 
/* Include the Post-Format-specific template for the content.
 * If you want to overload this in a child theme then include a file
 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
 */
get_template_part( 'content', 'searchresult' );
endwhile; 
else : 
?>
<div class="page-header">
	<h1>No results for: "<?php echo get_search_query(); ?>" <small>Try refining your search.</small></h1>
</div>
<?php 
endif;
dynamic_sidebar('Home-Footer');
get_footer(); 
?>