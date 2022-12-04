<?php
require "conn.php";
session_start();

if(isset($_POST['email'])){
	$username = $_POST["username"];
	
	$query = "SELECT * FROM users WHERE Username='$username'";

	$result = mysqli_query($con,$query);
	$count = mysqli_num_rows($result);

	if($count==1){
		$output = mysqli_fetch_assoc($result);
		$tenant_id = $output['account_id'];

		$opentable = "SELECT * FROM tenant WHERE Tenant_ID = '$tenant_id'";
		$getdata = mysqli_query($con,$opentable);
		$getemail = mysqli_fetch_assoc($getdata);
		$tenantemail = $getemail['Email'];
		$_SESSION['tenantemail'] = $tenantemail;
		$_SESSION['tenantcode'] = $code = rand(1000,9999);
		if (mail($tenantemail,'Here is your account code',$code)){
			echo ("<script>alert('Mail is sent successfully')</script>");
			header("refresh: 0; url = checkcode.php");
		}
		else{
			echo ("<script>alert('Mail is not sent successfully')</script>");
			header("refresh: 0; url = sendmail.php");
		}

	}
	mysqli_close($con);
}
?>