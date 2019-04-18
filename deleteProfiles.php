<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "govtrack";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$profileID = $_POST['profileID'];

$sql = "DELETE FROM profiles WHERE profileID = $profileID";

if ($conn->query($sql) === TRUE) {
    echo "Record Deleted Successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>