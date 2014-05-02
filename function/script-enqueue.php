<?php

function dom_plugin_scripts() {

	wp_register_style( 'news-style', plugins_url( 'css/style.css' , __FILE__ ) );
    wp_enqueue_style( 'news-style' );

}

add_action( 'wp_enqueue_scripts', 'dom_plugin_scripts' );