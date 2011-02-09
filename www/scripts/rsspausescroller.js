var bridgepath="/news/scroller/?output=ajax";
function formatrssmessage(divid, msgnumber, linktarget, logicswitch){
var rsscontent=rsscontentdata[divid][msgnumber];
var linktitle='<span class="rsstitle"><a href="'+unescape(rsscontent.link)+'" target="'+linktarget+'">'+unescape(rsscontent.title)+'</a></span>';
var description='<div class="rssdescription">'+unescape(rsscontent.description)+'</div>';
var feeddate='<span class="rssdate">'+unescape(rsscontent.date)+'</span>';
if (logicswitch.indexOf("description")!=-1 && logicswitch.indexOf("date")!=-1) //Logic switch- Show description and date
return linktitle+"<br />"+feeddate+description;
else if (logicswitch.indexOf("description")!=-1) //Logic switch- Show just description
return linktitle+"<br />"+description;
else if (logicswitch.indexOf("date")!=-1) //Logic switch- Show just date
return linktitle+"<br />"+feeddate;
else
return linktitle; //Default- Just return hyperlinked RSS title
}var rsscontentdata=new Array(); //global array to hold RSS feeds contents
function rsspausescroller(RSS_id, divId, divClass, delay, linktarget, logicswitch){
this.tickerid=divId; //ID of ticker div to display information
this.delay=delay; //Delay between msg change, in miliseconds.
this.linktarget=(typeof linktarget!="undefined")? linktarget : "";
this.logicswitch=(typeof logicswitch!="undefined")? logicswitch : "";
this.mouseoverBol=0; //Boolean to indicate whether mouse is currently over scroller (and pause it if it is)
this.hiddendivpointer=1; //index of message array for hidden div
this.js_is_loaded=0;
this.number_of_tries=0;
document.write('<div id="'+divId+'" class="'+divClass+'" style="position: relative; overflow: hidden"><div class="innerDiv" style="position: absolute; width: 100%" id="'+divId+'1"><span style="position: absolute">Initializing RSS scroller...</span></div><div class="innerDiv" style="position: absolute; width: 100%; visibility: hidden" id="'+divId+'2"></div></div>');
if (document.getElementById){ //perform basic DOM browser support
var parameters="id="+encodeURIComponent(RSS_id)+"&divid="+divId+"&bustcache="+new Date().getTime();
rsspausescroller.getRSScontentJS(bridgepath+"&"+parameters);
this.do_onjsload();
}
}
rsspausescroller.prototype.do_onjsload=function(){
var scrollerinstance=this;
if (typeof rsscontentdata[this.tickerid]=="undefined" && this.number_of_tries<40){ //if JS array holding RSS content not yet loaded
this.number_of_tries++;
setTimeout(function(){scrollerinstance.do_onjsload()}, 200); //recheck
}
else if (typeof rsscontentdata[this.tickerid]!="undefined"){ //if JS array has loaded
this.tickerdiv=document.getElementById(this.tickerid);
this.visiblediv=document.getElementById(this.tickerid+"1");
this.hiddendiv=document.getElementById(this.tickerid+"2");
this.visibledivtop=parseInt(rsspausescroller.getCSSpadding(this.tickerdiv));
//set width of inner DIV to outer DIV width minus padding (padding assumed to be top padding x 2)
this.visiblediv.style.width=this.hiddendiv.style.width=this.tickerdiv.offsetWidth-(this.visibledivtop*2)+"px";
this.visiblediv.innerHTML=formatrssmessage(this.tickerid, 0, this.linktarget, this.logicswitch);
this.hiddendiv.innerHTML=formatrssmessage(this.tickerid, 1, this.linktarget, this.logicswitch);
this.do_ondivsinitialized();
}
else
document.getElementById(this.tickerid).innerHTML=rsscontentdata+"<br />RSS Feed cannot be fetched.";
}
rsspausescroller.prototype.do_ondivsinitialized=function(){
var scrollerinstance=this;
if (parseInt(this.visiblediv.offsetHeight)==0 || parseInt(this.hiddendiv.offsetHeight)==0)
setTimeout(function(){scrollerinstance.do_ondivsinitialized()}, 100);
else
this.initialize();
}
rsspausescroller.prototype.initialize=function(){
var scrollerinstance=this;
this.getinline(this.visiblediv, this.hiddendiv);
this.hiddendiv.style.visibility="visible";
//set width of inner DIVs to outer DIV's width minus padding (padding assumed to be top padding x 2)
this.visiblediv.style.width=this.hiddendiv.style.width=this.tickerdiv.offsetWidth-(this.visibledivtop*2)+"px";
this.tickerdiv.onmouseover=function(){scrollerinstance.mouseoverBol=1};
this.tickerdiv.onmouseout=function(){scrollerinstance.mouseoverBol=0};
if (window.attachEvent) //Clean up loose references in IE
window.attachEvent("onunload", function(){scrollerinstance.tickerdiv.onmouseover=scrollerinstance.tickerdiv.onmouseout=null});
setTimeout(function(){scrollerinstance.animateup()}, this.delay);
}
rsspausescroller.prototype.animateup=function(){
var scrollerinstance=this;
if (parseInt(this.hiddendiv.style.top)>(this.visibledivtop+5)){
this.visiblediv.style.top=parseInt(this.visiblediv.style.top)-5+"px";
this.hiddendiv.style.top=parseInt(this.hiddendiv.style.top)-5+"px";
setTimeout(function(){scrollerinstance.animateup()}, 50);
}
else{
this.getinline(this.hiddendiv, this.visiblediv);
this.swapdivs();
setTimeout(function(){scrollerinstance.rotatemessage()}, this.delay);
}
}
rsspausescroller.prototype.swapdivs=function(){
var tempcontainer=this.visiblediv;
this.visiblediv=this.hiddendiv;
this.hiddendiv=tempcontainer;
}
rsspausescroller.prototype.getinline=function(div1, div2){
div1.style.top=this.visibledivtop+"px";
div2.style.top=Math.max(div1.parentNode.offsetHeight, div1.offsetHeight)+"px";
}
rsspausescroller.prototype.rotatemessage=function(){
var scrollerinstance=this;
if (this.mouseoverBol==1) //if mouse is currently over scoller, do nothing (pause it)
setTimeout(function(){scrollerinstance.rotatemessage()}, 100);
else{
var i=this.hiddendivpointer;
var ceiling=rsscontentdata[this.tickerid].length;
this.hiddendivpointer=(i+1>ceiling-1)? 0 : i+1;
this.hiddendiv.innerHTML=formatrssmessage(this.tickerid, this.hiddendivpointer, this.linktarget, this.logicswitch);
this.animateup();
}
}
rsspausescroller.getRSScontentJS=function(scripturl){
var scriptref=document.createElement('script');
scriptref.setAttribute("type","text/javascript");
scriptref.setAttribute("src", scripturl);
document.getElementsByTagName("head").item(0).appendChild(scriptref);
}
rsspausescroller.getCSSpadding=function(tickerobj){ //get CSS padding value, if any
if (tickerobj.currentStyle)
return tickerobj.currentStyle["paddingTop"];
else if (window.getComputedStyle) //if DOM2
return window.getComputedStyle(tickerobj, "").getPropertyValue("padding-top");
else
return 0;
}