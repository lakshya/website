<?php session_start(); ?>
<?php include("db_connect.php");?>
<?php

function is_admin($uid)
{
	if($uid=="naresh" || $uid=="administrator" )
	{
		return true;
	}
	else
	{	
		return false;
	}
}

function is_notempty($str)
{
	if($str=="")
	{
		return false;
	}
	else
	{	
		return true;
	}
}


function is_email($email) 
{ 
    $email = htmlspecialchars(stripslashes(strip_tags($email))); //parse unnecessary characters to prevent exploits
    
    if ( eregi ( '[a-z||0-9]@[a-z||0-9].[a-z]', $email ) ) 
	{
		return true;
    
    } 
	else 
	{
        return false; //if email address is an invalid format return false
    }
} 

function send_email($to,$subject,$body)
{

	$message='<table width="862" border="1" cellpadding="0" cellspacing="0" bordercolor="#155872">
  <tr>
    <td><img src="http://www.thelakshyafoundation.org/students/images_kohana/Header1.jpg" width="862" height="149"></td>
  </tr>
  <tr>
    <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif; color:#996633; font-size:14px">';
	$message=$message.$body;
	$message=$message.'</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#155872" style="font:Verdana, Arial, Helvetica, sans-serif; color:#996633; font-size:10px"><span class="style2"><br/>
      The Lakshya Foundation is a Registered Trust<br/>
      <a href="http://www.thelakshyafoundation.org/sitemap">Sitemap</a> | <a href="mailto:info@thelakshyafoundation.org">Contact Us</a> | <a href="http://www.nitw.ac.in">NIT Warangal<br/>
      </a></span></td>
  </tr>
</table>';
	mail($to,$subject,$message, "From: LakshyaTeam@thelakshyafoundation.org\nContent-Type: text/html; charset=iso-8859-1");
}

function printmonth($month)
{

	switch($month)
	{
		case 1:
			return JAN;
			break;
		case 2:
			return FEB;
			break;
		case 3:
			return MAR;
			break;
		case 4:
			return APR;
			break;
		case 5:
			return MAY;
			break;
		case 6:
			return JUN;
			break;
		case 7:
			return JUL;
			break;
		case 8:
			return AUG;
			break;
		case 9:
			return SEP;
			break;
		case 10:
			return OCT;
			break;
		case 11:
			return NOV;
			break;
		case 12:
			return DEC;
			break;
		
		
	}
}

