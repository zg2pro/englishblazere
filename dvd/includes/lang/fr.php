<?php
/**
 * Dictionary
 * Language: french
 * @category   PHP
 * @package    root/includes/lang/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */

//global $lang;

$lang = array();

$lang['LANG'] = 'fr';
$lang['APP_NAME'] = 'DVD @ Home';
$lang['YES'] = 'Oui';
$lang['NO'] = 'Non';
$lang['APPLY'] = 'Appliquer';
$lang['SAVE'] = 'Sauver';
$lang['CANCEL'] = 'Annuler';
$lang['CLOSE'] = 'Fermer';
$lang['ADD'] = 'Ajouter';
$lang['ADDAGAIN'] = 'Ajouter +';
$lang['EDITMULT'] = 'Edition mult.';
$lang['MODIFY'] = 'Modifier';
$lang['LOGIN'] = 'Authentification';
$lang['LOGOUT'] = 'D�connexion';
$lang['ADMIN'] = 'Administrateur';
$lang['PASSWORD'] = 'Mot de passe';// (Ne sera pas sauvegard� dans la base)
$lang['INSTALL'] = 'Installation';
$lang['HELP'] = 'Aide';
$lang['SEARCH'] = 'Chercher';
$lang['YOU_ARE'] = 'Vous �tes';
$lang['HERE'] = $lang['YOU_ARE'].' ici : ';
$lang['CREATED'] = 'Cr�� le : ';
$lang['MODIFIED'] = 'Modifi� le : ';
$lang['MANDATORY'] = '(*) indique un champ obligatoire.';
$lang['SETTINGS'] = "Param�tres";
$lang['PRINT'] = "Imprimer";
$lang['MSG_MANDATORY_FIELD'] = "Ce champ est obligatoire : ";
$lang['PARAMETERS'] = "Param�tres";
$lang['HISTORY'] = "Historique";
$lang['RECORD'] = "enregistrement";
$lang['TELLMEMORE']="Dites moi en plus ...";
$lang['REMEMBERME']='Se souvenir de moi.';
$lang['FEELINGS'] = "Appr�ciations";
$lang['MOVIE_INFO'] = "Informations techniques";
$lang['AMOVIE'] = "un film";
$lang['STATUS']="Statut";
$lang['USERPROFILE']="Le profil utilisateur";
$lang['PARAM_SSCRIPTSECU']="D�bogage des scripts";
$lang['DB']="Base de donn�e";

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

$lang['MENU_HOME'] = "Page d'accueil";
$lang['MENU_ABOUT_US'] = 'A propos de ...';
$lang['MENU_OUR_PRODUCTS'] = 'Nos produits';
$lang['MENU_CONTACT_US'] = 'Contactez-nous';
$lang['MENU_ADVERTISE'] = 'Publicit�';
$lang['MENU_SITE_MAP'] = 'Carte du site';

// Menu Nav
$lang['NAV_MENU_BY_SCORE'] = 'Par score';
$lang['NAV_MENU_BY_YEAR'] = 'Par ann�e';
$lang['NAV_MENU_BY_GENRE'] = 'Par genre';
$lang['NAV_MENU_ALL'] = 'Tous';

$lang['SEARCH_INFO_01'] = 'Utilisez les jockers % et ? pour affiner votre recherche';

$lang['NEXT_PGE'] = 'Suivant';
$lang['PREVIOUS_PGE'] = 'Pr�c�dent';
$lang['FIRST_REC'] = 'Premier';
$lang['LAST_REC'] = 'Dernier';
$lang['ROW_BY_PGE'] = 'Lignes par page';

//$lang['DSP_LIBRARY'] = "<a href='".$lang['URL_TABLE_MAIN']."' title='Retourner � la page d\'accueil' target=_self>Retourner � la page d'accueil</a>";
$lang['DSP_LIBRARY'] = "<a href='".$lang['URL_HOME_FRS']."' title='Retourner � la page d\'accueil' target=_self>Retourner � la page d'accueil</a>";
$lang['DSP_LOGIN']="<a href='".$lang['URL_LOGIN']."' title='".$lang['LOGIN']."' target=_self>".$lang['LOGIN']."</a>";
$lang['DSP_PARAMETERS'] = "<a href='".$lang['URL_TABLE_PARAMS']."' title='Aller � la page des param�tres' target=_self>Aller � la page des param�tres</a>";
$lang['DSP_INSTALLER'] = "<a href='".$lang['URL_INSTALLER']."' title='Ex�cuter l\'installateur' target=_self>Ex�cuter l'installateur</a>";
$lang['MSG_PROFILEBACK']="Retourner � la page d'accueil";
$lang['DSP_PROFILE']="<a href='".$lang['URL_PROFILE']."' title='".$lang['MSG_PROFILEBACK']."' target=_self>".$lang['MSG_PROFILEBACK']."</a>";

