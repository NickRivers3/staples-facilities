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
define('DB_NAME', 'staples-facilities');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '8vJIZl^Y`noYUNm0QXd|S_gC,t0-OyNg9^FD v(Pp7BYRFg|/~h0^Aqn.I}z{e`F');
define('SECURE_AUTH_KEY',  'po^DDghr SqIzy{JoDZr0-MuTNqTRU,H_PmCeyA)|u`iikdO@;r@Q 4;3KI{6X0O');
define('LOGGED_IN_KEY',    'R4+0;b=<8(NP=FU}AS[d5Ks4+KU(W_v,d@!^COW)^.y y3`CFTCwm#Y+j<z#<+>O');
define('NONCE_KEY',        'IQh-DG,#H4oPqFTQ!7*_8j;^/oC&+ebuKX&.3}45TFSrmJ,&w=V}{!39*0}gf3|W');
define('AUTH_SALT',        '+iu`bVXaw1Ai2t9?3s|AyWNwtx+7DL$[(IY>ZfY>G2F!?3mr}BpU.g(tK@kKyr,L');
define('SECURE_AUTH_SALT', 'wTIk3-wiVU$63jdY>a*|bt{n9Y2Fu1_t{G;Z#xEt$tD.ZtNE-JJg[Q2IhQHO9KEn');
define('LOGGED_IN_SALT',   'mi%8U].Y$V%;`Gedh+.8PPj^&R4CvXRJ_zuFp5e~$KWP=|,lq1a$=g>B_XA`R]BW');
define('NONCE_SALT',       'y^oOdXsU3jL]b@k=kSkeEm|<*2xF,b14Scdc{)ZHucZ/0&oV=_r9.G!i,g<Gr.Ul');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sf_';

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
