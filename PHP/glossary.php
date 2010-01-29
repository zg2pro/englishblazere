	<script type="text/javascript" src="../JS/Tables.js"></script>
	
<?php 
require_once('../PHP/colourgradient.class.php');
$gradient = new ColourGradient();
$gradient[0]  = '0000AA';
$gradient[50] = 'red';
$gradient[100] = 'AA0000';


?>
<div id="glossary">
	<h2><?php echo $ext_string['glossary.title']; ?></h2>
	<?php echo $ext_string['glossary.legend']; ?><br/><br/>
	<?php echo $ext_string['glossary.filter']; ?>
	<table class="sortable" align="center" border="2" 
	summary="your browser cannot display tables">
		<thead><tr>
		<th><?php echo $ext_string['glossary.table.term']; ?></th>
		<th><?php echo $ext_string['glossary.table.definition']; ?></th>
		</tr></thead>
	<tbody>
	<?php 
	
	class SAXGlossary {
	private $path = "";
	private $term = "";
	private $definition = "";
	private $like = "";
	private $master = "";
	
	public function __construct($gradient) {
		$this->gradient = $gradient;
	}

	
	public function openTag($parser, $tag, $attr){
		$this->path .= '/' . $tag;
		
		if ($this->tag == "/glossary/item"){
			$this->term = "";
			$this->definition = "";
			$this->like = "";
			$this->master = "";
		}//if
		
		
		if ($this->path == "/glossary/item/term")
			$this->term = "";
		if ($this->path == "/glossary/item/definition")
			$this->definition = "";
		if ($this->path == "/glossary/item/like")
			$this->like = "";
		if ($this->path == "/glossary/item/master")
			$this->master = "";
	}//openTag
	
	public function closeTag($parser, $tag){
		
		global $ext_string;
		
		if ($this->path == "/glossary/item"){
			
			
		$isLike = ($this->like == "")? 0 : 1;
		$isMaster = ($this->master == "")? 0 : 1;
		/*
		$rowspan = ($isLike + $isMaster > 0)? "rowspan='".(1 + $isLike + $isMaster)."'" : "";
		
			
			echo "<tr>
			<td $rowspan>$this->term</td>
			<td>$this->definition</td>
			</tr>";
			if ($isLike > 0){
				echo "<tr><td> I like: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				$value = $this->like;
				for ($k=0; $k<101; $k++){
					$colour = ($k < $value + 1 && $k > $value - 2)? 'black':$this->gradient[$k];
    				echo "<span style='background-color:$colour'>&#160;</span>";
				}
				echo "</td></tr>";
			}
			if ($isMaster > 0){
				echo "<tr><td> I master: &nbsp;";
				$value = $this->master;
				for ($k=0; $k<101; $k++){
					$colour = ($k < $value + 1 && $k > $value - 2)? 'black':$this->gradient[$k];
    				echo "<span style='background-color:$colour'>&#160;</span>";
				}
				echo "</td></tr>";
			}
		*/
		echo "<tr>
			<td>$this->term</td>
			<td>
			$this->definition";
		if ($isLike > 0){
				echo "<p> ".$ext_string['glossary.table.like']." ";
				$value = $this->like;
				for ($k=0; $k<101; $k++){
					$colour = ($k < $value + 1 && $k > $value - 2)? 'black':$this->gradient[$k];
    				echo "<span style='background-color:$colour'>&#160;</span>";
				}
				echo "</p>";
			}
		if ($isMaster > 0){
				echo "<p> ".$ext_string['glossary.table.master']." ";
				$value = $this->master;
				for ($k=0; $k<101; $k++){
					$colour = ($k < $value + 1 && $k > $value - 2)? 'black':$this->gradient[$k];
    				echo "<span style='background-color:$colour'>&#160;</span>";
				}
				echo "</p>";
			}
			echo "</td>
			</tr>";
		
		
			$this->like = "";
			$this->master = "";
			
		}//if path
		
		$length = strlen($tag) + 1;
		$this->path = substr($this->path, 0, -$length);
	}//closeTag
	
	public function text($parser, $text){
		//echo "HELLO";
		
		$text = trim($text);
		
		if ($this->path == "/glossary/item/term")
			$this->term .= $text;
		
		if ($this->path == "/glossary/item/definition")
			$this->definition .= $text;
		
		if ($this->path == "/glossary/item/like")
			$this->like .= $text;
			
		if ($this->path == "/glossary/item/master")
			$this->master .= $text;
	}
}

$glossary = new SAXGlossary($gradient);
$sax = xml_parser_create();
xml_parser_set_option($sax, XML_OPTION_CASE_FOLDING, FALSE);
xml_set_object($sax, $glossary);
xml_set_element_handler($sax, 'openTag', 'closeTag');
xml_set_character_data_handler($sax, 'text');
$file = "../$hl/XML/glossary.xml";
$contents = file_get_contents($file); 
/*
$fp = fopen($file, 'r');
while ($xml = fread($fp, 1024)){
  xml_parse($sax, $xml, feof($fp));
}
*/
$tags = array("definition");
		
	foreach ($tags as $tagname){
   //add CDATA
   $contents = str_replace("<$tagname>", "<$tagname><![CDATA[", $contents);
   $contents = str_replace("</$tagname>", "]]></$tagname>", $contents);		
}
xml_parse($sax, $contents, true);

xml_parser_free($sax);
	
	
		
	?>
	</tbody>
	</table>
	<script type='text/javascript'>
	addFilterToTheTable();
</script>
</div>
</div>
</body>
</html>