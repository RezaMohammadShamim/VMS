<?php
$conn = new mysqli("localhost", "root", "", "vms");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = isset($_GET['q']) ? $_GET['q'] : '';

$sql = "SELECT Employee_name, Id_no FROM employee_list WHERE Employee_name LIKE '%$search%' OR Id_no LIKE '%$search%'";
$result = $conn->query($sql);

$employees = [];

while ($row = $result->fetch_assoc()) {
    $employees[] = [
        "id" => $row['Id_no'],
        "text" => $row['Employee_name'] . " (" . $row['Id_no'] . ")"
    ];
}

echo json_encode($employees);
?>
