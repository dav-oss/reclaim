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

$item_name = $_POST['item_name'];
$item_desc = $_POST['item_desc'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["item_image"]["name"]);

if (move_uploaded_file($_FILES["item_image"]["tmp_name"], $target_file)) {
    $sql = "INSERT INTO items (name, description, image) VALUES ('$item_name', '$item_desc', '$target_file')";
    if ($conn->query($sql) === TRUE) {
        echo "Item uploaded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}

$conn->close();
?>
