
	<br/><br/><br/>
   	<h2><?php echo $ext_string["summary.head"]; ?></h2>
<ul class="nav nav-tabs nav-stacked">
<li><a href="index.php?p=mycv#experience"><?php echo $ext_string["summary.pe"]; ?></a></li>
<li><a href="index.php?p=mycv#education"><?php echo $ext_string["summary.e"]; ?></a></li>
<li><a href="index.php?p=mycv#courses"><?php echo $ext_string["summary.c"]; ?></a></li>
<li><a href="index.php?p=mycv#knowledge"><?php echo $ext_string["summary.k"]; ?></a></li>
<li><a href="index.php?p=mycv#interests"><?php echo $ext_string["summary.ih"]; ?></a></li>
<li><a href="index.php?p=mycv#goals"><?php echo $ext_string["summary.g"]; ?></a></li>
<li><a href="index.php?p=mycv#referees"><?php echo $ext_string["summary.r"]; ?></a></li>
</ul>

	<br/><h2><?php echo $ext_string["tools.head"]; ?></h2>
	<ul class="nav nav-tabs nav-stacked">
	<li  <?php if ($p == "mycv") echo "class='active'"; ?>>
	<a href='index.php?p=mycv'>
	<i class="icon-home"></i>
	<?php echo $ext_string["tools.h"]; ?>
	</a></li>
	<li <?php if ($p == "glossary") echo "class='active'"; ?>>
	<a href='index.php?p=glossary'>
	<i class="icon-book"></i>
	<?php echo $ext_string["tools.g"]; ?>
	</a>
	</li>
	<li>
	<a href="../<?php if ($hl == 'en') echo 'fr'; else echo 'en' ?>/index.php?p=<?php echo $p; ?>">
	<img src="../img/<?php if ($hl == 'en') echo 'fr'; else echo 'en' ?>.gif" alt="<?php if ($hl == 'en') echo 'fr'; 
	else echo 'en' ?>" width="15" height="13" border="0" vspace="6"  align="middle"/>
	<?php echo $ext_string["tools.vf"]; ?> </a>
	</li>
	<li><a href="../pdf/CV<?php echo $hl; ?>_GregANNE.pdf">
	<i class="icon-print"></i>
	<?php echo $ext_string["tools.p"]; ?> </a></li>
	<li>
	 <!-- Google Code -->
<a href="http://code.google.com/u/gregory.anne83/">
<!-- img src="http://s7.addthis.com/static/btn/sm-share-en.gif" width="175px" height="35px" alt="Bookmark and Share" style="border:0"/ -->
<i class="icon-briefcase"></i>
	 <?php echo $ext_string["tools.portfolio"]; ?>
</a></li>
<li><a href="rss_stream.xml">
	<img src="../img/rss.png" alt="." width="14" height="14" border="0" vspace="6" align="middle"/> 
	&nbsp;<?php echo $ext_string["tools.rss"]; ?></a></li>
	<li>
	 <!-- AddThis Button BEGIN -->
<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4b3dcb743f1853c4">
<!-- img src="http://s7.addthis.com/static/btn/sm-share-en.gif" width="175px" height="35px" alt="Bookmark and Share" style="border:0"/ -->
<img src="../img/addThis.png"  alt="." width="14" height="14" border="0" align="middle"/> <?php echo $ext_string["tools.s"]; ?>
</a>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4b3dcb743f1853c4"></script>
<!-- AddThis Button END --></li>
	
</ul>
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
	<li><small><?php echo $ext_string['technologies.rss']; ?></small></li>
	<li><small><?php echo $ext_string['technologies.css']; ?></small></li>
	<li><small><?php echo $ext_string['technologies.js']; ?></small></li>
	<li><small><?php echo $ext_string['technologies.php']; ?></small></li>
	<li><small><?php echo $ext_string['technologies.pdf']; ?></small></li>
	<li><small><?php echo $ext_string['technologies.bootstrap']; ?></small></li>
	<li><small><?php echo $ext_string['technologies.flash']; ?></small></li>
	</ul>
	<!--br/>
	<small><?php echo $ext_string['gregory.recommends']; ?></small-->
	
<br/><br/><br/>

<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FGregory-Anne%2F262147523982&amp;width=200&amp;colorscheme=light&amp;connections=10&amp;stream=true&amp;header=true&amp;height=587" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:587px;" ></iframe>

<br/><br/><br/>

<!--script src="../js/ssm.js" type="text/javascript"></script>
<script src="../js/ssmItems.js" type="text/javascript"></script-->
