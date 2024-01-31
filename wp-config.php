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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', "engiicore" );

/** MySQL database username */
define( 'DB_USER', "root" );

/** MySQL database password */
define( 'DB_PASSWORD', "" );

/** MySQL hostname */
define( 'DB_HOST', "localhost" );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'latin1' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', 'http://engiicore.test' );
    define( 'WP_HOME', 'http://engiicore.test' );
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
define( 'AUTH_KEY',         'od8LRul6eSW5SvkHlDFJYWkkhybSwaPY9iRlVwYjciuBlZuelFGhk9SVfope7ZZm' );
define( 'SECURE_AUTH_KEY',  't6FACTXm6yAnNLMXpeYfGo8ubKKhyJqWUFLwv77V4qmgsYMxjvCYb9XZS27bqcn0' );
define( 'LOGGED_IN_KEY',    'FhBHXTWuaSO5MU0JhrtfZlh6KtrZp8HPkYuLFr23WZjcd1zj4J9zGAMutnhhthkr' );
define( 'NONCE_KEY',        'vwqYw8O7BjjBxqK1KLmOwOmokALKO4X1NsLN6wBHMf1iZSREwMStfGmI0y2TiHDc' );
define( 'AUTH_SALT',        'RR5qRl2hWUvhnEiTS2DFy9sgJ1lmVsyvicvCdyuqFBz6PK33WgEriXDZZ5hWMpwD' );
define( 'SECURE_AUTH_SALT', 'vFMwNoOmLpej0QWo4VTQUjQPDEXa8Faxvj66U46dz0O2rv7uNofGzt7r3u97rDSJ' );
define( 'LOGGED_IN_SALT',   'iCbYIGPtRbUkM0M1uRVRZSbGnZtSAT8cMQG8AfFDuvEO85xylL6joO1Ej55dytaX' );
define( 'NONCE_SALT',       '3sQxBn8VyFncw1Blr1xZtDbd9pqYDc7BrWoE8C3Euz9KjBgc2Cobz3AvWCB3eZ34' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define('SCRIPT_DEBUG', false);


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
