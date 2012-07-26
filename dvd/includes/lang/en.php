<?php
/**
 * Dictionary
 * Language: English
 * @category   PHP
 * @package    root/includes/lang/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */

//global $lang;

$lang = array();

$lang['LANG'] = 'en';
$lang['APP_NAME'] = 'DVD @ Home';
$lang['YES'] = 'Yes';
$lang['NO'] = 'No';
$lang['APPLY'] = 'Apply';
$lang['SAVE'] = 'Save';
$lang['CANCEL'] = 'Cancel';
$lang['CLOSE'] = 'Close';
$lang['ADD'] = 'Add';
$lang['ADDAGAIN'] = 'Add again';
$lang['EDITMULT'] = 'Multiple Edit';
$lang['MODIFY'] = 'Modify';
$lang['LOGIN'] = 'Login';
$lang['LOGOUT'] = 'Logout';
$lang['ADMIN'] = 'Administrator';
$lang['PASSWORD'] = 'Password';// (will not reset password in database)
$lang['INSTALL'] = 'Install';
$lang['HELP'] = 'Help';
$lang['SEARCH'] = 'Search';
$lang['YOU_ARE'] = 'You are';
$lang['HERE'] = $lang['YOU_ARE'].' here : ';
$lang['CREATED'] = 'Created on : ';
$lang['MODIFIED'] = 'Modified on : ';
$lang['MANDATORY'] = 'Sign (*) means mandatory fields.';
$lang['SETTINGS'] = "Settings";
$lang['PRINT'] = "Print";
$lang['MSG_MANDATORY_FIELD'] = "That field is mandatory : ";
$lang['PARAMETERS'] = "Parameters";
$lang['HISTORY'] = "History";
$lang['RECORD'] = "record";
$lang['TELLMEMORE']="Tell me more ...";
$lang['REMEMBERME']='Keep me signed in.';
$lang['FEELINGS'] = "Feelings";
$lang['MOVIE_INFO'] = "Tech. Informations";
$lang['AMOVIE'] = "a movie";
$lang['STATUS']="Status";
$lang['USERPROFILE']="User profile";
$lang['PARAM_SSCRIPTSECU']="Scripts debug";
$lang['DB']="Database";

$lang['URL_HOME_FRS'] = 'index.php';
$lang['URL_LOGIN'] = 'login.php';
$lang['URL_TABLE_MAIN'] = 'dvd_view.php';
$lang['URL_TABLE_PARAMS'] = 'parameters_view.php';
$lang['URL_INSTALLER'] = 'install/installer.php';
$lang['URL_PROFILE']='user_profil.php';
$lang['URL_REGISTER']='user_add.php';
$lang['URL_SENDUSERINFO']='user_sndinfo.php';

$lang['PAGE_TITLE'] = 'My website page title';
$lang['HEADER_TITLE'] = 'My website header title';
$lang['SITE_NAME'] = $lang['APP_NAME'];
$lang['SLOGAN'] = 'My slogan here';
$lang['HEADING'] = 'Heading';

// Menu

$lang['MENU_HOME'] = 'Home';
$lang['MENU_ABOUT_US'] = 'About Us';
$lang['MENU_OUR_PRODUCTS'] = 'Our products';
$lang['MENU_CONTACT_US'] = 'Contact Us';
$lang['MENU_ADVERTISE'] = 'Advertise';
$lang['MENU_SITE_MAP'] = 'Site Map';

// Menu Nav
$lang['NAV_MENU_BY_SCORE'] = 'By score';
$lang['NAV_MENU_BY_YEAR'] = 'By year';
$lang['NAV_MENU_BY_GENRE'] = 'By genre';
$lang['NAV_MENU_ALL'] = 'All';

$lang['SEARCH_INFO_01'] = 'Use wildcards (% and ?) to refine search';

$lang['NEXT_PGE'] = 'Next';
$lang['PREVIOUS_PGE'] = 'Previous';
$lang['FIRST_REC'] = 'First';
$lang['LAST_REC'] = 'Last';
$lang['ROW_BY_PGE'] = 'Rows by page';

