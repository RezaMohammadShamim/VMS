<?php
$conn = new mysqli("localhost", "root", "", "vms");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = $_POST['query'] ?? '';

$sql = "SELECT Driver_name AS driver_name, Driver_Id AS driver_id 
        FROM driver_list 
        WHERE Driver_Id LIKE ? LIMIT 10";

$stmt = $conn->prepare($sql);
$searchTerm = "%{$search}%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$stmt->close();
$conn->close();

echo json_encode($data);
?>