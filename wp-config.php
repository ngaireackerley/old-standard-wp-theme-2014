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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sassbasetheme');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '6&<uUu6%$9Bb<XL5x`==7w(:I95ZSu9g;@Rc3Tj)51L_$=VB|Cm8W=f|_4+O2ka(');
define('SECURE_AUTH_KEY',  '$F9(4`co6/@+Bd#IcHYa|<;|.E:x~kUgQ(8yR<QF-cG|--=9rKf~T/Ne>M2:nx~n');
define('LOGGED_IN_KEY',    'QMf^y2;5%v|8q?Zh]g_Q9fc-~%pQL3x^mx<g1v*x#`(pu[qObA9;Q52o+]|Y%HN0');
define('NONCE_KEY',        'bdecVB?|IU~/_UlAX5Ud -~sD.2niS:weKQ2B$lXN&0#U7lW^=^;i][,gCR++~jL');
define('AUTH_SALT',        'G6m>z846l|UT8+Ph^aO-W&dVIB{2<:B90*mW7EIMm?lEG&w_0ax4IgtVS[aiVr,T');
define('SECURE_AUTH_SALT', '19|r1 rHjo4&`P9hB/4OUa)VRppX0M&?NX(ztOQ8O-U]CKb*3#dM;6;9r>%S|_gG');
define('LOGGED_IN_SALT',   '8?E47`a+g7x+n<t-8+>=KDK3&Ii<ye;%VGk1JH~UT]v=vJN-U,K&D|-NCsnNwL_H');
define('NONCE_SALT',       'Bk_#=X+-X51<[KK4?thscr;D)Q~p`l2t Q5}GNujEf<4?|Y3zeXyK(?<P>5_0ZMv');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
