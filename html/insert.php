<html>
<head>
        <title>Insertion/Update</title>
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
//Final Project - B-Team Insert PHP

if(strlen($_GET["ID"]) != 12 || strlen($_GET["Name"]) == 0 || strlen($_GET["Name"]) > 32 || strlen($_GET["Quantity"]) == 0){ echo "<h2>Bad Input</h2>";}
else{ 
include 'connect.php';
echo "<h1>Record Insertion/Update</h1><br>";
$sql = "SELECT *  FROM items WHERE code='".$_GET["ID"]."'";
$sql2 = "INSERT INTO items (code, name, quantity) VALUES ('".$_GET["ID"]."', '".$_GET["Name"]."', '".$_GET["Quantity"]."')";
$sql3 = "UPDATE items SET name='".$_GET["Name"]."', quantity='".$_GET["Quantity"]."' WHERE code='".$_GET["ID"]."'";
$result = $conn->query($sql);
if($result->num_rows > 0){
        if ($conn->query($sql3) === TRUE) {
                echo "<h2>Record updated successfully</h2><br>";
        }
        else {
                echo "ERROR UPDATING RECORD: ".$conn->error;
        }
}
else{
        if ($conn->query($sql2) === TRUE) {
                echo "<h2>New record created successfully</h2><br>";
        }
        else {
                echo "Error: " . $sql2 . "<br>" . $conn->error;
        }

}
}
?>
<br>
<form action="insert.html">
    <input type="submit" value="Back to Insert" />
</form>
<form action="index.html">
    <input type="submit" value="Back to Home" />
</form>
</body>
</html>
