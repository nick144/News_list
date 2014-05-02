<?php
/**
 * Plugin Name: News List
 * Plugin URI: https://github.com/nick144
 * Description: List all the News with thumbnail.
 * Tags: News, News List, List with thumbnail
 * Version: The Plugin's Version Number, e.g.: 1.0
 * Author: Name Of The Plugin Author
 * Author URI: http://URI_Of_The_Plugin_Author
 * License: A "Slug" license name e.g. GPL2
 */


$file[] = 'post-type';
$file[] = 'script-enqueue';
$file[] = 'side-bar';
$file[] = 'widget';
$file[] = 'news';



foreach($file as $f){
	include('function/'.$f.'.php');
}

add_shortcode('news', 'news_list');