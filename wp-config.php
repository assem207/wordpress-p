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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'zero1' );

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
define( 'AUTH_KEY',         'OzysO9XB[-U-P?p^--Iv*,bz6S|-GI;&t5BXqn-K#i9A:_@E{r^VLxJo$9K @O@}' );
define( 'SECURE_AUTH_KEY',  'FKqc#Ef7! n%T:1gJiV6:n<vQO6yZaKlt-(i8YsOa&Jg>XBwP5[c8sa;RT%o?]?j' );
define( 'LOGGED_IN_KEY',    'ZWb*HLp,W<j^dXA@!!`6^$pBg4[gp>)} riz{5M|Fw#;2yMJJ`b((P;1Vc8KUgr7' );
define( 'NONCE_KEY',        'kc}0o=i@gY]Y </lbu9{ZMGpoKAU|wb7fS$)K-rV7KX!r!*R(kfD[!fMOJ#!GW J' );
define( 'AUTH_SALT',        'p84aiT<RGv,}/oT*A~XLLwcM[!c7,j=yno_@l TcjdL01W]a. x+8Y0Xyom5WnbO' );
define( 'SECURE_AUTH_SALT', 'G3s<76zd@<_S8X#vO0WJ}1D*=iRDFbbi,8Ul!r4^?,90`w$WkyE+G:&@BjFMuy{t' );
define( 'LOGGED_IN_SALT',   '|:OibISc(Z6+(z_53OB9bjL+kA!p-KoCu|dYz<(Y+a<yyM&rmnzY{I)IEr(b/G=k' );
define( 'NONCE_SALT',       'X*Y|rr*`YObD#tC9i_=,;;@>{s*K51~1oK6oS48;1o4uL|ke DqW0@/@=V1M,jd9' );

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
