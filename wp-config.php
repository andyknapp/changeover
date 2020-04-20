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



if ( $_SERVER['HTTP_HOST'] == 'changeoversales.com' ) {
    define('DB_NAME', 'db173289_changeover');
	define('DB_USER', 'db173289_user');
	define('DB_PASSWORD', '4?exf?1GnK_');
	define('DB_HOST', 'internal-db.s173289.gridserver.com');
	define('DB_CHARSET', 'utf8');
	define('DB_COLLATE', '');

    define('DOMAIN_CURRENT_SITE', 'changeoversales.com');
	define('WP_HOME','https://changeoversales.com');
	define('WP_SITEURL','https://changeoversales.com');

} else if ( $_SERVER['HTTP_HOST'] == 'staging.changeoversales.com' ) {
	define('DB_NAME', 'db173289_changeover');
	define('DB_USER', 'db173289_user');
	define('DB_PASSWORD', '4?exf?1GnK_');
	define('DB_HOST', 'internal-db.s173289.gridserver.com');
	//define('DB_HOST', 'localhost');
	define('DB_CHARSET', 'utf8');
	define('DB_COLLATE', '');

    define('DOMAIN_CURRENT_SITE', 'staging.changeoversales.com');
	define('WP_HOME','http://staging.changeoversales.com');
	define('WP_SITEURL','http://staging.changeoversales.com');

} else if ( $_SERVER['HTTP_HOST'] == 'changeover.test' ) {
	define('DB_NAME', 'db173289_changeover');
	define('DB_USER', 'db173289_user');
	define('DB_PASSWORD', '4?exf?1GnK_');
	define('DB_HOST', 'internal-db.s173289.gridserver.com');
	//define('DB_HOST', 'localhost');
	define('DB_CHARSET', 'utf8');
	define('DB_COLLATE', '');

    define('DOMAIN_CURRENT_SITE', 'changeover.test');
	define('WP_HOME','http://changeover.test');
	define('WP_SITEURL','http://changeover.test');
}




/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
 define('AUTH_KEY',         '8C/hnXjMQ VyDABl_D++4]j`(.)ydzJcSuc/:RQ$uVx*%iG#2,TY%@3bLw%pd&n^');
 define('SECURE_AUTH_KEY',  'Q$-|{  +DnP-nh%3L,C{B8uY4*!AK<ux6tA~YCDIJx~>-A@BN-+Yi!B~/}#(H=f>');
 define('LOGGED_IN_KEY',    ')b`y@uPxa7=mC7bmhSu;Z#,vB2eE5NiH@:CLtZW?!)mgNzDhK(u%>TkKQ7.OM^5B');
 define('NONCE_KEY',        ']`,pa{{!$6e#,9~4s_35hv|xq/j;#4fa^YD5_A1OS|<Nkw|VJ1>2z _oiSF#SY?a');
 define('AUTH_SALT',        'TT++-R5CyV_u1]r*(dq^aMtP&Ya~ao>:238O&Ipz=-R L$A0(du3_(T+^>}DqY; ');
 define('SECURE_AUTH_SALT', 'Cq%Wv>@q xQk xq3HyA~pfwXZ&G>#tD8L3-|szhUmHouR++&;+b(>*,nA ?88kb}');
 define('LOGGED_IN_SALT',   'M,73mQZyvMt|<- x;`Hixi2&Bv7G-qN+4g5B9w#6by&;2r3/!HZ wbt#|eqb~ 5+');
 define('NONCE_SALT',       'e.EZT!31^A-N-;t8}csG%8UFoU6&0M-E3&`ez7W2kZ6bn5~9yc0h*w[hH6$Tu@e0');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'co_';

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
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

define( 'WP_POST_REVISIONS', 3 );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
