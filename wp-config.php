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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'capitattoo' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'mysql' );

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
define( 'AUTH_KEY',         '%WCmc;B3HQN<2d/jX i{!C^=i=fjUb]oFq`_g6n*{A3?x{JdheUB&n58[X@8lRqR' );
define( 'SECURE_AUTH_KEY',  'y]* Dmuw10Jey=YoAs,^/Y}~.{u #y{tE$h?.U(6|]$9cVR8R<Atj9iMiEvM=xIk' );
define( 'LOGGED_IN_KEY',    'eE[`S#A?XG#)}wQ3/&-roTey~RXdVpqg.0d-yauf3/+k{]fU:P@mTp*B@&I,|Bt^' );
define( 'NONCE_KEY',        'O^w|5+=0[/W0h9{Fbm+z$T>A%lbF_{s}3N5qHXL~!S31tb%j[pk)H@IGO>|&*x>6' );
define( 'AUTH_SALT',        'Q.^@zfuc6l`<5`>sCw/JM<e1o,A[3k{qrQ}hYol&,fH6})^+PS3=_]WQQDUoI3,T' );
define( 'SECURE_AUTH_SALT', '/],G/{yMXy]gzI._~kM}cK{AH-0o}Du.WSG~R9R@/a?.oI}_k,%-X=?wVPPgp p>' );
define( 'LOGGED_IN_SALT',   'VWsbt/vg0rdNM-Afyek%]J[Dd<f:vU_/+Exw8!RhkgA]L,H6P}{*X%7s{7Gs=7%]' );
define( 'NONCE_SALT',       '~t%^F$`!+}hb9MMbeQEow^|%AVf=`7~Uf6b9wHglG)[<@sKwL[E+^Z-3.TgI2/!=' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true ); 
define( 'WP_DEBUG_DISPLAY', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
