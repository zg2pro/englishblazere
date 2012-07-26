<?php
/**
 * Parameters DEL management
 *
 * @category   HTML,PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
include 'includes/header0.php';
include 'parameters_functions.php';
?>
<body class="window">
<?php
//SECURITY CONTROL
secur__actioncontrol('</body></html>');

if  (isset ($_GET["msgerrv"]) ) {echo $_GET["msgerrv"];}

$SRIPTACTION=$_GET["a"];

$ValueTitle="";
$MediaTypeFormat="";

  $Id=$_GET["id"];
    
  //SQL REQUEST :
	$query = "SELECT $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.* FROM $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME WHERE $SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME.Id=$Id";

	//PROCEED TO SQL :
	$res_query = mysql_query($query) or mysql_errorget('',$query);

	//READING THE RECORDSET :
	while($rs=mysql_fetch_array($res_query))
	{
		$ValueTitle		=datasforHTML($lang[ $rs[$lang['DVD_MEDIAINFO_Info']] ]);
		
    $MediaTypeFormat=datasforHTML($rs[$lang['DVD_MEDIAINFO_Value']]);
    		
	}

if ($SRIPTACTION==="d"){
	//DELETE

	if  (isset ($_GET["answer"]) )
	{
	$id=$_GET["answer"];

    parameters_mediainfo_delete($id);
    
		echo '<p>'.$lang['REC_DELETE'].'<br/>'.$lang['DSP_PARAMETERS'].'</p>';
	}
	else
	{
	
  
  ?>
<h1><?php echo $lang['REC_DELETE_YESNO'] ?></h1>
  <h2><?php echo $ValueTitle.' ('.$MediaTypeFormat.')' ?></h2>
<p><?php echo '<a href="parameters_del.php?&a=d&id='.$_GET["id"].'&answer='.$_GET["id"].'">'.$lang['YES'].'</a>'; ?></p>
<p><?php echo $lang['NO'].' : '.$lang['DSP_PARAMETERS']?></p>
	<?php }

}
                             
    //CLOSING CONNECTION
		mysql_close($connection);
?>
</body>
</html>

