<?php
/* Disable the Admin Bar. */
add_filter( 'show_admin_bar', '__return_false' );
add_action( 'init', 'register_my_menus' );

// register the menus
function register_my_menus() {
	register_nav_menus(
		array(
			'dev-nav' => __( 'Dev Centre Nav' ),
			'support-nav' => __( 'Support Centre Nav' ),
			'header-nav' => __( 'Main Page Nav' )
		)
	);
}

// register the sidebar shortcode
add_shortcode( 'sidebarsc', 'sidebar_sc' ); 
// register shortcode functions to output widgets
function sidebar_sc( $atts ) {
	extract( shortcode_atts( array(
		'sidebar' => 'Dev widgets 1',
	), $atts ) );
    ob_start();
    dynamic_sidebar($sidebar);
    $html = '<div class="row">';
    $html .= ob_get_contents();
    $html .= '</div>';
    ob_end_clean();
    return $html;
}
// register sidebars
add_action( 'init', 'ilc_register_sidebars');
function ilc_register_sidebars(){
    register_sidebar(array(
        'name' => 'Dev large 1',
        'description' => 'one large widget',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
        'before_widget' => '<div class="span9">',
        'after_widget' => '</div>'
    ));
    register_sidebar(array(
        'name' => 'Dev large 2',
        'description' => 'one large widget',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
        'before_widget' => '<div class="span9">',
        'after_widget' => '</div>'
    ));
    register_sidebar(array(
        'name' => 'Dev widgets 1',
        'description' => 'Two widgets',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
        'before_widget' => '<div class="span6">',
        'after_widget' => '</div>'
    ));
 	register_sidebar(array(
        'name' => 'Support Top Widgets',
        'description' => 'two widgets',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
        'before_widget' => '<div class="span6">',
        'after_widget' => '</div>'
    ));
    register_sidebar(array(
        'name' => 'Support Bottom Widgets',
        'description' => 'two widgets',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
        'before_widget' => '<div class="span6">',
        'after_widget' => '</div>'
    ));
}

// TODO FIXME
// @brief Checks if a post has a gven ancestor
// @param ancestor the ancestor to look for
// @param postid the current post id
// @return boolean
function has_ancestor($ancestortitle,$postid){
	$ancestors = get_post_ancestors($postid);
	$has_ancestor = false;
	foreach($ancestors as $ancestor)
	{
		$title = strtolower(get_the_title($ancestor));
		if($title==strtolower($ancestortitle))
		{
			$has_ancestor = true;	
		}
	}	
	return $has_ancestor;		
}


function neat_trim($str, $n, $delim='...') {
   $len = strlen($str);
   if ($len > $n) {
       preg_match('/(.{' . $n . '}.*?)\b/', $str, $matches);
       return rtrim($matches[1]) . $delim;
   }
   else {
       return $str;
   }
}

//allow shortocodes in widgets
add_filter('widget_text', 'do_shortcode');


// include widgets
include('recentdocswidget.php');
include('recentblogswidget.php');


// DATE FUNCTIONS
// convert a date into a string that tells how long ago that date was.... eg: 2 days ago, 3 minutes ago.
function ago($d) {
	$c = getdate();
	$p = array('year', 'mon', 'mday', 'hours', 'minutes', 'seconds');
	$display = array('year', 'month', 'day', 'hour', 'minute', 'second');
	$factor = array(0, 12, 30, 24, 60, 60);
	$d = datetoarr($d);
	for ($w = 0; $w < 6; $w++) {
		if ($w > 0) {
			$c[$p[$w]] += $c[$p[$w-1]] * $factor[$w];
			$d[$p[$w]] += $d[$p[$w-1]] * $factor[$w];
		}
		if ($c[$p[$w]] - $d[$p[$w]] > 1) { 
			return ($c[$p[$w]] - $d[$p[$w]]).' '.$display[$w].'s ago';
		}
	}
	return '';
}

// you can replace this if need be. This converts my dates returned from a mysql date string into 
//   an array object similar to that returned by getdate().
function datetoarr($d) {
	preg_match("/([0-9]{4})(\\-)([0-9]{2})(\\-)([0-9]{2}) ([0-9]{2})(\\:)([0-9]{2})(\\:)([0-9]{2})/", $d, $matches);
    return array( 
		'seconds' => $matches[10], 
		'minutes' => $matches[8], 
		'hours' => $matches[6],  
		'mday' => $matches[5], 
		'mon' => $matches[3],  
		'year' => $matches[1], 
	);
}

// https://gist.github.com/1189639
function is_blog () {
	global  $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}

/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param string $s Size in pixels, defaults to 80px [ 1 - 512 ]
 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param boole $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source http://gravatar.com/site/implement/images/php/
 */
function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
	$url = 'http://www.gravatar.com/avatar/';
	$url .= md5( strtolower( trim( $email ) ) );
	$url .= "?s=$s&d=$d&r=$r";
	if ( $img ) {
		$url = '<img src="' . $url . '"';
		foreach ( $atts as $key => $val )
			$url .= ' ' . $key . '="' . $val . '"';
		$url .= ' />';
	}
	return $url;
}

// Displays the posts tags
function get_the_tags_html($postid){
	// Define the colours
	$tagcolours = array(
		'release'=>'important'
	);
	$tags = get_the_tags($postid);
	if($tags){
		$output = '';
		foreach( $tags as $tag ){
			if(strtolower($tag->name)!='owncloud'){
				$colour = array_key_exists($tag->name,$tagcolours) ? $tagcolours[$tag->name] : '';
				$output .= '<a href="'.get_tag_link($tag).'"><span class="label '.$colour.'">'.$tag->name.'</span></a>';	
			}
		}
		return $output;
	} else {
		return false;	
	}
}
?>