<?php
$conn = new mysqli("localhost", "root", "", "vms");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = $_POST['query'] ?? '';

$sql = "SELECT Driver_name AS driver_name, Driver_Id AS driver_id FROM driver_list 
        WHERE Driver_name LIKE CONCAT('%', ?, '%') LIMIT 10"; 

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $search);
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