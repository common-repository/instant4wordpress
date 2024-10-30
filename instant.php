<?php
/*
Plugin Name: Instant4wordpress
Plugin URI: http://www.crashdump.fr/instant
Description: Integration of Instant.js (http://www.netzgesta.de/instant/) in a Wordpress plugin by Crashdump(http://www.crashdump.fr/).
Author: Crashdump
Author URI: http://www.crashdump.fr
Version: 0.1
Put in /wp-content/plugins/ of your Wordpress installation
*/

function addInstant_replace($content)
{   
	global $post;
	$pattern = "/<img(.*?)src=('|\")([A-Za-z0-9\/_\.\~\:-]*?)(\.bmp|\.gif|\.jpg|\.jpeg|\.png)('|\")([^\>]*?)>/i";
	$replacement = '<img$1src=$2$3$4$5 class="instant"$6>';
	$content = preg_replace($pattern, $replacement, $content);
	return $content;
}
add_filter('the_content', 'addInstant_replace');

function instant_scripts() {
	$instant_path = get_option('siteurl')."/wp-content/plugins/instant";
	$instantscript .= "<script type='text/javascript' src='$instant_path/instant.js'></script>\n";
	echo $instantscript;
}

add_action('wp_head', 'instant_scripts');
?>