function calculate_complete($uid)
{
	 $per=0;
	 $sql="select * from lakshya_student_ps_details where uid='{$uid}'";
	 $result=mysql_query($sql);
	 $row=mysql_fetch_array($result);
	 $rem="";
	 
	 if($row['fname']!="")
	 {
	 	$per=$per+4;		
	 }
	 else
	 {
	 	$rem=$rem."First Name"."<br/>";
	 }
	 if($row['lname']!="")
	 {
	 	$per=$per+4;		
	 }
	 else
	 {
	 	$rem=$rem."Last Name"."<br/>";
	 }
	 if($row['dob']!="0000-00-00")
	 {
	 	$per=$per+4;		
	 }
	 else
	 {
	 	$rem=$rem."Date of Birth"."<br/>";
	 }
	 if($row['sex']!="")
	 {
	 	$per=$per+4;		
	 }
	 else
	 {
	 	$rem=$rem."Sex"."<br/>";
	 }
	 if($row['rollno']!="")
	 {
	 	$per=$per+4;		
	 }
	 else
	 {
	 	$rem=$rem."Roll No"."<br/>";
	 }
	 if($row['branch']!="")
	 {
	 	$per=$per+4;		
	 }
	 else
	 {
	 	$rem=$rem."Branch"."<br/>";
	 }
	 if($row['batch']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Batch"."<br/>";
	 }
	 
	 $sql="select * from lakshya_student_ct_details where uid='{$uid}'";
	 $result=mysql_query($sql);
	 $row=mysql_fetch_array($result);
	 
	 if($row['hroomno']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Hostel Room No"."<br/>";
	 }
	 if($row['hblock']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Hostel Block"."<br/>";
	 }
	 if($row['paddress']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Permanant Address"."<br/>";
	 }
	 if($row['pcode']!="0")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Pin Code"."<br/>";
	 }
	 if($row['district']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."District"."<br/>";
	 }
	 if($row['state']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."State"."<br/>";
	 }
	 if($row['cno']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Contact No"."<br/>";
	 }
	 if($row['pcno']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Parents/Guardian Contact No"."<br/>";
	 }
	 
	 $sql="select * from lakshya_student_at_details where uid='{$uid}'";
	 $result=mysql_query($sql);
	 $row=mysql_fetch_array($result);
	 
	 if($row['vehicles']!="0-0")
	 {
	 	$per=$per+2;
	 }
	 else
	 {
	 	$rem=$rem."Asset Details -Vehicles"."<br/>";
	 }
	 if($row['happs']!="0-0-0")
	 {
	 	$per=$per+2;
	 }
	 else
	 {
	 	$rem=$rem."Asset Details - House Appliances"."<br/>";
	 }
	 if($row['hownership']!="")
	 {
	 	$per=$per+2;
	 }
	 else
	 {
	 	$rem=$rem."House Ownership"."<br/>";
	 }
	 if($row['htype']!="")
	 {
	 	$per=$per+2;
	 }
	 else
	 {
	 	$rem=$rem."House Type"."<br/>";
	 }
	 if($row['agland']!="")
	 {
	 	$per=$per+2;
	 }
	 else
	 {
	 	$rem=$rem."Agriculture Land"."<br/>";
	 }
	 if($row['otassets']!="")
	 {
	 	$per=$per+2;
	 }
	 else
	 {
	 	$rem=$rem."Other Assets"."<br/>";
	 }
	 
	 $sql="select * from lakshya_student_ot_details where uid='{$uid}'";
	 $result=mysql_query($sql);
	 $row=mysql_fetch_array($result);
	 
	 if($row['tillnow']!="")
	 {
	 	$per=$per+2;
	 }
	 else
	 {
	 	$rem=$rem."Other Information - Till Now how did you manage"."<br/>";
	 }
	 if($row['after']!="")
	 {
	 	$per=$per+2;
	 }
	 else
	 {
	 	$rem=$rem."Other Information - What will you do if not supported by Lakshya"."<br/>";
	 }
	 
	 $sql="select * from lakshya_student_ed_details where uid='{$uid}'";
	 $result=mysql_query($sql);
	 $row=mysql_fetch_array($result);
	 
	 if($row['ssc_marks']!="0")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."SSC Details"."<br/>";
	 }
	 if($row['int_marks']!="0")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Intermediate Details"."<br/>";
	 }
	 if($row['air']!="0")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."All India Rank"."<br/>";
	 }
	 
	 $sql="select * from lakshya_student_fs_details where uid='{$uid}'";
	 $result=mysql_query($sql);
	 $row=mysql_fetch_array($result);
	 
	 if($row['fmdet']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Family Details"."<br/>";
	 }
	 if($row['scdet']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Scholorship Details"."<br/>";
	 }
	 if($row['exdet']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Other Exam Details"."<br/>";
	 }
	 
	 return $per;
}

