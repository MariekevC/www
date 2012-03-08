<?php
get_header();
while ( have_posts() ) : the_post(); 
?>
<div class="page-header">
	<h1><a href="<?php echo home_url( '/' ); ?>/blog/">Development Blog</a></h1>
	<form role="search" method="get" class="headersearch" id="searchform" action="<?php echo home_url( '/' ); ?>">
	    	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
	        <input type="submit" id="searchsubmit" class="btn" value="Search" />
	</form>
</div>
<div class="row">	
	<div class="span16 post-header">
		<a href="<?php the_permalink(); ?>" target="_blank"><h2><?php the_title(); ?></h2></a>
		<div class="post-info">
		<small>Posted on <?php the_date(); ?> by <?php the_author(); ?></small>
		<?php echo get_the_tags_html($post->ID); ?>
		</div>
	</div>
</div> 
<div class="row">
	<div class="span16 post">
		<?php the_content(); ?>
	</div>
</div>
<?php 
endwhile; // end of the loop. 
get_footer(); ?>