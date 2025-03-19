<?php
class VMS {
    private $conn;

    public function __construct() {
        $this->connectDB();
    }

    private function connectDB() {
        $this->conn = new mysqli("localhost", "root", "", "vms");

        if ($this->conn->connect_error) {
            die("Database Connection Error: " . $this->conn->connect_error);
        }
    }
    public function getConnection() {
        return $this->conn;
    }
    

    public function indoor_job() {
        // Retrieve POST data safely
        $job_date = $_POST['date'] ?? '';
        $autoNumber = $_POST['autoNumber'] ?? '';
        $branch_name = $_POST['branch_name'] ?? '';
        $vehicle_reg = $_POST['vehicle_reg'] ?? '';
        $model = $_POST['model'] ?? '';
        $driver_name = $_POST['driver_name'] ?? '';
        $driver_id = $_POST['driver_id'] ?? '';
        $driver_complain = $_POST['driver_complain'] ?? '';
        $completed_req = 3;

        // Debug: Log incoming mechanics data instead of echoing
        if (isset($_POST['multiple_mechanic'])) {
            error_log("Mechanics Selected: " . print_r($_POST['multiple_mechanic'], true));
        }

        // Ensure mechanics_data is an array before using implode()
        $mechanics_data = isset($_POST['multiple_mechanic']) && is_array($_POST['multiple_mechanic'])
            ? implode(", ", array_map('trim', $_POST['multiple_mechanic']))
            : '';

        // SQL Query with Prepared Statements
        $query = "INSERT INTO indoor_job 
                  (job_date, vehicle_reg, model, branch_name, driver_complain, driver_name, driver_id, mechanics_data, job_no, completed_req) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            error_log("Error preparing statement: " . $this->conn->error);
            return "Database Error: Unable to prepare statement.";
        }

        // Bind parameters
        $stmt->bind_param("sssssssssi", $job_date, $vehicle_reg, $model, $branch_name, $driver_complain, $driver_name, $driver_id, $mechanics_data, $autoNumber, $completed_req);

        // Execute and return result
        if (!$stmt->execute()) {
            error_log("Error executing query: " . $stmt->error);
            return "Database Error: Unable to execute query.";
        }

        // Close statement and return success message
        $stmt->close();
        return "Indoor Job Saved Successfully";
    }

    public function __destruct() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>
