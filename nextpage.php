<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>test2</title>
</head>
<body>
	<form method="post">
		<tr>
			<td>
				<label> Enter ID </label>
			</td>
			<td><input type="text" name="idnum"></td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="input" value="input">
			</td>
		</tr>

	</form>

	<form action="display.php" method="post">
	<label>Enter password</label>
	<input type="text" name="check">
	<input type="submit" name="submit" value="check password">
</form>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST ['input'])){
	$check = $_POST['idnum'];
	if(is_null($check)){
$idnum = $_POST['idnum'];
$sql = "SELECT * FROM user_data WHERE id = $idnum";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {

    	while($row = mysqli_fetch_assoc($result)) {
        echo "<br> id: ". $row["id"]. " - Name: ". $row["name"]. " | Password " . $row["password"] ." | Email " . $row["email"] . "<br>";
    }
	} else {
   	 	echo "0 results";
	}

	$conn->close();
}
	}
	else{
		echo "no input";
	}
	
?>

</body>
</html>