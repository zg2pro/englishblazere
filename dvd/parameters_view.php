<?php
/**
 * Parameters view and display
 *
 * @category   HTML,PHP
 * @package    root/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */

include 'common.php';
include 'menu.php';

$_REQUEST = array_merge($_GET, $_POST); 

$_SESSION["lastviewdisplayed"] = $urlprotocol.getenv('SERVER_NAME').$urlsrvport.getenv('REQUEST_URI');

//PAGE TABLES DESCRIPTION
class my_recordset
{
	var $ColName;
	var $ColAlias;
    function my_recordset($colnameinselect,$colaliasinselect)
    {
        $this->ColName = $colnameinselect;
        $this->ColAlias = $colaliasinselect;
    }
    function getAlias(){
    	return $this->Alias;
    }
}

$dvdtable = array();

$dvdtablefieldsarray = array();
$dvdtablefieldsarray[]=new my_recordset("Id","Id");
$dvdtablefieldsarray[]=new my_recordset("Info",$lang['TBL_DVD_MEDIAINFO_Info']);
$dvdtablefieldsarray[]=new my_recordset("Value",$lang['TBL_DVD_MEDIAINFO_Value']);
$dvdtable[0]=$dvdtablefieldsarray;

$dvdtablefieldsarray = array();
$dvdtablefieldsarray[]=new my_recordset("Id","Id");
$dvdtablefieldsarray[]=new my_recordset("User_Status",$lang['STATUS']);
//$dvdtablefieldsarray[]=new my_recordset("User_Gender",$lang['GENDER']);
$dvdtablefieldsarray[]=new my_recordset("User_LName",$lang['LNAME']);
$dvdtablefieldsarray[]=new my_recordset("User_FName",$lang['FNAME']);
$dvdtablefieldsarray[]=new my_recordset("User_Login",$lang['USERNAME']); 
$dvdtablefieldsarray[]=new my_recordset("Email",$lang['EMAIL']);
$dvdtablefieldsarray[]=new my_recordset("User_BirthDT",$lang['BIRTHDT']);
$dvdtable[1]=$dvdtablefieldsarray;

$thisactionfilename="parameters_action.php";
$thismngtfilename="parameters_mngt.php";
$thismngtmodfilename="parameters_mngt.php";
$thismngtdelfilename="parameters_mngt.php";
if(isset($_GET['ti'])){
$itabletofetch=$_GET['ti'];
  if ($itabletofetch=="1"){
    $thisactionfilename="user_action.php";
    $thismngtfilename="user_mngt.php";
    $thismngtmodfilename="user_mod.php";
    $thismngtdelfilename="user_del.php";
  }
}
else{
$itabletofetch=0;
}
//PAGE TABLES DESCRIPTION

//PAGE TABLES ACTION 

 if (isset($_REQUEST['ModifyRow']))  {
 $arrid=$_POST['ModifyRow']; foreach ($arrid as $cle => $element) {header("Location: $thismngtfilename?&a=m&id=$cle");} 
 };
 if (isset($_REQUEST['DeleteRow']))  {
 $arrid=$_POST['DeleteRow']; foreach ($arrid as $cle => $element) {header("Location: $thismngtfilename?&a=d&id=$cle");} 
 };

?>
<?php

