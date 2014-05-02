<?php

function page_sidebars() {

	$sidebars = array(
						array(
							'class' => 'news_sidebar',
							'name' => __('News Sidebar','dom-theme')
						)
				);
						
	
		foreach($sidebars as $val) {		
			register_sidebar( array(
				'name' => $val['name'],
				'id' => $val['class'],
				'before_widget' => '<ul class="widget">',
				'after_widget' => '</ul>',
				'before_title' => '<h2 class="widget-title">',
				'after_title' => '</h2>',
				) 
			);
		}

				
}

add_action( 'widgets_init', 'page_sidebars' );