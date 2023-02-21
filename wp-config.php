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
define( 'DB_NAME', 'cms' );

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
define( 'AUTH_KEY',         '# +Q TF`* mt-^qv9BB>O^#NJSFEj^aNM#0](-Kt1U+uxcRUcEo8f*(a/WF;y&IS' );
define( 'SECURE_AUTH_KEY',  '-TLt,OJ]ydu;DtE<u=3nX&1f-ZA9+Kq#d08n{RD$L1NeY)gzr8:`r`|5ee/3Q.OC' );
define( 'LOGGED_IN_KEY',    '9?uyQ=vd`M?^P1e~#OrE c5AUK(a6T7c~v`%:gcH9&ql6@QO!fy!%aVP]R{!pFS:' );
define( 'NONCE_KEY',        '?La^[oq<e2pYMqu1*$M62c*=$.I+L3cfPU^${XE&o1E&ZZ8i*#K0y8F*D6Yo|r%a' );
define( 'AUTH_SALT',        '7SF-#<KTm;TwB],X1TGR:n<a=nrkFN8AB{cOUjVHI?qL!;MjQssh1c&lS/kMi?]:' );
define( 'SECURE_AUTH_SALT', ';FbmV5$`4=BjT~`iyjZYqm1=Kj}zH`N4/,T0h[B%rfJeFt>anaQF6ZR4tGwGlAyJ' );
define( 'LOGGED_IN_SALT',   '}Ts#KZ;^vJDWPBF3~g`,Fabh+oef<eeh[XkamQmaeU<4_r: 9$qeU{_qs;gsr_Mq' );
define( 'NONCE_SALT',       'f*C#Wxx>aI!Gu3nvE-Wci6Qss*V1jv{KD+?OsB4GLn!H&r^E=ih`!$74V+/N}r5<' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
