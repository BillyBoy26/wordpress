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
define('DB_NAME', 'WordPress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'lTxw.Q~EY-~3hs^c2}1S`p{wtwh]:s%(oBMDO# {1 ](0C+H^IPO12yP$-Y[d~[I');
define('SECURE_AUTH_KEY',  'e$W&w|5!XvW/S=>nG:.vDP.4)Oc56eJfrC<$q[4WunT<?w@^/lFrX{RW,m:zOh)H');
define('LOGGED_IN_KEY',    '.LfPmpB:Z<EgXOE<l}wHV5s`TN_2=Fm2&&B3Qo1Rg||m#c<SkkIs@XRC$)ch80nz');
define('NONCE_KEY',        'mTdCPDO]E/3,$.4Ea{qYWS(q8q5DU[lry+zGw dIeTeiRZgC0kbK]Cj6,uPfwzJL');
define('AUTH_SALT',        'D]GYgP(36v6`)bX=G2I/ihz0JO7wQZb<8i6z~<Jfhx9n5Jrf9vkpK-~6mMTnHt-l');
define('SECURE_AUTH_SALT', 'vAp)=L$(m=I83M4;k;F-Kg9r}5wPj:k^~wLb}gWO%6MzKaeTQ:k!B3mee9T_Vm}0');
define('LOGGED_IN_SALT',   'kLaT@TZeJJkT+Q,S}7b~F`BeF@<V.9~L|TjKbZl<5] A63`/pnkscED:,9B,Qwq@');
define('NONCE_SALT',       'Ecq&>7ws*q@T>qOM+I?vRmuES$=WI?@+zUD!w<GLQ;iS5SSqgX3.ye(#7]1k|(8C');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
