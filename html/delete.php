<html>
<head>
        <title>Delete</title>
        <link href="style.css" rel="stylesheet">
</head>
<body>
  <div id="header">
    <nav>
    <a href="index.html">Home</a> |
    <a href="insert.html">Insert</a> |
    <a href="delete.html">Delete</a> |
    <a href="select.php">Display</a> |
    <a href="about.html">About</a>
    </nav>

  </div>

<div id="main">
<br>
<?php
//Final Project - B-Team Delete PHP
if(strlen($_GET["ID"]) != 12){echo "<h2>Bad Input</h2>";}
else{
include 'connect.php';
$sql = "SELECT *  FROM items WHERE code='".$_GET["ID"]."'";
$sql2 = "DELETE FROM items WHERE code='".$_GET["ID"]."'";

$result = $conn->query($sql);
if($result->num_rows > 0){
	if($conn->query($sql2) === TRUE){
        	echo "<h2>Record Successfully Deleted</h2><br>";
	}	
	else{
        	echo "ERROR DELETING RECORD: " . $conn->error;
	}
}
else{
	echo "<h2>No record matches ID: ".$_GET["ID"]."</h2><br>";
}
}
?>
<form action="delete.html">
    <input type="submit" value="Back to Delete" />
</form>
<form action="index.html">
	<input type="submit" value="Back to Home" />
</form>

