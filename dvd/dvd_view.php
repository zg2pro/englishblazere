<?php
/**
 * DVD view and display
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

/*
 if (isset($_REQUEST['ModifyRow']))  {
 $arrid=$_POST['ModifyRow']; foreach ($arrid as $cle => $element) {header("Location: dvd_add.php?&a=m&id=$cle");} 
 };
 if (isset($_REQUEST['DeleteRow']))  {
 $arrid=$_POST['DeleteRow']; foreach ($arrid as $cle => $element) {header("Location: dvd_del.php?&a=d&id=$cle");} 
 };
 */

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
  jqobj.css('filter','none'); } 
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
include 'dvd_functions.php';

//GLOBAL VARIABLES
global $deb;
global $sort_col_table;
global $sortdesc_col_table;
global $search_Value;
global $search_Value_Global;
global $cursort;
global $curcount;
global $currtc;
global $curtype;

global $htmltable;global $htmlthead;global $htmltbody;global $htmltfoot;global $htmlth;global $htmltr;global $htmltd;
if ($siteliquidhtml===1) {$htmltable="div";$htmlthead="div";$htmltbody="div";$htmltfoot="div";$htmlth="div";$htmltr="div";$htmltd="div";}
else {$htmltable="table";$htmlthead="thead";$htmltbody="tbody";$htmltfoot="tfoot";$htmlth="th";$htmltr="tr";$htmltd="td";};

$cursort='';
global $url_get_sort;
if (isset($_REQUEST['sort'])) {$url_get_sort=$_REQUEST['sort'];$cursort='&sort='.$url_get_sort;}
else {$url_get_sort=1;}
            
$deb=0;
if (isset($_REQUEST['count'])) {$limitmax=$_REQUEST['count'];$curcount='&count='.$limitmax;}
else {$limitmax=25;}

if (isset($_REQUEST['rtc'])) {$currtc='&rtc='.$_REQUEST['rtc'];}
else {$currtc="";}

if (isset($_REQUEST['t'])) {$curtype='&t='.$_REQUEST['t'];}
else {$curtype="";}

$Q_S=getenv("QUERY_STRING");

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
$dvdarray = array();
$dvdarray[]=new my_recordset("Id","Id");
$dvdarray[]=new my_recordset("Title",$lang['TBL_DVD_ALIAS_Title']);
$dvdarray[]=new my_recordset("Year",$lang['TBL_DVD_ALIAS_Year']);
$dvdarray[]=new my_recordset("Score",$lang['TBL_DVD_ALIAS_Score']);
$dvdarray[]=new my_recordset("IMDB_rating",$lang['TBL_DVD_ALIAS_IMDBrate']);
$dvdarray[]=new my_recordset("Comments",$lang['TBL_DVD_ALIAS_Comments']);


