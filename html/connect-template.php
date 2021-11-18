<?php
//Final Project Connect.php template
echo("Debug Connection File. You should probably not be here.");
$servername = "";
$username   = "";
$password   = "";
$dbname     = "";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
        die("connection failed: ". $conn->connect_error);
}
echo "<h3>Connection was successful</h3> <br>";
$sql = "SELECT code,name,quantity FROM items";
$result = $conn->query($sql);
if($result->num_rows > 0){
        echo "Data?! WOW";

}else{
        echo "Nothing here :(";
}

?>