$PGE_HEAD_JS_SCRIPTS=$PGE_HEAD_JS_SCRIPTS."
<script type=\"text/javascript\">                              
$(document).ready(function() {

//entering search field function 
function fld_enter_search(obj){
var fv=obj.value;
if (fv==='') {obj.value='".$lang['SEARCH']."';}
	else if(fv==='".$lang['SEARCH']."') {obj.value='';}
};

   $.blockUI(waitmsgload);

   //theming navigation left menu
   initMenu();
   
   //add events on sarch fields
   $('#search_Value_Global, #search_Value').focusin(function(){fld_enter_search(this);});
   $('#search_Value_Global, #search_Value').focusout(function(){fld_enter_search(this);});

   //User Interface management

/** * http://plugins.jquery.com/project/swap-jumble */
(function ($) {
	$.fn.swap = function (b) {
		b = $(b)[0];
		var a = this[0];
		var t = a.parentNode.insertBefore(document.createTextNode(''), a);
		b.parentNode.insertBefore(a, b);
		t.parentNode.insertBefore(b, t);
		t.parentNode.removeChild(t);    
		return this;
	};
	$.fn.jumble = function () {
		var max = this.length;
		for (var i = 0; i < max * 2; i++) {
			var a = Math.floor(Math.random() * max);
			var b = a;
			while (b == a) b = Math.floor(Math.random() * max);
			$(this[a]).swap(this[b]);

		}
		return this;
	};
})(jQuery);
      
  //LOADING PANEL ORDER & POSITIONS
  function ui_panel_load(){    
    
    var navuicss=$.cookies.get( 'navuicss' );
    if (navuicss!=null){
      navcssdim=navuicss.split(',');
      for (index=0;index<navcssdim.length;index++){
        objcssname=navcssdim[index].substring(0,navcssdim[index].indexOf('{'));
        objcssdimension=navcssdim[index].substring(navcssdim[index].indexOf('{'));
        objcssdimension=objcssdimension.substring(1,objcssdimension.length-1);
        $(objcssname).attr('style','overflow:auto;'+objcssdimension);                                                         
      }      
    }
    
    var navuiorder=$.cookies.get( 'navuiorder' );
    if (navuiorder!=null){
      var litable=navuiorder.split(',');  
           
      loadedstart=ui_panel_getorder();
      var litableorg=loadedstart.split(',');
      
      for (index=0;index<litableorg.length;index++){
      //refresh list order
      loadedstart=ui_panel_getorder();litableorg=loadedstart.split(',');      
      if ( litableorg[index] == litable[index] ){/*alert('good order !')*/
      }else {if (index<litable.length) $(litable[index]).swap(litableorg[index]);}
      }//for end   
    };   
       
  }
     
  //STORING PANEL ORDER & POSITIONS  
  function ui_panel_getorder(){
  var ui_panel_idlist=[];
  var i=0;
  $('.ui-panel').each(function(index) {ui_panel_idlist[i]='#'+$(this).attr('id');i++;});
  return ui_panel_idlist.join(','); 
  }
  
  function ui_panel_getcss(){
  var ui_panel_idlist=[];
  var i=0;
  $('.ui-panel').each(function(index) {ui_panel_idlist[i]='#'+$(this).attr('id')+'{width:'+$(this).css('width')+';height:'+$(this).css('height')+';'+'}';i++;});  
  return ui_panel_idlist.join(','); 
  }
       
  function ui_panel_store(){
  $.cookies.set( 'navuiorder', ui_panel_getorder());
  $.cookies.set( 'navuicss', ui_panel_getcss());
  }

  function ui_panel_reset(){
  $.cookies.del( 'navuiorder' );
  $.cookies.del( 'navuicss' );
  }

  function ui_panel_res(jqobj){     
    if (jQuery.ui) {var disabled = jqobj.resizable( 'option', 'disabled' );
  if (typeof disabled === 'boolean'){jqobj.resizable( 'option', 'disabled', !disabled);} 
  else{jqobj.resizable({disabled: false});};
  jqobj.bind( 'resizestop', function(event, ui) {ui_panel_store()});
  jqobj.css('filter','none');}  
  }

 
  $('.ui-panel').each(function(index) {
  elthtml='<div class=\"ui-panel-control\">';
  elthtml= elthtml+'<img alt=\"To the left\" src=\"images/MoveUpLeft.gif\" width=\"8\" class=\"btnupleft\" >';
  elthtml= elthtml+'<img alt=\"To the right\" src=\"images/MoveDownRight.gif\" width=\"8\" class=\"btndwnrgt\" >';
    if (jQuery.ui) {elthtml= elthtml+'<img alt=\"Resize\" src=\"images/Expand.gif\" width=\"8\" class=\"btnresize\" >';}
  elthtml= elthtml+'</div>';
  $(this).prepend(elthtml);
  });
  
  $('.btnupleft').click(function (){ $(this).parent().parent().prev().swap($(this).parent().parent());ui_panel_store();})
  $('.btndwnrgt').click(function (){ $(this).parent().parent().next().swap($(this).parent().parent());ui_panel_store();})
  $('.btnresize').click(function (){ ui_panel_res( $(this).parent().parent() );})
    
  var elthtml='<span class=\"ToolTabSeparator\"></span><span class=\"ToolTabLeftRound\"></span><span class=\"ToolTabCenter\"><img src=\"images/Tune.gif\" class=\"btntuneui\" width=\"13\" height=\"11\" alt=\"User Interface\" border=\"0\" /></span><span class=\"ToolTabRightRound\"></span>';
  $('#ContainerToolTab ul li').prepend(elthtml); 
  $('.btntuneui').click(function (){ ui_panel_reset();window.location.reload()})
  
  ui_panel_load();                                          
  
  $('#aboutlnk').attr('target','_self');$('#aboutlnk').attr('href','#');
  $('#aboutlnk').click(function(){window.open ('./about.php','w_About', 'location=0,status=0,scrollbars=1,width=480,height=390');});  
  
  $.unblockUI();
  
});
  </script>
";

include 'includes/header0.php';
include 'parameters_functions.php';

