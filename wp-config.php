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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_plus_narrative' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'nsBGjUL9^Z*>~|od(.5{(YJJe0!Kdh<!8?caF+u:IIz4(}H|X<7G]x(2wuT!U~:E' );
define( 'SECURE_AUTH_KEY',  'c]TqVrHNF~r|0IQoK$-!z5^5saTnI!$VSt<61^5xaTXPzn.3r`gMK(FhXh7C`$(j' );
define( 'LOGGED_IN_KEY',    'q^&+;c-,!;g8SI)O._13[aX~dMC%)}K/=g9A}K&Y@_*@Zo+& .e-~nQ:;[)0fI+s' );
define( 'NONCE_KEY',        'T4V14NvKLsTanz7eMldq;TmdKaom,=/T=MIZYdM.(-O/]kcc~]B[G/Xfp(UK 3!p' );
define( 'AUTH_SALT',        'h0]rtBn%T>%x)L$Oq)iIR{3TgK?`K);nO-qz3b?x~8EE>Zf@T7F%UYz=M1x@h>3]' );
define( 'SECURE_AUTH_SALT', '?(Y[@{V79t4`f+c@,TiF_`L,88shtQcLI& Ps_jNQgMXLKo0l(9|`,BKl_TACvM6' );
define( 'LOGGED_IN_SALT',   'XTE+W$?nN!yXlstMMyIbH!8fB>m2y-Lk{)L8]w2vzv@Bc6|XQf.zYRT80Qi)ikU3' );
define( 'NONCE_SALT',       '$uKx] /*n/}hCrSr|sJ [,+:g <cpL,966Oy +H&c+l-HYc;k|DR}dBFEVAKaTrG' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_plus_narrative';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
