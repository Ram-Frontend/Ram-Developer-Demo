<?php
/**
* Front page hero section template.
*
* @package Suburban_Disposal
*/


/** Desktop Banner part */
if ( have_rows( 'banner_slider' ) ) :
	echo '<section class="hero-section">'.
		'<div class="hero-slider">';
			while ( have_rows( 'banner_slider' ) ) : the_row();
					$banner_image  = get_sub_field( 'banner_image' );
					$banner_title  = get_sub_field( 'banner_title' );
					$banner_link  = get_sub_field( 'banner_link' );
					if ( $banner_link ) {
						$banner_link_url = $banner_link['url'];
						$banner_link_title = $banner_link['title'];
						$banner_link_target = $banner_link['target'] ? 'target="_blank"' : '';
					}
					echo '<div class="hero-item">' .
						'<div class="hero-media">'.
								(
									$banner_image
									? wp_image( $banner_image, 'full' )
									: ''
								).
						'</div>'.
						(
							( $banner_title || $banner_link )
							? '<div class="hero-body">'.
								'<div class="container">'.
									'<div class="hero-body-wrapper">'.
											'<h2>'. $banner_title . '</h2>'.
											(
												$banner_link
												? '<a href="'. $banner_link_url .'" class="btn"'. $banner_link_target .'>'.
														$banner_link_title.
												'</a>'
												: ''
											).
									'</div>'.
								'</div>'.
							'</div>'
							: ''
						).
					'</div>';
			endwhile;
		echo '</div>'.
	'</section>';
endif;

?>
