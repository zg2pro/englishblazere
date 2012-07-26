<?php
//set_time_limit(0);
/*---------------------------------------------------+
| mysqldump.php
+----------------------------------------------------+
| Copyright 2006 Huang Kai
| hkai@atutility.com
| http://atutility.com/
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
/*
change log:
2006-10-16 Huang Kai
---------------------------------
initial release

2006-10-18 Huang Kai
---------------------------------
fixed bugs with delimiter
add paramter header to add field name as CSV file header.

2006-11-11 Huang Kia
---------------------------------
Tested with IE and fixed the <button> to <input>

2011-02-15 Patrice CHASSAING
---------------------------------
Correcting some PHP & HTML codes, implementing it on my site

*/

$mysqldump_version="1.08";

$print_form=1;
$output_messages=array();

	//20110209 Added by PC
	require_once '../common.php';

//test mysql connection
if( isset($_REQUEST['action']) )
{
	$mysql_host=$_REQUEST['mysql_host'];
	$mysql_database=$_REQUEST['mysql_database'];
	$mysql_username=$_REQUEST['mysql_username'];
	$mysql_password=$_REQUEST['mysql_password'];
	$mysql_table=$_REQUEST['mysql_table'];

	if( 'Test' == $_REQUEST['action'])
	{
		_mysql_test($mysql_host,$mysql_database, $mysql_username, $mysql_password);
	}
	else if( 'Export' == $_REQUEST['action'])
	{
		_mysql_test($mysql_host,$mysql_database, $mysql_username, $mysql_password);
		if( 'SQL' == $_REQUEST['output_format'] )
		{
			$print_form=0;

			//ob_start("ob_gzhandler");
			header('Content-type: text/plain');
			header('Content-Disposition: attachment; filename="'.$mysql_host."_".$mysql_database."_".date('YmdHis').'.sql"');
			echo "/*mysqldump.php version $mysqldump_version */\n";
		  //_mysqldump($mysql_database);
		  _mysqldump_table($mysql_database,$_REQUEST['mysql_table']);

			//header("Content-Length: ".ob_get_length());

			//ob_end_flush();
		}
		else if( 'CSV' == $_REQUEST['output_format'] && isset($_REQUEST['mysql_table']))
		{
			$print_form=0;

			ob_start("ob_gzhandler");

			header('Content-type: text/comma-separated-values');
			header('Content-Disposition: attachment; filename="'.$mysql_host."_".$mysql_database."_".$mysql_table."_".date('YmdHis').'.csv"');
			//header('Content-type: text/plain');
			_mysqldump_csv($_REQUEST['mysql_table']);
			header("Content-Length: ".ob_get_length());
			ob_end_flush();
		}
	}

} else {
	$mysql_host=$dbhost;
	$mysql_database=$dbname;
	$mysql_username=$dbadmusername;
	$mysql_password=$dbadmuserpass;
	$mysql_table=$SQL_TABLE_DVD_NAME;
}

function _mysqldump_csv($table)
{
	$delimiter= ",";
	if( isset($_REQUEST['csv_delimiter']))
		$delimiter= $_REQUEST['csv_delimiter'];

	if( 'Tab' == $delimiter)
		$delimiter="\t";


	$sql="select * from $table;";
	$result=mysql_query($sql);
	if( $result)
	{
		$num_rows= mysql_num_rows($result);
		$num_fields= mysql_num_fields($result);

		$i=0;
		while( $i < $num_fields)
		{
			$meta= mysql_fetch_field($result, $i);
			echo($meta->name);
			if( $i < $num_fields-1)
				echo "$delimiter";
			$i++;
		}
		echo "\n";

		if( $num_rows > 0)
		{
			while( $row= mysql_fetch_row($result))
			{
				for( $i=0; $i < $num_fields; $i++)
				{
					echo mysql_real_escape_string($row[$i]);
					if( $i < $num_fields-1)
							echo "$delimiter";
				}
				echo "\n";
			}

		}
	}
	mysql_free_result($result);

}