//GLOBAL VARIABLES
global $deb;
global $sort_col_table;
global $sortdesc_col_table;
global $search_Value;
global $search_Value_Global;
global $cursort;
$cursort='';
global $url_get_sort;
if (isset($_REQUEST['sort'])) {$url_get_sort=$_REQUEST['sort'];$cursort='&sort='.$url_get_sort;}
else {$url_get_sort=1;}
            
$deb=0;
$limitmax=25;
$Q_S=getenv("QUERY_STRING");

global $thisfilename;
global $thismngtfilename;
global $thisactionfilename;
$thisfilename=$lang['URL_TABLE_PARAMS'];

//------------------------------------------------- SEARCH MODULES
function dsp_search_module_ctxt()
{
global $lang;
global $cursort;
global $url_get_sort;
global $thisfilename;
$Q_S=getenv("QUERY_STRING");

if (isset($_REQUEST["search_Value"]))
$search_Value=$_REQUEST["search_Value"];
else
$search_Value=$lang['SEARCH'];
?>
<form name="searchctxt" id="searchctxt" action="<?php echo './'.$thisfilename.'?'.$Q_S; ?>" method="GET">
<label for="search_Value"><?php echo $lang['SEARCH']; ?></label>
<input type="text" SIZE="20" name="search_Value" id="search_Value" value="<?php echo mySQLstrLIKEfromenvOUT($search_Value); ?>" />
<input type="hidden" name="sort" id="sort" value="<?php echo $url_get_sort; ?>" />
<input type="submit" value="ok" class="btnsearch" />
<br/><?php echo $lang['SEARCH_INFO_01']; ?>
</form>
<?php
}

function dsp_search_module_db()
{
global $lang;
global $cursort;
global $url_get_sort;
$Q_S=getenv("QUERY_STRING");

if (isset($_REQUEST["search_Value_Global"]))
$search_Value_Global=$_REQUEST["search_Value_Global"];
else
$search_Value_Global=$lang['SEARCH'];
?>
<form name="searchglobal" id="searchglobal" action="<?php echo './dvd_view.php?'.$Q_S; ?>" method="GET">
<label for="search_Value" class="hiddenTextSR"><?php echo $lang['SEARCH']; ?></label>
<input type="text" SIZE="20" name="search_Value_Global" id="search_Value_Global" value="<?php echo mySQLstrLIKEfromenvOUT($search_Value_Global); ?>" />
<input type="hidden" name="sort" id="sort" value="<?php echo $url_get_sort; ?>" />
<input type="submit" value="ok" class="btnsearch" />
</form>
<?php
}

//------------------------------------------------- SEARCH MODULES END


?>
 <body class="view">
<?php
//SECURITY CONTROL
secur__actioncontrol('</body></html>');
?>

<div id="containerpage">
<!-- Main content linkto --><a href="#navtoMain" title="Skip to Main"  target="_self" class="hiddenTextSR">Skip to Main</a>

<ul id="sortable" class="ui-sortable">

<li id="libanner" class="ui-panel">

<div id="sitenamebanner">
  <div id="intranetlogo">
  
  </div>
  <div id="brandlogo">
  
  </div>  
</div>

<div id="datebanner">
  <div id="leftpart4datebanner">
  <div id="currentdate"><script>var current_date = new Date ( );document.write(current_date.toLocaleDateString());</script></div>
  </div>
  <div id="userinfo"><strong><?php echo $lang['YOU_ARE'].' '.$_SESSION["security"];?></strong></div>  
</div>

<div id="breadcrumbsbanner">
  <!-- breadcrumbsbanner begin -->
  <div id="sitebreadcrumb"><?php echo $lang['HERE'].$lang['PARAMETERS'];?></div>
  <div id="sitesearch">
  <?php dsp_search_module_db(); ?>
  </div>
  <!-- breadcrumbsbanner end -->
</div>

