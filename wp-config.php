<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tatianc4_wp_bap');

/** MySQL database username */
define('DB_USER', 'tatianc4_admin');

/** MySQL database password */
define('DB_PASSWORD', 'kS^V!7#zr4');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '.}|=l|wK+wm,(>|S}+X<6=H?$]yW6a J8?-lK16?!K0hsU&S||-(n;L_DED9iNLM');
define('SECURE_AUTH_KEY',  '%X;BLf.+^A*fWO(Mb$V[cc<2d<u>hn%5%>(MaP81Hx;p)rp2-2Fgg,V-N+,}?@qG');
define('LOGGED_IN_KEY',    'Nwoa<s;n:qNN])l1XBaq1[.5};3Eri!H:9l%DJ=dXNTb[5DWKXG-_?Cq%u?XU~*i');
define('NONCE_KEY',        '?6AOhT*!Z~F~kVTziA8l#PaA7!vCfg7K9F-}F=OEuysY~R?q_1tJ1*AW#+1^@e3I');
define('AUTH_SALT',        '8I-KX>aV.]j+j0< W~+iB/|dfR#uO!C0%.0yRLgH4dpz6|u9eB>WIKLVZ*%|TVsI');
define('SECURE_AUTH_SALT', 'l17$JgC;oeGgh.XO|F?i=z+@m1nH,2L-O=yW|~U?E-Vw<_SGX;78|7;agH^|ma)a');
define('LOGGED_IN_SALT',   'Aj]Zot8:j7brk&=G+)#([|&.}e>-N3^GS$AjY.%bX9F*-fd@5#DJ8T;tm7c~~ba3');
define('NONCE_SALT',       '`PuBFE8+F/+3j(F 3ml-{e8?MBzI`K~f]-gD#o/XyV78yp|x:Nf?@/O-V-Ll2G7a');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
