<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'tides_current' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'p`Dv+gbwv]CvIV.HR&Wm-N,3W^(h>w/i?a37iIvR%-L:yoY3t7zSaCOnNu=$88pG' );
define( 'SECURE_AUTH_KEY',  'ksT2OJOH;KFy%qlk5iKtFp_~23=XGrju6{mItC1^d%{f}@|rr^op?ise&g[5~_l4' );
define( 'LOGGED_IN_KEY',    'cF%.MH( .t~tgKF%/$A~Y}`4hu3wUhc31l#s*YxLQg1X%,iKK[^t$[WV,KsrybH1' );
define( 'NONCE_KEY',        '|ki}HoEMcjP=.T]w[J7x:^OVn>60%;V~*#:!5$H;J8~X<%b;>a|LkWO#oDBQ;,Uv' );
define( 'AUTH_SALT',        'd37B}r?8nF4g#IIgJ!{hN+QK6F(/,G9)f=SfM,O@pJg6544m)<omiu?gc0Kp#6,^' );
define( 'SECURE_AUTH_SALT', 'na`a5.I/A-#N%5U1Rr{O{FiK{=(8JP_c$2bRpJ4HvCW99&>F:[C*:Z`HxYhJ9fbs' );
define( 'LOGGED_IN_SALT',   '>Mfs!-;v_(XX)Z)}$iB5%=/,;} %&BQo%nXgNwKV@-^$zap&a}b}JazW5ogWS`L7' );
define( 'NONCE_SALT',       'tbE6mS? oCNkod5Pps-[b!qg~@-oi$,Dx-V>H@VdgOL[6v8-CE.%q@~$q9LRasB8' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
