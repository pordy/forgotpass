<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="testdb";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}

if(isset($_POST['save']))
{	
	 $name = $_POST['name'];
	 $password = $_POST['password'];
	 $email = $_POST['email'];

	 $sql_query = "INSERT INTO user_data (name,password,email)
	 VALUES ('$name','$password','$email')";

	 if (mysqli_query($conn, $sql_query)) 
	 {
		echo "New Details Entry inserted successfully !";
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}