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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'Mysq1234' );

/** Database hostname */
define( 'DB_HOST', '192.168.247.130:3306' );

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
define('AUTH_KEY',         'cJXIE4{pZcH}V:gRY7ptI@lg(2g[iR&6 .(f|zR{%q0MwbK`uK249w+ PmVA:mr1');
define('SECURE_AUTH_KEY',  ':b]Ch+K}V}l+V]W-8FA|pIP=7PA9EI;`(.2J,DFR MjFc{RxQb4-=.n0ewY[*36*');
define('LOGGED_IN_KEY',    '27{Sg8V-/seT|:2J|N)_>{SdbU9FB+=EaekTKP`nWd=ZQ5+Q+TziL=5f$+n|5/:V');
define('NONCE_KEY',        '+CM~-{Nc2GC>|^^r*N+t~t^pgkKF6W2!7+:3ozBBmv%tsPjV*Smk8n-} HY^q[=?');
define('AUTH_SALT',        '+C.>_88X:m5z9yWO<BCJYuOM9bj/;-gMg+<%ZhFQ+B,zFyF/|$,|w^Db]Jhm=P^-');
define('SECURE_AUTH_SALT', 'w8ro1UNB?<[fPKhH@@dvl0L[k{tlxrEH|)o~n+`a!4-jP0DAl8}:sdK>Ir_l-2wk');
define('LOGGED_IN_SALT',   '`-|%qkm%---o~4G~2~#XU5xi|7&em-hYaDd0hZb!.PyU+HyUpSvvcHrjR<u+QO{+');
define('NONCE_SALT',       'qz|0!/M&67%v5zOnPZ-+aq2<-ZqO|#4Mh]tQ[jZ3NNY Z-N@[v2oj&DPHX6z`!R:');

/**#@-*/

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