//$lang['DSP_LIBRARY'] = "<a href='".$lang['URL_TABLE_MAIN']."' title='Display library' target=_self>Display library</a>";
$lang['DSP_LIBRARY'] = "<a href='".$lang['URL_HOME_FRS']."' title='Display library' target=_self>Display library</a>";
$lang['DSP_LOGIN']="<a href='".$lang['URL_LOGIN']."' title='".$lang['LOGIN']."' target=_self>".$lang['LOGIN']."</a>";
$lang['DSP_PARAMETERS'] = "<a href='".$lang['URL_TABLE_PARAMS']."' title='Display parameters' target=_self>Display parameters</a>";
$lang['DSP_INSTALLER'] = "<a href='".$lang['URL_INSTALLER']."' title='Open installer' target=_self>Open installer</a>";
$lang['MSG_PROFILEBACK']="Display library";
$lang['DSP_PROFILE']="<a href='".$lang['URL_PROFILE']."' title='".$lang['MSG_PROFILEBACK']."' target=_self>".$lang['MSG_PROFILEBACK']."</a>";

$lang['MSG_LOGIN_SUCCESS'] = "you are successfully authenticated.";
$lang['MSG_LOGIN_FAILURE'] = "You can not be authenticated, please to log again.";
$lang['MSG_LOGIN_SESSIONEND'] = "Your session has been ended, please to log again.";
$lang['MSG_LOGOUT'] = 'Now, you are not authenticated.';
$lang['MSG_ERROR_APP_CONFIG'] = 'It seems the database is not properly installed. You should run the installer.<br/>'.$lang['DSP_INSTALLER'];
$lang['MSG_ERROR_APP_MYSQLCONNECT'] = 'Could not connect to the database. There\'s a server problem or some informations must be updated.';
$lang['MSG_ERROR_APP_DBCONNECT'] = '<b>Bad setup!!! </b><br>Check that your login, password or database name are properly answered.';
$lang['MSG_ERROR_SEND_MAIL'] = "Sending mails is impossible ...";
$lang['MSG_AUTHORIZATION_FAILURE'] = 'You are not authorized to do that action.<br/>Please <a href="'.$lang['URL_LOGIN'].'" target=_top title="'.$lang['LOGIN'].'">'.$lang['LOGIN'].'</a>.';
$lang['MSG_AUTHENTICATION_FAILURE'] = 'You must be authenticated.<br/>Please <a href="'.$lang['URL_LOGIN'].'" target=_top title="'.$lang['LOGIN'].'">'.$lang['LOGIN'].'</a>.';
$lang['MSG_FIELD_MANDATORY']="That field is mandatory : ";
$lang['MSG_LOGIN_ALREADY_USED']='This login is already in use.';
$lang['MSG_FIELD_ERROR']='This field has been completed incorrectly';
$lang['MSG_FIELDS_ERRORS']='These fields are filled out incorrectly';
$lang["MSG_UPLOAD_GERROR"]="Unknown error when submitting the file.";
$lang["MSG_UPLOAD_FORMATERR"]="Thank you for providing a file in mp3 format.";
$lang["MSG_UPLOAD_SIZEERR"]="The weight of your document should be between 1K and";
$lang["MSG_UPLOAD_DBLNAMEERR"]="There is already a file with that name, please change the file name";
$lang["MSG_UPLOAD_ERROR"]="WARNING, error: Return to Profile";
$lang["MSG_UPLOAD_SAVEERR"]="Saving the file made, it weighs";
$lang["MSG_UPLOAD_ADDOTHER"]="Add another file";
$lang["MSG_UPLOAD_MODDONE"]="Changes has done";
$lang["MSG_GENERIC_PROFILEBACK"]="Back to Profile";
$lang["MSG_USER_DBLLOGIN"]="This login is already in use";
$lang["MSG_USER_REGISTERSUCCESS"]="Successful registration.";
$lang["MSG_USER_REGISTERMODIFIED"]="Successful modification.";
$lang["MSG_USER_SENDINFOMAILSUBJECT"]="Retrieve your user data.";
$lang["MSG_USER_SENDINFOMAILBODY"]="Please find a list of your credentials:";
$lang["MSG_USER_SENDINFOSOK"]="Your login info has been sent to the following email address:";
$lang["MSG_USER_SENDINFOSKO"]="We were not able to retrieve your login.";
$lang['DSP_SENDUSERINFO']="<a href='".$lang['URL_SENDUSERINFO']."' title='".$lang['MSG_USER_SENDINFOMAILSUBJECT']."' target='_self' class='ui-state-highlight'>".$lang['MSG_USER_SENDINFOMAILSUBJECT']."</a>";

