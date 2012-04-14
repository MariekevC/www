<?php
/*
Template Name: Developer Centre
*/
?>

<?php get_header(); ?>

<div class="page-header"><h1><a href="<?php echo home_url( '/' ); ?>dev/">Developer Centre</a></h1>
	<form role="search" method="get" class="headersearch" id="searchform" action="<?php echo home_url( '/' ); ?>">
	    	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
	        <input type="submit" id="searchsubmit" class="btn" value="Search" />
	</form>
</div>

<div class="row">
	<div class="span3">
		<div class="sidebar">
			<div class="well">
			<?php 
			wp_nav_menu(array('theme_location' => 'dev-nav'));
			?>
			</div>
		</div>
	</div>
	
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<?php
$title = get_the_title();
?>
	<div class="span9">
<?php
if( $title != 'Dev' ){
?>
		<h1><?php the_title();?></h1>
		<hr class="pagetitle">
<?php 
}
?>
		<div class="page-content">
			<?php the_content(); ?>
		</div>
<?php endwhile; endif; ?>

	</div>
</div>

<?php get_footer(); ?>
