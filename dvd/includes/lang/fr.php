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
$lang['LOGOUT'] = 'Déconnexion';
$lang['ADMIN'] = 'Administrateur';
$lang['PASSWORD'] = 'Mot de passe';// (Ne sera pas sauvegardé dans la base)
$lang['INSTALL'] = 'Installation';
$lang['HELP'] = 'Aide';
$lang['SEARCH'] = 'Chercher';
$lang['YOU_ARE'] = 'Vous êtes';
$lang['HERE'] = $lang['YOU_ARE'].' ici : ';
$lang['CREATED'] = 'Créé le : ';
$lang['MODIFIED'] = 'Modifié le : ';
$lang['MANDATORY'] = '(*) indique un champ obligatoire.';
$lang['SETTINGS'] = "Paramètres";
$lang['PRINT'] = "Imprimer";
$lang['MSG_MANDATORY_FIELD'] = "Ce champ est obligatoire : ";
$lang['PARAMETERS'] = "Paramètres";
$lang['HISTORY'] = "Historique";
$lang['RECORD'] = "enregistrement";
$lang['TELLMEMORE']="Dites moi en plus ...";
$lang['REMEMBERME']='Se souvenir de moi.';
$lang['FEELINGS'] = "Appréciations";
$lang['MOVIE_INFO'] = "Informations techniques";
$lang['AMOVIE'] = "un film";
$lang['STATUS']="Statut";
$lang['USERPROFILE']="Le profil utilisateur";
$lang['PARAM_SSCRIPTSECU']="Débogage des scripts";
$lang['DB']="Base de donnée";

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
$lang['MENU_ADVERTISE'] = 'Publicité';
$lang['MENU_SITE_MAP'] = 'Carte du site';

// Menu Nav
$lang['NAV_MENU_BY_SCORE'] = 'Par score';
$lang['NAV_MENU_BY_YEAR'] = 'Par année';
$lang['NAV_MENU_BY_GENRE'] = 'Par genre';
$lang['NAV_MENU_ALL'] = 'Tous';

$lang['SEARCH_INFO_01'] = 'Utilisez les jockers % et ? pour affiner votre recherche';

$lang['NEXT_PGE'] = 'Suivant';
$lang['PREVIOUS_PGE'] = 'Précédent';
$lang['FIRST_REC'] = 'Premier';
$lang['LAST_REC'] = 'Dernier';
$lang['ROW_BY_PGE'] = 'Lignes par page';

//$lang['DSP_LIBRARY'] = "<a href='".$lang['URL_TABLE_MAIN']."' title='Retourner à la page d\'accueil' target=_self>Retourner à la page d'accueil</a>";
$lang['DSP_LIBRARY'] = "<a href='".$lang['URL_HOME_FRS']."' title='Retourner à la page d\'accueil' target=_self>Retourner à la page d'accueil</a>";
$lang['DSP_LOGIN']="<a href='".$lang['URL_LOGIN']."' title='".$lang['LOGIN']."' target=_self>".$lang['LOGIN']."</a>";
$lang['DSP_PARAMETERS'] = "<a href='".$lang['URL_TABLE_PARAMS']."' title='Aller à la page des paramètres' target=_self>Aller à la page des paramètres</a>";
$lang['DSP_INSTALLER'] = "<a href='".$lang['URL_INSTALLER']."' title='Exécuter l\'installateur' target=_self>Exécuter l'installateur</a>";
$lang['MSG_PROFILEBACK']="Retourner à la page d'accueil";
$lang['DSP_PROFILE']="<a href='".$lang['URL_PROFILE']."' title='".$lang['MSG_PROFILEBACK']."' target=_self>".$lang['MSG_PROFILEBACK']."</a>";

