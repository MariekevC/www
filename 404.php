<?php get_header(); ?>
<div class="page-header"><h1>Oops! Page not found! <small> Why not try searching for it?</small></h1></a>
	<form role="search" method="get" class="headersearch" id="searchform" action="<?php echo home_url( '/' ); ?>">
	    	<input type="text" value="" name="s" id="s" />
	        <input type="submit" id="searchsubmit" class="btn" value="Search" />
	</form>
</div>
<div class="row">
<?php dynamic_sidebar('Home Footer'); ?>	
</div>