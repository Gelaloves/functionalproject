<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "request_form";

// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if POST request method is used
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if total_score is set in $_POST
    if (!isset($_POST['total_score'])) {
        die("Total score is not set.");
    }

    // Escape and fetch POST variables
    $employee = $conn->real_escape_string($_POST['employee']);
    $position = $conn->real_escape_string($_POST['position']);
    $assignment = $conn->real_escape_string($_POST['assignment']);
    $contract = $conn->real_escape_string($_POST['contract']);
    $comments = $conn->real_escape_string($_POST['comments']);
    $recommendation = isset($_POST['recommendation']) ? $conn->real_escape_string($_POST['recommendation']) : '';
    $assessed_by = $conn->real_escape_string($_POST['assessed_by']);
    $date = !empty($_POST['date']) ? $conn->real_escape_string($_POST['date']) : NULL;
    $total_score = intval($_POST['total_score']);

    if ($date !== NULL && !DateTime::createFromFormat('Y-m-d', $date)) {
        die("Invalid date format. Please use YYYY-MM-DD.");
    }

    $form_type = $_POST['form_type'];

    // Prepare and execute SQL query based on form type
    switch ($form_type) {
        case 'supervisor':
            $sql = "INSERT INTO supervisor (employee_name, position, place_of_assignment, contract_period, comments, recommendation, assessed_by, date, total_score)
                    VALUES ('$employee', '$position', '$assignment', '$contract', '$comments', '$recommendation', '$assessed_by', " . ($date !== NULL ? "'$date'" : "NULL") . ", $total_score)";
            break;
        // case 'peer':
        //     $sql = "INSERT INTO peer (employee_name, position, place_of_assignment, contract_period, comments, assessed_by, date, total_score)
        //             VALUES ('$employee', '$position', '$assignment', '$contract', '$comments', '$assessed_by', " . ($date !== NULL ? "'$date'" : "NULL") . ", $total_score)";
        //     break;
        case 'human_resource':
            $sql = "INSERT INTO human_resource (employee_name, position, place_of_assignment, contract_period, comments, recommendation, assessed_by, date, total_score)
                    VALUES ('$employee', '$position', '$assignment', '$contract', '$comments', '$recommendation', '$assessed_by', " . ($date !== NULL ? "'$date'" : "NULL") . ", $total_score)";
            break;
        case 'campus_director':
            $sql = "INSERT INTO campus_director (employee_name, position, place_of_assignment, contract_period, comments, recommendation, assessed_by, date, total_score)
                    VALUES ('$employee', '$position', '$assignment', '$contract', '$comments', '$recommendation', '$assessed_by', " . ($date !== NULL ? "'$date'" : "NULL") . ", $total_score)";
            break;
        default:
            die("Invalid form type.");
    }

    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
