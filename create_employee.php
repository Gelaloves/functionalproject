<!-- create_employee.php -->

<?php
session_start();
require_once('DBConnection.php');

// Redirect to login if admin_id is not set
if (!isset($_SESSION['admin_id'])) {
    header("Location: ./login.php");
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $position = $_POST['position'];
    $place_of_assignment = $_POST['place_of_assignment'];

    // Validate inputs (you should add validation logic here)

    // Insert into database
    $database = new DBConnection();
    $conn = $database->db_connect();
    $stmt = $conn->prepare("INSERT INTO employee_list (fullname, position, place_of_assignment) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $position, $place_of_assignment);
    
    if ($stmt->execute()) {
        $_SESSION['flashdata'] = array(
            'type' => 'success',
            'msg' => 'New admin added successfully.'
        );
        header("Location: ./manage_admin.php"); // Redirect to manage admin page after successful addition
        exit;
    } else {
        $_SESSION['flashdata'] = array(
            'type' => 'danger',
            'msg' => 'Error adding new admin.'
        );
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Employee</title>
    <!-- Include your CSS styles -->
</head>
<body>
    <h2>Create New Employee</h2>

    <?php if (isset($_SESSION['flashdata'])): ?>
        <div class="alert alert-<?php echo $_SESSION['flashdata']['type']; ?>">
            <?php echo $_SESSION['flashdata']['msg']; ?>
        </div>
        <?php unset($_SESSION['flashdata']); ?>
    <?php endif; ?>

    <form action="create_employee.php" method="post">
        <label for="fullname">Full Name:</label><br>
        <input type="text" id="fullname" name="fullname" required><br><br>

        <label for="position">Position:</label><br>
        <input type="text" id="position" name="position" required><br><br>

        <label for="place_of_assignment">Place of Assignment:</label><br>
        <input type="text" id="place_of_assignment" name="place_of_assignment" required><br><br>

        <button type="submit">Add Employee</button>
    </form>

    <div class="buttons">
        <a href="manage_admin.php"><button>Back to Manage Admin</button></a>
    </div>
</body>
</html>
