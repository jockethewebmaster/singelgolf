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
define('DB_NAME', 'u269503889_wyxuq');

/** MySQL database username */
define('DB_USER', 'u269503889_qelep');

/** MySQL database password */
define('DB_PASSWORD', 'meWyGubapa');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'xu1M61UCTHhzYpHTR4Y8SRcxLbgVglf5DntNFWHeh5AFI0VVBVSoN37qGjlbz86D');

define('SECURE_AUTH_KEY',  '7Gg8cYbm8r0dFy8RHAhxC9wGD1TyhXwcEAYNI3FxGYG5wsU5yvZlojwDTZMj97Hc');

define('LOGGED_IN_KEY',    'Q4S6mjcZWvcnALmTTRdcSZE0QUSQY2CaRobzpfopIuDTpq7lLeuFJiK0VxKS1igb');

define('NONCE_KEY',        'hJ3bDI08kKBMHoJhVHjKZGUwX41I0wItn72em0ZmB5GLmimsmi29NsSRTyQJseaj');

define('AUTH_SALT',        'KDSJP3rvXs3B71IuOzmsyqZZIG8949TO7M2a5KLVV0HbrEiyERrYylpFOaoj7HMj');

define('SECURE_AUTH_SALT', 'eHV95dd546DdMWpqDaMOYeWCKKircmwvrBE5Oe0TYLVXa1NHIFoM0xnGFBryf3ES');

define('LOGGED_IN_SALT',   'QeT2Y5J7vcPYclMgJ8WzMW9yt7iWXdv9ISNBUYllxUvW2f4P70PLCRuUI99JLLQP');

define('NONCE_SALT',       'Tw0nGT3DK1D86TFFHslC4SrHo6lYVeA9tTY2iToImw7X5QOLZaX0aYRnBQkKiHd8');



/**

 * Other customizations.

 */

define('FS_METHOD','direct');define('FS_CHMOD_DIR',0777);define('FS_CHMOD_FILE',0666);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/themes/ifeature/images/room_photo');



/**

 * Turn off automatic updates since these are managed upstream.

 */

define('AUTOMATIC_UPDATER_DISABLED', true);



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