$lang['MSG_LOGIN_SUCCESS'] = "Vous vous êtes authentifié.";
$lang['MSG_LOGIN_FAILURE'] = "Vous ne pouvez pas être authentifié, merci d'essayez à nouveau.";
$lang['MSG_LOGIN_SESSIONEND'] = "Votre session a pris fin, Your session has been ended, merci d'essayez à nouveau.";
$lang['MSG_LOGOUT'] = "A patir de maintenant, Vous n'êtes plus authentifié.";
$lang['MSG_ERROR_APP_CONFIG'] = 'Il semble que la base de données ne soit pas correctement installée. Vous devriez exécuter l\'installateur.<br/>'.$lang['DSP_INSTALLER'];
$lang['MSG_ERROR_APP_MYSQLCONNECT'] = 'L\'application ne peut pas se connecter à la base. Il y a un problème de serveur ou certaines informations doivent être mises à jour.';
$lang['MSG_ERROR_APP_DBCONNECT'] = '<b>Mauvaise configuration!!! </b><br>Vérifiez que votre login, mot de passe ou le nom de la base sont bien saisi pour la connexion à la base.';
$lang['MSG_ERROR_SEND_MAIL'] = "L'envoi de mail est impossible ...";
$lang['MSG_AUTHORIZATION_FAILURE'] = 'Vous n\'êtes pas autorisé à faire cette action.<br/>Merci de procéder à votre <a href="'.$lang['URL_LOGIN'].'" target=_top title="'.$lang['LOGIN'].'">'.$lang['LOGIN'].'</a>.';
$lang['MSG_AUTHENTICATION_FAILURE'] = 'Vous devez être authentifié pour accéder à cette application.<br/>Merci de procéder à votre <a href="'.$lang['URL_LOGIN'].'" target=_top title="'.$lang['LOGIN'].'">'.$lang['LOGIN'].'</a>.';
$lang['MSG_FIELD_MANDATORY']="Ce champ est obligatoire : ";
$lang['MSG_LOGIN_ALREADY_USED']='Ce login est déjà  utilisé.';
$lang['MSG_FIELD_ERROR']='Ce champ a été complété de manière incorrecte';
$lang['MSG_FIELDS_ERRORS']='Ces champs sont incorrectement remplis';
$lang["MSG_UPLOAD_GERROR"]="Erreur inconnue lors du dépôt de fichier.";
$lang["MSG_UPLOAD_FORMATERR"]="Merci de fournir un fichier au format mp3.";
$lang["MSG_UPLOAD_SIZEERR"]="Le poids de votre document doit être compris entre 1Ko et ";
$lang["MSG_UPLOAD_DBLNAMEERR"]="Un fichier porte déjà  ce nom, veuillez changer son nom S.V.P.";
$lang["MSG_UPLOAD_ERROR"]="ATTENTION, erreur : Retour au profil";
$lang["MSG_UPLOAD_SAVEOK"]="Enregistrement du fichier effectué, il pèse ";
$lang["MSG_UPLOAD_ADDOTHER"]="Ajouter un autre fichier";
$lang["MSG_UPLOAD_MODDONE"]="Modifications effectuées";
$lang["MSG_GENERIC_PROFILEBACK"]="Retour au profil";
$lang["MSG_USER_DBLLOGIN"]="Ce login est déjà  utilisé";
$lang["MSG_USER_REGISTERSUCCESS"]="Inscription réalisée avec succès.";
$lang["MSG_USER_REGISTERMODIFIED"]="Modification réalisée avec succès.";
$lang["MSG_USER_SENDINFOMAILSUBJECT"]="Recupération de vos identifiants.";
$lang["MSG_USER_SENDINFOMAILBODY"]="Veuillez trouvez la liste de vos identifiants :";
$lang["MSG_USER_SENDINFOSOK"]="Vos identifiants ont été envoyé à l'adresse mail suivante :";
$lang["MSG_USER_SENDINFOSKO"]="Nous n'avons pas été capable de retrouver vos identifiants.";
$lang['DSP_SENDUSERINFO']="<a href='".$lang['URL_SENDUSERINFO']."' title='".$lang['MSG_USER_SENDINFOMAILSUBJECT']."' target='_self' class='ui-state-highlight'>".$lang['MSG_USER_SENDINFOMAILSUBJECT']."</a>";

