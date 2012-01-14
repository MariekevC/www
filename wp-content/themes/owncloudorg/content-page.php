<?php 
if(is_page('Dev'))
{
?>
<h1>Developer Centre</h1>
<div class="row">
	<div class="span4">
		<div class="sidebar">
			<div class="well">
				<ul>
				<?php
				$mypages = get_pages( array( 'child_of' => $post->ID ) );
				
				foreach( $mypages as $page ) {		
				$content = $page->post_content;
				if ( ! $content ) // Check for empty page
				continue;
				
				?>
				<li><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></li>
				<?php
				}
				?>
				</ul>
			</div>
		</div>
	</div>

<?php
the_content();
} 
else 
{
the_content();
}
?>
