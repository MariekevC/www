<?php
get_header(); 

if( is_blog() ){ ?>
<div class="page-header">
	<h1>Development Blog</h1>
</div>
<?php
}
?>
<?php
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('posts_per_page=5'.'&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post();
?>


					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>
<?php $wp_query = null; $wp_query = $temp;?>



<?php get_footer(); ?>