<?php
/**
 * Connect to MySQL database using parameters
 *
 * @category   PHP
 * @package    root/includes/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */

	$dbuname=$dbadmusername;
	$dbpass=$dbadmuserpass;

//try a connection
if (!$connection) $connection = @mysql_connect($dbhost,$dbuname,$dbpass) or mysql_errorget($lang['MSG_ERROR_APP_MYSQLCONNECT']."<br/>".$lang['MSG_ERROR_APP_CONFIG'],'');

//select the database
if (!$select_base) $select_base=@mysql_selectdb($dbname) or mysql_errorget($lang['MSG_ERROR_APP_DBCONNECT'],'');


?>