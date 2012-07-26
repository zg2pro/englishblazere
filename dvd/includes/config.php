<?php
/**
 * Configuration, get parameters
 *
 * @category   PHP
 * @package    root/includes/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
$dbhost = getenv("HTTP_HOST");

global $REQUEST_URI;
$REQUEST_URI=getenv("REQUEST_URI");

global $SQL_TABLE_DVD_NAME;
global $SQL_TABLE_DVD_MEDIAINFO_NAME;
global $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME;
global $SQL_TABLE_DVD_USER;
global $SQL_TABLE_DVD_USER_SETTINGS;
$SQL_TABLE_DVD_PREFIX ="dvd";
$SQL_TABLE_DVD_NAME = "`dvd`";
$SQL_TABLE_DVD_MEDIAINFO_NAME = "`dvd_mediainfo`";
$SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME = "`dvd_param_mediainfo`";
$SQL_TABLE_DVD_USER = "`dvd_user`";
$SQL_TABLE_DVD_USER_SETTINGS = "`dvd_user_settings`";

$lang['TBL_DVD_Title'] = 'Title';
$lang['TBL_DVD_Title_en'] = 'Title_en';
$lang['TBL_DVD_Score'] = 'Score';
$lang['TBL_DVD_Comments'] = 'Comments';
$lang['TBL_DVD_Sound'] = 'Sound';
$lang['TBL_DVD_More'] = 'More';
$lang['TBL_DVD_Genres'] = 'Genres';
$lang['TBL_DVD_Countries'] = 'Countries';
$lang['TBL_DVD_Year'] = 'Year';
$lang['TBL_DVD_IMDBrate'] = 'IMDB Rating';
$lang['TBL_DVD_IMDBURL'] = 'IMDB URL';
$lang['TBL_DVD_DT_CRT'] = 'DT_CRT';
$lang['TBL_DVD_DT_MOD'] = 'DT_MOD';

$lang['DVD_MEDIAINFO_Info'] = 'Info';
$lang['DVD_MEDIAINFO_Value'] = 'Value';


$TABLE_DVD_SEARCHFIELDS = array($lang['TBL_DVD_Title'],$lang['TBL_DVD_Title_en'],$lang['TBL_DVD_Countries'],
$lang['TBL_DVD_Genres'],$lang['TBL_DVD_Year'],$lang['TBL_DVD_Comments'],$lang['TBL_DVD_More']);

$TABLE_DVD_FIELDS = array(
$lang['TBL_DVD_Title']    ,
$lang['TBL_DVD_Title_en'] ,
$lang['TBL_DVD_Score']    ,
$lang['TBL_DVD_Comments'] ,
$lang['TBL_DVD_Sound']    ,
$lang['TBL_DVD_More']     ,
$lang['TBL_DVD_Genres']   ,
$lang['TBL_DVD_Countries'],
$lang['TBL_DVD_Year']     ,
$lang['TBL_DVD_IMDBrate'] ,
$lang['TBL_DVD_IMDBURL']  ,
$lang['TBL_DVD_DT_CRT']   ,
$lang['TBL_DVD_DT_MOD'] );


@include_once 'configvar.php';
//UPDATE DON'T NEEDED :)
if(!isset($sitesecurity)){$sitesecurity=0;}
if(!isset($allowuserreg)){$allowuserreg=0;}

?>
