<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'default';
$active_record = TRUE;

/** DB de servidor central **/
$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = '';
$db['default']['database'] = 'centro';
$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

/** DB de Central IP 535 **/
$db['db535']['hostname'] = '192.168.0.45';
$db['db535']['username'] = 'sistemas';
$db['db535']['password'] = 'ce535server';
$db['db535']['database'] = 'asteriskcdrdb';
$db['db535']['dbdriver'] = 'mysqli';
$db['db553']['dbprefix'] = '';
$db['db535']['pconnect'] = false;
$db['db535']['db_debug'] = TRUE;
$db['db535']['cache_on'] = FALSE;
$db['db535']['cachedir'] = '';
$db['db535']['char_set'] = 'utf8';
$db['db535']['dbcollat'] = 'utf8_general_ci';
$db['db535']['swap_pre'] = '';
$db['db535']['autoinit'] = TRUE;
$db['db535']['stricton'] = FALSE;

$db['as535']['hostname'] = '192.168.0.45';
$db['as535']['username'] = 'sistemas';
$db['as535']['password'] = 'ce535server';
$db['as535']['database'] = 'asterisk';
$db['as535']['dbdriver'] = 'mysqli';
$db['as553']['dbprefix'] = '';
$db['as535']['pconnect'] = false;
$db['as535']['db_debug'] = TRUE;
$db['as535']['cache_on'] = FALSE;
$db['as535']['cachedir'] = '';
$db['as535']['char_set'] = 'utf8';
$db['as535']['dbcollat'] = 'utf8_general_ci';
$db['as535']['swap_pre'] = '';
$db['as535']['autoinit'] = TRUE;
$db['as535']['stricton'] = FALSE;

/** DB de Central IP 780 **/
$db['db780']['hostname'] = '192.168.0.46';
$db['db780']['username'] = 'sistemas';
$db['db780']['password'] = 'ce535server';
$db['db780']['database'] = 'asteriskcdrdb';
$db['db780']['dbdriver'] = 'mysqli';
$db['db780']['dbprefix'] = '';
$db['db780']['pconnect'] = false;
$db['db780']['db_debug'] = TRUE;
$db['db780']['cache_on'] = FALSE;
$db['db780']['cachedir'] = '';
$db['db780']['char_set'] = 'utf8';
$db['db780']['dbcollat'] = 'utf8_general_ci';
$db['db780']['swap_pre'] = '';
$db['db780']['autoinit'] = TRUE;
$db['db780']['stricton'] = FALSE;

$db['as780']['hostname'] = '192.168.0.46';
$db['as780']['username'] = 'sistemas';
$db['as780']['password'] = 'ce535server';
$db['as780']['database'] = 'asterisk';
$db['as780']['dbdriver'] = 'mysqli';
$db['as780']['dbprefix'] = '';
$db['as780']['pconnect'] = false;
$db['as780']['db_debug'] = TRUE;
$db['as780']['cache_on'] = FALSE;
$db['as780']['cachedir'] = '';
$db['as780']['char_set'] = 'utf8';
$db['as780']['dbcollat'] = 'utf8_general_ci';
$db['as780']['swap_pre'] = '';
$db['as780']['autoinit'] = TRUE;
$db['as780']['stricton'] = FALSE;

/** DB de Central IP TAV **/
$db['dbTAV']['hostname'] = '192.168.0.44';
$db['dbTAV']['username'] = 'sistemas';
$db['dbTAV']['password'] = 'ce535server';
$db['dbTAV']['database'] = 'asteriskcdrdb';
$db['dbTAV']['dbdriver'] = 'mysqli';
$db['dbTAV']['dbprefix'] = '';
$db['dbTAV']['pconnect'] = false;
$db['dbTAV']['db_debug'] = TRUE;
$db['dbTAV']['cache_on'] = FALSE;
$db['dbTAV']['cachedir'] = '';
$db['dbTAV']['char_set'] = 'utf8';
$db['dbTAV']['dbcollat'] = 'utf8_general_ci';
$db['dbTAV']['swap_pre'] = '';
$db['dbTAV']['autoinit'] = TRUE;
$db['dbTAV']['stricton'] = FALSE;

$db['asTAV']['hostname'] = '192.168.0.44';
$db['asTAV']['username'] = 'sistemas';
$db['asTAV']['password'] = 'ce535server';
$db['asTAV']['database'] = 'asterisk';
$db['asTAV']['dbdriver'] = 'mysqli';
$db['asTAV']['dbprefix'] = '';
$db['asTAV']['pconnect'] = false;
$db['asTAV']['db_debug'] = TRUE;
$db['asTAV']['cache_on'] = FALSE;
$db['asTAV']['cachedir'] = '';
$db['asTAV']['char_set'] = 'utf8';
$db['asTAV']['dbcollat'] = 'utf8_general_ci';
$db['asTAV']['swap_pre'] = '';
$db['asTAV']['autoinit'] = TRUE;
$db['asTAV']['stricton'] = FALSE;

/* End of file database.php */
/* Location: ./application/config/database.php */