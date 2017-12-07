<?php
/**
 * This file contains global configuration variables
 * Things like whether anyone can register.
 * 
 * Whether or not it's a secure (https) connection could
 * also go here...
 */



/**
 * Who can register and what the default role will be
 * Values for who can register under a standard setup can be:
 *      any  == anybody can register (default)
 *      admin == members must be registered by an administrator
 *      root  == only the root user can register members
 * 
 * Values for default role can be any valid role, but it's hard to see why
 * the default 'member' value should be changed under the standard setup.
 * However, additional roles can be added and so there's nothing stopping
 * anyone from defining a different default.
 */
define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");

define("HOST", "studev.groept.be"); 			// The host you want to connect to. 
define("USER", "a17_webapps02"); 				// The database username. 
define("PASSWORD", "wk9yzu0z"); 				// The database password. Oorspronkelijk =  4Fa98xkHVd2XmnfK
define("DATABASE", "a17_webapps02");				// The database name.

$dbname = DATABASE;

/**
 * Is this a secure connection?  The default is FALSE, but the use of an
 * HTTPS connection for logging in is recommended.
 * 
 * If you are using an HTTPS connection, change this to TRUE
 */
define("SECURE", FALSE);    // For development purposes only!!!!
