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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'u*:T]0+e8OOwGIfI[G3^O5|^vmu-w.QyK0xBF[G:cm]OH|VLrqr3~S/M]C2vZEd(' );
define( 'SECURE_AUTH_KEY',  '&/G24,I9[>%N_6o)1_B:nzqNmU12R`{cKXHk&8LuQ^rQ(g$*P}XHjM]#Brc6R%8[' );
define( 'LOGGED_IN_KEY',    'j1ON5IKn^[)O_YQ|4@d&sCvp<fUM` dBmh42:nS)tW1c?+Aox}+*OOylZLL?+r:_' );
define( 'NONCE_KEY',        'oWX*XB188-?,I[M83ck5`2PptWcuc_&0Z)9p[ [Z61jd@6T7/5tt;$7@3IC]~7Bs' );
define( 'AUTH_SALT',        '/hIZCe1GQy`GS~qibnrV2(w=:J$S#M@Duvu:u !QHKR^ba%>!TKHo/jh]DT;G.o&' );
define( 'SECURE_AUTH_SALT', '-%ws;Z8dcN}O1GTQfvgR@m70,xeh/w<8O]e[Cso7qJ=%>EX[HVE7!gg9M Q`;P?m' );
define( 'LOGGED_IN_SALT',   'VvolP@pgAHnoKA`sdopi>Bb_]}N$=8qR2V8~{PSoGE!O).cHyM-v:D=G%@[mq5*O' );
define( 'NONCE_SALT',       '|TMMA,v[Q.d1Y*?D& LYcxyGobG&4L$JyW%< cG^EC~Y3} y`L;u-$FaQKs-/ght' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

define( 'WP_REDIS_CLIENT', 'predis' );
define( 'WP_REDIS_SENTINEL', 'redis-cluster' );
define( 'WP_REDIS_SERVERS', [
    'tcp://10.1.17.29:26379',
    'tcp://10.1.17.30:26379',
    'tcp://10.1.17.31:26379',
] );

define('FTP_USER', 'example');
define('FTP_PASS', 'password');
define('FTP_HOST', 'example.com:21');
define('FTP_SSL', false);
define('FS_METHOD', 'direct');