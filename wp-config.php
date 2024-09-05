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
define( 'DB_NAME', 'db_mru' );

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
define( 'AUTH_KEY',         '>-}m3v.vEL<v0fN7:qPp>/6]1hv^)iHkS+;a]9E_X#BC16)8S{eF^VUhtlF}WS{]' );
define( 'SECURE_AUTH_KEY',  'iY%1E7sSaIW$rh&?appQg-7*PbCLF~0iIgZ<a.5l(@CWXdpX)&jfh&gAWvr/Z&7T' );
define( 'LOGGED_IN_KEY',    'B/wo+K52V4;+w]olp,^>^wnALsDxGbTyBop#u./7%JkXC|6uagH%r-g9]liZTs02' );
define( 'NONCE_KEY',        'sS#MDo^TKVOmu5YlL@s-5Noc;2^x$ndc529Es9Q$=H/}*,_uK@-_.#$6XuTn<PZm' );
define( 'AUTH_SALT',        '(nNwxZwxKcV3uy[^)GxQ4K&>,a.T8k0|>XTI]bZ&Kc30Bp$:X3fG93{<I:#Rc-#8' );
define( 'SECURE_AUTH_SALT', '|`.AfbYb?&]Nd1v:-Ue4P`c7:a%KiKTm;*%Wmo/iMlPsz&z.Hn]@X1wJH,043^js' );
define( 'LOGGED_IN_SALT',   'jlz1s0@BYUC+c$lv:X$Ec8Cf)OViR>1C>^,7lgw@:p=Y|L1kB+fq@$w5t+Wh@os ' );
define( 'NONCE_SALT',       '7,%#.KSY<M10`AcLlN#`Rm,LdPA$Ic8M<qF.j`HkI]LFZF^^cO@W]Vzjb~R!QT|;' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_mru_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