<div id="businessbanner">
<!-- businessbanner begin -->
  <div id="ContainerNavigationTab">
    <ul>
  	<li>
    	<span class="ToolTabSeparator"></span><span class="ToolTabLeftRound"></span><span class="ToolTabCenter"><a href="<?php echo $lang['URL_HOME_FRS'];?>" title="<?php echo $lang['MENU_HOME'];?>" target="_top"><?php echo $lang['MENU_HOME'];?></a></span><span class="ToolTabRightRound"></span>
      <?php if (IsAdmin()===true) {?>
      <span class="ToolTabSeparator"></span><span class="ToolTabLeftRound"></span><span class="ToolTabCenter"><a href="<?php echo $lang['URL_TABLE_PARAMS'];?>?&sort=1&lang=<?php echo $lang['LANG'];?>" title="<?php echo $lang['PARAMETERS'];?>"><?php echo $lang['PARAMETERS'];?></a></span><span class="ToolTabRightRound"></span>
      <?php }; ?>	  
  	</li>
    </ul>   
  </div>
  <!-- Running 'tabSpace' Layer' cell BEGIN  -->
      <div id="ContainerToolTab">
  <ul>
  	<li>
  <span class="ToolTabSeparator"></span><span class="ToolTabLeftRound"></span><span class="ToolTabCenter"><a href="help/help_<?php echo $lang['LANG'];?>.html" title="<?php echo $lang['HELP'];?>" target="_blank" style="cursor:help;"><?php echo $lang['HELP'];?></a></span><span class="ToolTabRightRound"></span>
  <span class="ToolTabSeparator"></span><span class="ToolTabLeftRound"></span><span class="ToolTabCenter"><a id="aboutlnk" href="about.php?&lang=<?php echo $lang['LANG'];?>.html" title="<?php echo $lang['VIEW_ACT_ABOUT']; ?>" target="_blank" style="cursor:help;"><?php echo $lang['VIEW_ACT_ABOUT']; ?></a></span><span class="ToolTabRightRound"></span>
  <span class="ToolTabSeparator"></span><span class="ToolTabLeftRound"></span><span class="ToolTabCenter"><a href="javascript:window.print();" title="<?php echo $lang['PRINT'];?>" target=""><img src="images/Print.gif" width="13" height="11" alt="Imprimer" border="0" /></a></span><span class="ToolTabRightRound"></span>
  <span class="ToolTabSeparator"></span><span class="ToolTabLeftRound"></span><span class="ToolTabCenter"><a href="<?php echo $lang['URL_TABLE_PARAMS'].'?&lang=fr';?>" title="FR" target="_top">FR</a></span><span class="ToolTabRightRound"></span>
  <span class="ToolTabSeparator"></span><span class="ToolTabLeftRound"></span><span class="ToolTabCenter"><a href="<?php echo $lang['URL_TABLE_PARAMS'].'?&lang=en';?>" title="EN" target="_top">EN</a></span><span class="ToolTabRightRound"></span>
  	</li>
  </ul>
      </div>
  <!-- Running 'tabSpace' Layer' cell END  -->
<!-- businessbanner end -->
</div>
</li>



<?php
//VERIF DBS INTEGRITY
is_db_tables_are_here(); 
?>


<li id="limainnav" class="ui-panel">
<div id="mainnav" class="menu column">

<?php
echo '<div class="header"><a href="'.$lang['URL_HOME_FRS'].'" title="Home" target="_top"><h1>'.$lang['APP_NAME'].'</h1></a></div>';
echo '<ul id="menuleft">';

ob_start();
prnt_menu_param($SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME,"`Info`","Info",0);
$menucontent=ob_get_contents();
ob_end_clean();
echo $menucontent;
  
ob_start();
prnt_menu_param($SQL_TABLE_DVD_USER,"User_Status","User_Status",1);
$menucontent=ob_get_contents();
ob_end_clean();
echo $menucontent;

echo '</ul>';
?>
</div>
</li>


<?php

//UPDATE TABLE BEFORE REQUEST-IT
//DELETE RECORDS
 if  (isset ($_POST['SelectRow']) ) {
    $arr=$_POST['SelectRow'];
    foreach ($arr as $idtodel) {
      if($itabletofetch==0) {parameters_mediainfo_delete($idtodel);}
      else{user_delete($idtodel);}
      }
    } 
    
      
//------------------------------------------------- REQUEST MAIN TABLE
if (isset($_REQUEST["sr"]))
  {$deburl=$_REQUEST["sr"];}
else {$deburl=0;}

$deb=$deburl;
$fin=$limitmax;


//CONSTRUCT THE QUERY FIELDS
$query_select_fields="";
foreach ($dvdtable[$itabletofetch] as $i => $value) {
   $query_select_fields=$query_select_fields." `".$dvdtable[$itabletofetch][$i]->ColName."`,";
}
$query_select_fields=$query_select_fields."1";


if($itabletofetch==0){$tablename=$SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME;}else{$tablename=$SQL_TABLE_DVD_USER;}
$query_select = "SELECT ".$query_select_fields." FROM $tablename ";


//CONSTRUCT THE QUERY WHERE
if (isset($_REQUEST["search_Value"]))
$search_Value=$_REQUEST["search_Value"];
else
$search_Value="";

if (isset($_REQUEST["search_Value_Global"]))
$search_Value_Global=$_REQUEST["search_Value_Global"];
else
$search_Value_Global="";


if (isset($_REQUEST["rtc"]))
{
$restricttocategory=urldecode($_REQUEST["rtc"]);
$rtcfieldname=$_REQUEST["t"];
if ($rtcfieldname=='Genres') $restricttocategory="`$rtcfieldname` LIKE '%".mySQLstrLIKEfromenvIN($restricttocategory)."%'";
else $restricttocategory="`$rtcfieldname` = '".addslashesfromenv($restricttocategory)."'";
}
else
$restricttocategory="";

