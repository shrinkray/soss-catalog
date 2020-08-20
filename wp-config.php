<?php
define('WP_CACHE', false); // Added by WP Rocket
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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '6D1cRThRpi42qRLiegL/+rHNsTyeBUvgeF/WlewlpcANbS4PoxsByTu24rOnuz977ISaJndbj1t7lrlFQTv2xw==');
define('SECURE_AUTH_KEY',  'CeJiYaOXMvWYdpQHWqnAl0Ztr9p835sWJUUGY57NeSpnoRTFxktgG2qzipqEMFxXsmyqycjjrYYy7b5jzgo4IA==');
define('LOGGED_IN_KEY',    '2LKOlu6+C5DRcIhCKILt+fKNsD57tnHddixTKnZPqHPvaH18a7hwnqOy52tUrNA8Lgmj40htW2LMF1y/w2N9nw==');
define('NONCE_KEY',        'OLurNTI1c3jFV+sR2YNS/nHvnBlEUfEAjQFT180ljPz041u7Uv1Dt6KF4bJWfQzIW49KM4TiY3lxjENX+vAtuw==');
define('AUTH_SALT',        'Dqevd6DWbqvCUnogNK9TaM6LZ/Jz61p8ghGUHxFZFzOSC37Kaeb34ZXAff93nWyg0SE9UP+MdHXBwkSI2vUSRg==');
define('SECURE_AUTH_SALT', 'Rgh+bjjx61YFWYIR21n0vyO5p9zBRaMTlfuetbVix6Blh4mSUF+kukKwc19QbnIaurihiwXeeoBpOWbzOgDZGg==');
define('LOGGED_IN_SALT',   'mC8r/sKWEOgiHa5FWOllzeS/SqVvW7grbmPoPek7VvO4NoE4fF07qqS3kXHbsSQWWg6LDpzpAQWzItUpMU2MEg==');
define('NONCE_SALT',       'PA3jtAPYt571wSrkj97fWvhkQbX+wzFJIbtX/s2bJ0b0kFgTiqUF6BZdYH7cDtPBTYbB6OiuyHR55NaLfPrc8Q==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';



define('WP_DEBUG', false);

/* Query Monitor vars
 *  - Enable dark mode for Query Monitor's interface.
 *  - If an individual database query takes longer than this time to execute, it's considered "slow"
 *  - In the Hooks & Actions panel, show every hook that has an action or filter attached
*/
define('QM_DARK_MODE', true);
define('QM_DB_EXPENSIVE', true);
define('QM_SHOW_ALL_HOOKS', true);

/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
	$_SERVER['HTTPS'] = 'on';
}
/* That's all, stop editing! Happy blogging. */

define('ALLOW_UNFILTERED_UPLOADS', true);

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
