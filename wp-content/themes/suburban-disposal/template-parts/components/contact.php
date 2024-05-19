<?php
/**
* Front page Contact section template.
*
* @package Suburban_Disposal
*/

/** Declaration part */
$contact_title   = get_sub_field('contact_title' );
$contact_subtitle   = get_sub_field('contact_subtitle' );
$contact_form   = get_sub_field('contact_form' );

/** contact Section */
if ( $contact_form ) {
echo '<section class="contact-section">'.
		'<div class="container">'.
    		'<div class="contact-wrapper">'.
            (
              $contact_title
              ? '<div class="section-heading">'.
                  '<h5>'. $contact_title .'</h5>'.
                  '<h2>'. $contact_subtitle .'</h2>'.
              '</div>'
              : ''
            ) .
            '<div class="contact-form">'. do_shortcode( $contact_form ) . '</div>'.
    		'</div>'.
		'</div>'.
'</section>';
}
?>