$lang['MSG_LOGIN_SUCCESS'] = "Vous vous �tes authentifi�.";
$lang['MSG_LOGIN_FAILURE'] = "Vous ne pouvez pas �tre authentifi�, merci d'essayez � nouveau.";
$lang['MSG_LOGIN_SESSIONEND'] = "Votre session a pris fin, Your session has been ended, merci d'essayez � nouveau.";
$lang['MSG_LOGOUT'] = "A patir de maintenant, Vous n'�tes plus authentifi�.";
$lang['MSG_ERROR_APP_CONFIG'] = 'Il semble que la base de donn�es ne soit pas correctement install�e. Vous devriez ex�cuter l\'installateur.<br/>'.$lang['DSP_INSTALLER'];
$lang['MSG_ERROR_APP_MYSQLCONNECT'] = 'L\'application ne peut pas se connecter � la base. Il y a un probl�me de serveur ou certaines informations doivent �tre mises � jour.';
$lang['MSG_ERROR_APP_DBCONNECT'] = '<b>Mauvaise configuration!!! </b><br>V�rifiez que votre login, mot de passe ou le nom de la base sont bien saisi pour la connexion � la base.';
$lang['MSG_ERROR_SEND_MAIL'] = "L'envoi de mail est impossible ...";
$lang['MSG_AUTHORIZATION_FAILURE'] = 'Vous n\'�tes pas autoris� � faire cette action.<br/>Merci de proc�der � votre <a href="'.$lang['URL_LOGIN'].'" target=_top title="'.$lang['LOGIN'].'">'.$lang['LOGIN'].'</a>.';
$lang['MSG_AUTHENTICATION_FAILURE'] = 'Vous devez �tre authentifi� pour acc�der � cette application.<br/>Merci de proc�der � votre <a href="'.$lang['URL_LOGIN'].'" target=_top title="'.$lang['LOGIN'].'">'.$lang['LOGIN'].'</a>.';
$lang['MSG_FIELD_MANDATORY']="Ce champ est obligatoire : ";
$lang['MSG_LOGIN_ALREADY_USED']='Ce login est d�j� utilis�.';
$lang['MSG_FIELD_ERROR']='Ce champ a �t� compl�t� de mani�re incorrecte';
$lang['MSG_FIELDS_ERRORS']='Ces champs sont incorrectement remplis';
$lang["MSG_UPLOAD_GERROR"]="Erreur inconnue lors du d�p�t de fichier.";
$lang["MSG_UPLOAD_FORMATERR"]="Merci de fournir un fichier au format mp3.";
$lang["MSG_UPLOAD_SIZEERR"]="Le poids de votre document doit �tre compris entre 1Ko et ";
$lang["MSG_UPLOAD_DBLNAMEERR"]="Un fichier porte d�j� ce nom, veuillez changer son nom S.V.P.";
$lang["MSG_UPLOAD_ERROR"]="ATTENTION, erreur : Retour au profil";
$lang["MSG_UPLOAD_SAVEOK"]="Enregistrement du fichier effectu�, il p�se ";
$lang["MSG_UPLOAD_ADDOTHER"]="Ajouter un autre fichier";
$lang["MSG_UPLOAD_MODDONE"]="Modifications effectu�es";
$lang["MSG_GENERIC_PROFILEBACK"]="Retour au profil";
$lang["MSG_USER_DBLLOGIN"]="Ce login est d�j� utilis�";
$lang["MSG_USER_REGISTERSUCCESS"]="Inscription r�alis�e avec succ�s.";
$lang["MSG_USER_REGISTERMODIFIED"]="Modification r�alis�e avec succ�s.";
$lang["MSG_USER_SENDINFOMAILSUBJECT"]="Recup�ration de vos identifiants.";
$lang["MSG_USER_SENDINFOMAILBODY"]="Veuillez trouvez la liste de vos identifiants :";
$lang["MSG_USER_SENDINFOSOK"]="Vos identifiants ont �t� envoy� � l'adresse mail suivante :";
$lang["MSG_USER_SENDINFOSKO"]="Nous n'avons pas �t� capable de retrouver vos identifiants.";
$lang['DSP_SENDUSERINFO']="<a href='".$lang['URL_SENDUSERINFO']."' title='".$lang['MSG_USER_SENDINFOMAILSUBJECT']."' target='_self' class='ui-state-highlight'>".$lang['MSG_USER_SENDINFOMAILSUBJECT']."</a>";

