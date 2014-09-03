<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

require_once(dirname(__FILE__) . '/wp-config-env.php');

define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');
define('DISALLOW_FILE_EDIT', true);
define('EMPTY_TRASH_DAYS', 0);

// ** MySQL settings - You can get this info from your web host ** //
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
define('AUTH_KEY',         'lIZWVVx(#VQQ=gN|+Rfr:Edawm:+DJK0UQ=3eHhcBO#zC9)`Ga%O0;uBTRU/;{4y');
define('SECURE_AUTH_KEY',  'k5>0<Db.nn0C<)+^W+ y6M+>w5p1v`~keK+51iQAb)F2PdUo}mk-c18j?l_T[swL');
define('LOGGED_IN_KEY',    '`?Omw;]Ka=I7fIu-I*QWn!2CMXy-+6W5bZ<Cj[mI6N^#&&5|?HQ#;Sl%+o4$&p;_');
define('NONCE_KEY',        '9l)gmF&.Fu(E|Ynn@&g<MwF7~$M-9.*MA468X|[`Rx7Ga`5Z!3B[(60?{l?DLU_|');
define('AUTH_SALT',        'c:?@@![Le$z^;78,^wQnZ0|ex~(7RH1]Y&Yf$n8-y~tJLmzCt_]|0So%$xJH<NY=');
define('SECURE_AUTH_SALT', '-G{G+4+W=;w6]WxTB!+T*[Q 2r=/Rq]dss?[smyCL{g!>+t[S_?Y--vr S-ine=6');
define('LOGGED_IN_SALT',   'GvI8#UL~!DM<|x<ptoz/-oM*-YyUEm2B*8R[Otai;h9_GKi&09AzU56)A#?VXp%a');
define('NONCE_SALT',       '!J|G2;p?.mevo;p<aP>AY0ABy<a/Qv+9w|SxD)rhi=9wzP@vkbm/uDgBAv;U*Kq!');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pvshop_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/wordpress/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
