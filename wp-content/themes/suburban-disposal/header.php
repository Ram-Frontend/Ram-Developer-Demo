<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Suburban_Disposal
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- start -->
<!-- start -->
<div class="wrapper">
		<div class="main-container">
				<!-- Device menu -->
				<div class="mbnav">
						<div class="mbnav__backdrop"></div>
						<div class="mbnav__state" data-clickable="true">
								<!--  main responsive menu -->
								<div class="mbnav__inner">
										<?php echo str_replace( array("\n", "\r"), '', main_navigation() ); ?>
								</div>
						</div>
				</div>

				<!-- Header Part -->
					<header class="main-header">

								<?php
										global $call, $email;
										$footer_phone = get_field('footer_phone', 'options');
										$footer_email = get_field('footer_email', 'options');
										echo '<div class="header-top">'.
											'<div class="container">'.
													'<div class="header-wrapper">'.
																(
																		$footer_phone
																		? '<p>'. $call .'<a href="tel:'. preg_replace( '/[^0-9]/', '', $footer_phone ) .'">'. $footer_phone .'</a></p>'
																		: ''
																).
																(
										                $footer_email
										                ? '<a class="email-action" href="mailto:'. $footer_email .'">'. $email .'</a>'
										                : ''
										            ).
													'</div>'.
												'</div>'.
										'</div>';
								?>
						<div class="container">
								<div class="header-wrapper">
									<?php echo brand_logo(); ?>
										<!-- hamburger -->
										<?php
												$header_fusion_logo = get_field( 'header_fusion_logo', 'options' );
												$header_fusion_title = get_field( 'header_fusion_title', 'options' );
												echo '<div class="header-fusion">'.
														(
																$header_fusion_logo
																? '<div class="header-fusion-logo">'. wp_image($header_fusion_logo). '</div>'
																: ''
														).
														(
																$header_fusion_title
																? '<h4>'. $header_fusion_title. '</h4>'
																: ''
														).
												'</div>';
										?>
										<a href="javascript:;" class="hamburger">
												<span></span>
										</a>
								</div>
						</div>

						<div class="header-navigation">
							<div class="container">
									<?php echo	str_replace( array("\n", "\r"), '', main_navigation() ) ; ?>
							</div>
						</div>

				</header>
				<div class="header-space"></div>