if($DEBUG) echo "search_Value : " . $search_Value ."<br>";
        
$query_where = "";

//ADVANCED SEARCH
$query_where_TMP="";
if (isset($_POST['AdvSearch'])) {
  foreach ($_POST as $k => $v) {  
    if ($v != '') {
    if ($k != 'AdvSearch') {                                                                                         
      if ($query_where_TMP=='') {$query_where_TMP=" `$k` LIKE '%".mySQLstrLIKEfromenvIN($v)."%'";} 
      else {$query_where_TMP=$query_where_TMP." and "." `$k` LIKE '%".mySQLstrLIKEfromenvIN($v)."%'";}
      }
    }
  }
} 
$query_where = $query_where_TMP;


if ($search_Value<>"")
{
	$table=$SQL_TABLE_DVD_PARAM_MEDIAINFO_NAME;
	$query="SHOW COLUMNS FROM $table";
	$result = mysql_query($query) or  mysql_errorget('',$query);
	$condition=mySQLstrLIKEfromenvIN($search_Value);
	$wildcards="";
	if (mysql_num_rows($result) > 0) {
		$i=0;
		while ($row = mysql_fetch_array($result))
		{
			//enable wildcards on the following fields
			if ($row[0]!=$lang['TBL_DVD_Year'] && $row[0]!=$lang['TBL_DVD_DT_CRT'] &&  $row[0]!=$lang['TBL_DVD_DT_MOD']) {$wildcards="%";} else {$wildcards="";}

			if($i==0){
					$query_where=" `".$row[0]."` LIKE '".$wildcards.$condition.$wildcards."'";
					}
				else{
					$query_where.=" or `".$row[0]."` LIKE '".$wildcards.$condition.$wildcards."'";
					}
			$i++;}
		}
}


if ($search_Value_Global<>"")
{
	$table=$SQL_TABLE_DVD_NAME;
	$query="SHOW COLUMNS FROM $table";
	$result = mysql_query($query) or  mysql_errorget('',$query);
	$condition==mySQLstrLIKEfromenvIN($search_Value_Global);
	$wildcards="";
	if (mysql_num_rows($result) > 0) {
		$i=0;
		while ($row = mysql_fetch_array($result))
		{
			//enable wildcards on the following fields
			if ($row[0]!=$lang['TBL_DVD_Year'] && $row[0]!=$lang['TBL_DVD_DT_CRT'] &&  $row[0]!=$lang['TBL_DVD_DT_MOD']) {$wildcards="%";} else {$wildcards="";}

			if($i==0){
					$query_where=" `".$row[0]."` LIKE '".$wildcards.$condition.$wildcards."'";
					}
				else{
					$query_where.=" or `".$row[0]."` LIKE '".$wildcards.$condition.$wildcards."'";
					}
			$i++;}
		}
}


if ($restricttocategory<>""){
	if ($query_where<>"") $query_where = $query_where." AND ";
	$query_where = $query_where.$restricttocategory;
} else $query_where = $query_where;

if ($query_where<>"") $query_where = " WHERE ".$query_where;

//------------------------------------------------- REQUEST TOP & BOTTOM LIMITS
$query_limit = " LIMIT $deb,$fin;";


//------------------------------------------------- REQUEST ORDER BY
$sort_col_table_name="";
if (isset($_REQUEST["sort"]))
	{
	$sort_col_table=intval($_REQUEST["sort"]);
	$sort_col_table_name=$dvdtable[$itabletofetch][abs($_REQUEST["sort"])]->ColName;
	}
else {$sort_col_table=0;$sort_col_table_name="Title";};

if ($sort_col_table!=0)
{
	if ($sort_col_table>0) $query_sort = " ORDER BY ".$sort_col_table_name." ASC ";
	if ($sort_col_table<0) $query_sort = " ORDER BY ".$sort_col_table_name." DESC ";
	if ($sort_col_table!=2 && $sort_col_table!=0) $query_sort = $query_sort." , ".$dvdtable[$itabletofetch][2]->ColName." ASC"; 
} else $query_sort = "";

$query = $query_select.$query_where.$query_sort.$query_limit;

//------------------------------------------------- REQUEST
$res = mysql_query($query) or  mysql_errorget('',$query);
$nb = mysql_numrows($res);  // GETTING RECORDS NUMBER
$i = 0;


//COMPUTING NAVIGATION URL LINKS
$deburl=$deb-$limitmax;
if ($deburl<=0)	$deburl=0;
$finurl=$deb+$limitmax;$code_prevpage="&nbsp;";$code_nextpage="&nbsp;";$code_numpage="&nbsp;";$code_firstpage="&nbsp;";$code_lastpage="&nbsp;";