function _mysqldump($mysql_database)
{
	$sql="show tables;";
	$result= mysql_query($sql);
	if( $result)
	{
		while( $row= mysql_fetch_row($result))
		{
			_mysqldump_table_structure($row[0]);

			if( isset($_REQUEST['sql_table_data']))
			{
				_mysqldump_table_data($row[0]);
			}
		}
	}
	else
	{
		echo "/* no tables in $mysql_database */\n";
	}
	mysql_free_result($result);
}

function _mysqldump_table($mysql_database,$table)
{
	$sql="SHOW TABLES LIKE '".str_replace("`", "", $table)."'";
	$result= mysql_query($sql);
	if( $result)
	{
		while( $row= mysql_fetch_row($result))
		{ 			
			  _mysqldump_table_structure($row[0]);
				_mysqldump_table_data($row[0]);
		}
	}
	else
	{
		echo "/* no tables in $mysql_database */\n";
	}
	mysql_free_result($result);
}

function _mysqldump_table_structure($table)
{
	echo "/* Table structure for table `$table` */\n";
	if( isset($_REQUEST['sql_drop_table']))
	{
		echo "DROP TABLE IF EXISTS `$table`;\n\n";
	}
	if( isset($_REQUEST['sql_create_table']))
	{

		$sql="show create table `$table`; ";
		$result=mysql_query($sql);
		if( $result)
		{
			if($row= mysql_fetch_assoc($result))
			{
				echo $row['Create Table'].";\n\n";
			}
		}
		mysql_free_result($result);
	}
}

function _mysqldump_table_data($table)
{

	$sql="select * from `$table`;";
	$result=mysql_query($sql);
	if( $result)
	{
		$num_rows= mysql_num_rows($result);
		$num_fields= mysql_num_fields($result);

		if( $num_rows > 0)
		{
			echo "/* dumping data for table `$table` */\n";

			$field_type=array();
			$i=0;
			while( $i < $num_fields)
			{
				$meta= mysql_fetch_field($result, $i);
				array_push($field_type, $meta->type);
				$i++;
			}

			//print_r( $field_type);
			echo "insert into `$table` values\n";
			$index=0;
			while( $row= mysql_fetch_row($result))
			{
				echo "(";
				for( $i=0; $i < $num_fields; $i++)
				{
					if( is_null( $row[$i]))
						echo "null";
					else
					{
						switch( $field_type[$i])
						{
							case 'int':
								echo $row[$i];
								break;
							case 'string':
							case 'blob' :
							default:
								echo "'".mysql_real_escape_string($row[$i])."'";

						}
					}
					if( $i < $num_fields-1)
						echo ",";
				}
				echo ")";

				if( $index < $num_rows-1)
					echo ",";
				else
					echo ";";
				echo "\n";

				$index++;
			}
		}
	}
	mysql_free_result($result);
	echo "\n";
}

function _mysql_test($mysql_host,$mysql_database, $mysql_username, $mysql_password)
{
	global $output_messages;
	$link = mysql_connect($mysql_host, $mysql_username, $mysql_password);
	if (!$link)
	{
	   array_push($output_messages, 'Could not connect: ' . mysql_error());
	}
	else
	{
		array_push ($output_messages,"Connected with MySQL server:$mysql_username@$mysql_host successfully");

		$db_selected = mysql_select_db($mysql_database, $link);
		if (!$db_selected)
		{
			array_push ($output_messages,'Can\'t use $mysql_database : ' . mysql_error());
		}
		else
			array_push ($output_messages,"Connected with MySQL database:$mysql_database successfully");
	}

}

