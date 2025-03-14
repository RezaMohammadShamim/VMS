<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "vms");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search input from user
$search = isset($_GET['q']) ? trim($_GET['q']) : '';

if (!empty($search)) {
    // Fetch mechanics whose names match the search input
    $sql = "SELECT multiple_mechanic FROM employee_list 
            WHERE multiple_mechanic LIKE CONCAT('%', ?, '%') 
            ORDER BY LOCATE(?, multiple_mechanic) ASC, multiple_mechanic ASC 
            LIMIT 10";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();

    $mechanics = [];
    while ($row = $result->fetch_assoc()) {
        $mechanics[] = $row['multiple_mechanic']; // Fetch only mechanic names
    }

    $stmt->close();
    echo json_encode($mechanics);
} else {
    echo json_encode([]); // Return empty array if no input
}

$conn->close();
?>
