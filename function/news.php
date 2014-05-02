<?php

function news_list($atts){

	 extract(shortcode_atts( array(
	 	      'post_per_page' => 10,
	 	      'category_name' => ''
      		), $atts ));

	 
	 if(strpos( $category_name, "," ) === false){

		$category_name = $category_namel;	 	

	 }else{

	 	$category_name = explode(',', $category_name);

	 }

?>

<div class="row news-page">
				
			<div class="span8">

				<h2>HOT NEWS</h2>
			
			<?php

			$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

			$args = array(
					'post_type' 	 => 'news',
					'posts_per_page' => $post_per_page,
					'paged' => $paged,
					
				);

			if($category_name != ''){

				$args['tax_query'] => array(
										array(
											'taxonomy' => 'news_category',
											'field' => 'slug',
											'terms' => $category_name
										)
									);

			}

				$news = new WP_Query( $args );

				if ( $news->have_posts() ) {
					
					while ( $news->have_posts() ) {
						$news->the_post(); ?>
						
						<div class="span8 news_content">
							<div class="post-img">
								<?php

								if ( has_post_thumbnail()) : ?>
								   
										<?php the_post_thumbnail('full'); ?>
										
								<?php endif; ?>

							</div>
							
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="time-meta"><?php echo get_the_date(); ?></p>
							<p class="post-content"><?php the_excerpt_max_charlength(300); ?></p>

						
						</div>

						<?php

					}
					
				} ?>

				<div class="pagination">

				<?php


				$big = 999999999; // need an unlikely integer

						echo paginate_links( array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'total' => $news->max_num_pages
						) );
				?>

				</div>

				<?php

				wp_reset_postdata();
			?>

			</div>
			
			<div class="span4 news-sidebar">
				<?php if ( ! dynamic_sidebar('news_sidebar') ) : ?>
					
				<?php endif; ?>
			</div>
			
		</div>
		<!--Row 3 End-->

<?php

}

?>