<SCRIPT LANGUAGE="JavaScript">
window.onload = submitForm;
function submitForm(){
document.myForm.submit(); 
}
</SCRIPT>
<h1>Redirecting...</h1>
<?php
	require("libfuncs.php3");
	$Merchant_Id = "M_thelaksh_10884" ;//This id(also User Id)  available at "Generate Working Key" of "Settings & Options" 
	$Order_Id = $id;//your script should substitute the order description in the quotes provided here
	$Redirect_Url = "http://www.TheLakshyaFoundation.org" ;//your redirect URL where your customer will be redirected after authorisation from CCAvenue
	$WorkingKey = "95o6bpj72771v3yo7s"  ;//put in the 32 bit alphanumeric key in the quotes provided here.Please note that get this key ,login to your CCAvenue merchant account and visit the "Generate Working Key" section at the "Settings & Options" page. 
	$Checksum = getCheckSum($Merchant_Id,$Amount,$Order_Id ,$Redirect_Url,$WorkingKey);
	$billing_cust_name=$name;
	$billing_cust_address=preg_replace("/'/","",$addr);
	$billing_cust_state=$province;
	$billing_cust_country=$country;
	$billing_cust_tel=$mobile;
	$billing_cust_email=$email;
	$delivery_cust_name=$name;
	$delivery_cust_address=preg_replace("/'/","",$addr);
	$delivery_cust_state=$province;
	$delivery_cust_country=$country;
	$delivery_cust_tel=$mobile;
	$delivery_cust_notes="";
	$Merchant_Param="" ;
	$billing_city =$city;
	$billing_zip =$zipcode;
	$delivery_city=$city;
	$delivery_zip=$zipcode;
?>
	<form name="myForm" method="post" action="https://www.ccavenue.com/shopzone/cc_details.jsp">
	<input  type=hidden name=Merchant_Id value="<?php echo $Merchant_Id; ?>">
	<input  type=hidden name=Amount value="<?php echo $Amount; ?>">
	<input  type=hidden name=Order_Id value="<?php echo $Order_Id; ?>">
	<input  type=hidden name=Redirect_Url value="<?php echo $Redirect_Url; ?>">
	<input  type=hidden name=Checksum value="<?php echo $Checksum; ?>">
	<input  type=hidden name="billing_cust_name" value="<?php echo $billing_cust_name; ?>"> 
	<input  type=hidden name="billing_cust_address" value="<?=$billing_cust_address?>"> 
	<input  type=hidden name="billing_cust_country" value="<?php echo $billing_cust_country; ?>"> 
	<input  type=hidden name="billing_cust_state" value="<?php echo $billing_cust_state; ?>"> 
	<input  type=hidden name="billing_zip" value="<?php echo $billing_zip; ?>"> 
	<input  type=hidden name="billing_cust_tel" value="<?php echo $billing_cust_tel; ?>"> 
	<input  type=hidden name="billing_cust_email" value="<?php echo $billing_cust_email; ?>"> 
	<input  type=hidden name="delivery_cust_name" value="<?php echo $delivery_cust_name; ?>"> 
	<input  type=hidden name="delivery_cust_address" value="<?php echo $delivery_cust_address; ?>"> 
	<input  type=hidden name="delivery_cust_country" value="<?php echo $delivery_cust_country; ?>"> 
	<input  type=hidden name="delivery_cust_state" value="<?php echo $delivery_cust_state; ?>"> 
	<input  type=hidden name="delivery_cust_tel" value="<?php echo $delivery_cust_tel; ?>"> 
	<input  type=hidden name="delivery_cust_notes" value="<?php echo $delivery_cust_notes; ?>"> 
	<input  type=hidden name="Merchant_Param" value="<?php echo $Merchant_Param; ?>"> 
	<input  type=hidden name="billing_cust_city" value="<?php echo $billing_city; ?>"> 
	<input  type=hidden name="billing_zip_code" value="<?php echo $billing_zip; ?>"> 
	<input  type=hidden name="delivery_cust_city" value="<?php echo $delivery_city; ?>"> 
	<input  type=hidden name="delivery_zip_code" value="<?php echo $delivery_zip; ?>"> 
	</form>