<?php
/*
Plugin Name: Social Share 2.0 - Social Bookmarks
Plugin URI: http://www.websaledomain.com/index.php?page=tool
Description: This plugin adds a small widget within each blog post to share blog posts on  Facebook, Twitter, Google Buzz, Digg, Surfpeople, and well over 100 more social bookmarking and sharing sites .
Author: Surfpeople
Version: 0.1.1
Author URI: http://www.websaledomain.com/index.php?page=tool
*/

function sp_init() {
	load_plugin_textdomain('social-share-surfpeople', PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)));
}


function sp_filter($data) {
	global $wp_query, $post;
	$my_post = get_post($post->ID); 
	if($my_post->post_type=="post") {
                $codec = rand(0, 6);
		return $data. '<link rel="stylesheet" href="'.get_bloginfo('url').'/wp-content/plugins/social-share-20-social-bookmarks/css.css"  /><div class="contenitore">
<div class="divsx"><a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="websaledomain">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>
<div class="divcentro"><a name="fb_share" type="box_count" share_url="'.get_permalink($post->ID).'" href="http://www.facebook.com/sharer.php">Condividi</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script></div>
<div class="divcentro1"><a title="Post to Google Buzz" class="google-buzz-button" href="http://www.google.com/buzz/post" data-button-style="normal-count" data-url="'.get_permalink($post->ID).'"></a>
<script type="text/javascript" src="http://www.google.com/buzz/api/button.js"></script></div>
<div class="divcentro2"><script type="text/javascript">
tweetmeme_url = "'.get_permalink($post->ID).'";
</script>
<script type="text/javascript" src="http://tweetmeme.com/i/scripts/button.js"></script></div>
<div class="divdx"><script type="text/javascript" src="'.get_bloginfo('url').'/wp-content/plugins/social-share-20-social-bookmarks/js.js"></script><a class="DiggThisButton DiggMedium"
href="http://digg.com/submit?url='.get_permalink($post->ID).'"></a></div>
<b><br><p align="center"/> Social Share  <a target="_blank" href="http://www.websaledomain.com/index.php?page=tool" title="Social Share"><img src="http://www.websaledomain.com/share-link.png" width="17" height="15" border="0">Button</b></a></p></div>';
	} else {
		return $data;
	}
}

add_action('init', 'sp_init');
add_filter('the_content', 'sp_filter');