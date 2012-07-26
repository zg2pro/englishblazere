<?php
/**
 * DVD POST management
 *
 * @category   HTML,PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
require_once 'common.php';

	settype($msgerrv,"string");
    
	//GETTING DATAS FORM POST ACTION :	
	$title=$_POST["Title"];
	$msgerrv="<ul>";
	
	if ($title==""){	
	$msgerrv=$msgerrv."<li>".$lang['MSG_MANDATORY_FIELD'].$lang['TBL_DVD_ALIAS_Title']."</li>";	
	}
	else
	{
	$title=datasforMySQL($title);
	}
  
	$score=$_POST["Score"];
	$score=datasforMySQL($score);

	$Title_en=$_POST["Title_en"];
	$Title_en=datasforMySQL($Title_en);
	$IMDB_url=$_POST["IMDB_url"];
	$IMDB_url=datasforMySQL($IMDB_url);
	$Countries=$_POST["Countries"];
	$Countries=datasforMySQL($Countries);
	$Genres=$_POST["Genres"];
	$Genres=datasforMySQL($Genres);
	$IMDB_rating=$_POST["IMDB_rating"];
	$IMDB_rating=datasforMySQL($IMDB_rating);

  $MediaTypeFormat=$_POST["MediaTypeFormat"];
  if ($MediaTypeFormat==""){	
	$msgerrv=$msgerrv."<li>".$lang['MSG_MANDATORY_FIELD'].$lang['TBL_DVD_MEDIAINFO_TFormat']."</li>";	
	}
	else
	{
	$MediaTypeFormat=datasforMySQL($MediaTypeFormat);
	} 

  $MediaVideoFormat=$_POST["MediaVideoFormat"];
  $MediaVideoFormat=datasforMySQL($MediaVideoFormat);
  
  $MediaAudioFormat=$_POST["MediaAudioFormat"];
  $MediaAudioFormat=datasforMySQL($MediaAudioFormat);
  

	$sound=$_POST["Sound"];
	$sound=datasforMySQL($sound);

	$more=$_POST["More"];
	$more=datasforMySQL($more);

	$comments=$_POST["Comments"];
	$comments=datasforMySQL($comments);

	$year=(int)$_POST["Year"];

  $msgerrv=$msgerrv."</ul>";

	if  ($msgerrv!="<ul></ul>") {header("Location: dvd_add.php?".$_SERVER["QUERY_STRING"]."&msgerrv=".$msgerrv);}
	else
	{

	$SRIPTACTION=$_GET["a"];

	if ($SRIPTACTION==="n"){
	//NEW
	//SQL REQUEST :
	$req_sql = "INSERT INTO $SQL_TABLE_DVD_NAME(`Title`, `Year`, `Title_en`, `IMDB_url`, `Countries`, `Genres`, `IMDB_rating`, `Score`, `Comments`, `Sound`, `More`, `Id`, `DT_CRT`)
   VALUES('$title','$year','$Title_en','$IMDB_url','$Countries','$Genres','$IMDB_rating','$score','$comments','$sound','$more',NULL,Now());";
		//PROCEED TO SQL :
	$res_query=mysql_query($req_sql) or  mysql_errorget('',$req_sql);
	
	$req_sql = "INSERT INTO $SQL_TABLE_DVD_MEDIAINFO_NAME(`MediaTypeFormat`, `MediaVideoFormat`, `MediaAudioFormat`, `Id_Movie`, `Id`)
   VALUES('$MediaTypeFormat','$MediaVideoFormat','$MediaAudioFormat',LAST_INSERT_ID(),NULL);";
		//PROCEED TO SQL :
	$res_query=mysql_query($req_sql) or  mysql_errorget('',$req_sql);

} else if ($SRIPTACTION==="m") {
	//MODIFY
	//SQL REQUEST :
	$req_sql = "UPDATE $SQL_TABLE_DVD_NAME
				SET
				Title='$title',
				Year='$year',
				Title_en='$Title_en',
				IMDB_url='$IMDB_url',
				Countries='$Countries',
				Genres='$Genres',
				IMDB_rating='$IMDB_rating',
				Score='$score',
				comments='$comments',
				Sound='$sound',
				More='$more',
				DT_MOD=Now()
				WHERE id=".$_GET["id"].";";
					//PROCEED TO SQL :
	$res_query=mysql_query($req_sql) or  mysql_errorget('',$req_sql);
	
		$req_sql = "UPDATE $SQL_TABLE_DVD_MEDIAINFO_NAME
				SET
				MediaTypeFormat='$MediaTypeFormat',
				MediaVideoFormat='$MediaVideoFormat',
				MediaAudioFormat='$MediaAudioFormat'
				WHERE Id_Movie=".$_GET["id"].";";
		//PROCEED TO SQL :
	$res_query=mysql_query($req_sql) or  mysql_errorget('',$req_sql);			
}
  
	header("Location:".$_SESSION["lastviewdisplayed"]);
  //echo $req_sql; 

	//CLOSING CONNECTION
	mysql_close($connection);
	}
	?>

<?php
include 'includes/header0.php';
?>
<body>Submitting data<br>
</body>
</html>
