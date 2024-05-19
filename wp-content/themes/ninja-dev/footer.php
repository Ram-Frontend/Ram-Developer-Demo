<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Suburban_Disposal
 */

 echo '</div>';


?>

<?php
  global $map, $call, $fax, $email;
  $footer_content = get_field('footer_content', 'options');
  $footer_address = get_field('footer_address', 'options');
  $footer_phone = get_field('footer_phone', 'options');
  $footer_fax = get_field('footer_fax', 'options');
  $footer_email = get_field('footer_email', 'options');

echo '<footer class="main-footer">'.
  '<div class="container">'.
    '<div class="footer-top">'.
      '<div class="site-info">'.
        brand_logo().
        '<p>'. $footer_content .'</p>'.
      '</div>'.
      '<div class="footer-menu">'.
        '<div class="menu-item">'.
          '<div class="h5">'.
            __( 'Useful Links', 'Suburban_Disposal' ).
          '</div>';
          wp_nav_menu (
            array (
              'menu'       => 'Footer Services',
              'container'           => 'nav',
              'container_class'     => 'navigation',
            )
          );
        echo '</div>'.
        '<div class="footer-contact">'.
          '<div class="h5">'.
            __( 'Contact Us', 'Suburban_Disposal' ).
          '</div>'.
            (
                $footer_address
                ? '<p>'. $map . $footer_address . '</p>'
                : ''
            ).
            (
                $footer_phone
                ? '<p>'. $call .'<a class="call" href="tel:'. preg_replace( '/[^0-9]/', '', $footer_phone ) .'">'. $footer_phone .'</a></p>'
                : ''
            ).
            (
                $footer_fax
                ? '<p>'. $fax .'<a class="call" href="fax:'. preg_replace( '/[^0-9]/', '', $footer_fax ) .'">'. $footer_fax .'</a></p>'
                : ''
            ).
            (
                $footer_email
                ? '<p>'. $email .'Email: <a href="mailto:'. $footer_email .'">'. $footer_email .'</a></p>'
                : ''
            ).
        '</div>'.
      '</div>'.
    '</div>'.
  '</div>'.
  '<div class="footer-copyright">'.
    '<div class="container">';
      $copyright = get_field('copyright', 'options');
      echo (
        $copyright
        ? '<p>'.'&copy; '. get_bloginfo( 'name' ) .' '.  date("Y"). ' | ' . $copyright .'</p>'
        : ''
      ).
        '<div class="copyright-social">'.
            '<h6>Connect with us</h6>'.
            social_media().
        '</div>'.
    '</div>'.
  '</div>'.
'</footer>';?>


</div><!--wrapper #page -->

<?php wp_footer(); ?>


</body>
</html>
