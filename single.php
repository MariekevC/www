<?php
get_header();
while ( have_posts() ) : the_post(); 
?>
<div class="page-header">
	<h1><a href="/blog/">Development Blog</a></h1>
</div>
<div class="row">	
	<div class="span16 post-header">
		<a href="<?php the_permalink(); ?>" target="_blank"><h2><?php the_title(); ?></h2></a>
		<small>Posted on <?php the_date(); ?> by <?php the_author(); ?></small>
		<?php 
		$tags = get_the_tags();
		if($tags){
			foreach( $tags as $tag ){
				echo '<span class="label">'.$tag->name.'</span>';	
			}
		}
		?>
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