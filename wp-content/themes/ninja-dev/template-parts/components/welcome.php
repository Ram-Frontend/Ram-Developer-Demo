<?php
/** Welcome Section */
$welcome_title  = get_sub_field('welcome_title');
$welcome_content  = get_sub_field('welcome_content');
$welcome_image  = get_sub_field('welcome_image');
$welcome_page  = get_sub_field('welcome_page');
if ( $welcome_page ) {
	$welcome_page_url = $welcome_page['url'];
	$welcome_page_title = $welcome_page['title'];
	$welcome_page_target = $welcome_page['target'] ? $welcome_page['target'] : '_self';
}
// Welcome component start bhere
if ( $welcome_image && $welcome_content  ) :
echo '<section class="welcome-section">'.
	'<div class="container">'.
		'<div class="welcome-wrapper">'.
			'<div class="welcome-body">'.
				'<div class="section-heading has-line">'.
					'<h1>'. $welcome_title .'</h1>'.
				'</div>'.
				(
						$welcome_content
						? '<p>'. $welcome_content . '</p>'
						: ''
				).
				(
					$welcome_page
					? '<div class="treatment-btn"><a href="'. $welcome_page_url .'" target="'. $welcome_page_target .'" class="btn">'.
							$welcome_page_title .
						'</a></div>'
					: ''
				) .
			'</div>'.
			(
				$welcome_image
				? '<div class="welcome-media"><div class="welcome-media-thumbnail">'.
							wp_image( $welcome_image, 'large' ).
				'</div></div>'
				: ''
			).
		'</div>'.
	'</div>'.
'</section>';
endif;
?>
