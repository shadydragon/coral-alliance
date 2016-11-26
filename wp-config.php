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
define('DB_NAME', 'shadydr1_wptest');

/** MySQL database username */
define('DB_USER', 'shadydr1_wptest');

/** MySQL database password */
define('DB_PASSWORD', '.ha^~8}U[IMk');

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
define('AUTH_KEY',         'K5o,C}D)$Fq2aOS{^iW4[RE6]C%,.Fy,y8&qF8 9?{|!E%VJHt3%i0LX;%AxBj^j');
define('SECURE_AUTH_KEY',  'c)HO#P5g6CS@_KvPocUPq`VS6@@BKA!/IK0X+v`[}YqmWdajON;pgl_eziwFdXue');
define('LOGGED_IN_KEY',    '0>G]kUGI0GS}6&_(?uz:$H>Fn7{(SU9q(,JN1g~5z]M<J/y*.3.+Rg!CC`4uo+[s');
define('NONCE_KEY',        'U#}=JJ%RubTQy[(IQaUP<.L CPug%ic](DMo5hszb,*LVHIi`e<SW,$,WEB|eW,~');
define('AUTH_SALT',        '`vfUO];>A(1j?($aDVSO},I6@zPs :G%pG.-5(WL*$Cua=@;,.VcR%aJme=-Soy6');
define('SECURE_AUTH_SALT', 'COkj$6Z`%K}7BqLFlk[j6+!<iPYe gm>zjU27+WrU< H~:=D:LoY3T_}Um0<lTnF');
define('LOGGED_IN_SALT',   'X>jal?7v4<>tWF0@)%u+F2mLf6WA_5*[K?._2EPBF[%;>)*APr}*YN_o,:n/$,<&');
define('NONCE_SALT',       '?0Nha$5pf?vezbmcpc=Jg8CCj*u.Oj,}->SGJp6z513Q|~C$ Yx0WX,fVp^:5s&m');

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
