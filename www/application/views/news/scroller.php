<?
function slashit($what){ //Encode text for storing in JavaScript array
$newstring=str_replace('&apos;', '\'', $what); //replace those half valid apostrophe entities with actual apostrophes
return rawurlencode($newstring);
}
?>
rsscontentdata.news=new Array();

rsscontentdata.news[0] = {
		link:"<?=url::base().'news/scholForm'?>",
		title:"The application for the Lakshya Scholarship 2010 - 2011 is now closed . <br>Click here for more details.",
		description:" ",
		date:""
	};

rsscontentdata.news[1] = {
		link:"<?=url::base().'gallery'?>",
		title:"'Ek Jodi Kapda' project pics are uploaded on the website . <br>Click here to view them.",
		description:" ",
		date:""
	};

rsscontentdata.news[2] = {
		link:"<?=url::base().'students'?>",
		title:"Applicants, please click here to login into lakshya website and view your scholarship application status",
		description:" ",
		date:""
	};