addthis_conf={xic:1};function get(a){if(typeof(a)=="object"){return a}else{return document.getElementById(a)}}function show(a){a=get(a);if(a){a.style.display="block"}}function hide(a){a=get(a);if(a){a.style.display="none"}}function filt(m,q,c){var t=0,e="ati_",h="no-match",j="div",b=m.replace(/ /g,"")!=""?m.replace(/\W+/g,"").replace(/ /g,"").toLowerCase():"";hide(h);show(c);for(var i in q){var g=get(e+i.replace("@","_")),a=i.toLowerCase(),l=(q[i]).toLowerCase(),r=b==""?++t:0;if(b!=""){if((a.indexOf(m)>-1||a.indexOf(b)>-1||l.indexOf(b)>-1||l.indexOf(m)>-1)){r=1;t++}}if(r>0){show(g)}else{hide(g)}}if(t===0){show(h);hide(c)}}function sets(a){elt=document.getElementById("mys");elt.value=a;elt=document.getElementById("winname");elt.value=window.name;elt=document.getElementById("myform");elt.submit()};