//------------------------------------------------- SEARCH MODULES
function dsp_search_module_ctxt()
{
global $lang;
global $cursort;
global $url_get_sort;
$Q_S=getenv("QUERY_STRING");

if (isset($_REQUEST["search_Value"]))
$search_Value=$_REQUEST["search_Value"];
else
$search_Value=$lang['SEARCH'];
?>
<form name="searchctxt" id="searchctxt" action="<?php echo './dvd_view.php?'.$Q_S; ?>" method="GET">
<label for="search_Value"><?php echo $lang['TBL_DVD_ALIAS_Title']; ?></label>
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
  <div id="sitebreadcrumb"><?php echo $lang['HERE'].$lang['SQL_TABLE_DVD_NAME_ALIAS'];?></div>
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
      <?php
      if ($allowuserreg==true) if (IsLogged()==true) {
          if ($_SESSION["security_id"]!="0") {?>       
        <span class="ToolTabSeparator"></span><span class="ToolTabLeftRound"></span><span class="ToolTabCenter"><a href="user_mod.php?&lang=<?php echo $lang['LANG'];?>" title="<?php echo $lang['REC_ACT_M']." ".$lang['USERPROFILE'];?>" target="_top"><?php echo $lang['REC_ACT_M']." ".$lang['USERPROFILE'];?></a></span><span class="ToolTabRightRound"></span>
          <?php                          }
       } else { ?>
      <span class="ToolTabSeparator"></span><span class="ToolTabLeftRound"></span><span class="ToolTabCenter"><a href="<?php echo $lang['URL_REGISTER'];?>?&lang=<?php echo $lang['LANG'];?>" title="<?php echo $lang['REGISTER'];?>" target="_top"><?php echo $lang['REGISTER'];?></a></span><span class="ToolTabRightRound"></span>
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
  <span class="ToolTabSeparator"></span><span class="ToolTabLeftRound"></span><span class="ToolTabCenter"><a href="<?php echo $lang['URL_HOME_FRS'].'?&lang=fr';?>" title="FR" target="_top">FR</a></span><span class="ToolTabRightRound"></span>
  <span class="ToolTabSeparator"></span><span class="ToolTabLeftRound"></span><span class="ToolTabCenter"><a href="<?php echo $lang['URL_HOME_FRS'].'?&lang=en';?>" title="EN" target="_top">EN</a></span><span class="ToolTabRightRound"></span>
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
ob_start();
prnt_menu($SQL_TABLE_DVD_NAME);
$menucontent=ob_get_contents();
ob_end_clean();
echo $menucontent;
?>
</div>
</li>


<?php   
//------------------------------------------------- REQUEST MAIN TABLE
if (isset($_REQUEST["sr"]))
  {$deburl=$_REQUEST["sr"];}
else {$deburl=0;}

$deb=$deburl;
$fin=$limitmax;
//$fin=$deb+$limitmax;
//$finurl=$deb+$fin;

//CONSTRUCT THE QUERY FIELDS
$query_select_fields="";
foreach ($dvdarray as $i => $value) {
   $query_select_fields=$query_select_fields." `".$dvdarray[$i]->ColName."`,";
}
$query_select_fields=$query_select_fields."1";

$query_select = "SELECT ".$query_select_fields." FROM $SQL_TABLE_DVD_NAME ";


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

//if($DEBUG) echo "search_Value : " . $search_Value ."<br>";
        
$query_where = "";

//ADVANCED SEARCH
$query_where_TMP="";
if (isset($_POST['AdvSearch'])) {
  foreach ($_POST as $k => $v) {  
    if ($v != '') {
    if ($k != 'AdvSearch') {                                                                                         
      if ($query_where_TMP=='') {$query_where_TMP=" `$k` LIKE '%".mySQLstrLIKEfromenvIN($v)."%'";} else 
      {$query_where_TMP=$query_where_TMP." and "." `$k` LIKE '%".mySQLstrLIKEfromenvIN($v)."%'";}
      }
    }
  }
} 
$query_where = $query_where_TMP;


if ($search_Value<>"")
$query_where = " `".$dvdarray[1]->ColName."` LIKE '".mySQLstrLIKEfromenvIN($search_Value)."'";

if ($search_Value_Global<>"")
{
	$table=$SQL_TABLE_DVD_NAME;
	$query="SHOW COLUMNS FROM $table";
	$result = mysql_query($query) or  mysql_errorget('',$query);
  $condition=mySQLstrLIKEfromenvIN($search_Value_Global);
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
//else $query_where = "";


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
	//echo "<div style='width:100%;background:red;color:white'>".$_REQUEST["sort"]."</div>";
	$sort_col_table=intval($_REQUEST["sort"]);
	$sort_col_table_name=$dvdarray[abs($_REQUEST["sort"])]->ColName;
	}
else {$sort_col_table=0;$sort_col_table_name="Title";};

if ($sort_col_table!=0)
{
	if ($sort_col_table>0) $query_sort = " ORDER BY ".$sort_col_table_name." ASC ";
	if ($sort_col_table<0) $query_sort = " ORDER BY ".$sort_col_table_name." DESC ";
} else $query_sort = "";

$query = $query_select.$query_where.$query_sort.$query_limit;

//------------------------------------------------- REQUEST
$res = mysql_query($query) or  mysql_errorget('',$query);
$nb = mysql_numrows($res);  // GETTING RECORDS NUMBER
$i = 0;

//------------------------------------------------- REQUEST
$queryrowcnt="SELECT COUNT(*) FROM $SQL_TABLE_DVD_NAME ".$query_where.$query_sort;
$resrowcnt = mysql_query($queryrowcnt) or  mysql_errorget('',$queryrowcnt);
$rowrowcnt =mysql_fetch_array($resrowcnt); 
global $nbrowcnt;
$nbrowcnt=$rowrowcnt[0];  // GETTING RECORDS NUMBER          

//COMPUTING NAVIGATION URL LINKS
$deburl=$deb-$limitmax;
if ($deburl<=0)	$deburl=0;
$finurl=$deb+$limitmax;
$code_prevpage="&nbsp;";$code_nextpage="&nbsp;";
  $code_numpage="&nbsp;";
  //SELECTING ROWS NB TO DISPLAYS
  $rppmax = $nbrowcnt;
  $irpp=25;$icpt=1;
  $irppi=0;  
  $code_numpage='<label for="count" class="hiddenTextSR">'.$lang['UI_RPPMAX'].'</label>
    <select name="count" id="count" >';
    //'<option value=""></option>';
  while ($irppi < $rppmax+$irpp) {
  $irppi= $irpp*$icpt;
  $code_numpage.=HTML_GET_SELECTOPTION($irppi,$irppi,$limitmax);
  $icpt+=1;   
  }
  if ($nbrowcnt!=0) $code_numpage.=HTML_GET_SELECTOPTION($nbrowcnt,"Max",$limitmax);  
  $code_numpage.='</select><input type="submit" value="OK" class="okl"/>';
  
$code_firstpage="&nbsp;";$code_lastpage="&nbsp;";

if ($deb>0) {$code_firstpage="<a href=\"./dvd_view.php?sr=0&er=&sort=".$sort_col_table.$curtype.$currtc.$curcount."&search_Value=".$search_Value."\" title=\"".$lang['FIRST_REC']."\"><img src=\"./images/Record_First.gif\" alt=\"".$lang['FIRST_REC']."\"/></a>";}

if ($search_Value<>"")
{

if ($deb>0)
$code_prevpage="<a href=\"./dvd_view.php?sr=" . $deburl . "&er=&sort=".$sort_col_table.$curtype.$currtc.$curcount."&search_Value=".$search_Value."\" title=\"".$lang['PREVIOUS_PGE']."\"><img src=\"./images/Page_Previous.gif\" alt=\"".$lang['PREVIOUS_PGE']."\"/></a>";
if ($finurl<=$deb+$nb)
$code_nextpage="<a href=\"./dvd_view.php?sr=" . $finurl . "&er=&sort=".$sort_col_table.$curtype.$currtc.$curcount."&search_Value=".$search_Value."\" title=\"".$lang['NEXT_PGE']."\"><img src=\"./images/Page_Next.gif\" alt=\"".$lang['NEXT_PGE']."\"/></a>";
}
else
{

if (!isset($_GET["lp"]) && $nbrowcnt!=0) {$code_lastpage="<a href=\"./dvd_view.php?sr=".($nbrowcnt-$limitmax)."&er=&sort=".$sort_col_table.$curtype.$currtc.$curcount."&lp=1\" title=\"".$lang['LAST_REC']."\"><img src=\"./images/Record_Last.gif\" alt=\"".$lang['LAST_REC']."\"/></a>";}

if ($deb>0)
$code_prevpage="<a href=\"./dvd_view.php?sr=" . $deburl . "&er=&sort=".$sort_col_table.$curtype.$currtc.$curcount."\" title=\"".$lang['PREVIOUS_PGE']."\"><img src=\"./images/Page_Previous.gif\" alt=\"".$lang['PREVIOUS_PGE']."\"/></a>";
if ($finurl<=$deb+$nb)
$code_nextpage="<a href=\"./dvd_view.php?sr=" . $finurl . "&er=&sort=".$sort_col_table.$curtype.$currtc.$curcount."\" title=\"".$lang['NEXT_PGE']."\"><img src=\"./images/Page_Next.gif\" alt=\"".$lang['NEXT_PGE']."\"/></a>";
}
//COMPUTING NAVIGATION URL LINKS END

//------------------------------------------------- INFO PAGE MODULE
function module_info_pages($code_prevpage,$code_nextpage,$code_numpage,$code_firstpage,$code_lastpage)
{
global $Q_S;global $_GET;
global $url_get_sort;
global $deburl;global $deb;global $fin;global $nbrowcnt;
global $lang;    

global $htmltable;global $htmlthead;global $htmltbody;global $htmlth;global $htmltr;global $htmltd; 

echo "
<form name=\"_wfPageMngt\" id=\"_wfPageMngt\" action=\"./dvd_view.php?".$Q_S."\" method=\"get\">
<input type=\"hidden\" name=\"sort\" value=\"".$url_get_sort."\" />
<input type=\"hidden\" name=\"sr\" value=\"".$deburl."\" />";
if (isset($_GET["t"])) "<input type=\"hidden\" name=\"t\" value=\"".$_GET["t"]."\" />";
if (isset($_GET["rtc"])) "<input type=\"hidden\" name=\"rtc\" value=\"".urldecode($_GET["rtc"])."\" />";
if (isset($_GET["search_Value"])) "<input type=\"hidden\" name=\"search_Value\" value=\"".$_GET["search_Value"]."\" />";

if ($nbrowcnt!=0) {$inforowcnt=($deb+1)." -> ".($deb+$fin)." / ".$nbrowcnt;}
                  else {$inforowcnt="";}

echo "<$htmltable class=\"info_pge\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" >
      <$htmltr>
        <$htmltd align=\"center\" class=\"tdnav\">".$code_firstpage."</$htmltd>
        <$htmltd align=\"center\" class=\"tdnav\">".$code_prevpage."</$htmltd>
        <$htmltd align=\"center\" class=\"tdnav\">&nbsp;</$htmltd>
        <$htmltd align=\"center\" class=\"tdnav\">".$code_nextpage."</$htmltd>
        <$htmltd align=\"center\" class=\"tdnav\">".$code_lastpage."</$htmltd>
        <$htmltd align=\"center\" >&nbsp;</$htmltd>
        <$htmltd align=\"center\" class=\"tdpge\">".$inforowcnt."</$htmltd>
        <$htmltd align=\"center\" class=\"tdpge\">".$code_numpage."</$htmltd>
        <$htmltd align=\"center\" >&nbsp;</$htmltd>
      </$htmltr>
  </$htmltable>
</form>";
}

//------------------------------------------------- SORTING PAGE MODULE
function module_tri_pages($deb,$col_sorted,$col_tosort,$search_Value)
{
global $lang;global $dvdarray;global $REQUEST_URI;
global $url_get_sort;
$sorttype='';
if ($col_sorted==$col_tosort)
{
if ($col_tosort>0) {$img="altasc.gif";$sorttype='ASC';} else {$img="altdesc.gif";$sorttype='DSC';} 
$url_col_tosort=$col_sorted;
$url_col_desc=$dvdarray[abs($col_tosort)]->ColAlias.' '.$lang['SORT_'.$sorttype.'_DONE'];
}
else
{
if ($col_tosort>0) {$img="sortasc.gif";$sorttype='ASC';} else {$img="sortdesc.gif";$sorttype='DSC';}
$url_col_tosort=$col_tosort;
$url_col_desc=$dvdarray[abs($col_tosort)]->ColAlias.' '.$lang['SORT_'.$sorttype.'_TODO'];
}

$url_sort="";
$module_tri_pages="";
//there's a bug with getenv("REQUEST_URI"); it add a space between ? and & in .php?&p=
//$url_sort=str_replace("sort=".$url_get_sort, "sort=".$url_col_tosort, $REQUEST_URI);
$url_sort=str_replace("sort=".$url_get_sort, "sort=".$url_col_tosort, $REQUEST_URI);
$module_tri_pages=$module_tri_pages."&nbsp;<a href=\"".$url_sort."\" title=\"".$url_col_desc."\"><img border=\"0\" src=\"./images/".$img."\" alt=\"".$url_col_desc."\" width=12 height=12 /></a>";
               
return $module_tri_pages;
}

//------------------------------------------------- TABLE HEADER
function display_scope_col($deb,$sort_col_table,$col_tosort,$search_Value){
global $lang;global $dvdarray;

global $htmltable;global $htmlthead;global $htmltbody;global $htmltfoot;global $htmlth;global $htmltr;global $htmltd;

echo "<$htmltr class=\"tr-galitem-title\">";
if (IsAdmin()===true) {
echo "<$htmlth scope=\"col\" width=1% class=\"td-galitem-title coltitleact01\" align=\"center\" valign=\"top\">";
echo "<!-- Select all --><div id=\"ViewSelectAll\" >
<script>
function CheckAll(Act)
{
var IsCheck = Act;
var oColl = document.getElementsByName('SelectRow[]');for (i=0;i<oColl.length;i++) {if (oColl.item(i).style.display!=='none' && oColl.item(i).style.visibility!=='hidden' ) {window.status=(i+1)+' document(s)'+(IsCheck?' sélectionné(s)':' désélectionné(s)');oColl.item(i).checked = IsCheck;};};
var oChk=document.getElementsByName('CHK_POPUP_VALUES_LIST_All');for (i=0;i<oChk.length;i++) {oChk.item(i).checked = IsCheck;}
}
</script>
<input type=\"checkbox\" name=\"CHK_POPUP_VALUES_LIST_All\" value=\"All\" class=\"selectrow checkbox\" onclick=\"CheckAll(this.checked);\" />
</div>";
echo "</$htmlth>";//Select
echo "<$htmlth scope=\"col\" width=30 class=\"td-galitem-title coltitleact02\" align=\"center\" valign=\"top\">&nbsp;</$htmlth>";//Modify
echo "<$htmlth scope=\"col\" width=30 class=\"td-galitem-title coltitleact03\" align=\"center\" valign=\"top\">&nbsp;</$htmlth>";//Delete
}

$triasc="";
$tridesc="";
$triasc=module_tri_pages($deb,$sort_col_table,1,$search_Value);
$tridesc=module_tri_pages($deb,$sort_col_table,-1,$search_Value);
echo "<$htmlth scope=\"col\" class=\"td-galitem-title coltitle01\" width=24% align=\"center\" valign=\"top\">".$dvdarray[1]->ColAlias.$triasc.$tridesc."</$htmlth>";
$triasc=module_tri_pages($deb,$sort_col_table,2,$search_Value);
$tridesc=module_tri_pages($deb,$sort_col_table,-2,$search_Value);
echo "<$htmlth scope=\"col\" class=\"td-galitem-title coltitle02\" width=12% align=\"center\" valign=\"top\">".$dvdarray[2]->ColAlias.$triasc.$tridesc."</$htmlth>";
$triasc=module_tri_pages($deb,$sort_col_table,3,$search_Value);
$tridesc=module_tri_pages($deb,$sort_col_table,-3,$search_Value);
echo "<$htmlth scope=\"col\" class=\"td-galitem-title coltitle03\" width=12% align=\"center\" valign=\"top\">".$dvdarray[3]->ColAlias.$triasc.$tridesc."</$htmlth>";
$triasc=module_tri_pages($deb,$sort_col_table,4,$search_Value);
$tridesc=module_tri_pages($deb,$sort_col_table,-4,$search_Value);
echo "<$htmlth scope=\"col\" class=\"td-galitem-title coltitle04\" width=12% align=\"center\" valign=\"top\">".$dvdarray[4]->ColAlias.$triasc.$tridesc."</$htmlth>";
$triasc=module_tri_pages($deb,$sort_col_table,5,$search_Value);
$tridesc=module_tri_pages($deb,$sort_col_table,-5,$search_Value);
echo "<$htmlth scope=\"col\" class=\"td-galitem-title coltitle05\"           align=\"center\" valign=\"top\">".$dvdarray[5]->ColAlias.$triasc.$tridesc."</$htmlth>";
echo "</$htmltr>";
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
  <div class="action tsearch"><?php dsp_search_module_ctxt(); ?></div>
  <div class="toolbarpage"><?php $a=module_info_pages($code_prevpage,$code_nextpage,$code_numpage,$code_firstpage,$code_lastpage); ?></div>
  
  <div class="action tools">
<form name="_wfActions" id="_wfActions" action="./dvd_action.php?<?php echo $Q_S;?>" method="post">
  <?php if (IsAdmin()===true) {?>
  <input name="addbtn" value="<?php echo $lang['VIEW_ACT_N']; ?>" type="submit" class="action newdoc" onclick="window.location='./dvd_add.php?&a=n';"/>
  <input name="addplusbtn" value="<?php echo $lang['VIEW_ACT_NMULT']; ?>" type="submit" class="action newdocs" onclick="top.location='./tools/serial_add.php?&a=n&';"/>
  <input name="editmultbtn" value="<?php echo $lang['EDITMULT']; ?>" type="submit" class="action moddoc" />
  <input name="actiondel" value="<?php echo $lang['VIEW_ACT_D']; ?>" type="submit" class="action deldoc" />     
  <input name="settingsbtn" value="<?php echo $lang['VIEW_ACT_SETTINGS']; ?>" type="submit" class="action settings" onclick="window.location='./settings.php?a=m';"/>
  <input name="deconnctbtn" value="<?php echo $lang['VIEW_ACT_LOGOUT']; ?>" type="submit" class="action door"  onclick="window.location='./logout.php';"/>
  <input name="exportbtn" value="Export" type="submit" class="action exportsql" onclick="top.location='./tools/mysqldump.php';"/>  
<?php } else { 
//<input name="aboutbtn" id="aboutbtn" value="<php echo $lang['VIEW_ACT_ABOUT']; >" type="button" class="action about" />
?>
  <input name="connctbtn" value="<?php echo $lang['VIEW_ACT_LOGIN']; ?>" type="submit" class="action key"  onclick="window.location='./login.php?&lang=<?php echo $lang['LANG'];?>';"/><?php } ?>  
  <input name="searchbtn" value="<?php echo $lang['VIEW_ACT_SEARCH']; ?>" type="submit" class="action search"  onclick="window.location='./dvd_search.php?&t=DVD';"/>
<!--</form>-->
  </div>

 </div>
<!-- TOOLBAR END -->
</div>

<div id="dDataTable"><div id="SRMSG" class="hiddenTextSR"></div>  
 <?php if($DEBUG) echo $query; ?>
<!-- DATAS BEGIN -->
<div class="data">
<!-- <form name="_wfProcessDocuments" id="_wfProcessDocuments" action="./dvd_view.php?<?php echo $Q_S;?>" method="post"> -->
<?php echo "<$htmltable class=\"table-galitem\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" width=\"99%\"><$htmlthead>";

$a=display_scope_col($deb,$sort_col_table,1,$search_Value);

echo "</$htmlthead><$htmltbody>";

//------------------------------------------------- LOOPING IN TABLE BODY ROWS
while ($i < $nb){
if (($i % 2)!=0) {echo "<$htmltr class=\"tr-galitem-caption ui-widget-header darker\">";} else {echo "<$htmltr class=\"tr-galitem-caption ui-widget-header\">";}

  $Id = mysql_result($res, $i, $dvdarray[0]->ColName);

  if (IsAdmin()===true) {
echo "<$htmltd class=\"td-galitem-caption td-galitem-action ui-widget-header\" align=\"center\" valign=\"top\"><input type=\"checkbox\" name=\"SelectRow[]\" value=\"".$Id."\" class=\"selectrow checkbox\"></$htmltd>";
echo "<$htmltd class=\"td-galitem-caption td-galitem-action ui-widget-header\" align=\"center\" valign=\"top\"><input type=\"submit\"   name=\"ModifyRow[".$Id."]\" value=\"Modify\" class=\"action rowmod viewicon\" onclick=\"window.location='./dvd_add.php?&a=m&id=".$Id."';\"/></$htmltd>";
echo "<$htmltd class=\"td-galitem-caption td-galitem-action ui-widget-header\" align=\"center\" valign=\"top\"><input type=\"submit\"   name=\"DeleteRow[".$Id."]\" value=\"Delete\" class=\"action rowdel viewicon\" onclick=\"window.location='./dvd_del.php?&a=d&id=".$Id."';\"/></$htmltd>";
}

  echo "<$htmltd align=\"left\" class=\"td-galitem-caption ui-widget-header row$i coldata01\" valign=\"top\"><a href=\"./dvd_add.php?&a=r&id=".$Id."\" title=\"".mysql_result($res, $i, $dvdarray[1]->ColName)."\" target=_self>". mysql_result($res, $i, $dvdarray[1]->ColName) ."</a></$htmltd>";
  echo "<$htmltd align=\"center\" class=\"td-galitem-caption ui-state-default row$i coldata02\" valign=\"top\">" . mysql_result($res, $i, $dvdarray[2]->ColName)  . "&nbsp;</$htmltd>";
  echo "<$htmltd align=\"left\" class=\"td-galitem-caption ui-state-default row$i coldata03\" valign=\"top\">" . mysql_result($res, $i, $dvdarray[3]->ColName) .  "&nbsp;</$htmltd>";
  echo "<$htmltd align=\"center\" class=\"td-galitem-caption ui-state-default row$i coldata04\" valign=\"top\">" . mysql_result($res, $i, $dvdarray[4]->ColName) .   "&nbsp;</$htmltd>";
  echo "<$htmltd align=\"left\" class=\"td-galitem-caption ui-state-default row$i coldata05\" valign=\"top\">" . mysql_result($res, $i, $dvdarray[5]->ColName) .  "&nbsp;</$htmltd>";
  if ($siteliquidhtml===1){echo "<$htmltd align=\"left\" class=\"td-galitem-caption ui-state-default row$i coldata06 IMDBPoster\" valign=\"top\"></$htmltd>";}
  echo "</$htmltr>";
    $i++;
}// DON'T FORGET TO INCREMENT ;)


echo "</$htmltbody>
<$htmltfoot>

</$htmltfoot>
</$htmltable>"; ?>
</form>
</div>
<!-- DATAS END -->
</div> <!-- dDataTable -->

<div id="status"></div>

<!-- DATAS FOOTER BEGIN -->
  <?php echo "<div class=\"datatfooter\">
    <$htmltable class=\"table-galitem\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" width=\"99%\">
    <$htmlthead>";
    $a=display_scope_col($deb,$sort_col_table,1,$search_Value);
    echo "</$htmlthead>
    <$htmltbody></$htmltbody>
	  </$htmltable>";
	  ?>
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