if( $print_form >0 )
{

?>
<?php
$PGE_HEAD_JS_SCRIPTS=$PGE_HEAD_JS_SCRIPTS."<script type=\"text/javascript\">
$(document).ready(function() {
function output_format_change(){ if($('#output_format').val()==='CSV'){ $('.sqloptions').hide();$('.csvoptions').show();}else{ $('.sqloptions').show();$('.csvoptions').hide();}; }
output_format_change();
$('#output_format').change(function() {output_format_change()});
});
</script>";

$PGE_HEAD_CSS_STYLES=$PGE_HEAD_CSS_STYLES."<style type=\"text/css\">
/*  REDEFINE STANDARD TAGS */
label{width:100%;}
</style>";
global $fromapproot;$fromapproot='../';
include $fromapproot.'includes/header0.php';
?>
<body class="window">
<?php
//SECURITY CONTROL
secur__actioncontrol('</body></html>');
?>
<h1>Export</h1>
<?php
if ($output_messages){
	echo '<div class="msg msgstandard">';
	foreach ($output_messages as $message)
	{
    	echo $message."<br />";
	}
	echo '</div>';
}
?>
<form action="./mysqldump.php" method="post">
<fieldset><legend><?php echo $lang['MYSQL_PARAM'];?></legend>
<table border="0" cellspacing="1" cellpadding="1" class="tclassic">
<tbody>
  <tr>
    <td class="tlabel"><label for="mysql_host"><?php echo $lang['PARAM_HOST'];?></label></td>
    <td><input type="text"  name="mysql_host" id="mysql_host" value="<?php if(isset($_REQUEST['mysql_host']))echo $_REQUEST['mysql_host']; else echo $mysql_host;?>"  /></td>
  </tr>
  <tr>
    <td class="tlabel"><label for="mysql_database"><?php echo $lang['PARAM_DBNAME'];?></label></td>
    <td><input type="text"  name="mysql_database" id="mysql_database" value="<?php if(isset($_REQUEST['mysql_database']))echo $_REQUEST['mysql_database']; else echo $mysql_database; ?>"  /></td>
  </tr>
  <tr>
    <td class="tlabel"><label for="mysql_username"><?php echo $lang['ADMIN'];?></label></td>
    <td><input type="text"  name="mysql_username" id="mysql_username" value="<?php if(isset($_REQUEST['mysql_username']))echo $_REQUEST['mysql_username']; else echo $mysql_username; ?>"  /></td>
  </tr>
  <tr>
    <td class="tlabel"><label for="mysql_password"><?php echo $lang['PASSWORD'];?></label></td>
    <td><input  type="password" name="mysql_password" id="mysql_password" value="<?php if(isset($_REQUEST['mysql_password']))echo $_REQUEST['mysql_password']; else echo $mysql_password; ?>"  /></td>
  </tr>
 </tbody>
</table>
<input type="submit" name="action"  value="Test" class="action test"><br />
</fieldset>

  <fieldset><legend><?php echo $lang['MYSQL_EXPORT_OPTIONS'];?></legend>
  <table border="0" cellspacing="1" cellpadding="1" class="tclassic">
  <tbody>
  <tr>
    <td class="tlabel"><label for="output_format"><?php echo $lang['MYSQL_EXPORT_TYPE'];?></label></td>
    <td>
      <select name="output_format" id="output_format">
        <option value="SQL" <?php if( isset($_REQUEST['output_format']) && 'SQL' == $_REQUEST['output_format']) echo "selected";?> >SQL</option>
        <option value="CSV" <?php if( isset($_REQUEST['output_format']) && 'CSV' == $_REQUEST['output_format']) echo "selected";?> >CSV</option>
      </select>
    </td>
  </tr>

  <tr>
    <td class="tlabel"><label for="mysql_table"><?php echo $lang['MYSQL_EXPORT_TABLE'];?></label></td>
    <td>
    
    <select name="mysql_table" id="mysql_table" >
    <option value=""></option>
    <?php
    if(isset($_REQUEST['mysql_table']))echo $valselected=$_REQUEST['mysql_table']; else echo $valselected=$SQL_TABLE_DVD_NAME;    
//SQL REQUEST :
    $query = "SHOW TABLES LIKE '$SQL_TABLE_DVD_PREFIX%'";
    //PROCEED TO SQL :
    $res = mysql_query($query) or  mysql_errorget('',$query);
    $nb = mysql_numrows($res);  // we get recordset number
    $i = 0;
    //READING THE RECORDSET :
    while ($i < $nb){
      $valu = "`".mysql_result($res, $i, $res[0])."`";
      $labl = $valu;
      HTML_PRT_SELECTOPTION($valu,$labl,$valselected);
        $i++;
    }   

//<input type="text" name="mysql_table" id="mysql_table"  readonly="readonly" value="<?php if(isset($_REQUEST['mysql_table']))echo $_REQUEST['mysql_table']; else echo $mysql_table; ?>"  /> 
    ?>
	</select>
    
    
    
    </td>
  </tr>

   	<tr class="sqloptions">
    <td colspan="2">Options(SQL):</td>
  	</tr>
    <tr class="sqloptions">
      <td class="tlabel"><label for="sql_drop_table"><?php echo $lang['MYSQL_EXPORT_DROP'];?></label></td>
      <td><input type="checkbox" name="sql_drop_table" id="sql_drop_table" <?php if(isset($_REQUEST['action']) && ! isset($_REQUEST['sql_drop_table'])) ; else echo 'checked' ?> class="checkbox" /></td>
    </tr>
    <tr class="sqloptions">
      <td class="tlabel"><label for="sql_create_table"><?php echo $lang['MYSQL_EXPORT_CREATE'];?></label></td>
      <td><input type="checkbox" name="sql_create_table" id="sql_create_table" <?php if(isset($_REQUEST['action']) && ! isset($_REQUEST['sql_create_table'])) ; else echo 'checked' ?> class="checkbox" /></td>
    </tr>
    <tr class="sqloptions">
      <td class="tlabel"><label for="sql_table_data"><?php echo $lang['MYSQL_EXPORT_TABLE_DATA'];?></label></td>
      <td><input type="checkbox" name="sql_table_data" id="sql_table_data" <?php if(isset($_REQUEST['action']) && ! isset($_REQUEST['sql_table_data'])) ; else echo 'checked' ?> class="checkbox"/></td>
    </tr>
 	<tr class="csvoptions">
    <td colspan="2">Options(CSV):</td>
  	</tr>
  <tr class="csvoptions">
    <td class="tlabel"><label for="csv_delimiter"><?php echo $lang['MYSQL_EXPORT_CSVSEP'];?></label></td>
    <td><select name="csv_delimiter" id="csv_delimiter">
      <option value="," <?php if( isset($_REQUEST['output_format']) && ',' == $_REQUEST['output_format']) echo "selected";?>>,</option>
      <option value="Tab" <?php if( isset($_REQUEST['output_format']) && 'Tab' == $_REQUEST['output_format']) echo "selected";?>>Tab</option>
      <option value="|" <?php if( isset($_REQUEST['output_format']) && '|' == $_REQUEST['output_format']) echo "selected";?>>|</option>
    </select>
    </td>
  </tr>
	<tr>
      <td class="tlabel"><label for="csv_header"><?php echo $lang['MYSQL_EXPORT_HEADER'];?></label></td>
      <td><input type="checkbox" name="csv_header" id="csv_header"  <?php if(isset($_REQUEST['action']) && ! isset($_REQUEST['csv_header'])) ; else echo 'checked' ?> class="checkbox"/></td>
    </tr>
   </tbody>
</table>

<input type="submit" name="action" value="Export" class="action exportsql"><br />
</fieldset>

  <div class="action">
  <input type="submit" name="cancel" id="cancel" value="<?php echo $lang['CANCEL'];?>" class="action cancel" />
  </div>

</form>
</body>
</html>

<?php
}
?>
