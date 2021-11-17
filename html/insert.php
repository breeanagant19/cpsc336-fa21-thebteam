<?php
//Final Project B-Team Connection Sandbox Test
$servername = "192.168.0.2";
$username   = "dev";
$password   = "password";
$dbname     = "devDB";


$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
        die("connection failed: ". $conn->connect_error);
}
echo "<h3>Successful Retrieval Effort</h3><br>";
$sql = "SELECT *  FROM items WHERE code='".$_GET["ID"]."'";
$sql2 = "INSERT INTO items (code, name, quantity) VALUES ('".$_GET["ID"]."', '".$_GET["Name"]."', '".$_GET["Quantity"]."')";
$sql3 = "UPDATE items SET name='".$_GET["Name"]."', quantity='".$_GET["Quantity"]."' WHERE code='".$_GET["ID"]."'";
$result = $conn->query($sql);
if($result->num_rows > 0){
        if ($conn->query($sql3) === TRUE) {
		echo "Record updated successfully";
	}
	else {
		echo "ERROR UPDATING RECORD: ".$conn->error;
	}
}
else{
	if ($conn->query($sql2) === TRUE) {
		echo "New record created successfully";
	}
	else {
		echo "Error: " . $sql2 . "<br>" . $conn->error;
	}

}

?>

<br><br>
<form action="insert.html">
    <input type="submit" value="Back to Insert" />
</form>
<form action="index.html">
    <input type="submit" value="Back to Home" />
</form>
