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
define( 'DB_NAME', 'demobatdongsan' );

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
define( 'AUTH_KEY',         'CGm[Y=Gwo:C^}_ZUAju;OzW4v%%ZWoc7c$iL2!m9V{C})_)MGXb]r8p]mXn$/@+.' );
define( 'SECURE_AUTH_KEY',  '3[A`6}z3XdoiTnvNWAwD<s+JjJ+)Woy3WQ@X?4WHP%:S(75D9~yDTv`Mg4fASH2s' );
define( 'LOGGED_IN_KEY',    '~yV`kxM&~a&syTYokLGG2d9n)`(wE[AmRu*Q5*)~=:YW~Hx~gzd@)hxS@2vW:k-*' );
define( 'NONCE_KEY',        '[:{bLWq,KoK*/Dg=fUWB)=NG<NK^0o{iD%[!u3Xe7:_+67Nks<CeU1?v68Nw$cx}' );
define( 'AUTH_SALT',        '-pm)aUbzM0 s=jgpoHZqd.ZG9f2m,o|2&fkV.4Rr|F3^7!k38*`ua3A*V=qDt2i<' );
define( 'SECURE_AUTH_SALT', 'FgPaFZZ2Ep~fw5x$8hY}5C,F|bzMhi[[D`~d!hHH;ZvV Y]lz:|Bs~NvaNu}!lw|' );
define( 'LOGGED_IN_SALT',   '7n*hfk{QBxU^E.Q]CFwT#I=nY}]{=cakFJGER4jD@D,x-y^Awo:HCfv&u=W3@sMT' );
define( 'NONCE_SALT',       '!Yb01NYN+5K*Xo<rB>l!E[0So%$AzbA7rZ6Mn?YK}CXV:!JM~@q&7{1bCVaLm(k7' );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
