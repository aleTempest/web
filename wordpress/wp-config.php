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
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', '72b97e92027785a6045ecde3e25ae5ea13ce9ae46ff5bfd0' );

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
define( 'AUTH_KEY',         '+8*Sn-e?OiT2PF{VTCRyRZ2BW]4V/I0pT-ne-U+6v9#](@x7I9n,k@moZ/M?*+DI' );
define( 'SECURE_AUTH_KEY',  '* A)}C r3eM^l7ii5}t4a!O.W%&H6?J$0NU0#D#y+Q2oofo9<0l-jhax.l^9J(pr' );
define( 'LOGGED_IN_KEY',    'k5!YAu- C4K~{%`?7-*rXMXx*%mVf=Eh1>>%,Sa=!c}~K*a85L,_|ox7}SJ_`F75' );
define( 'NONCE_KEY',        'OrI&C5DCJc+nx.q2PQK^*EUD@/T0_.1A-<pr6np;CBxNsW-$OE$Kf`buIxWG$jYO' );
define( 'AUTH_SALT',        'r+s~^HG;l*HFkA+M$ahuAV;GtE_eZMHy, I>+(R-++T+|MV!/eDP;U0/1#_^$Z$i' );
define( 'SECURE_AUTH_SALT', 'lAj%qC=R+r1WO!?4(iN-)}uL>0;W!J,Q/DwjT0U#JhM&dLBDs}OPw*${7%Q7@LQH' );
define( 'LOGGED_IN_SALT',   '/lL4/VU/D#}~SW0.|MRmD0z!d7M%K,`*mE#^oC N(T(k!A<4rg.Q82(38blo4i&>' );
define( 'NONCE_SALT',       'tT3Ds4O;4DoqrkN(DN[$@cm^1wELj!aS7KT*uG}tJ5?90TnRh/(@nX;&^E^edz7h' );

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
define('FS_METHOD','direct');
