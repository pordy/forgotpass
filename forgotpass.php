<?php
require "conn.php";

if(isset($_POST['forgot'])){
$username =$_POST["username"];
$newpassword = $_POST["newpass"];

$query = "SELECT * FROM users WHERE Username='$username'";
$result = mysqli_query($con,$query);
$count = mysqli_num_rows($result);

if($count==1){
		$query="UPDATE users SET Password='$newpassword' WHERE Username='$username'";
		mysqli_query($con,$query);
		echo ("<script>alert('Password changed.')</script>");
		header("refresh: 0; url=login.php");
	}
	else{
		echo ("<script>alert('Update failed.')</script>");
		header("refresh: 0; url=forgotpas.php");
	}
	mysqli_close($con);
}
?>