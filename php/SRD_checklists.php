<?php 
$file_name = "XML/checklist.xml";
   		$xml_text = file_get_contents($file_name);
   		/*
		
		$tags = array("nature", "item", "coefficient",
		"checklist", "comptant", "achat", "vente", "rachat", 
		"decouvert"
		);
		
		foreach ($tags as $tagname){
			
   //ajout des CDATA
   $xml_text = str_replace("<$tagname>", "<$tagname><![CDATA[", $xml_text);
   $xml_text = str_replace("</$tagname>", "]]></$tagname>", $xml_text);
		
		}
		//print_r($xml_text); 
		*/
		$xml =  new DOMDocument;
	//	$xml->loadXML($xml_text);
		//echo $xml->saveXML();
		//var_dump($xml); die;
		
		$xml->load($file_name);
		
		$xsl = new DOMDocument;
		$xsl->substituteEntities = true;
		$xsl->load('../XSL/SRD_checklist.xsl');
		
		//echo $xsl->saveXML();
		
		// Configuration
		$proc = new XSLTProcessor;
		$proc->importStyleSheet($xsl);
	
		$hl = $_SESSION['hl'];
		
		$proc->setParameter('', 'hl', $hl);
echo "<a name='checklist'></a>";
		//echo $proc->transformToXML($xml);
		
    	echo trim(preg_replace('/<\?xml.*\?>/', '', $proc->transformToXML($xml), 1));
    	/**/
	
?>


	</div>
	</body>
	</html>