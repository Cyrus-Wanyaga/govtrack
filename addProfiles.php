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
$firstname = $_POST['firstname'];
$secondname = $_POST['secondname'];
$bio = $_POST['bio'];
$wikipedia = $_POST['wikipedia'];
$picture = $_POST['picture'];

$sql = "INSERT INTO profiles (profileID, firstname, secondname, bio, wikipedia, picture)
VALUES ('$profileID', '$firstname', '$secondname', '$bio', '$wikipedia', '$picture')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>