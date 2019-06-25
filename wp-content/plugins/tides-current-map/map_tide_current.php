<?php
/**
 * Plugin Name: Google Map Plugin
 * Plugin URI: local
 * Description: Display tides and current
 * Version: 1.0
 * Text Domain: local
 * Author: Nam Tran
 * Author URI: No
 */
 
 function map_plugin_tides_current($atts) {
    global $post;
    $lat = get_post_meta($post->ID, "latitude", true);
    $long = get_post_meta($post->ID, "longitude", true);
    $code = get_post_meta($post->ID, "code", true);
    
    $Content = "Code: $code <br />";
	$Content .= "<iframe ";
	$Content .= "width=\"800\"";
	$Content .= "    height=\"300\"";
	$Content .= "        frameborder=\"0\"";
	$Content .= "            scrolling=\"no\"";
	$Content .= "                marginheight=\"0\"";
	$Content .= "                    marginwidth=\"0\"";
	$Content .= "                        src=\"https://maps.google.com/maps?q=".$lat.",".$long."&hl=en&z=12&output=embed\"";
	$Content .= "                            >";
	$Content .= "                            </iframe>";
	$Content .= "                            <br />";
	$Content .= "                            <small>";
	$Content .= "                            <a";
	$Content .= "                            href=\"https://maps.google.com/maps?q=".$lat.",".$long."&hl=en;z=8&output=embed\"";
	$Content .= "                                style=\"color:#0000FF;text-align:left\"";
	$Content .= "                                    target=\"_blank\"";
	$Content .= "                                        >";
	$Content .= "                                        See map bigger";
	$Content .= "                                        </a>";
	$Content .= "                                        </small>";
	 
    return $Content;
}
 
add_shortcode('map-plugin-tides-current', 'map_plugin_tides_current');