$lang['REC_SAVE'] = "Your record has been saved. ".$lang['DSP_LIBRARY'];
$lang['REC_DELETE'] = "Your record has been deleted. ".$lang['DSP_LIBRARY'];
$lang['REC_UPDATE'] = "Your record has been updated. ".$lang['DSP_LIBRARY'];

$lang['REC_SAVE_YESNO'] = "Your record has been saved ?";
$lang['REC_DELETE_YESNO'] = "Do you want to delete record ?";
$lang['REC_UPDATE_YESNO'] = "Your record has been updated ?";

$lang['REC_ACT_N'] = "Add";
$lang['REC_ACT_M'] = "Modify";
$lang['REC_ACT_D'] = "Delete";
$lang['REC_ACT_R'] = "Open";

//TABLES
$lang['SORT_ASC_TODO'] = "Ascendant sorting";
$lang['SORT_DSC_TODO'] = "Descendant sorting";
$lang['SORT_ASC_DONE'] = "Ascendant sorted";
$lang['SORT_DSC_DONE'] = "Descendant sorted";

$lang['VIEW_ACT_N'] = "New";
$lang['VIEW_ACT_NMULT'] = "New (+)";
$lang['VIEW_ACT_M'] = "Modify";
$lang['VIEW_ACT_D'] = "Delete";
$lang['VIEW_ACT_LOGIN'] = $lang['LOGIN'];
$lang['VIEW_ACT_LOGOUT'] = $lang['LOGOUT'];
$lang['VIEW_ACT_SEARCH'] = $lang['SEARCH'];
$lang['VIEW_ACT_SETTINGS'] = $lang['SETTINGS'];
$lang['VIEW_ACT_ABOUT'] = "About";

$lang['AUTHENTICATEYOU']='To access our site, thank you kindly identify yourself:';
$lang['NOTREGISTEREDANSW01']='If you are not registered with us, thank you kindly complete the form by clicking here:';
$lang['REGISTER']='Register ...';
$lang['DONTREMEMBER']='If you do not remember your login or password, thank you kindly complete the rescue by clicking here:';
$lang['SENDME']='Send me my login and password ...';
$lang['MANDATORY']='The sign (*) represents mandatory fields';
$lang['GENDER']='Gender'; 
$lang['MR']='Mr';
$lang['MRS']='Mrs';
$lang['MSS']='Miss';
$lang['LNAME']='Name';
$lang['FNAME']='First Name';
$lang['BIRTHDT']='Date of Birth';
$lang['DAY']='Day';
$lang['MONTH']='Month';
$lang['YEAR']='Year';
$lang['EMAIL']='E-mail';
$lang['SITES']='Sites';
$lang['ADDRESS']='Address';
$lang['ZIP']='Zip';
$lang['CITY']='City';
$lang['COUNTRY']='Country';
$lang['USERNAME']='Username';

$lang['WELCOME']='WELCOME';
$lang['LOAD']='Load';
$lang['EXIT']='Exit';
$lang['YOURFOLDER']='Content of your selection:';
$lang['RECORD']='record';
$lang['FINDOTHERSOUND']='Find other sounds here : ';
$lang['ERROR']='ERROR';
$lang['WARNING']='WARNING';
$lang['UPLOADKO']='No file uploaded WAS.';
$lang['SOUNDCHANGE']='You want to change your sound library:';
$lang['SOUNDLIST']='List of my sounds';
$lang['LEFT']='Left';
$lang['RIGHT']='Right';
$lang['FILENAME']='Filename';
$lang['UPLOAD']='Upload a sound file "*. mp3"?';
$lang['DELETEQUESTION']='Are you sure to delete the selected file ';
$lang['BACK']='Back';
$lang['BACKPROFIL']='Back to Profile';
$lang['THANKYOU']='Thank you for using this service.';
$lang['LISTEN']='Listen';

