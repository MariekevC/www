<?php
// If feed icon?
if( is_syndicated() && !is_null( get_feed_meta('face') ) ){
?>
<div class="row">	
	<div class="span2">
		<ul class="media-grid">
			<li>
				<a href="#"><img class="thumbnail" src="<?php echo get_feed_meta('face'); ?>" alt="<?php the_syndication_source(); ?>"></a>
			</li>
		</ul>
	</div>
	<div class="span10 post-header">
	<?php
} else {
	?>
	<div class="row">	
		<div class="span12 post-header">			
<?php
}
$target = is_syndicated() ? ' target="_blank"': '';
$link = is_syndicated() ? get_syndication_permalink() : get_permalink();
?>
		<a href="<?php echo $link; ?>"<?php echo $target; ?>><h2><?php the_title(); ?></h2></a>
		<small>Posted on
		<?php the_date(); ?> by <?php the_author(); ?>
		<?php if( is_syndicated() ){
			echo 'from "'.get_syndication_source().'"';	
		}
		?>
		</small>
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
	<div class="span12 post">
		<?php  the_content(); ?>
		<hr />
	</div>
</div>

