<?php
/**
 * Parameters & User functions
 *
 * @category   HTML,PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
 
   function parameters_mediainfo_delete($id){
   global $SQL_TABLE_DVD_NAME;
   global $SQL_TABLE_DVD_MEDIAINFO_NAME;
   global $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME;
   global $connection;
   global $lang;
   
     //SQL REQUEST :
		$query = "SELECT $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.* FROM $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME WHERE $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.Id=$id";
		
		$res_query = mysql_query($query) or mysql_errorget('',$query);
		
		//READING THE RECORDSET :
    while($rs=mysql_fetch_array($res_query))
  	{
  		$Info		  =$rs["Info"];
  		$Value		=$rs["Value"];
  		$rec_dtcrt=$rs["DT_CRT"];
  		$rec_dtmod=$rs["DT_MOD"];
  	
  	}
  	
  	//SQL REQUEST :
		$query = "DELETE FROM $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME WHERE NOT EXISTS (SELECT * FROM $SQL_TABLE_DVD_MEDIAINFO_NAME WHERE $SQL_TABLE_DVD_MEDIAINFO_NAME.`$Info`=$id) AND $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.`Id`=$id;";
	
    //PROCEED TO SQL :
		$res_query = mysql_query($query) or mysql_errorget('',$query);

    return true;
   }
   
   function user_delete($Id){
   global $SQL_TABLE_DVD_USER;
   global $SQL_TABLE_DVD_USER_SETTINGS;
   global $connection;
   global $lang;
   
     //SQL REQUEST :
		$query = "DELETE  $SQL_TABLE_DVD_USER,$SQL_TABLE_DVD_USER_SETTINGS FROM $SQL_TABLE_DVD_USER INNER JOIN $SQL_TABLE_DVD_USER_SETTINGS WHERE $SQL_TABLE_DVD_USER.Id=$SQL_TABLE_DVD_USER_SETTINGS.Id_User AND $SQL_TABLE_DVD_USER.Id=$Id";

		$res_query = mysql_query($query) or mysql_errorget('',$query);
		
		return true;
   }
   
?>