$lang['REC_SAVE'] = "Votre enregistrement a �t� sauvegard�. ".$lang['DSP_LIBRARY'];
$lang['REC_DELETE'] = "Votre enregistrement a �t� supprim�. ".$lang['DSP_LIBRARY'];
$lang['REC_UPDATE'] = "Votre enregistrement a �t� modifi�. ".$lang['DSP_LIBRARY'];

$lang['REC_SAVE_YESNO'] = "Voulez-vous sauvegarder ?";
$lang['REC_DELETE_YESNO'] = "Voulez-vous supprimer ?";
$lang['REC_UPDATE_YESNO'] = "Voulez-vous modifier ?";

$lang['REC_ACT_N'] = "Ajouter";
$lang['REC_ACT_M'] = "Modifier";
$lang['REC_ACT_D'] = "Supprimer";
$lang['REC_ACT_R'] = "Ouvrir";

//TABLES
$lang['SORT_ASC_TODO'] = "Tri� par ordre ascendant";
$lang['SORT_DSC_TODO'] = "Tri� par ordre descendant";
$lang['SORT_ASC_DONE'] = "Tri� par ordre ascendant";
$lang['SORT_DSC_DONE'] = "Tri� par ordre descendant";

$lang['VIEW_ACT_N'] = "Nouveau";
$lang['VIEW_ACT_NMULT'] = "Nouveau (+)";
$lang['VIEW_ACT_M'] = "Modifier";
$lang['VIEW_ACT_D'] = "Supprimer";
$lang['VIEW_ACT_LOGIN'] = $lang['LOGIN'];
$lang['VIEW_ACT_LOGOUT'] = $lang['LOGOUT'];
$lang['VIEW_ACT_SEARCH'] = $lang['SEARCH'];
$lang['VIEW_ACT_SETTINGS'] = $lang['SETTINGS'];
$lang['VIEW_ACT_ABOUT'] = "A propos ...";


$lang['AUTHENTICATEYOU']='Pour acc�der � notre site, merci de bien vouloir vous identifier:';
$lang['NOTREGISTEREDANSW01']='Si vous n\'�tes pas enregistr� chez nous, merci de bien vouloir remplir le formulaire en cliquant ici:';
$lang['REGISTER']='S\'enregistrer';
$lang['DONTREMEMBER']='Si vous ne vous rappelez plus de votre login ou mot de passe, merci de bien vouloir remplir le formulaire de secours en cliquant ici:';
$lang['SENDME']='Recevoir mon login et mot de passe';
$lang['MANDATORY']='Le signe (*) signale les champs obligatoires';
$lang['GENDER']='Genre'; 
$lang['MR']='Mr';
$lang['MRS']='Madame';
$lang['MSS']='Mademoiselle';
$lang['LNAME']='Nom';
$lang['FNAME']='Pr�nom';
$lang['BIRTHDT']='Date de naissance';
$lang['DAY']='Jour';
$lang['MONTH']='Mois';
$lang['YEAR']='Ann�e';
$lang['EMAIL']='E-mail';
$lang['SITES']='Lieux-dits';
$lang['ADDRESS']='Adresse';
$lang['ZIP']='CP';
$lang['CITY']='Ville';
$lang['COUNTRY']='Pays';
$lang['USERNAME']='Username';

$lang['WELCOME']='BIENVENUE';
$lang['LOAD']='Charger';
$lang['EXIT']='Quitter';
$lang['YOURFOLDER']='Contenu de votre dossier:';
$lang['RECORD']='enregistrement';
$lang['FINDOTHERSOUND']='Trouvez d\'autres sons ici : ';
$lang['ERROR']='ERREUR';
$lang['WARNING']='AVERTISSEMENT';
$lang['UPLOADKO']='Aucun fichier n\'a �t� d�pos�.';
$lang['SOUNDCHANGE']='Vous souhaitez modifier un son de votre biblioth�que:';
$lang['SOUNDLIST']='Liste de mes sons';
$lang['LEFT']='Gauche';
$lang['RIGHT']='Droite';
$lang['FILENAME']='Nom de fichier';
$lang['UPLOAD']='D�posez un fichier "*. mp3"?';
$lang['DELETEQUESTION']='Etes-vous sur de supprimer le ficher s�lectionn�';
$lang['BACK']='Retour';
$lang['BACKPROFIL']='Retour au profil';
$lang['THANKYOU']='Merci d\'avoir utilis� ce service.';
$lang['LISTEN']='Ecouter';

