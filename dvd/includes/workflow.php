<?php
/**
 * Workflow functions used to set or display some informations
 *
 * @category   HTML,PHP
 * @package    root/includes/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
function prnt_recordmod($rec_dtcrt,$rec_dtmod){
global $lang;
	if($rec_dtcrt=='') return '';
	$rec_dtcrt_str='';$rec_dtmod_str='';
	if ($rec_dtcrt!='0000-00-00') $rec_dtcrt_str=date('d-M-Y h:m:s',strtotime ($rec_dtcrt));
	if ($rec_dtmod!='0000-00-00') $rec_dtmod_str=date('d-M-Y h:m:s',strtotime ($rec_dtmod));
echo '<!-- history -->
<div class="history">
<table border=0 cellspacing=0 cellpadding=0>
<thead>
<th>'.$lang['HISTORY'].'</th>
</thead>
<tbody>
<tr>
<td><img src="images/icon_created.gif" width=16 alt="'.$lang['CREATED'].'">'.$lang['CREATED'].$rec_dtcrt_str.'</td>
</tr>
<tr><td><img src="images/icon_modified.gif" width=16 alt="'.$lang['MODIFIED'].'">'.$lang['MODIFIED'].$rec_dtmod_str.'</td>
</tr>
</tbody>
</table>
</div>
<!-- history -->';
}
?>