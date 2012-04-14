<?php
get_header(); 
/// Work out page number
$page = get_query_var('paged');
if( is_blog() ){ ?>
<div class="page-header">
	<h1><a href="<?php echo home_url( '/' ); ?>blog/">Development News</a><?php if( $page ){ echo ' <small>Page ' . $page . '</small>'; } ?></h1>
	<form role="search" method="get" class="headersearch" id="searchform" action="<?php echo home_url( '/' ); ?>">
	    	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
	        <input type="submit" id="searchsubmit" class="btn" value="Search" />
	</form>
</div>
<div class="row">
	<div class="span16">
<?php
}
// The Query
query_posts( array( 'posts_per_page' => get_option( 'posts_per_page' ), 'paged' => $page ) );

// The Loop
while ( have_posts() ) : the_post();
		get_template_part( 'content', get_post_format() );
endwhile;

?>
	</div>
</div>
<div class="blogpagination old"><?php echo next_posts_link('&larr; Older blogs'); ?></div>
<div class="blogpagination new"><?php echo previous_posts_link('Newer blogs &rarr;'); ?></div>
<?php
get_footer(); 
?>