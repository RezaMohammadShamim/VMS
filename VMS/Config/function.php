<?php
// Database Connection
$conn = new mysqli("localhost", "root", "", "vms");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['query'])) {
    $search = $conn->real_escape_string($_POST['query']);
    
    // Query to fetch matching vehicle registrations
    $sql = "SELECT Registration FROM vehicle_list WHERE Registration LIKE '%$search%' LIMIT 5";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='suggestion-item'>" . $row['Registration'] . "</div>";
        }
    } else {
        echo "<div class='suggestion-item'>No match found</div>";
    }
}

$conn->close();
?>
