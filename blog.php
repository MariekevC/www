<?php
/*
Template Name: Blog
*/
?>

<?php
get_header();

<?php
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('posts_per_page=1'.'&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post();
?>

		get_template_part( 'content', get_post_format() );
	endwhile;
	get_footer(); 
<?php $wp_query = null; $wp_query = $temp;?>

?>



<?php /* get_header(); ?>

<div class="page-header"><a href="/support/"><h1>Development Blog</h1></a>
	<form role="search" method="get" class="headersearch" id="searchform" action="<?php echo home_url( '/' ); ?>">
	    	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
	        <input type="submit" id="searchsubmit" class="btn" value="Search" />
	</form>
</div>

<div class="row">
	
<?php if (have_posts()) : while (have_posts()) : the_post();?>

	<div class="span12">
		<h1><?php the_title();?></h1>
		<hr class="pagetitle">
		<div class="page-content">
			<?php the_content(); ?>
		</div>
	</div>
<?php endwhile; endif; ?>

	<div class="span4">
		<div class="sidebar">
			<div class="well">
			<?php 
			dynamic_sidebar('blog');
			?>
			</div>
		</div>
	</div>
		
</div>

<?php get_footer(); */?>

