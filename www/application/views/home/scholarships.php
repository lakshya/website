
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
<p>Raising funds is a challenge which gets tougher every year. To make this project sustainable, the Lakshya team has switched to a loan based model. </p>
<h5>Terms of the Loan:</h5>
<ul>
<li><b>Interest free loans without collateral</b>.</li>
<li>The repayment period will be 5 years from graduation.</li>
<li>To facilitate repayment tracking, each scholar will have to mandatorily pay a minimum of Rs.100 per month as soon as he/she graduates.</li>
</ul>
<p>Many individuals, foundations and groups have come forward to generously support students chosen by Lakshya.</p>
<h3>Foundations and Chapters</h3>
<h5>Tom Zacharia Foundation</h5>
<ul>The foundation is supporting Lakshya by funding one student every year.Tom Zacharia foundation was established on 17 Dec 2010 by Tom's family. 
The key objective of the foundation is to keep the memory of Tom alive by supporting the values he held close to his heart - brilliance in your work,
giving back to society, forging friendships across race and religion, and loving with a fire.</ul>
<ol>The foundation aspires to achieve the following:
<li>Support those who wish to pursue a professional career in science or engineering but do not have the means to do so.</li>
<li>Provide financial support and or scholarships to deserving children.</li>
<li>Provide support to other foundations / institutions that propagate and/or stand for above described causes.</li>
</ol>
<ul>The foundation is primarily funded by the family. Secondary funding comes from royalties of the book "Live Like Tom" being published by Bency and Zac Thomas.</ul>
<h5>NITW Americas Chapter</h5>
<ul>The NITW Americas Chapter is a registered organization set up by the NITW alumni in the United States and has agreed to provide tuition and hostel fees for 
three students every year.</ul>
<h5>Trahi Foundation</h5>
<ul>Trahi Foundation will be funding two students every year.The Trahi Foundation is an organization formed by the 1993 batch NITW alumni 
and is based in Bangalore.</ul>
<h5>NITW Middle East Chapter</h5>
<ul>The Middle East chapter is funding one student every year. The NITW Middle East Chapter has been in constant touch with Lakshya and, in 2011, 
came forward to fund one student every year.</ul>
<h5>BVS Murty 1979-83 NITW Alumni Scholarship & K Srikant Murty 1979-83 NITW Alumni Scholarship</h5>
<ul>Each of the two scholarships will be funding one student every year. The 1979-83 batch collected
funds for two scholarships every year, and has named them after two of their deceased batchmates.</ul>
<h5>Individual contributors</h5>
<ul>Each of the below mentioned donors are currently sponsoring one Lakshya scholar
<li><b>Mr. Baiju Vyas </b> (B.Tech NITW, Class of 1977 B.Tech)</li>
<li><b>Mr. Prabhakar Puvvada</b> (B.Tech NITW, Class of 1980)</li>
<li><b>Mr. Narayan</b> (B.Tech NITW, Class of 1983)</li>
<ul>
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
