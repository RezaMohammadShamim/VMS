<?php
$conn = new mysqli("localhost", "root", "", "vms");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = $_POST['query'];

$sql = "SELECT Registration AS registration_no, Model AS model FROM vehicle_list 
        WHERE Registration LIKE '%$search%'";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>