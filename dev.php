<div class="page-header"><a href="/dev/"><h1>Developer Centre</h1></a>
	<form role="search" method="get" class="headersearch" id="searchform" action="<?php echo home_url( '/' ); ?>">
	    	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
	        <input type="submit" id="searchsubmit" class="btn" value="Search" />
	</form>
</div>
<div class="row">
	<div class="span4">
		<div class="sidebar">
			<div class="well">
			<?php 
			wp_nav_menu(array('theme_location' => 'dev-nav'));
			?>
			</div>
		</div>
	</div>
	<div class="span12">
	<?php
	if(!is_page('Dev')){
	?>
	<h1>
	<?php the_title(); ?>
	</h1>
	<hr class="pagetitle">
	<div class="page-content">
	<?php
	}
	the_content();
	?>
	</div>
</div>
