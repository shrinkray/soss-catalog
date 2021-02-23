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
define('DB_PASSWORD', 'root');
	
	/** MySQL hostname */
	define('DB_HOST', 'localhost');
	
	/** Database Charset to use in creating database tables. */
	define('DB_CHARSET', 'utf8');
	
	/** The Database Collate type. Don't change this if in doubt. */
	define('DB_COLLATE', '');
// This enables debugging.
	define('WP_DEBUG', true);
	
	/**
	 * Authentication Unique Keys and Salts.
	 *
	 * Change these to different unique phrases!
	 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
	 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
	 *
	 * @since 2.6.0
	 */
	define('AUTH_KEY', '{6kojdr<6eJO|.0XoLFatX[_RPS,Pa8Fg??7xZ!nzy(2[gwq|=/*V2a,;C{#T0+A');
	define('SECURE_AUTH_KEY', 'no4Y,Sv]I<-1_j=9^U[1<$H;}Wn}E/q qZUO+-`I*|yrQ =Z_<!/%!WAGB?BaMyL');
	define('LOGGED_IN_KEY', '=&0BAddQs pt[drQ)+n7uz`vx8q d4#|6Uus$;mI&lE-#DhUz!Pz~wqUMtX1M3cE');
	define('NONCE_KEY', '|Ze:$i?cW_D~v|@(/O<PD!D*{6[F~,m1LNA:ye-Q_,|jbe0V#JocqKeE7=7TWj!d');
	define('AUTH_SALT', ']}&Br.Z_c9f,:Dx7gER|0x{V G,mN$k+8FotCY5zVA0a0g+?oc:f|/{B_t85!I|V');
	define('SECURE_AUTH_SALT', '<O-(=an&fjqrdYI!Fm_pfZ#oy~=jgI/M=[qWS&-^UoDXtNsUrjk$|feiX`rT&R81');
	define('LOGGED_IN_SALT', '~vzcz(,vX2e :1<5x]0yE-Y;T~v;A7]K+4BM:-rC.D2/Dx<;/z1o+{dYz5lV#F$;');
	define('NONCE_SALT', 'A/o?ty]J/J5Rs&nj[Oh6p%v:WP^@oE7b7)oRRR9+K~e$zglbG4)}|(7RcV$G8Y:N');
	
	/**
	 * WordPress Database Table prefix.
	 *
	 * You can have multiple installations in one database if you give each
	 * a unique prefix. Only numbers, letters, and underscores please!
	 */
	$table_prefix = 'wp_';


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
