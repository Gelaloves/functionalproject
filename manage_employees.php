<?php
session_start();
require_once('DBConnection.php');

// Redirect to login if admin_id is not set
if (!isset($_SESSION['admin_id'])) {
    header("Location: ./login.php");
    exit;
}

// Function to fetch employee list
function fetchEmployeeList() {
    $database = new DBConnection();
    $conn = $database->db_connect();
    $stmt = $conn->prepare("SELECT * FROM employee_list");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Handle add/edit employee form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_employee'])) {
    $employee_name = $_POST['employee_name'];
    $position = $_POST['position'];
    $place_of_assignment = $_POST['place_of_assignment'];
    $employee_id = $_POST['employee_id'];

    $database = new DBConnection();
    $conn = $database->db_connect();

    if (empty($employee_id)) {
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO employee_list (employee_name, position, place_of_assignment) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $employee_name, $position, $place_of_assignment);
        
        if ($stmt->execute()) {
            $_SESSION['flashdata'] = array(
                'type' => 'success',
                'msg' => 'New employee added successfully.'
            );
        } else {
            $_SESSION['flashdata'] = array(
                'type' => 'danger',
                'msg' => 'Error adding new employee.'
            );
        }
    } else {
        // Update employee in database
        $stmt = $conn->prepare("UPDATE employee_list SET employee_name = ?, position = ?, place_of_assignment = ? WHERE employee_id = ?");
        $stmt->bind_param("sssi", $employee_name, $position, $place_of_assignment, $employee_id);
        
        if ($stmt->execute()) {
            $_SESSION['flashdata'] = array(
                'type' => 'success',
                'msg' => 'Employee updated successfully.'
            );
        } else {
            $_SESSION['flashdata'] = array(
                'type' => 'danger',
                'msg' => 'Error updating employee.'
            );
        }
    }

    // Redirect back to manage_employees.php to display the notification
    header("Location: ./manage_employees.php");
    exit;
}

// Handle delete employee action
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $employee_id = $_GET['id'];

    // Delete employee from database
    $database = new DBConnection();
    $conn = $database->db_connect();
    $stmt = $conn->prepare("DELETE FROM employee_list WHERE employee_id = ?");
    $stmt->bind_param("i", $employee_id);
    
    if ($stmt->execute()) {
        $_SESSION['flashdata'] = array(
            'type' => 'success',
            'msg' => 'Employee deleted successfully.'
        );
    } else {
        $_SESSION['flashdata'] = array(
            'type' => 'danger',
            'msg' => 'Error deleting employee.'
        );
    }

    // Redirect back to manage_employees.php to display the notification
    header("Location: ./manage_employees.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employees</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Manage Employees</h2>
        <?php if (isset($_SESSION['flashdata'])): ?>
            <div class="alert alert-<?php echo $_SESSION['flashdata']['type']; ?>">
                <?php echo $_SESSION['flashdata']['msg']; ?>
            </div>
            <?php unset($_SESSION['flashdata']); ?>
        <?php endif; ?>

        <!-- Add New Employee and Back to Home Buttons -->
        <div class="text-center mb-4">
            <button class="btn btn-success mr-2" data-toggle="modal" data-target="#employeeModal" onclick="openAddEmployeeForm()">Add New Employee</button>
            <a href="index.php" class="btn btn-info">Back to Home</a>
        </div>

        <!-- Display Employee List -->
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Employee Name</th>
                    <th>Position</th>
                    <th>Place of Assignment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $employee_list = fetchEmployeeList(); ?>
                <?php foreach ($employee_list as $employee): ?>
                    <tr>
                        <td><?php echo $employee['employee_id']; ?></td>
                        <td><?php echo $employee['employee_name']; ?></td>
                        <td><?php echo $employee['position']; ?></td>
                        <td><?php echo $employee['place_of_assignment']; ?></td>
                        <td>
                            <button class="btn btn-primary" onclick="openEditEmployeeForm('<?php echo $employee['employee_id']; ?>', '<?php echo $employee['employee_name']; ?>', '<?php echo $employee['position']; ?>', '<?php echo $employee['place_of_assignment']; ?>')">Edit</button>
                            <button class="btn btn-danger delete-button" onclick="confirmDelete('<?php echo $employee['employee_id']; ?>')">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Employee Modal -->
    <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="employeeModalLabel">Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="manage_employees.php" method="post" id="employeeForm">
                    <div class="modal-body">
                        <input type="hidden" id="employee_id" name="employee_id">
                        <div class="form-group">
                            <label for="employee_name">Employee Name:</label>
                            <input type="text" id="employee_name" name="employee_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="position">Position:</label>
                            <input type="text" id="position" name="position" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="place_of_assignment">Place of Assignment:</label>
                            <input type="text" id="place_of_assignment" name="place_of_assignment" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit_employee" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Function to open the add employee form
        function openAddEmployeeForm() {
            document.getElementById('employeeForm').reset();
            document.getElementById('employee_id').value = '';
            document.getElementById('employeeModalLabel').innerText = 'Add New Employee';
        }

        // Function to open the edit employee form
        function openEditEmployeeForm(employeeId, employeeName, position, placeOfAssignment) {
            document.getElementById('employee_id').value = employeeId;
            document.getElementById('employee_name').value = employeeName;
            document.getElementById('position').value = position;
            document.getElementById('place_of_assignment').value = placeOfAssignment;
            document.getElementById('employeeModalLabel').innerText = 'Edit Employee';
            $('#employeeModal').modal('show');
        }

        // Function to confirm delete action
        function confirmDelete(employeeId) {
            if (confirm('Are you sure you want to delete this employee?')) {
                window.location.href = 'manage_employees.php?action=delete&id=' + employeeId;
            }
        }
    </script>
</body>
</html>
