<?php
session_start();
 
if (isset($_POST['destroy'])){
	session_destroy();
}

function contains($str, $content, $ignorecase=1){
	if ($ignorecase){
        $str = strtolower($str);
        $content = strtolower($content);
    }  
    $b = strpos($str,$content);
    return ($b > -1)? 1 : 0;
}


function getData ($query){
	$canExecute = 0;
	
	if (contains($query, "INSERT") > 0 && $_SESSION['su'] > 0) $canExecute = 1;
	if (contains($query, "UPDATE") > 0 && $_SESSION['su'] > 0) $canExecute = 1;
	if (contains($query, "DELETE") > 0 && $_SESSION['su'] > 0) $canExecute = 1;
	if (contains($query, "SELECT") > 0) $canExecute = 1;
	
	//var_dump("query=".$query);
	//var_dump("canEx=".$canExecute);
	
	if ($canExecute){
		
	$p_hostname = "localhost";
	$p_username = "englishblazere";
	$p_password = "uqbdzhp";
	$p_database_name = "diet";
	
	$link = mysql_connect($p_hostname, $p_username, $p_password)
    	or die(mysql_error());

    $db = mysql_select_db($p_database_name, $link);

    $result = mysql_query($query);
	
	return $result; 
	} else return 0;
}

?>
<link href="../CSS/mycv.css" rel="stylesheet"	type="text/css" />
<meta lang="en" xml:lang="en"  content="Gregory's diet" />

