<?php
$con = mysqli_connect("localhost","root","");
if(!mysqli_select_db($con,"ent_apartment"))
{
	die("Connection error");
}
?>