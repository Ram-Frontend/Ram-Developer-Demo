<?php
$services_title = get_sub_field('services_title');
/** Services Section */
if ( have_rows( 'services_listing' ) ) :
echo '<section class="service-section">'.
        (
          $services_title
          ? '<div class="section-heading">'.
            '<h5>What we Do</h5>'.
            '<h2>'. $services_title .'</h2>'.
          '</div>'
          : ''
        ) .
    	'<div class="service-listing">';
          while ( have_rows( 'services_listing' ) ) : the_row();
              $service_image = get_sub_field('service_image');
              $service_title = get_sub_field('service_title');
              $service_page = get_sub_field('service_page');
              if ( $service_page ) {
              	$service_page_url = $service_page['url'];
              	$service_page_title = $service_page['title'];
              	$service_page_target = $service_page['target'] ? $service_page['target'] : '_self';
              }
              if ( $service_title ) :
							echo '<div class="service-item">'.
									'<div class="service-media">'.
										(
											$service_image
											? '<div class="service-media-ratio image-ratio">'. wp_image( $service_image, 'full' ). '</div>'
											: ''
										) .
									'</div>'.
									'<div class="service-body">'.
										'<h3>'. $service_title .'</h3>'.
                    (
                			$service_page
                			? '<div class="treatment-btn"><a href="'. $service_page_url .'" target="'. $service_page_target .'" class="btn">'.
                					$service_page_title .
                			  '</a></div>'
                			: ''
                		) .
									'</div>'.
							'</div>';
						endif;
          endwhile;
    	echo '</div>' .
'</section>';
endif;

?>
