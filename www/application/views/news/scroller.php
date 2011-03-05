<?
function slashit($what){ //Encode text for storing in JavaScript array
$newstring=str_replace('&apos;', '\'', $what); //replace those half valid apostrophe 

entities with actual apostrophes
return rawurlencode($newstring);
}
?>
rsscontentdata.news=new Array();

rsscontentdata.news[0] = {
		link:"<?=url::base().'library'?>",
		title:"<   Library project   > <br/><br/>Encouraging students to 

embrace the book reading habit. <br/> Donate a book today!",
		description:" ",
		date:""
	};

rsscontentdata.news[1] = {
		link:"<?=url::base().'innovation'?>",
		title:"<   Innovation project   > <br/><br/>Live coverage of the 

presentations streamed at Lakshya Live!! <br/>Click here to view the feed.<br/>",
		description:" ",
		date:""
	};

rsscontentdata.news[2] = {
		link:"<?=url::base().'scholarships'?>",
		title:"< Scholarships > <br/><br/>Final list of scholars shortlisted 

for funding have been uploaded. <br/> Click here to view them.",
		description:" ",
		date:""
	};