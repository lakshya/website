<style>
.pro{
border: 1px solid #66cccc;
word-spacing: 10px;
}
</style>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
	var amountCollected = 54000;
	var target = 300000;
	var percent = amountCollected*100/target + '%';
        data.addColumn('string', '');
        data.addColumn('number', '');
        data.addRows([[percent, amountCollected]]);

        var options = {
          width: 800, height: 100,
          title: '',
          vAxis: {titleTextStyle: {color: 'red'}},
          hAxis: {maxValue: target, minValue: 0, gridlines: {count: 8}},
          legend: {position: 'none'}
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

<center>
	<!-- Admin fund raising meter-->
       <a href="<?=url::base().'adminCorpus'?>">Administrative Funds collected so far</a>
	<div id="chart_div"></div> 
         <!--...end here -->

<!--h4 align='center'><a href='http://www.thelakshyafoundation.org/students/'>Click here to apply for lakshya scholarship</a></h4-->
<table width="100%" height="150px" cellspacing="10" border="0">
<tr>

	<td width="50%" height="150px">
	<table class="pro" width="100%" height="150px">
		<tr><td colspan="2" bgcolor="#dfdfdf" height="25px" align="center"><font style="color: #152a33; font-weight:bold;">Lakshya Scholarships</font></td></tr>
		<tr><td width="50px"><a href="<?=url::base().'scholarships'?>"><img src="/images/proj1.jpg" alt="Project1" width="150" height="150"/></a></td>
		<td>Lakshya has moved from a grant model to an <b>interest-free loan model</b> for its scholarship project...<br/>
		  <a href="<?=url::base().'scholarships'?>">More>></a></td></tr>
	</table>
	</td>
	
	<td width="50%" height="150px">
	<table class="pro" width="100%" height="150px">
		<tr><td colspan="2" bgcolor="#dfdfdf" height="25px" align="center"><font style="color: #152a33; font-weight:bold;">Asthra</font></td></tr>
		<tr><td width="50px"><a href="http://www.theasthra.org"><img src="/images/asthra.jpg" alt="Asthra" width="150" height="150"/></a></td>
		<td>Asthra is the name given to the project which aims to create a society free of corruption through the Right to Information act.<br/>
		  <a href="http://www.theasthra.org">More>></a></td></tr>
	</table>
	</td>
	
</tr>
</table>
<table width="100%" height="150px" cellspacing="10" border="0">
  <tr>
    <td width="50%" height="150px"><table class="pro" width="100%" height="150px">
      <tr>
        <td colspan="2" bgcolor="#dfdfdf" height="25px" align="center"><font style="color: #152a33; font-weight:bold;">Library Project </font></td>
      </tr>
      <tr>
        <td width="50px"><a href="<?=url::base().'library'?>"><img src="/images/book.jpg" alt="Project1" width="150" height="150" border="0"/></a></td>
        <td>Providing students with various curriculum and non-curriculum books, <b> to gain a broader perspective....</b><br/>
          <a href="<?=url::base().'library'?>">More>></a></td>
      </tr>
    </table></td>
    <td width="50%" height="150px"><table class="pro" width="100%" height="150px">
      <tr>
        <td colspan="2" bgcolor="#dfdfdf" height="25px" align="center"><font style="color: #152a33; font-weight:bold;">Innovation Project </font></td>
      </tr>
      <tr>
        <td width="50px"><a href="<?=url::base().'innovation'?>"><img src="/images/innovation.jpg" alt="Project1" width="150" height="150" border="0"/></a><a href="<?=url::base().'ekjodikapda'?>"></a></td>
        <td>Entries are now open for Innovation Project 2011-2012<br/>
          <a href="<?=url::base().'innovation'?>">More>></a></td>
      </tr>
    </table></td>
  </tr>
</table>
</center>

<table align="center" cellspacing=50 style="padding:0px;border-spacing:50px">
	<tr>
		<td> <a href="<?=url::base().'images/accounts/financials-2008-09.xls'?>">
		<img src="<?=url::base().'images/downloads/Audit.jpg'?>" title="Click to view" border="2" width="70" height="90"/><br/>Financials 2008-2009</a>
		</td>
		
		<td> <a href="<?=url::base().'images/accounts/financials-2009-10.xls'?>">
		<img src="<?=url::base().'images/downloads/Audit.jpg'?>" title="Click to view" border="2" width="70" height="90"/><br/>Financials 2009-2010</a>
		</td>

		<td> <a href="<?=url::base().'images/accounts/financials-2010-11.xls'?>">
		<img src="<?=url::base().'images/downloads/Audit.jpg'?>" title="Click to view" border="2" width="70" height="90"/><br/>Financials 2010-2011</a>
		</td>

	</tr> 
</table>
<!--<center>
<object width="500" height="350"><param name="movie" value="http://www.youtube.com/v/iZtHmaa2a6E&hl=en&fs=1&rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/iZtHmaa2a6E&hl=en&fs=1&rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="500" height="350"></embed></object>
</center>-->