if ($deb>0) {$code_firstpage="<a href=\"./$thisfilename?sr=0&er=&sort=".$sort_col_table."&search_Value=".$search_Value."\" title=\"".$lang['FIRST_REC']."\"><img src=\"./images/Record_First.gif\" alt=\"".$lang['FIRST_REC']."\"/></a>";}

if ($search_Value<>"")
{

if ($deb>0)
$code_prevpage="<a href=\"./$thisfilename?sr=" . $deburl . "&er=&sort=".$sort_col_table."&search_Value=".$search_Value."\" title=\"".$lang['PREVIOUS_PGE']."\"><img src=\"./images/Page_Previous.gif\" alt=\"".$lang['PREVIOUS_PGE']."\"/></a>";
if ($finurl<=$deb+$nb)
$code_nextpage="<a href=\"./$thisfilename?sr=" . $finurl . "&er=&sort=".$sort_col_table."&search_Value=".$search_Value."\" title=\"".$lang['NEXT_PGE']."\"><img src=\"./images/Page_Next.gif\" alt=\"".$lang['NEXT_PGE']."\"/></a>";
}
else
{

//$code_lastpage="<a href=\"./$thisfilename?sr=1000&er=&sort=".$sort_col_table."\" title=\"".$lang['LAST_REC']."\"><img src=\"./images/Record_Last.gif\" alt=\"".$lang['LAST_REC']."\"/></a>";

if ($deb>0)
$code_prevpage="<a href=\"./$thisfilename?sr=" . $deburl . "&er=&sort=".$sort_col_table."\" title=\"".$lang['PREVIOUS_PGE']."\"><img src=\"./images/Page_Previous.gif\" alt=\"".$lang['PREVIOUS_PGE']."\"/></a>";
if ($finurl<=$deb+$nb)
$code_nextpage="<a href=\"./$thisfilename?sr=" . $finurl . "&er=&sort=".$sort_col_table."\" title=\"".$lang['NEXT_PGE']."\"><img src=\"./images/Page_Next.gif\" alt=\"".$lang['NEXT_PGE']."\"/></a>";
}
//COMPUTING NAVIGATION URL LINKS END

//------------------------------------------------- INFO PAGE MODULE
function module_info_pages($code_prevpage,$code_nextpage,$code_numpage,$code_firstpage,$code_lastpage)
{
echo "
<table class=\"info_pge\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" >
    <tr>
      <td align=\"center\" >".$code_firstpage."</td>
      <td align=\"center\" >".$code_prevpage."</td>
      <td align=\"center\" >".$code_numpage."</td>
      <td align=\"center\" >".$code_nextpage."</td>
      <td align=\"center\" >".$code_lastpage."</td>
    </tr>
</table>";
}

//------------------------------------------------- SORTING PAGE MODULE
function module_tri_pages($deb,$col_sorted,$col_tosort,$search_Value)
{
global $itabletofetch;
global $lang;global $dvdtable;global $REQUEST_URI;
global $url_get_sort;
$sorttype='';
if ($col_sorted==$col_tosort)
{
if ($col_tosort>0) {$img="altasc.gif";$sorttype='ASC';} else {$img="altdesc.gif";$sorttype='DSC';} 
$url_col_tosort=$col_sorted;
$url_col_desc=$dvdtable[$itabletofetch][abs($col_tosort)]->ColAlias.' '.$lang['SORT_'.$sorttype.'_DONE'];
}
else
{
if ($col_tosort>0) {$img="sortasc.gif";$sorttype='ASC';} else {$img="sortdesc.gif";$sorttype='DSC';}
$url_col_tosort=$col_tosort;
$url_col_desc=$dvdtable[$itabletofetch][abs($col_tosort)]->ColAlias.' '.$lang['SORT_'.$sorttype.'_TODO'];
}

$url_sort="";
$module_tri_pages="";
$url_sort=str_replace("sort=".$url_get_sort, "sort=".$url_col_tosort, $REQUEST_URI);
$module_tri_pages="&nbsp;<a href=\"".$url_sort."\" title=\"".$url_col_desc."\"><img border=\"0\" src=\"./images/".$img."\" alt=\"".$url_col_desc."\" width=12 height=12 /></a>";
               
return $module_tri_pages;
}

