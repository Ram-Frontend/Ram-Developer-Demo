<?php
/** Declaration part */
$efforts_big_image  = get_sub_field( 'efforts_big_image' );
$efforts_small_image   = get_sub_field( 'efforts_small_image' );
$efforts_title   = get_sub_field( 'efforts_title' );
$efforts_content   = get_sub_field( 'efforts_content' );
$efforts_partner_logo   = get_sub_field( 'efforts_partner_logo' );

/** efforts Section */
echo '<section class="efforts-section">'.
		'<div class="efforts-wrapper">'.
			(
				$efforts_big_image
				? '<div class="efforts-media">'.
              '<div class="efforts-media-big">'. wp_image($efforts_big_image) .'</div>'.
          '</div>'
				: ''
			) .
			(
				($efforts_title && $efforts_content)
				? '<div class="efforts-content">'.
              (
                  $efforts_title
                  ? '<div class="section-heading has-line"><h2>'. $efforts_title . '</h2></div>'
                  : ''
              ).
              (
                  $efforts_content
                  ? '<p>'. $efforts_content . '</p>'
                  : ''
              ).
              (
                  $efforts_partner_logo
                  ? '<div class="efforts-partner-logo">'.  wp_image($efforts_partner_logo) . '</div>'
                  : ''
              ).
          '</div>'
				: ''
			) .
      (
				$efforts_small_image
				? '<div class="efforts-small-media">'.
              '<div class="efforts-small-media-ratio image-ratio">'. wp_image($efforts_small_image) .'</div>'.
          '</div>'
				: ''
			) .
		'</div>'.
'</section>';
?>