$lang['PARAM_HOST'] = "H�te http";
$lang['PARAM_DBNAME'] = "Nom de la base de donn�e";
$lang['PARAM_CSS'] = "Css";
$lang['PARAM_LIQUIDHTML'] = "Liquid edition (&lt;DIV&gt;)";
$lang['PARAM_SSECURITY'] = "Site s�curis�";
$lang['PARAM_ALLOWUSERREG'] = "Autoriser l'enregistrement d'utilisateur";

$lang['UI_RPPMAX'] = "Nombre d'enregistrements maximum � afficher par page";


$lang['SCREEN_TITLE_WELCOME']='Bienvenue';
$lang['SCREEN_TITLE_AUTHENTICATION']='S\'authentifier';
$lang['SCREEN_TITLE_REGISTER']='S\'enregistrer';
$lang['SCREEN_TITLE_SENDME']='M\'envoyer mes identifiants';
$lang['SCREEN_TITLE_MP3MNGT']='Gestion de mes MP3';
$lang['SCREEN_TITLE_USERMOD']='Modifier ses donn�es utilisateur';



$lang['MYSQL_PARAM'] = "MySQL, param�tres de connexion";
$lang['MYSQL_EXPORT_OPTIONS'] = "MySQL, options de l'export";
$lang['MYSQL_EXPORT_TYPE'] = "Format de sortie";
$lang['MYSQL_EXPORT_DROP'] = "DROP TABLE";
$lang['MYSQL_EXPORT_CREATE'] = "CREATE TABLE";
$lang['MYSQL_EXPORT_TABLE_DATA'] = "Table avec donn�es";
$lang['MYSQL_EXPORT_CSVSEP'] = "S�parateur du .csv";
$lang['MYSQL_EXPORT_TABLE'] = "Nom de la table";
$lang['MYSQL_EXPORT_HEADER'] = "Titre de colonnes";

$lang['SQL_TABLE_DVD_NAME_ALIAS'] = 'Films';
$lang['SQL_TABLE_DVD_MEDIAINFO_NAME_ALIAS'] = 'Informations Techniques sur les Films';
$lang['SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME_ALIAS'] = 'Param�trage des Informations Techniques sur les Films';
$lang['SQL_TABLE_DVD_USER_NAME_ALIAS'] = 'Utilisateurs';

$lang['TBL_DVD_ALIAS_Title'] = 'Titre';
$lang['TBL_DVD_ALIAS_Title_en'] = 'Titre (anglais)';
$lang['TBL_DVD_ALIAS_Score'] = 'Score';
$lang['TBL_DVD_ALIAS_Comments'] = 'Commentaires';
$lang['TBL_DVD_ALIAS_Sound'] = 'Son';
$lang['TBL_DVD_ALIAS_More'] = 'Plus';
$lang['TBL_DVD_ALIAS_Genres'] = 'Genres';
$lang['TBL_DVD_ALIAS_Countries'] = 'Pays';
$lang['TBL_DVD_ALIAS_Year'] = 'Ann�e';
$lang['TBL_DVD_ALIAS_IMDBrate'] = 'Score IMDB';
$lang['TBL_DVD_ALIAS_IMDBURL'] = 'URL IMDB';
$lang['TBL_DVD_ALIAS_DT_CRT'] = 'Date de cr�ation';
$lang['TBL_DVD_ALIAS_DT_MOD'] = 'Date de modification';

$lang['TBL_DVD_MEDIAINFO_TFormat'] = "Support du m�dia";
$lang['TBL_DVD_MEDIAINFO_VFormat'] = "Format vid�o";
$lang['TBL_DVD_MEDIAINFO_AFormat'] = "Format audio";
$lang['MediaTypeFormat']  = $lang['TBL_DVD_MEDIAINFO_TFormat'];
$lang['MediaVideoFormat'] = $lang['TBL_DVD_MEDIAINFO_VFormat'];
$lang['MediaAudioFormat'] = $lang['TBL_DVD_MEDIAINFO_AFormat'];

$lang['TBL_DVD_MEDIAINFO_Info'] = "Type";
$lang['TBL_DVD_MEDIAINFO_Value'] = "Valeur";
 
$lang['USR000']="Inactif";
$lang['USR060']="Actif";

?>