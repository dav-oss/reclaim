<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reclaim";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$item_id = $_POST['item_id'];
$claimant_name = $_POST['claimant_name'];
$claimant_id = $_POST['claimant_id'];
$contact_info = $_POST['contact_info'];

$sql = "INSERT INTO claims (item_id, claimant_name, claimant_id, contact_info) VALUES ('$item_id', '$claimant_name', '$claimant_id', '$contact_info')";

if ($conn->query($sql) === TRUE) {
    echo "Claim submitted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
