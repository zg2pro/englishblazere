
function cashBuying (sectionName){
	 var checkboxes = document.getElementById(sectionName).getElementsByTagName("input");
	 var foundCount = 0
	for(var i=0; i < checkboxes.length; i++){
	 	if(checkboxes[i].checked == true) foundCount++;
	}
	 document.getElementById(sectionName+"_mark").innerHTML = "Note: "+foundCount+"% (/"+checkboxes.length+")";
}