//------------------------------------------------- TABLE HEADER
function display_scope_col($deb,$sort_col_table,$col_tosort,$search_Value){
global $itabletofetch;
global $lang;global $dvdtable;
echo "<tr>";
if (IsAdmin()===true) {
echo "<th scope=\"col\" width=1% class=\"td-galitem-title\" align=\"center\" valign=\"top\">
<!-- Select all --><div id=\"ViewSelectAll\" >
<script>
function CheckAll(Act)
{
var IsCheck = Act;
var oColl = document.getElementsByName('SelectRow[]');for (i=0;i<oColl.length;i++) {if (oColl.item(i).style.display!=='none' && oColl.item(i).style.visibility!=='hidden' ) {window.status=(i+1)+' document(s)'+(IsCheck?' sélectionné(s)':' désélectionné(s)');oColl.item(i).checked = IsCheck;};};
var oChk=document.getElementsByName('CHK_POPUP_VALUES_LIST_All');for (i=0;i<oChk.length;i++) {oChk.item(i).checked = IsCheck;}
}
</script>
<input type=\"checkbox\" name=\"CHK_POPUP_VALUES_LIST_All\" value=\"All\" class=\"selectrow checkbox\" onclick=\"CheckAll(this.checked);\" />
</div>
</th>";//Select
echo "<th scope=\"col\" width=30 class=\"td-galitem-title\" align=\"center\" valign=\"top\">&nbsp;</th>";//Modify
echo "<th scope=\"col\" width=30 class=\"td-galitem-title\" align=\"center\" valign=\"top\">&nbsp;</th>";//Delete
}

$triasc="";
$tridesc="";

$num=sizeof($dvdtable[$itabletofetch]);
  for ($c=1; $c < $num; $c++) {
      if ($c===1){
      $triasc=module_tri_pages($deb,$sort_col_table,1,$search_Value);
      $tridesc=module_tri_pages($deb,$sort_col_table,-1,$search_Value);
      echo "<th scope=\"col\" class=\"td-galitem-title\" width=24% align=\"center\" valign=\"top\">".$dvdtable[$itabletofetch][$c]->ColAlias.$triasc.$tridesc."</th>";
      }
      else
      {
      $triasc=module_tri_pages($deb,$sort_col_table,$c,$search_Value);
      $tridesc=module_tri_pages($deb,$sort_col_table,-$c,$search_Value);
      echo "<th scope=\"col\" class=\"td-galitem-title\"           align=\"center\" valign=\"top\">".$dvdtable[$itabletofetch][$c]->ColAlias.$triasc.$tridesc."</th>";
      }  
      }
echo "</tr>";
}

//------------------------------------------------- DISPLAY FORM
?>


<li id="licontentarea" class="ui-panel">
<div id="contentarea" class="column">
<!-- Main content link --><a href="#"  name="navtoMain" title="Main content"  target="_self" class="hiddenTextSR">Main content</a>
<div id="Main">
<div id="ActionsToolbar" class="actionstoolbar">
<!-- TOOLBAR BEGIN -->
 <div class="header toolbar">
  <div class="action tools">
<form name="_wfActions" id="_wfActions" action="<?php echo $thisactionfilename.'?'.$Q_S;?>" method="post">
  <?php if (IsAdmin()===true) {?>
  <input name="addbtn" value="<?php echo $lang['VIEW_ACT_N']; ?>" type="submit" class="action newdoc" onclick="window.location='./<?php echo $thismngtfilename; ?>?&a=n';"/>       
  <input name="actiondel" value="<?php echo $lang['VIEW_ACT_D']; ?>" type="button" class="action deldoc" onclick="document.forms['_wfProcessDocuments'].submit();"/>
  <input name="settingsbtn" value="<?php echo $lang['VIEW_ACT_SETTINGS']; ?>" type="submit" class="action settings" onclick="window.location='./settings.php?a=m';"/>
  <input name="deconnctbtn" value="<?php echo $lang['VIEW_ACT_LOGOUT']; ?>" type="submit" class="action door"  onclick="window.location='./logout.php';"/>
  <input name="exportbtn" value="Export" type="submit" class="action exportsql" onclick="top.location='./tools/mysqldump.php';"/>  
<?php } else { 
//<input name="aboutbtn" id="aboutbtn" value="<php echo $lang['VIEW_ACT_ABOUT']; >" type="button" class="action about" />
?>
  <input name="connctbtn" value="<?php echo $lang['VIEW_ACT_LOGIN']; ?>" type="submit" class="action key"  onclick="window.location='./login.php';"/><?php } ?>  
</form>
  </div>
  <div class="action tsearch"><?php dsp_search_module_ctxt(); ?></div>
  <div class="toolbarpage"><?php $a=module_info_pages($code_prevpage,$code_nextpage,$code_numpage,$code_firstpage,$code_lastpage); ?></div>
 </div>
<!-- TOOLBAR END -->
</div>

<div id="dDataTable"><div id="SRMSG" class="hiddenTextSR"></div>  
 <?php if($DEBUG) echo $query; ?>