$lang['REC_SAVE'] = "Votre enregistrement a été sauvegardé. ".$lang['DSP_LIBRARY'];
$lang['REC_DELETE'] = "Votre enregistrement a été supprimé. ".$lang['DSP_LIBRARY'];
$lang['REC_UPDATE'] = "Votre enregistrement a été modifié. ".$lang['DSP_LIBRARY'];

$lang['REC_SAVE_YESNO'] = "Voulez-vous sauvegarder ?";
$lang['REC_DELETE_YESNO'] = "Voulez-vous supprimer ?";
$lang['REC_UPDATE_YESNO'] = "Voulez-vous modifier ?";

$lang['REC_ACT_N'] = "Ajouter";
$lang['REC_ACT_M'] = "Modifier";
$lang['REC_ACT_D'] = "Supprimer";
$lang['REC_ACT_R'] = "Ouvrir";

//TABLES
$lang['SORT_ASC_TODO'] = "Trié par ordre ascendant";
$lang['SORT_DSC_TODO'] = "Trié par ordre descendant";
$lang['SORT_ASC_DONE'] = "Trié par ordre ascendant";
$lang['SORT_DSC_DONE'] = "Trié par ordre descendant";

$lang['VIEW_ACT_N'] = "Nouveau";
$lang['VIEW_ACT_NMULT'] = "Nouveau (+)";
$lang['VIEW_ACT_M'] = "Modifier";
$lang['VIEW_ACT_D'] = "Supprimer";
$lang['VIEW_ACT_LOGIN'] = $lang['LOGIN'];
$lang['VIEW_ACT_LOGOUT'] = $lang['LOGOUT'];
$lang['VIEW_ACT_SEARCH'] = $lang['SEARCH'];
$lang['VIEW_ACT_SETTINGS'] = $lang['SETTINGS'];
$lang['VIEW_ACT_ABOUT'] = "A propos ...";


$lang['AUTHENTICATEYOU']='Pour accèder à notre site, merci de bien vouloir vous identifier:';
$lang['NOTREGISTEREDANSW01']='Si vous n\'êtes pas enregistré chez nous, merci de bien vouloir remplir le formulaire en cliquant ici:';
$lang['REGISTER']='S\'enregistrer';
$lang['DONTREMEMBER']='Si vous ne vous rappelez plus de votre login ou mot de passe, merci de bien vouloir remplir le formulaire de secours en cliquant ici:';
$lang['SENDME']='Recevoir mon login et mot de passe';
$lang['MANDATORY']='Le signe (*) signale les champs obligatoires';
$lang['GENDER']='Genre'; 
$lang['MR']='Mr';
$lang['MRS']='Madame';
$lang['MSS']='Mademoiselle';
$lang['LNAME']='Nom';
$lang['FNAME']='Prénom';
$lang['BIRTHDT']='Date de naissance';
$lang['DAY']='Jour';
$lang['MONTH']='Mois';
$lang['YEAR']='Année';
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
$lang['UPLOADKO']='Aucun fichier n\'a été déposé.';
$lang['SOUNDCHANGE']='Vous souhaitez modifier un son de votre bibliothèque:';
$lang['SOUNDLIST']='Liste de mes sons';
$lang['LEFT']='Gauche';
$lang['RIGHT']='Droite';
$lang['FILENAME']='Nom de fichier';
$lang['UPLOAD']='Déposez un fichier "*. mp3"?';
$lang['DELETEQUESTION']='Etes-vous sur de supprimer le ficher sélectionné';
$lang['BACK']='Retour';
$lang['BACKPROFIL']='Retour au profil';
$lang['THANKYOU']='Merci d\'avoir utilisé ce service.';
$lang['LISTEN']='Ecouter';

