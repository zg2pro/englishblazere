	<title>Gr&eacute;gory ANNE 's Curriculum Vitae</title>
	<link href="../css/bootstrap.css" rel="stylesheet"	type="text/css" />
	<link href="../css/mycv.css" rel="stylesheet"	type="text/css" />
	<link rel="alternate" type="application/rss+xml" href="../<?php echo $hl; ?>/rss_stream.xml"/> 
	<meta lang="en" xml:lang="en"  content="Gregory Anne CV" />
</head>

<?php 
function age($annee, $mois, $jour)  {
  //list($annee, $mois, $jour) = split('[-.]', $naiss);
  $today['mois'] = date('n');
  $today['jour'] = date('j');
  $today['annee'] = date('Y');
  $annees = $today['annee'] - $annee;
  if ($today['mois'] <= $mois) {
    if ($mois == $today['mois']) {
      if ($jour > $today['jour'])
        $annees--;
      }
    else
      $annees--;
    }
  echo $annees;
  }
?>
<body>

<?php if ($hl == 'fr'){?>
	<img src="../img/id.jpg" width="340" height="225" align="right" 
	border="0" alt="."/>
	<?php } ?>
	<br/><h4>
	<img src="../img/Ggrreyggoyrbyy_bArnbnreb_blue.png" width="300" height="50" alt="Gr&eacute;gory ANNE"/>
	<!--born in September the 6th 1983 (25 yo), single.-->
	</h4>
	<?php if ($hl == 'fr'){?>
	n&eacute; le 06/09/1983 (<?php echo age(1983, 09, 06); ?> ans).
	<?php }?>
	<br/>
	<h3><?php echo $ext_string["address.permanent.street"]; ?><br/> <?php echo $ext_string["address.permanent.town"]; ?> <br/>
	<?php echo $ext_string["address.permanent.country"]; ?><br/>
	<?php echo $ext_string["number.mobile"]; ?> <br/> <?php echo $ext_string["number.landline"];?><br/>
	<a href="mailto:gregory.anne83@gmail.com">
	<?php echo $ext_string["mail"]; ?> </a> <br/>
  
	</h3>
    
    <div id="bookmarks">
    


    <a href="http://www.developpez.net/forums/u158055/zg2pro/">
    <img src="../img/social_icons/developpez.png" width="40" height="40" alt="."/>
    </a>
    <a href="http://www.facebook.com/zg2pro">
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
    <a href="http://www.viadeo.com/en/profile/gregory.anne1">
    <img src="../img/social_icons/Viadeo.png"  width="40" height="40" alt="."/>
    </a>
    <a href="http://www.youtube.com/zg2pro">
    <img src="../img/social_icons/Youtube.png"  width="40" height="40" alt="."/>
    </a>
    
    </div>
    
	<br/>
	<br/>
	
	
	<?php echo $ext_string["title.h1"]; ?>
	
	  

	<div id="menu">
   	<h2><?php echo $ext_string["summary.head"]; ?></h2>
<div class="pillmenu" >
<ul>
<li class="li2lines"><a href="index.php?p=mycv#experience"><?php echo $ext_string["summary.pe"]; ?></a></li>
<li class="li1line"><a href="index.php?p=mycv#education"><?php echo $ext_string["summary.e"]; ?></a></li>
<li class="li1line"><a href="index.php?p=mycv#knowledge"><?php echo $ext_string["summary.k"]; ?></a></li>
<li class="li2lines"><a href="index.php?p=mycv#interests"><?php echo $ext_string["summary.ih"]; ?></a></li>
<li class="li1line"><a href="index.php?p=mycv#goals"><?php echo $ext_string["summary.g"]; ?></a></li>
<li class="li1line"><a href="index.php?p=mycv#referees"><?php echo $ext_string["summary.r"]; ?></a></li>
</ul>
</div>
	<div class="pillmenu">
	<br/><h2><?php echo $ext_string["tools.head"]; ?></h2>
	<ul>
	<li>
	<?php if ($p != "mycv") echo "<a href='index.php?p=mycv'>"; ?>
	<img src="../img/home.png" alt="." width="50" height="50" border="0" align="middle" />
	<?php echo $ext_string["tools.h"]; ?>
	<?php if ($p != "mycv") echo "</a>"; ?></li>
	<li>
	<?php if ($p != "glossary") echo "<a href='index.php?p=glossary'>"; ?>
	<img src="../img/glossary.jpg" alt="." width="50" height="50" border="0" align="middle" />
	<?php echo $ext_string["tools.g"]; ?>
	<?php if ($p != "glossary") echo "</a>"; ?>
	</li>
	<li><a href="../<?php if ($hl == 'en') echo 'fr'; else echo 'en' ?>/index.php?p=<?php echo $p; ?>">
	<img src="../img/<?php if ($hl == 'en') echo 'fr'; else echo 'en' ?>.gif" alt="<?php if ($hl == 'en') echo 'fr'; else echo 'en' ?>" width="35" height="35" border="0" vspace="6"  align="middle"/>
	<?php echo $ext_string["tools.vf"]; ?> </a></li>
	<li><a href="../pdf/CV<?php echo $hl; ?>_GregANNE.pdf">
	<img src="../img/printer.gif" alt="." width="35" height="35" border="0" vspace="6" align="middle"/>
	<?php echo $ext_string["tools.p"]; ?> </a></li>
	<li>
	 <!-- Google Code -->
