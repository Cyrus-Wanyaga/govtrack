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

    $sql = "UPDATE profiles SET firstname = '$firstname', secondname = '$secondname', bio = '$bio', wikipedia = '$wikipedia' WHERE profileID=$profileID";

    if ($conn->query($sql) === TRUE) {
        echo "Record Updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>