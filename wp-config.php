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
define('DB_NAME', 'mercafar_18350');

/** MySQL database username */
define('DB_USER', 'mercafar_admin');

/** MySQL database password */
define('DB_PASSWORD', 'MercaFarma18350');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '6FpQ~RurUDm>h&Um8E:*DMV/zVtZ7S_Dn(s2gi,v1lTgMom)5wlh>P#ua}?9B_x~');
define('SECURE_AUTH_KEY',  '6G Jp9Q}Yhgq)!lr?al=JY3`IjJW(#EPYEl>DOO-z>.Wv@Klgfgra@?<b4j>2<0-');
define('LOGGED_IN_KEY',    '~5UV>1pW}|ieJI;6VE;b`hb[|$Os$IH1k~sa<jM0TAcz (_SA]8#kTD%9-r&e<^$');
define('NONCE_KEY',        'xn.|KYz0f8&F050Rn 0/5LB<H]@&k>G=h=0guWi!KeO4Dh!oNM&6]@Xq74r0&W`b');
define('AUTH_SALT',        'y+0dD-a  D}6D@^oOgo2-uc-ZG~L{n6!_XAZrQEib[#Rl7`bT[G|Jy)1?3B@&d1&');
define('SECURE_AUTH_SALT', 'On1iY909?Uf[Qn=r;A6ul.pm1{CXTR4!Y4uXoe0CgQD0_C=RmJlRyK}ID>v;Q-Dd');
define('LOGGED_IN_SALT',   '%{zT|zL=@*10ej86xHuX,A*R2YAI}q&flO_.GnJIwjLa2J>]a/)A)J_a5GibfF)X');
define('NONCE_SALT',       '_$e%Hq5yvs~1$hZ<#4NLAmT9nft<:GP@.3yr3l+$BrM>i&0>J}J%N0LxA|&v@iVI');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_mm';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
