<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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

// https://github.com/rhubarbgroup/redis-cache/wiki/Connection-Parameters

// ** Redis settings - You can get this info from your web host ** //

/** Redis hostname */
define( 'WP_REDIS_HOST', getenv('REDIS_HOST') );

/** Redis port */
define( 'WP_REDIS_PORT', getenv('REDIS_PORT') );

/** The timeout seconds for connection on redis */
define( 'WP_REDIS_TIMEOUT', getenv('REDIS_CONNECTION_TIMEOUT_SECONDS') );

/** The timeout seconds for read on redis */
define( 'WP_REDIS_READ_TIMEOUT', getenv('REDIS_READ_TIMEOUT_SECONDS') );

/** The logical database index on redis */
define( 'WP_REDIS_DATABASE', getenv('REDIS_DB_INDEX') );

/** True if do caching */
define( 'WP_CACHE', true );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv('SQL_DB') );

/** MySQL database username */
define( 'DB_USER', getenv('SQL_USER') );

/** MySQL database password */
define( 'DB_PASSWORD', getenv('SQL_PASSWORD') );

/** MySQL hostname */
define( 'DB_HOST', getenv('SQL_HOST') );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

/**#@-*/
/* insert keys here */
define('AUTH_KEY',         'vSlPF$9{syrMep6^r@Mw<;eIzt;&{yl|dpz~pY!mqldvqNS+(.`DPZ>8ZB2:*;<[');
define('SECURE_AUTH_KEY',  '*MogYno(eTMA4vZVF?kqFhvzY4vqJ%|Z.|H%!A$F;9l2V7u{U3DpSuc|dI2{>-Rz');
define('LOGGED_IN_KEY',    'Y<:L2E5&wNU7@Y=3M-%c,T|NA];$X-5<QM?Yuh2Wzf-G<G-D!5z=?c}PM@v%kk4g');
define('NONCE_KEY',        ':|(got(L-]Whk-(CrkHYdBcq?+N-KUv1<FA)e2%Y-+Pm=N-)P-HnfXii%N `Ehe%');
define('AUTH_SALT',        'G7S0mUa6@}hO:t[??MkU!O`-SVWkR+>(!aqifr16Cvw;<SWkJtgtQ?^()F&U/*`8');
define('SECURE_AUTH_SALT', 'e2YX3BRKRu/>BKH&!jY<R>IX`h,tx0eJ%Hxl9*&~)d*wZvJ|X&m%3`G(pk.-fDC!');
define('LOGGED_IN_SALT',   'TP2eVj-`)Dy(rU2GkW+0Bw:RuQ</]HBVr9f*QMBNf4b1T#/)+FY5VBV9>DT<+/6a');
define('NONCE_SALT',       'sp?(:|+XUT_{.~4u.:xQ}I[}MjO_# R3Rx9wf Vw5dfqWmD/gv]$3TdaI`0|raq%');

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
