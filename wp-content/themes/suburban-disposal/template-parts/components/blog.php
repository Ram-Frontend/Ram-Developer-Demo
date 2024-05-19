<?php
/** Declaration part */
$blog_title   = get_sub_field( 'blog_title' );
$blog_page   = get_sub_field( 'blog_page' );
if ( $blog_page ) {
	$blog_page_url = $blog_page['url'];
	$blog_page_title = $blog_page['title'];
	$blog_page_target = $blog_page['target'] ? 'target="_blank"' : '';
}
query_posts (
	array (
		'post_type'      => 'post',
		'posts_per_page' => 2
	)
);
/** Blog Section */
echo '<section class="blog-section">'.
	'<div class="container">'.
		'<div class="blog-wrapper">'.
				(
					$blog_title
					? '<div class="section-heading">'.
							'<h2 class="">'. $blog_title .'</h2>'.
							(
								$blog_page
								? '<a href="'. $blog_page_url .'" class="btn"'. $blog_page_target .'>'.
										$blog_page_title.
								'</a>'
								: ''
							).
						'</div>'
					: ''
				) ;
			if ( have_posts() ) :
				echo '<div class="blog-list">';
					while ( have_posts() ) : the_post();
						echo '<div class="blog-item">'.
							'<div class="blog-content">'.
								'<h3><a href="'. get_the_permalink() .'">'. get_the_title() .'</a></h3>'.
								(
									has_excerpt()
									? apply_filters( 'the_content', get_the_excerpt() )
									: apply_filters( 'the_content', wp_trim_words( get_the_content(), 10 ) )
								) .
								'<a href="'. get_the_permalink() .'" class="btn">'.
										__( 'Read more', 'Suburban_Disposal' ) .
								'</a>'.
							'</div>'.
						'</div>';
					endwhile; wp_reset_query();
				echo '</div>';
			endif;
		echo '</div>'.
 	'</div>'.
'</section>';
?>