$lang['PARAM_HOST'] = "Hôte http";
$lang['PARAM_DBNAME'] = "Nom de la base de donnée";
$lang['PARAM_CSS'] = "Css";
$lang['PARAM_LIQUIDHTML'] = "Liquid edition (&lt;DIV&gt;)";
$lang['PARAM_SSECURITY'] = "Site sécurisé";
$lang['PARAM_ALLOWUSERREG'] = "Autoriser l'enregistrement d'utilisateur";

$lang['UI_RPPMAX'] = "Nombre d'enregistrements maximum à afficher par page";


$lang['SCREEN_TITLE_WELCOME']='Bienvenue';
$lang['SCREEN_TITLE_AUTHENTICATION']='S\'authentifier';
$lang['SCREEN_TITLE_REGISTER']='S\'enregistrer';
$lang['SCREEN_TITLE_SENDME']='M\'envoyer mes identifiants';
$lang['SCREEN_TITLE_MP3MNGT']='Gestion de mes MP3';
$lang['SCREEN_TITLE_USERMOD']='Modifier ses données utilisateur';



$lang['MYSQL_PARAM'] = "MySQL, paramètres de connexion";
$lang['MYSQL_EXPORT_OPTIONS'] = "MySQL, options de l'export";
$lang['MYSQL_EXPORT_TYPE'] = "Format de sortie";
$lang['MYSQL_EXPORT_DROP'] = "DROP TABLE";
$lang['MYSQL_EXPORT_CREATE'] = "CREATE TABLE";
$lang['MYSQL_EXPORT_TABLE_DATA'] = "Table avec données";
$lang['MYSQL_EXPORT_CSVSEP'] = "Séparateur du .csv";
$lang['MYSQL_EXPORT_TABLE'] = "Nom de la table";
$lang['MYSQL_EXPORT_HEADER'] = "Titre de colonnes";

$lang['SQL_TABLE_DVD_NAME_ALIAS'] = 'Films';
$lang['SQL_TABLE_DVD_MEDIAINFO_NAME_ALIAS'] = 'Informations Techniques sur les Films';
$lang['SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME_ALIAS'] = 'Paramètrage des Informations Techniques sur les Films';
$lang['SQL_TABLE_DVD_USER_NAME_ALIAS'] = 'Utilisateurs';

$lang['TBL_DVD_ALIAS_Title'] = 'Titre';
$lang['TBL_DVD_ALIAS_Title_en'] = 'Titre (anglais)';
$lang['TBL_DVD_ALIAS_Score'] = 'Score';
$lang['TBL_DVD_ALIAS_Comments'] = 'Commentaires';
$lang['TBL_DVD_ALIAS_Sound'] = 'Son';
$lang['TBL_DVD_ALIAS_More'] = 'Plus';
$lang['TBL_DVD_ALIAS_Genres'] = 'Genres';
$lang['TBL_DVD_ALIAS_Countries'] = 'Pays';
$lang['TBL_DVD_ALIAS_Year'] = 'Année';
$lang['TBL_DVD_ALIAS_IMDBrate'] = 'Score IMDB';
$lang['TBL_DVD_ALIAS_IMDBURL'] = 'URL IMDB';
$lang['TBL_DVD_ALIAS_DT_CRT'] = 'Date de création';
$lang['TBL_DVD_ALIAS_DT_MOD'] = 'Date de modification';

$lang['TBL_DVD_MEDIAINFO_TFormat'] = "Support du média";
$lang['TBL_DVD_MEDIAINFO_VFormat'] = "Format vidéo";
$lang['TBL_DVD_MEDIAINFO_AFormat'] = "Format audio";
$lang['MediaTypeFormat']  = $lang['TBL_DVD_MEDIAINFO_TFormat'];
$lang['MediaVideoFormat'] = $lang['TBL_DVD_MEDIAINFO_VFormat'];
$lang['MediaAudioFormat'] = $lang['TBL_DVD_MEDIAINFO_AFormat'];

$lang['TBL_DVD_MEDIAINFO_Info'] = "Type";
$lang['TBL_DVD_MEDIAINFO_Value'] = "Valeur";
 
$lang['USR000']="Inactif";
$lang['USR060']="Actif";

?>