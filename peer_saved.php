<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "request_form";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: Print the POST array
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    
    // Check if total_score is set in $_POST
    if (!isset($_POST['total_score']) || $_POST['total_score'] === '') {
        die("Total score is not set.");
    }

    // Escape and fetch other POST variables
    $employee = $conn->real_escape_string($_POST['employee']);
    $position = $conn->real_escape_string($_POST['position']);
    $assignment = $conn->real_escape_string($_POST['assignment']);
    $contract = $conn->real_escape_string($_POST['contract']);
    $comments = $conn->real_escape_string($_POST['comments']);
    $assessed_by = $conn->real_escape_string($_POST['assessed_by']);
    $date = !empty($_POST['date']) ? $conn->real_escape_string($_POST['date']) : date('Y-m-d'); // Default to current date if not provided
    $total_score = intval($_POST['total_score']);

    // Prepare SQL query
    $stmt = $conn->prepare("INSERT INTO peer (employee_name, position, place_of_assignment, contract_period, comments, assessed_by, date, total_score) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Failed to prepare statement: " . $conn->error);
    }
    $stmt->bind_param("sssssssi", $employee, $position, $assignment, $contract, $comments, $assessed_by, $date, $total_score);
    
    // Execute SQL query
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>
