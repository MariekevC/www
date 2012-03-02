<?php
get_header(); 

if( is_blog() ){ ?>
<div class="page-header">
	<h1>Development Blog</h1>
</div>
<div class="row">
<div class="span12">
<?php
}
?>
<?php
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('posts_per_page=2'.'&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post();
?>


					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>
<?php $wp_query = null; $wp_query = $temp;?>

</div>
<div class="span4">
	<div class="sidebar">
		<div class="well">
<?php dynamic_sidebar('Blog widgets'); ?>
		</div>
	</div>
</div>
</div>
<?php get_footer(); ?>