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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         ' 9|>=a+6J1c)x??&KOsQ3f#saR5#Zcwaaj|s`9DEQoZn<V-wb8Nip3Yy:^l9D9q&' );
define( 'SECURE_AUTH_KEY',  'h0e3FPs7S}K0q33,1000R;vhsF)Ola+,ckmN]`:YQdEt*]5I&qxpo5j*fd0NSS[H' );
define( 'LOGGED_IN_KEY',    'c}?Fsp2tBwk`^G?Z,&lYN;hEe9SV25qydL!9)pzb-xAWzpVEX%g!j #lJs<<=D{P' );
define( 'NONCE_KEY',        '5@K08b<vtlOm9M3jUlWy)Mf!h=_7(y2D ^myA@~8iY3.JcfwiNY}b=.m9+q1ZeN:' );
define( 'AUTH_SALT',        '!rEoi(KH9LBjfNHAL/OPi*Nm]@;_8txiHD|&B^M]s@RYB80u}XJkj.CUEC{d0iT<' );
define( 'SECURE_AUTH_SALT', '}s,)u6c-j{ ]njR:@/~dVY0Y8DnOqh(ufb0vutnpE~X<iennMv8)AoW8z*>N(Pry' );
define( 'LOGGED_IN_SALT',   '9>?Bxvx/H?LpS[5:^Hh(ry=WdW`BjU#rb6wAgk+%>ID>[eX/n;8.gEB[Fu;(?p7[' );
define( 'NONCE_SALT',       ']PIpa{:(y$.e4-=0e[N7ATg^ [vPPa/0l{pD6Y(Vh.}0Pvd[9EXKo{0$Lxd1y]G[' );

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
