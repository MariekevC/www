<?php
get_header(); 

if( is_blog() ){ ?>
<div class="page-header">
	<h1>Development Blog</h1>
	<form role="search" method="get" class="headersearch" id="searchform" action="<?php echo home_url( '/' ); ?>">
	    	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
	        <input type="submit" id="searchsubmit" class="btn" value="Search" />
	</form>
</div>
<div class="row">
	<div class="span16">
<?php
}
// The loop
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('posts_per_page=5'.'&paged='.$paged);

while ($wp_query->have_posts()) : $wp_query->the_post();
	get_template_part( 'content', get_post_format() );
endwhile;

$wp_query = null; $wp_query = $temp;
?>

	</div>
</div>
<?php next_posts_link(); ?>

<?php get_footer(); ?>