$lang['PARAM_HOST'] = "Host";
$lang['PARAM_DBNAME'] = "Database name";
$lang['PARAM_CSS'] = "Css";
$lang['PARAM_LIQUIDHTML'] = "Liquid edition (&lt;DIV&gt; only)";
$lang['PARAM_SSECURITY'] = "Secure site";
$lang['PARAM_ALLOWUSERREG'] = "Allow user registration";

$lang['UI_RPPMAX'] = "Records by page";


$lang['SCREEN_TITLE_WELCOME']='Welcome';
$lang['SCREEN_TITLE_AUTHENTICATION']='Authentication';
$lang['SCREEN_TITLE_REGISTER']='Register';
$lang['SCREEN_TITLE_SENDME']='Send me my ids';
$lang['SCREEN_TITLE_MP3MNGT']='MP3 management';
$lang['SCREEN_TITLE_USERMOD']='Modify your personal datas';


$lang['MYSQL_PARAM'] = "MySQL connection parameters";
$lang['MYSQL_EXPORT_OPTIONS'] = "MySQL export options";
$lang['MYSQL_EXPORT_TYPE'] = "Output format";
$lang['MYSQL_EXPORT_DROP'] = "Drop table statement";
$lang['MYSQL_EXPORT_CREATE'] = "Create table statement";
$lang['MYSQL_EXPORT_TABLE_DATA'] = "Table data";
$lang['MYSQL_EXPORT_CSVSEP'] = "Delimiter:";
$lang['MYSQL_EXPORT_TABLE'] = "Table name";
$lang['MYSQL_EXPORT_HEADER'] = "Header";

$lang['SQL_TABLE_DVD_NAME_ALIAS'] = 'Movies';
$lang['SQL_TABLE_DVD_MEDIAINFO_NAME_ALIAS'] = 'Movies Technicals Informations';
$lang['SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME_ALIAS'] = 'Movies Technicals Informations Parameters';
$lang['SQL_TABLE_DVD_USER_NAME_ALIAS'] = 'Users';

$lang['TBL_DVD_ALIAS_Title'] = 'Title';
$lang['TBL_DVD_ALIAS_Title_en'] = 'Title (english)';
$lang['TBL_DVD_ALIAS_Score'] = 'Score';
$lang['TBL_DVD_ALIAS_Comments'] = 'Comments';
$lang['TBL_DVD_ALIAS_Sound'] = 'Sound';
$lang['TBL_DVD_ALIAS_More'] = 'More';
$lang['TBL_DVD_ALIAS_Genres'] = 'Genres';
$lang['TBL_DVD_ALIAS_Countries'] = 'Countries';
$lang['TBL_DVD_ALIAS_Year'] = 'Year';
$lang['TBL_DVD_ALIAS_IMDBrate'] = 'IMDB Rating';
$lang['TBL_DVD_ALIAS_IMDBURL'] = 'IMDB URL';
$lang['TBL_DVD_ALIAS_DT_CRT'] = 'Creation date';
$lang['TBL_DVD_ALIAS_DT_MOD'] = 'Modification date';

$lang['TBL_DVD_MEDIAINFO_TFormat'] = "Media type";
$lang['TBL_DVD_MEDIAINFO_VFormat'] = "Media video format";
$lang['TBL_DVD_MEDIAINFO_AFormat'] = "Media audio format";
$lang['MediaTypeFormat']  = $lang['TBL_DVD_MEDIAINFO_TFormat'];
$lang['MediaVideoFormat'] = $lang['TBL_DVD_MEDIAINFO_VFormat'];
$lang['MediaAudioFormat'] = $lang['TBL_DVD_MEDIAINFO_AFormat'];

$lang['TBL_DVD_MEDIAINFO_Info'] = "Type";
$lang['TBL_DVD_MEDIAINFO_Value'] = "Value"; 

$lang['USR000']="Inactive";
$lang['USR060']="Active";


?>