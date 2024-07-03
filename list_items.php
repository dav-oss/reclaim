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

$sql = "SELECT id, name, description, image FROM items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="item">';
        echo '<h3>' . $row["name"] . '</h3>';
        echo '<p>' . $row["description"] . '</p>';
        echo '<img src="' . $row["image"] . '" alt="' . $row["name"] . '">';
        echo '<p><strong>Item ID:</strong> ' . $row["id"] . '</p>';
        echo '</div>';
    }
} else {
    echo "0 results";
}

$conn->close();
?>
