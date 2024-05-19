<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ninjadev' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Ka2+sVEzr&<.`Y#gFnHPWz~,$6(Wa@3*H<(PFG8]=?+#D^c4[@%l08=E,/j|^Dk9' );
define( 'SECURE_AUTH_KEY',  'FiDV)7n&a3)}IyLE^eJX,},[QiFio*-u[JL,&wri(mrPj+gI!n`*keH]0OJ]tI7i' );
define( 'LOGGED_IN_KEY',    '%x{`JC<yHua7^u%nx~7xev_3cmTgdFr[^hX-_9f&fq.^&%#(P0ioN4f7%9/$7.ms' );
define( 'NONCE_KEY',        'W;HTp+!5mHbP2nsD41>lV_}&#T-~zWfP5^z4Oj+bGJfF&3?1fuAkYcc,~@#EO%6b' );
define( 'AUTH_SALT',        'XWG`n)l9o`|CQ$~Qm@3i0AYDT>>q~QHrO?AS;G3Gda0{fGw<3A50(^cmFR|B9dgH' );
define( 'SECURE_AUTH_SALT', 'oFflebgAT83.~IQW&<z1?Jurs_Xq>M a3vz-}6)`R8-EXI( 1l/=;ZnMi[jl;/!e' );
define( 'LOGGED_IN_SALT',   'd/cU:UzgE@D=>sBVYm12U=<w>h!<cVYN5!XJ8!}G^z5l[hl;kkPtyy;l}c{Vr2Ct' );
define( 'NONCE_SALT',       '~92s4[/lX;h//-e!+mk1j8:h8{RkxqS@n9.6mO8`VfbLP#R8x~Wjtx:.(cwb5#E,' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
//define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
