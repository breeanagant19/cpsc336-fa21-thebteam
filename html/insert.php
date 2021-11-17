<html>
<head>
        <title>Insertion/Update</title>
        <link href="style.css" rel="stylesheet">
</head>
<body>
<div id="main">
<br>
<?php
//Final Project - B-Team Insert PHP
$servername = "192.168.0.2";
$username   = "dev";
$password   = "password";
$dbname     = "devDB";


$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
        die("connection failed: ". $conn->connect_error);
}
echo "Successful Retrieval Effort<br>";
$sql = "SELECT *  FROM items WHERE code='".$_GET["ID"]."'";
$sql2 = "INSERT INTO items (code, name, quantity) VALUES ('".$_GET["ID"]."', '".$_GET["Name"]."', '".$_GET["Quantity"]."')";
$sql3 = "UPDATE items SET name='".$_GET["Name"]."', quantity='".$_GET["Quantity"]."' WHERE code='".$_GET["ID"]."'";
$result = $conn->query($sql);
if($result->num_rows > 0){
        if ($conn->query($sql3) === TRUE) {
                echo "<h2>Record updated successfully</h2>";
        }
        else {
                echo "ERROR UPDATING RECORD: ".$conn->error;
        }
}
else{
        if ($conn->query($sql2) === TRUE) {
                echo "New record created successfully<br>";
        }
        else {
                echo "Error: " . $sql2 . "<br>" . $conn->error;
        }

}

?>
<form action="insert.html">
    <input type="submit" value="Back to Insert" />
</form>
<form action="index.html">
    <input type="submit" value="Back to Home" />
</form>
</body>
</html>
