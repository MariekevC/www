<?php
// Get the post user email
$user = get_post( $post_id, $output )->post_author;
$useremail = get_userdata($user)->user_email;
$gravmail = is_null(get_feed_meta('gravatar')) ? $useremail : get_feed_meta('gravatar');
$img = get_gravatar($gravmail,'60');
// Compute link
$target = is_syndicated() ? ' target="_blank"': '';
$link = is_syndicated() ? get_syndication_permalink() : get_permalink();
$title = is_syndicated() ? get_syndication_source() : get_the_title();
?> 
<div class="row">	
	<div class="span2">
		<ul class="media-grid">
			<li>
				<a href="#"><img class="thumbnail" src="<?php echo $img; ?>" alt="<?php echo $title; ?>"></a>
			</li>
		</ul>
	</div>
	<div class="span14 post-header post-header-indent">
		<a href="<?php echo $link; ?>"<?php echo $target; ?>><h2><?php the_title(); ?></h2></a>
		<div class="post-info">
		<small>Posted on
		<?php the_date(); ?> by <?php the_author(); ?>
		<?php if( is_syndicated() ){
			echo 'from "'.get_syndication_source().'"';	
		}
		?>
		</small>
		<?php echo get_the_tags_html($post->ID); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="span14 post post-indent">
		<?php the_content(); ?>
	</div>
</div>
<hr />



