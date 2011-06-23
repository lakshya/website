
<script type="text/javascript">

function expand(id)
{
if(document.getElementById(id).style.display=="none")
		document.getElementById(id).style.display="block";
else
		document.getElementById(id).style.display="none";
}
</script>
<div id="overview">
<h5>Project Goal:</h5><ul>To fund NIT Warangal students in need of financial assistance.</ul>
<h5>Loan model:</h5>
<ul>Raising funds is a challenge which gets tougher every year. To make this project sustainable, the Lakshya team has been working on a loan based model which
was implemented for all scholar who applied in December 2010-2011.</ul>
<h5>Terms of the Loan:</h5>
<ul>
<li><b>Interest free loans without collateral</b>.</li>
<li>The repayment period will be 5 years from graduation.</li>
<li>To facilitate repayment tracking, each scholar will have to mandatorily pay a minimum of Rs.100 per month as soon as he/she graduates.</li>
</ul>
<h5>The advantages:</h5>
<ul>
<li>Makes this project sustainable and will reduce the burden on fund-raising.</li>
<li>Coupled with donations, it will help accomodate more scholars every year.</li>
</ul>
</div>
<h5>The Lakshya Scholars:</h5>
        <ul class="mytabs" id="tabs">
            <li class="current"><a href="<?=url::base().'graduated/?output=ajax'?>">Graduated</a></li>
            <!--<li><a href="<?=url::base().'finalYear/?output=ajax'?>">Class of 2011</a></li> -->
            <li><a href="<?=url::base().'thirdYear/?output=ajax'?>">Class of 2012</a></li>
            <li><a href="<?=url::base().'secondYear/?output=ajax'?>">Class of 2013</a></li>
            <li><a href="<?=url::base().'firstYear/?output=ajax'?>">Class of 2014</a></li>    
            <li><a href="<?=url::base().'waitlisted/?output=ajax'?>">Waitlisted</a></li>    
        </ul>

        <div class="mytabs-container" id="tabs-container">
            Loading. Please Wait...
        </div>
<h5>Fee Details:</h5>
<ul><a href="<?=url::base().'fees'?>">Click here</a> to see the detailed fee structure for NITW students from various batches.</ul>
    <script type="text/javascript" src="/scripts/jquery.min.js"></script>
    <script type="text/javascript" src="/scripts/tab.js"></script> 
