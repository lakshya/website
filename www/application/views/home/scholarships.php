
<script type="text/javascript">

function expand(id)
{
if(document.getElementById(id).style.display=="none")
		document.getElementById(id).style.display="block";
else
		document.getElementById(id).style.display="none";
}
</script>

<br/>
<div id="overview">
<b>Project Goal:</b> To fund NIT Warangal students in need of financial assistance.<br/>
<br/>
<b>Loan model:</b>
Raising funds is a challenge which gets tougher every year. To make this project sustainable, the Lakshya team has been working on a loan based model which
was implemented for all scholar who applied in December 2010-2011.
<ul>
<li><b>Interest free loans without collateral</b>.</li>
<li>The repayment period will be 5 years from graduation.</li>
<li>To facilitate repayment tracking, each scholar will have to mandatorily pay a minimum of Rs.100 per month as soon as he/she graduates.</li>
</ul>
The advantages:
<ul>
<li>Makes this project sustainable and will reduce the burden on fund-raising.</li>
<li>Coupled with donations, it will help accomodate more scholars every year.</li>
</ul>
</p>
</div>
<br/>
*The Trahi Foundation is an organization formed by the 1993 batch NITW alumni and is based in Bangalore.
<br/>
<br/>
<b>The Lakshya Scholars:</b><br/><br/>
        <ul class="mytabs" id="tabs">
            <li class="current"><a href="<?=url::base().'graduated/?output=ajax'?>">Graduated</a></li>
            <li><a href="<?=url::base().'finalYear/?output=ajax'?>">Class of 2011</a></li>
            <li><a href="<?=url::base().'thirdYear/?output=ajax'?>">Class of 2012</a></li>
            <li><a href="<?=url::base().'secondYear/?output=ajax'?>">Class of 2013</a></li>
            <li><a href="<?=url::base().'firstYear/?output=ajax'?>">Class of 2014</a></li>    
            <li><a href="<?=url::base().'waitlisted/?output=ajax'?>">Waitlisted</a></li>    
        </ul>

        <div class="mytabs-container" id="tabs-container">
            Loading. Please Wait...
        </div>
    <script type="text/javascript" src="/scripts/jquery.min.js"></script>
    <script type="text/javascript" src="/scripts/tab.js"></script> 
