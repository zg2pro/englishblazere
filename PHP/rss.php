<?php

	

		$file_name = '../'.$hl.'/XML/experience.xml';
		// if(file_exists($file_name)) echo "File exists";
		// else echo "$file_name";
   		$xml_text = file_get_contents($file_name);
  
   		
		
		$tags = array("organization", "date", "role");
		
		foreach ($tags as $tagname){
			
   //ajout des CDATA
   $xml_text = str_replace("<$tagname>", "<$tagname><![CDATA[", $xml_text);
   $xml_text = str_replace("</$tagname>", "]]></$tagname>", $xml_text);
		
		
		}
		
		$domdoc =  new DOMDocument;
		$domdoc->loadXML($xml_text);
		//echo $xml->saveXML();
		//var_dump($xml); die;
		
		$xsl = new DOMDocument;
		$xsl->substituteEntities = true;
		$xsl->load('../XSL/experience.xsl');
		
		//echo $xsl->saveXML();
		
		// Configuration
		$proc = new XSLTProcessor;
		$proc->importStyleSheet($xsl);
	
		$hl = $_SESSION['hl'];
		
		$proc->setParameter('', 'hl', $hl);
		$proc->setParameter('', 'rss', '1');
		
		$organization = trim(preg_replace('/<\?xml.*\?>/', '', $proc->transformToXML($domdoc), 1));
		//die;
		
		
 
 $xml = '<?xml version="1.0" encoding="UTF-8"?>
 <rss version="2.0"><channel>
 <title>Gregory Anne</title>
	<description>'.$ext_string['rss.head'].'</description>
	<link>http://englishblazere.free.fr</link>
	<image>
	  <title>Gregory Anne</title>
	  <url>http://englishblazere.free.fr/images/ionetwork.jpg</url>
	  <link>http://englishblazere.free.fr</link>
	</image>
	<copyright>Gregory Anne</copyright>
	<webMaster>englishblazere@free.fr</webMaster>
 
 
 
 ';


//    $datephp=date("D, d M Y H:i:s +0100", $date);
    $xml .= '<item>';
    $xml .= '<title>'.$ext_string['rss.le'].'</title>';
    $xml .= '<link>http://englishblazere.free.fr/en/index.php?p=mycv#experience</link>';
    $xml .= '<guid>http://englishblazere.free.fr/en/index.php?p=mycv#experience</guid>';
    $xml .= '<pubDate>Tue, 9 Aug 2009 16:20:00 GMT</pubDate>'; 
    $xml .= '<description><![CDATA['.$organization.']]></description>';
    $xml .= '</item>'; 
 
    
    

		$file_name = '../'.$hl.'/XML/education.xml';
		// if(file_exists($file_name)) echo "File exists";
		// else echo "$file_name";
   		$xml_text = file_get_contents($file_name);
  
   		
		
		$tags = array("degree", "text");
		
		foreach ($tags as $tagname){
			
   //ajout des CDATA
   $xml_text = str_replace("<$tagname>", "<$tagname><![CDATA[", $xml_text);
   $xml_text = str_replace("</$tagname>", "]]></$tagname>", $xml_text);
		
		
		}
		
		$domdoc =  new DOMDocument;
		$domdoc->loadXML($xml_text);
		//echo $xml->saveXML();
		//var_dump($xml); die;
		
		$xsl = new DOMDocument;
		$xsl->substituteEntities = true;
		$xsl->load('../XSL/education.xsl');
		
		//echo $xsl->saveXML();
		
		// Configuration
		$proc = new XSLTProcessor;
		$proc->importStyleSheet($xsl);
	
		$hl = $_SESSION['hl'];
		
		$proc->setParameter('', 'hl', $hl);
		$proc->setParameter('', 'rss', '1');
		
		$education = trim(preg_replace('/<\?xml.*\?>/', '', $proc->transformToXML($domdoc), 1));
		//die;
		
		 $xml .= '<item>';
    $xml .= '<title>'.$ext_string['rss.ld'].'</title>';
    $xml .= '<link>http://englishblazere.free.fr/en/index.php?p=mycv#education</link>';
    $xml .= '<guid>http://englishblazere.free.fr/en/index.php?p=mycv#education</guid>';
    $xml .= '<pubDate>Tue, 9 Aug 2009 16:20:00 GMT</pubDate>'; 
    $xml .= '<description><![CDATA['.$education.']]></description>';
    $xml .= '</item>'; 
    
    
    
  $xml .= '</channel>';
  $xml .= '</rss>';
  
  $fp = fopen('rss_stream.xml', 'w');
  fputs($fp, $xml);
  fclose($fp);
  
  //echo $xml; die;
  
  //echo '<br /><a href="fluxrss.xml">Check RSS feed</a>';
  ?>
 
