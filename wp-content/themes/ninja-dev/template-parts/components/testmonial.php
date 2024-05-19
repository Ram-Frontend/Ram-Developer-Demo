<?php


/** Declaration part */
global $quote_icon;
$testmonial_title  = get_sub_field('testmonial_title');
$testimonialposts  = get_sub_field('select_testmonial');
?>
<?php
/** Testimonial Section */
if ( $testimonialposts ) :
echo '<section class="testimonials-section">'.
	'<div class="container">'.
		'<div class="testimonials-wrapper">'.
			(
				$testmonial_title
				? '<div class="section-heading">'.
					'<h5>Testimonials</h5>'.
					'<h2>'. $testmonial_title .'</h2>'.
				'</div>'
				: ''
			) .
			'<div class="testimonials-slider">';
				foreach ( $testimonialposts as $testimonialpost ) : setup_postdata( $testimonialpost );
					$testimonialid = $testimonialpost->ID;
					echo '<div class="testimonials-item">'.
						'<div data-match-height="testimonials-item-inner" class="testimonials-item-inner">'.
								'<div class="testimonials-item-title">'.
										'<h4>'. get_the_title( $testimonialid ). ',<br>'.  get_field( 'testmonial_location', $testimonialid ). '</h4>'.
										'<span class="testimonials-quote">'. $quote_icon . '</span>'.
								'</div>'.
								(
									has_excerpt( $testimonialid )
									? apply_filters( 'the_content', get_the_excerpt( $testimonialid ))
									: apply_filters( 'the_content', wp_trim_words( get_the_content( $testimonialid ), 60 ) )
								).
						'</div>'.
					'</div>';
				endforeach; wp_reset_postdata();
			echo '</div>'.
		'</div>'.
	'</div>'.
'</section>';
endif;
?>
