<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit'])){
	$check = $_POST['check'];
$sql = "SELECT password FROM user_data";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {

    	while($row = mysqli_fetch_assoc($result)){
        if ($row["password"]==$check){
        	echo "password is correct";
        }
        else{
        	echo "password is not correct";
        }
    }
    
	} else {
   	 	echo "0 results";
	}

	$conn->close();
}
?>