function calculate_remaining($uid)
{
	 $per=0;
	 $sql="select * from lakshya_student_ps_details where uid='{$uid}'";
	 $result=mysql_query($sql);
	 $row=mysql_fetch_array($result);
	 $rem="";
	 
	 if($row['fname']!="")
	 {
	 	$per=$per+4;		
	 }
	 else
	 {
	 	$rem=$rem."First Name"."<br/>";
	 }
	 if($row['lname']!="")
	 {
	 	$per=$per+4;		
	 }
	 else
	 {
	 	$rem=$rem."Last Name"."<br/>";
	 }
	 if($row['dob']!="0000-00-00")
	 {
	 	$per=$per+4;		
	 }
	 else
	 {
	 	$rem=$rem."Date of Birth"."<br/>";
	 }
	 if($row['sex']!="")
	 {
	 	$per=$per+4;		
	 }
	 else
	 {
	 	$rem=$rem."Sex"."<br/>";
	 }
	 if($row['rollno']!="")
	 {
	 	$per=$per+4;		
	 }
	 else
	 {
	 	$rem=$rem."Roll No"."<br/>";
	 }
	 if($row['branch']!="")
	 {
	 	$per=$per+4;		
	 }
	 else
	 {
	 	$rem=$rem."Branch"."<br/>";
	 }
	 if($row['batch']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Batch"."<br/>";
	 }
	 
	 $sql="select * from lakshya_student_ct_details where uid='{$uid}'";
	 $result=mysql_query($sql);
	 $row=mysql_fetch_array($result);
	 
	 if($row['hroomno']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Hostel Room No"."<br/>";
	 }
	 if($row['hblock']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Hostel Block"."<br/>";
	 }
	 if($row['paddress']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Permanant Address"."<br/>";
	 }
	 if($row['pcode']!="0")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Pin Code"."<br/>";
	 }
	 if($row['district']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."District"."<br/>";
	 }
	 if($row['state']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."State"."<br/>";
	 }
	 if($row['cno']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Contact No"."<br/>";
	 }
	 if($row['pcno']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Parents/Guardian Contact No"."<br/>";
	 }
	 
	 $sql="select * from lakshya_student_at_details where uid='{$uid}'";
	 $result=mysql_query($sql);
	 $row=mysql_fetch_array($result);
	 
	 if($row['vehicles']!="0-0")
	 {
	 	$per=$per+2;
	 }
	 else
	 {
	 	$rem=$rem."Asset Details -Vehicles"."<br/>";
	 }
	 if($row['happs']!="0-0-0")
	 {
	 	$per=$per+2;
	 }
	 else
	 {
	 	$rem=$rem."Asset Details - House Appliances"."<br/>";
	 }
	 if($row['hownership']!="")
	 {
	 	$per=$per+2;
	 }
	 else
	 {
	 	$rem=$rem."House Ownership"."<br/>";
	 }
	 if($row['htype']!="")
	 {
	 	$per=$per+2;
	 }
	 else
	 {
	 	$rem=$rem."House Type"."<br/>";
	 }
	 if($row['agland']!="")
	 {
	 	$per=$per+2;
	 }
	 else
	 {
	 	$rem=$rem."Agriculture Land"."<br/>";
	 }
	 if($row['otassets']!="")
	 {
	 	$per=$per+2;
	 }
	 else
	 {
	 	$rem=$rem."Other Assets"."<br/>";
	 }
	 
	 $sql="select * from lakshya_student_ot_details where uid='{$uid}'";
	 $result=mysql_query($sql);
	 $row=mysql_fetch_array($result);
	 
	 if($row['tillnow']!="")
	 {
	 	$per=$per+2;
	 }
	 else
	 {
	 	$rem=$rem."Other Information - Till Now how did you manage"."<br/>";
	 }
	 if($row['after']!="")
	 {
	 	$per=$per+2;
	 }
	 else
	 {
	 	$rem=$rem."Other Information - What will you do if not supported by Lakshya"."<br/>";
	 }
	 
	 $sql="select * from lakshya_student_ed_details where uid='{$uid}'";
	 $result=mysql_query($sql);
	 $row=mysql_fetch_array($result);
	 
	 if($row['ssc_marks']!="0")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."SSC Details"."<br/>";
	 }
	 if($row['int_marks']!="0")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Intermediate Details"."<br/>";
	 }
	 if($row['air']!="0")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."All India Rank"."<br/>";
	 }
	 
	 $sql="select * from lakshya_student_fs_details where uid='{$uid}'";
	 $result=mysql_query($sql);
	 $row=mysql_fetch_array($result);
	 
	 if($row['fmdet']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Family Details"."<br/>";
	 }
	 if($row['scdet']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Scholorship Details"."<br/>";
	 }
	 if($row['exdet']!="")
	 {
	 	$per=$per+4;
	 }
	 else
	 {
	 	$rem=$rem."Other Exam Details"."<br/>";
	 }
	 
	 if($rem=="")
	 {
	 	$rem="None";
	 }
	 
	 return $rem;
}

function is_allowed($uid)
{
	 $sql="select * from lakshya_student_logins where uid='{$uid}'";
	 $result=mysql_query($sql);
	 $row=mysql_fetch_array($result);
	 if($row['curstatus']==0)
	 {
	 	return true;
	 }
	 else
	 {
	 	return false;
	 }
}
?>