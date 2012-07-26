<?php
   function dvd_delete($id){
   global $SQL_TABLE_DVD_NAME;
   global $SQL_TABLE_DVD_MEDIAINFO_NAME;
   global $connection;
   
   		//SQL REQUEST :
		$query = "DELETE FROM $SQL_TABLE_DVD_NAME WHERE id=".$id.";";

		//PROCEED TO SQL :
		$res_query = mysql_query($query) or mysql_errorget('',$query);

       		//SQL REQUEST :
		$query = "DELETE FROM $SQL_TABLE_DVD_MEDIAINFO_NAME WHERE Id_Movie=".$id.";";

		//PROCEED TO SQL :
		$res_query = mysql_query($query) or mysql_errorget('',$query);

   }
?>
