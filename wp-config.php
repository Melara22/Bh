<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'bh_dev');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'oscar');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '12345');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

define('FS_METHOD', 'direct');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', ';Z:oll4t)[^IbWN.nO2sF_8]]QqD8@Vi[xLf$ylzS`.^eTEM/a(K%C*83X7%X{s?');
define('SECURE_AUTH_KEY', 'Rg~u~~*oD-vB<WoWWmq,w~9G/t`=HI&ZQmVU7s&a+[r^Pe  Zff1)({o`&ZGI*}%');
define('LOGGED_IN_KEY', '?%Dr}n9L(U=R_fICaZomD-r$$uiK~8rjjHu^f`xS#8wKe%MTPt+JaJ1o<<qCP,q(');
define('NONCE_KEY', 'F hn` kb?h@&_H{r3wJhALM=B49y&.&<=hRTXawS.TJ=,rHN%$gCbIkd%YYF5P_~');
define('AUTH_SALT', '0Po>E+[5a2D@G#cYF@.d_F(SztE/Ij@PXXvqtat1i_>IM>BLe/1QL/MKizQ-ypuu');
define('SECURE_AUTH_SALT', '}jrakR;l9_SBw_ondd%jJymPp]OW>aOZ2{V;Ihy}7DYY$!/G>aA>v58{`;r2-V?L');
define('LOGGED_IN_SALT', 'Wf+trxA-1 MXCfI$)KkGe<cgAWEwr4EVNl4P0/MJYap>TmMB,sPf:?K);cuN%wy$');
define('NONCE_SALT', 'PM&2f62?`%9ufd:zT|7tI|,Yvz^;I{={HoZ`DY$Sf%|F/P33<;=NNM(Nl#e%&F*W');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'xcsghj_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

