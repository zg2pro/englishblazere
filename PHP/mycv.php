<?php 
session_start();

	$titles = array(
		0 => "experience",
		1 => "education",
		2 => "knowledge",
		3 => "interests",
		4 => "goals",
		5 => "referees"
	);
	
	foreach ($titles as $ind=>$val){

		$file_name = "XML/$val.xml";
		// if(file_exists($file_name)) echo "File exists";
		// else echo "$file_name";
   		$xml_text = file_get_contents($file_name);
  
   		
		//print_r($xml_text); 
   		
		
		$tags = array("organization", "date", "role",
		"degree", "text", 
		"field", "title"
		);
		
		foreach ($tags as $tagname){
			
   //ajout des CDATA
   $xml_text = str_replace("<$tagname>", "<$tagname><![CDATA[", $xml_text);
   $xml_text = str_replace("</$tagname>", "]]></$tagname>", $xml_text);
		
		}
		//print_r($xml_text); 
		
		$xml =  new DOMDocument;
		$xml->loadXML($xml_text);
		//echo $xml->saveXML();
		//var_dump($xml); die;
		
		$xsl = new DOMDocument;
		$xsl->substituteEntities = true;
		$xsl->load('../XSL/'.$val.'.xsl');
		
		//echo $xsl->saveXML();
		
		// Configuration
		$proc = new XSLTProcessor;
		$proc->importStyleSheet($xsl);
	
		$hl = $_SESSION['hl'];
		
		$proc->setParameter('', 'hl', $hl);
		$proc->setParameter('', 'rss', '0');
		
		echo "<a name='".$val."'></a>";
		//echo $proc->transformToXML($xml);
		
    	echo trim(preg_replace('/<\?xml.*\?>/', '', $proc->transformToXML($xml), 1));
    	/**/
	}

	?>
	
	
	</div>
	</body>
	</html>