<!-- DATAS BEGIN -->
<div class="data">
<form name="_wfProcessDocuments" id="_wfProcessDocuments" action="./<?php echo $thisfilename.'?'.$Q_S;?>" method="post">
<table class="table-galitem" align="center" border="1" cellpadding="0" cellspacing="0">
<thead>
<?php
$a=display_scope_col($deb,$sort_col_table,1,$search_Value);
?>
</thead>
<tbody>
<?php
//------------------------------------------------- LOOPING IN TABLE BODY ROWS
while ($i < $nb){
if (($i % 2)!=0) {echo '<tr class="darker">';} else {echo '<tr>';}

  $Id = mysql_result($res, $i, $dvdtable[$itabletofetch][0]->ColName);

  if (IsAdmin()===true) {
echo "<td class=\"td-galitem-caption\" align=\"center\" valign=\"top\"><input type=\"checkbox\" name=\"SelectRow[]\" value=\"".$Id."\" class=\"selectrow checkbox\"></td>";
echo "<td class=\"td-galitem-caption\" align=\"center\" valign=\"top\"><input type=\"submit\"   name=\"ModifyRow[".$Id."]\" value=\"Modify\" class=\"action rowmod viewicon\" onclick=\"window.location='./$thismngtmodfilename?&a=m&id=".$Id."';\"/></td>";
echo "<td class=\"td-galitem-caption\" align=\"center\" valign=\"top\"><input type=\"submit\"   name=\"DeleteRow[".$Id."]\" value=\"Delete\" class=\"action rowdel viewicon\" onclick=\"window.location='./$thismngtdelfilename?&a=d&id=".$Id."';\"/></td>";
}

  $num=sizeof($dvdtable[$itabletofetch]);
  for ($c=1; $c < $num; $c++) {
      if ($c===1){
      //$dvdtable[$itabletofetch][$c]->ColName
       //echo '<td align="left" class="td-galitem-caption" valign="top"><a href="./'.$thismngtfilename.'?&a=r&id='.$Id.'" title="'.mysql_result($res, $i, 1).'" target=_self>'. mysql_result($res, $i, 1) .'</a></td>';
       echo '<td align="left" class="td-galitem-caption" valign="top"><a href="./'.$thismngtfilename.'?&a=r&id='.$Id.'" title="'.$lang[mysql_result($res, $i, 1)].'" target=_self>'. $lang[mysql_result($res, $i, 1)] .'</a></td>';
      }
      else
      {
       echo '<td align="center" class="td-galitem-caption" valign="top">' . mysql_result($res, $i, $dvdtable[$itabletofetch][$c]->ColName)  . '&nbsp;</td>';
      }  
      }
  //echo '<td align="left" class="td-galitem-caption" valign="top"><a href="./'.$thismngtfilename.'?&a=r&id='.$Id.'" title="'.mysql_result($res, $i, $dvdtable[$itabletofetch][1]->ColName).'" target=_self>'. $lang[mysql_result($res, $i, $dvdtable[$itabletofetch][1]->ColName)] .'</a></td>';
  //echo '<td align="center" class="td-galitem-caption" valign="top">' . mysql_result($res, $i, $dvdtable[$itabletofetch][2]->ColName)  . '&nbsp;</td>';
  echo '</tr>';
    $i++;
}// DON'T FORGET TO INCREMENT ;)

?>
</tbody>
<tfoot>
<?php //$a=display_scope_col($deb,$sort_col_table,1,$search_Value); ?>
</tfoot>
</table>
</form>
</div>
<!-- DATAS END -->
</div> <!-- dDataTable -->

<div id="status"></div>

<!-- DATAS FOOTER BEGIN -->
  <div class="datatfooter">
    <table class="table-galitem" align="center" border="1" cellpadding="0" cellspacing="0">
    <thead><?php $a=display_scope_col($deb,$sort_col_table,1,$search_Value); ?></thead>
    <tbody></tbody>
	  </table>
	</div>
<!-- DATAS FOOTER END -->

</div><!-- Main End -->


<!-- PAGE FOOTER BEGIN -->
 <div class="footer menu">
	<div class="actionstoolbarfooter menu toolbarpage">
	<?php $a=module_info_pages($code_prevpage,$code_nextpage,$code_numpage,$code_firstpage,$code_lastpage); ?>
	</div>
 </div>
<!-- PAGE FOOTER END -->

</div><!-- ContentArea End -->
</li>

<li id="lifooterbanner" class="ui-panel">
  <div id="footerbanner">
  	<div id="sentence4footerbanner"><?php require_once 'includes/footer1.php';?></div>
  </div>
</li>

</ul>

</div><!-- ContainerPage End -->

 </body>
</html>
<?php
	//CLOSING CONNECTION
	mysql_close($connection);
?>