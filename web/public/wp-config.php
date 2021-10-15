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

define( 'DB_NAME', "olla" );


/** MySQL database username */

define( 'DB_USER', "root" );


/** MySQL database password */

define( 'DB_PASSWORD', "root" );


/** MySQL hostname */

define( 'DB_HOST', "mysql" );


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

define( 'AUTH_KEY',         'gv{_t)7{nlnq5(aMDX|>m*K0N}$Qak9%#CPY>0>`z=WpFGR@&91zBEND)/9.f{pT' );

define( 'SECURE_AUTH_KEY',  'FHKbrAN!k(rtDhlc2gP|wvC:A=cUV.N;h8qt^`:*n*4I2cT[=0mkx2I}sT/*a%79' );

define( 'LOGGED_IN_KEY',    'o%kmURVTXHv9jAs$z^A,#r}66:0=mbV, U^P;y7> .1XJP_|6W<!U~/_UMSi-7QB' );

define( 'NONCE_KEY',        '95G@ZDB:Lf9:Sh^-XMW?olmPI,z_KL;)oQIy%^~pFE,YFXCjX.+IL|zc:?rI<yk-' );

define( 'AUTH_SALT',        'SX>okWGWbOR<YSU!gJnyt8s{An%Up<.t]qj{p{_xK~*|#aCNkeINS~wR4^18l{|}' );

define( 'SECURE_AUTH_SALT', 'V?;+.JNhvX|)kyscjdnkOR[b`#4Yafrn~|V#s`4_tC:+V$&9MyOlbO7<CPwM$jFv' );

define( 'LOGGED_IN_SALT',   '((jwC+IBCL9@R|*UA@`/F`z5-3Y.ps*TK$SCpIJ2|Ij/`{0/0sO*T PQfGGjQ=d(' );

define( 'NONCE_SALT',       'p]:c@Tq9<R ?}v!reqL5@3KDO/cGoZYFd0,Y=F1GA^X~xuhz={#dateLPJ3XbACw' );


/**#@-*/


/**

 * WordPress Database Table prefix.

 *

 * You can have multiple installations in one database if you give each

 * a unique prefix. Only numbers, letters, and underscores please!

 */

$table_prefix = 'wp_';

if ( defined( 'XMLRPC_REQUEST' ) && true === XMLRPC_REQUEST ) { ini_set( 'opcache.enable', 0 ); };


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


/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


if (strpos($_SERVER['REQUEST_URI'], 'wp-admin')) define ('WPLANG', 'ru_RU'); else define ('WPLANG', 'ru_RU_lite');


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

