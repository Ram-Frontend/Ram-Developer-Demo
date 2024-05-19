<?php


/** Declaration part */
$fetured_posts  = get_sub_field('select_fetured_post');
?>
<?php
/** Testimonial Section */
if ( $fetured_posts ) :
echo '<section class="fetured-section">'.
	'<div class="container">'.
		'<div class="fetured-wrapper">'.
			'<div class="fetured-slider">';
				foreach ( $fetured_posts as $fetured_post ) : setup_postdata( $fetured_post );
					$feturedid = $fetured_post->ID;
					echo '<div class="fetured-item">'.
						'<div class="fetured-item-inner">'.
								'<div class="fetured-item-title">'.
										'<h4>'. get_the_title( $feturedid ). '</h4>'.
                    '<a href="'. get_the_permalink($feturedid) .'" class="fetured-icon">'.
                        '<img src="'. get_template_directory_uri() .'/assets/images/arrow.png"/>'.
    								'</a>'.
								'</div>'.
						'</div>'.
					'</div>';
				endforeach; wp_reset_postdata();
			echo '</div>'.
		'</div>'.
	'</div>'.
'</section>';
endif;
?>