<a href="http://code.google.com/u/gregory.anne83/">
<!-- img src="http://s7.addthis.com/static/btn/sm-share-en.gif" width="175px" height="35px" alt="Bookmark and Share" style="border:0"/ -->
<img src="../img/code_small.png"  alt="." width="70" height="50" border="0" align="middle"/> <?php echo $ext_string["tools.portfolio"]; ?>
</a></li>
	<li>
	 <!-- AddThis Button BEGIN -->
<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4b3dcb743f1853c4">
<!-- img src="http://s7.addthis.com/static/btn/sm-share-en.gif" width="175px" height="35px" alt="Bookmark and Share" style="border:0"/ -->
<img src="../img/addThis.png"  alt="." width="50" height="50" border="0" align="middle"/> <?php echo $ext_string["tools.s"]; ?>
</a>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4b3dcb743f1853c4"></script>
<!-- AddThis Button END --></li>
	<li><a href="rss_stream.xml"><img src="../img/rss.png" alt="." width="35" height="35" border="0" vspace="6" align="middle"/>  &nbsp;<?php echo $ext_string["tools.rss"]; ?></a></li>
</ul>
</div>
	<br/><br/><br/>
	<div align="center">
	 <br/><br/>
<p>
    <a href="http://jigsaw.w3.org/css-validator/">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="CSS Valide !" />
    </a>
<br/>
    <a href="http://validator.w3.org/check?uri=http%3A%2F%2Fenglishblazere.free.fr%2F<?php echo $hl; ?>">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vh40"
            alt="HTML Valide !" />
    </a>
</p>


	
	<br/><br/><br/><hr/>
	<small><?php echo $ext_string['copyright'];?>
	<br/><br/>
	
	</small>

	</div>
	<small>
	<?php echo $ext_string['technologies.title']; ?></small>
	<ul>
	<li><small><?php echo $ext_string['technologies.xml']; ?></small></li>
	<!-- li><small><?php echo $ext_string['technologies.xsl']; ?></small></li -->
	<li><small><?php echo $ext_string['technologies.rss']; ?></small></li>
	<!--li><small><?php echo $ext_string['technologies.fb']; ?></small></li-->
	<li><small><?php echo $ext_string['technologies.css']; ?></small></li>
	<li><small><?php echo $ext_string['technologies.js']; ?></small></li>
	<li><small><?php echo $ext_string['technologies.php']; ?></small></li>
	<!--li><small><?php echo $ext_string['technologies.unix']; ?></small></li-->
	<li><small><?php echo $ext_string['technologies.pdf']; ?></small></li>
	</ul>
	<br/>
	<small><?php echo $ext_string['gregory.recommends']; ?></small>
	
<br/><br/><br/>

<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FGregory-Anne%2F262147523982&amp;width=200&amp;colorscheme=light&amp;connections=10&amp;stream=true&amp;header=true&amp;height=587" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:587px;" ></iframe>

<!--script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="http://www.facebook.com/pages/Gregory-Anne/262147523982" width="292" connections="10" stream="true" header="true"></fb:like-box>

<iframe src="http://www.facebook.com/plugins/activity.php?site=http%3A%2F%2Fwww.facebook.com%2Fpages%2FGregory-Anne%2F262147523982&amp;width=200&amp;height=300&amp;header=true&amp;colorscheme=light&amp;recommendations=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px; height:300px;" allowTransparency="true"></iframe>

<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:activity site="http://www.facebook.com/pages/Gregory-Anne/262147523982" width="200" height="300" header="true" recommendations="false"></fb:activity-->

<br/><br/><br/>

<script src="../js/ssm.js" type="text/javascript"></script>
<script src="../js/ssmItems.js" type="text/javascript"></script>


	</div>
	
	
	
	  	<div id="main">
	
	  
