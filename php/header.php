
<?php

function age($annee, $mois, $jour) {
    //get age from date or birthdate
    $age = (date("md", date("U", mktime(0, 0, 0, $jour, $mois, $annee))) > date("md") ? ((date("Y") - $annee) - 1) : (date("Y") - $annee));
    echo $age;
}
?>

<?php if ($hl == 'fr') { ?>
    <img src="../img/id.jpg" width="340" height="225" align="right" 
         border="0" alt="."/>
<?php } ?>
<br/><h4>
    <img src="../img/Ggrreyggoyrbyy_bArnbnreb_blue.png" width="300" height="50" alt="Gr&eacute;gory ANNE"/>
    <!--born in September the 6th 1983 (25 yo), single.-->
</h4>
<?php if ($hl == 'fr') { ?>
    n&eacute; le 06/09/1983 (<?php echo age(1983, 09, 06); ?> ans).
<?php } ?>
<br/>
<h3><?php echo $ext_string["address.permanent.street"]; ?><br/> <?php echo $ext_string["address.permanent.town"]; ?> <br/>
<?php echo $ext_string["address.permanent.country"]; ?><br/>
<?php echo $ext_string["number.mobile"]; ?> <br/> <?php echo $ext_string["number.landline"]; ?><br/>
    <a href="mailto:gregory.anne83@gmail.com">
    <?php echo $ext_string["mail"]; ?> </a> <br/>

</h3>

<div id="bookmarks">

    <a href="http://www.developpez.net/forums/u158055/zg2pro/">
        <img src="../img/social_icons/developpez.png" width="40" height="40" alt="."/>
    </a>
    <a href="https://www.facebook.com/pages/Gregory-Anne/262147523982">
        <img src="../img/social_icons/Facebook.png"  width="40" height="40" alt="."/>
    </a>
    <a href="http://www.linkedin.com/in/gregoryanne83">
        <img src="../img/social_icons/Linkedin.png"  width="40" height="40" alt="."/>
    </a>
    <a href="http://www.twitter.com/zg2pro">
        <img src="../img/social_icons/Twitter.png"  width="40" height="40" alt="."/>
    </a>
    <a href="http://ubuntuforums.org/member.php?u=757219">
        <img src="../img/social_icons/ubuntu.png"  width="40" height="40" alt="."/>
    </a>
    <a href="http://www.viadeo.com/en/profile/gregory.anne2">
        <img src="../img/social_icons/Viadeo.png"  width="40" height="40" alt="."/>
    </a>
    <a href="http://www.youtube.com/zg2pro">
        <img src="../img/social_icons/Youtube.png"  width="40" height="40" alt="."/>
    </a>
    <a href="https://github.com/zg2pro">
        <img src="../img/social_icons/Github.png"  width="40" height="40" alt="."/>
    </a>
    <a href="http://stackoverflow.com/users/1173344/zg2pro">
        <img src="../img/social_icons/stackoverflow.png"  width="40" height="40" alt="."/>
    </a>

</div>

<br/>
<br/>


<?php echo $ext_string["title.h1"]; ?>
	
