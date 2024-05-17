<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '1234' );

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
define( 'AUTH_KEY',         'k|X^8X}i9<pl_viUqw9WN@_j8c}>nO2A%zu5Ae.x|yuxFuw#3J1G~`L7qoQ;xC{T' );
define( 'SECURE_AUTH_KEY',  'z$-esA)!@I9[^r$2@:MEz/-(`=6neP>YbXqn&)L/lIr,0HPX>gQl,Y&Wt(*PP$|@' );
define( 'LOGGED_IN_KEY',    'BGSLrui#9[?<T}l?wp&~U`Iih`9^?-u5Q:#(h2.MUU(O[NQ?Rke!R_Y)3.&R+DCi' );
define( 'NONCE_KEY',        'R<6VtPrp[8,`uF8^Mv-(LoY-V4w-gakdtJ/3iS7<O;YYSCToka`%gCYc>M:~]`Kp' );
define( 'AUTH_SALT',        '7BR}795nu;|ANW}1Vg^gn<~s&A!ZJpp+bkN?xc!{[~F1N.si*31YkX]l*L.{Exl{' );
define( 'SECURE_AUTH_SALT', '_$%ck43y=%**KjZe8PN}#/]O~a`ML/s<PxH,lmM4SR}*KHK/SB%Ep>!>*@Hm/Q;n' );
define( 'LOGGED_IN_SALT',   'O#oJ+$tSM.9;be_.:.m.RXt]`d:P8$a$8QRoK$Ry1Y#X |UAQ{L:p.@O}2B77wKa' );
define( 'NONCE_SALT',       'YO_74?EM=iTK+)W~Yd*.wZhriU.~j9),~yJ fS?w!u-R6.(8|L=2?J6j[r%*YFxr' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
