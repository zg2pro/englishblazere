<?php
/**
 * DVD MULTIPLE ADD management
 *
 * @category   HTML,PHP
 * @package    root/tools/
 * @author     Patrice CHASSAING <patrice.chassaing@gmail.com>
 * @copyright  2011-2012 DVD Libr
 * @license    none
 * @version    Release: @package_version@
 */
$PGE_HEAD_JS_SCRIPTS="";
$PGE_HEAD_JS_SCRIPTS=$PGE_HEAD_JS_SCRIPTS."<script type=\"text/javascript\">
$(document).ready(function() {
  /*  DISPLAY BTN WHEN JS IS ENABLED */
  $('.nodspNoJS').show();
  $('iframe').animate({ height: '140px' }, 2000);

  var iframesl=$('iframe').length;
  
  function addiframe(){
  elthtml='<iframe name=\"if'+iframesl+'\" src=\"../dvd_add.php?&a=n&ifr=1#FillStart\" width=\"100%\" height=\"60%\" scrolling=\"auto\"><p>Your browser does not support iframes.</p></iframe>';
  $(elthtml).appendTo( '#diviframes' ); 
  iframesl=iframesl+1;
  $('iframe').animate({ height: '140px' }, 2000);    
  }

  $('#addrow').click(function (){
   addiframe();
  });

  $('#send').click(function (){
    var notallprocessed=false;
    $('iframe').each(function(index) {
        $(this).contents().find('form').submit();
        /*
        $(this).slideUp('slow', function() {         
        if ( $(this).contents().find('form').attr('name')=='dvdadd' ){ $(this).slideDown('slow'); }
        });
        */        
      });
      //window.opener.location.reload();   
  });
});
</script>";
$PGE_HEAD_CSS_STYLES="<style type=\"text/css\">
/*  CHROME BUG WHEN ADD AN IFRAME */
iframe{display:inline;position:relative;
width:100%;height:480px;max-width:850px;
overflow-x:hidden;overflow-y:auto;
}
</style>";

global $fromapproot;$fromapproot='../';
include $fromapproot.'includes/header0.php';

?>
<body class="window mult">
<?php
//SECURITY CONTROL
secur__actioncontrol('</body></html>');
?>

<input type="button" name="addrow" id="addrow" value="<?php echo $lang['ADD'];?>" class="action rowadd nodspNoJS"/>

<div id="diviframes">
<iframe name="if0" src="../dvd_add.php?&a=n&ifr=1&#FillStart" width="100%" height="480" scrolling="auto">
  <p>Your browser does not support iframes.</p>
</iframe>

<iframe name="if1" src="../dvd_add.php?&a=n&ifr=1#FillStart" width="100%" height="480" scrolling="auto">
  <p>Your browser does not support iframes.</p>
</iframe>

<iframe name="if2" src="../dvd_add.php?&a=n&ifr=1#FillStart" width="100%" height="480" scrolling="auto">
  <p>Your browser does not support iframes.</p>
</iframe>
</div>

<div class="action"><form class="nostyle">
<input type="submit" name="send" id="send" value="<?php echo $lang['SAVE'];?>" class="action savedoc nodspNoJS"/>
<input type="submit" name="redo" id="redo" value="<?php echo $lang['ADDAGAIN'];?>" class="action redo nodspNoJS" 	onclick="window.location.reload();"/>
<input type="submit" name="cancel" id="cancel" value="<?php echo $lang['CANCEL'];?>" class="action cancel" />
</form>
</div>

</body>
</html>


