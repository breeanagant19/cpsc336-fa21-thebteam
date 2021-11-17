<html>
<head>
        <title>Display</title>
        <link href="style.css" rel="stylesheet">
	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}
	</style>
</head>
<body>
<div id="main">
<h1>Item Records in the Database</h1><br>
<h2><i>Work in progress</i></h2>
<br>
<table>
	<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Quantity</th>
	</tr>
<?php
//Final Project Select.php Template - The B-Team
$servername = "192.168.0.2";
$username   = "dev";
$password   = "password";
$dbname     = "devDB";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
        die("connection failed: ". $conn->connect_error);
}
//echo "<h3>Connection was successful</h3> <br>";
$sql = "SELECT code,name,quantity FROM items";
$result = $conn->query($sql);
if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
               // echo "ID: ".$row["code"]." NAME: ".$row["name"]." QUANTITY: ".$row["quantity"]."<br>";
		//echo "".$row["code"]."<br>".$row["name"]." - ".$row["quantity"]."<br><br>";
		echo "<tr>";
		echo "<td>".$row["code"]."</td>";
		echo "<td>".$row["name"]."</td>";
		echo "<td>".$row["quantity"]."</td>";
		echo "</tr>";
}
}else{
        echo "Nothing here :(";
}

?>
</table>
<br>
<form action="index.html">
        <input type="submit" value="Back to Home" />
</form>

