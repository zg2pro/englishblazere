
/**********************************************************************************************************************/
/*                                                       DVD @ Home                                                   */
/*                                                       1.201204.01                                                  */
/**********************************************************************************************************************/


O. Requirements
Working at least with :
PHP Version 5.1.3RC4-dev
MySQL 5.0
Working on some browsers :
IE8,IE9             > OK ?
Chrome 10.0.628     > OK ?
Opera 11.01         > OK ?
Safari 5.0.3        > OK ?
Opera mini emulator > OK ?
Android Browser     > OK ?
Firefox 3.6.14      > OK ? 



I. Installation
  
  I.1 Installation (from scratch)
  Unzip the file with his tree.
  Open a browser and run the installer:
  http://your.host.ext/dvd_library/install/installer.php 
  Read the instructions, and complete all reqired fields.
  
  I.2 Update
  Save your database tables (tables are prefixed by 'dvd'), if you don't know how do it, don't update ;) ...
  Keep a copy of 'includes/configvar.php' somewhere.
  Unzip the file with his tree.
  Replace the old files by the new files, except 'includes/configvar.php'.
  Open a browser and open the direcory or index.php :
  http://your.host.ext/dvd_library/
  
  

II. The 'configvar.php' file
It will be rewritten after the first execution of installer.
The default 'configvar.php' contains (between /**********/):
/**********/
<?php 
$dbhost="";               //MySQL host
$dbname="";               //MySQL database
$dbadmusername="AdminDVD";//MySQL user(Admin) with enough rights to INSERT, UPDATE, DELETE records on the 'dvd' TABLE
$dbadmuserpass="Cabale";  //Admin password
$system=1;                //not required
$prefix="";               //not required
$sitekey="";              //not required
$sitecss="japan";         //css by default
$siteliquidhtml=0;        //site uses div only(1) or table (0)
$sitesecurity=0;          //site is secure(1) or not (0)
$allowuserreg=0;          //allow user registration(1) or not (0)
?>
/**********/



III. Contacts, help and improvments
http://sourceforge.net/projects/dvd-at-home/
  If you want i add a version in your language, you can translate the file en.php in your language.
  That file contains an associative array :
  $lang['DONT CHANGE THAT LABEL'] = 'Words to be translated';
  I will add the functions in the next episode ...
  THX


IV. History Changes

1.201204.01 "Jaws, Teeth of your mother, Eye of your Father"

  Functions:
  Some ...
   
  Look & usuability:
  'Jaws' theme
  'Liquid' mode : uses div only
    
  Codes revisions:
  jquery-translate & calls are modified because of free Google Translate API has been discontinued on December 1, 2011
  Correct some navigation problems with 'restrict to category'
  New users are not activated by default ...
  Resize new added iframe in 'serial_add.php'


1.201109.26 "Groundhog Day"... never ending ...

  Functions:
  Some ...
   
  Look & usuability:
  minor changes with Japan theme
    
  Codes revisions:
  no more displaying administrator username & password 


1.201109.16 "2 Fast for 3"

  Functions:
  Some ...
   
  Look & usuability:
  .
    
  Codes revisions:
  Prevent or corrects some issues with ' and \
  

1.201108.12 "2 Fast 2 Furious"

  Functions:
  Nothing
   
  Look & usuability:
  Upgrade with jquery 1.6.2 & jquery-ui 1.8.15
    
  Codes revisions:
  Correct some bad HTML tags
  in standard.css , changing some height:x% to height:inherit
  Prevent or corrects some issues with ' and \


1.201107.12 "The Last BoyScout"

  Functions:
  There's a secure mode : users need to be authenticated
  Can register users
   
  Look & usuability:
  Add a row counter & paging options
  Better implementation jQuery-ui themes & add theme switcher tool
    
  Codes revisions:
  Security somewhere ;) ...
  

1.201106.08 (Anonymous, but not for long ...)

  Functions:
  None
   
  Look & usuability:
  Add a multiple edit button
  Add a new theme (oscar)
    
  Codes revisions:
  correct some translation in language files  
  

1.201104.07 (Seven Edition : when you lose your head ...)

  Functions:
  Add a parameters navigation to crud medias informations (type, video, audio ...)
   
  Look & usuability:
  Add a parameters navigation
  Add a new theme 
    
  Codes revisions:
  gfunctions.php : change datasforMySQL function because of magic_quotes_gpc
  correct the link in readme.txt in Conatcs, help and improvments
  correct a label IMDB_rating in dvd_add.php  
  

1.201104.01 (April Fools' Day)
   
  Look & usuability:
  In dvd_view, add a 'Go to first record' button 
    
  Codes revisions:
  dvd_rec.php : when a new dvd was created, it changed the 'More' field value by the 'Comments' value --> I've changed the SQL request
  
  I've seen no more bugs ... for the moment
  

1.201103.18 ("Speciale Rugby" edition)
  "I wish a good recovery for the injured and condolences to the Japanese people that suffered, due to natural disaster in Japan."
  
  Functions:
  Add Media Type Support (DVD, Blu-Ray ...) & 2 new tables :dvd_mediainfo, dvd_param_mediainfo
    
  Look & usuability:
  Add jQuery helper and verification on several forms.
  Add customizables dvd view (redim layers & swap them)
  
  Codes revisions:
  Change a lot of codes in a lot of .php files.
  Security has been reviewed ?


1.201103.04
  Functions:
  Add delete function on view.
  Add advanced search
  
  Look & usuability:
  Add jQuery validation on several forms.
  Add & Change css for smartphone & handheld.
  Remove overflow scrollbar on some divs
  Sorting on columns are extended to categories & search
  
  Codes revisions:
  Change some codes in installer.php
  Change some codes in mysqldump.php with security
  Correct MySQL query in dvd_view.php, problem with LIMIT record to start,number of records





                                       /;    ;\
                                   __  \\____//
                                  /{_\_/   `'\____
                                  \___   (o)  (o  }
       _____________________________/          :--'   TRY
   ,-,'`@@@@@@@@       @@@@@@         \_    `__\
  ;:(  @@@@@@@@@        @@@             \___(o'o)
  :: )  @@@@          @@@@@@        ,'@@(  `===='        TO
  :: : @@@@@:          @@@@         `@@@:
  :: \  @@@@@:       @@@@@@@)    (  '@@@'
  ;; /\      /`,    @@@@@@@@@\   :@@@@@)                   SPEAK
  ::/  )    {_----------------:  :~`,~~;
 ;;'`; :   )                  :  / `; ;
;;;; : :   ;                  :  ;  ; :                        ENGLISH !!!
`'`' / :  :                   :  :  : :
    )_ \__;      ";"          :_ ;  \_\       `,','
    :__\  \    * `,'*         \  \  :  \   *  8`;'*  *
        `^'     \ :/           `^'  `-^-'   \v/ :  \/   -Bill Ames-(Modified))
        
http://www.chris.com/ascii/index.php?art=animals%2Fcows
        
