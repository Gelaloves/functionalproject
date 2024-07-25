<?php
session_start();
require_once('DBConnection.php');

// Define the Registration class
class Registration extends DBConnection {
    function __construct() {
        parent::__construct();
    }

    function __destruct() {
        parent::__destruct();
    }

    function register($fullname, $username, $password, $confirm_password, $role) {
        $resp = array();

        // Check if passwords match
        if ($password !== $confirm_password) {
            $resp['status'] = 'failed';
            $resp['msg'] = 'Passwords do not match.';
            return json_encode($resp);
        }

        // Check if the username already exists
        $stmt = $this->db->prepare("SELECT * FROM admin_list WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $existing_user = $stmt->get_result()->fetch_assoc();
        if ($existing_user) {
            $resp['status'] = 'failed';
            $resp['msg'] = 'Username already exists.';
            return json_encode($resp);
        }

        // Insert new user into the database
        $stmt = $this->db->prepare("INSERT INTO admin_list (fullname, username, password, role) VALUES (?, ?, ?, ?)");
        $hashed_password = md5($password); // Hash the password using md5
        $stmt->bind_param("ssss", $fullname, $username, $hashed_password, $role);
        if ($stmt->execute()) {
            $resp['status'] = 'success';
            $resp['msg'] = 'Registration successful.';
        } else {
            $resp['status'] = 'failed';
            $resp['msg'] = 'Registration failed. Please try again.';
        }
        return json_encode($resp);
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];

    $registration = new Registration();
    $response = $registration->register($fullname, $username, $password, $confirm_password, $role);

    // Output the response
    echo $response;
    exit(); // Ensure no further code is executed after form processing
}
?>


<!DOCTYPE html>
<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER | Request Form</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="sneat/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="sneat/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="sneat/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="sneat/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="sneat/assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="sneat/assets/vendor/js/helpers.js"></script>
    <script src="sneat/assets/js/config.js"></script>

    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="image/logo.png" alt="Logo" width="50">
                                </span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Create an Account! 👋</h4>
                        <p class="mb-4">Please fill in the details to register</p>
                        
                        <form id="register-form">
                            <center><small>Please enter your details.</small></center>
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input type="text" id="fullname" name="fullname" class="form-control form-control-sm rounded-0" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" name="username" class="form-control form-control-sm rounded-0" required>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role" class="form-control form-control-sm rounded-0" required>
                                    <option value="Human Resource">Human Resource</option>
                                    <option value="Campus Director">Campus Director</option>
                                    <option value="Peer">Peer</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password" class="form-control" aria-describedby="password" required>
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="confirm_password">Confirm Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" aria-describedby="confirm_password" required>
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Register</button>
                            </div>
                        </form>

                        <!-- Link to Login Page with Icon -->
                        <div class="text-center mt-3">
                            <a href="login.php" class="btn btn-outline-primary">
                                <i class="bx bx-user"></i> Login
                            </a>
                        </div>

                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <script>
        $(function(){
            $('#register-form').submit(function(e){
                e.preventDefault();
                $('.pop_msg').remove()
                var _this = $(this)
                var _el = $('<div>')
                    _el.addClass('pop_msg')
                _this.find('button').attr('disabled',true)
                _this.find('button[type="submit"]').text('Registering...')
                $.ajax({
                    url: './register.php',
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'JSON',
                    error: err => {
                        console.log(err)
                        _el.addClass('alert alert-danger')
                        _el.text("An error occurred.")
                        _this.prepend(_el)
                        _el.show('slow')
                        _this.find('button').attr('disabled', false)
                        _this.find('button[type="submit"]').text('Register')
                    },
                    success: function(resp) {
                        if (resp.status == 'success') {
                            _el.addClass('alert alert-success')
                            _el.text(resp.msg)
                            _el.hide()
                            _this.prepend(_el)
                            _el.show('slow')
                            setTimeout(() => {
                                window.location.href = './login.php'; // Redirect to login page
                            }, 2000);
                        } else {
                            _el.addClass('alert alert-danger')
                            _el.text(resp.msg)
                            _el.hide()
                            _this.prepend(_el)
                            _el.show('slow')
                            _this.find('button').attr('disabled', false)
                            _this.find('button[type="submit"]').text('Register')
                        }
                    }
                })
            })
        })
    </script>

    <!-- Core JS -->
    <script src="sneat/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="sneat/assets/vendor/libs/popper/popper.js"></script>
    <script src="sneat/assets/vendor/js/bootstrap.js"></script>
    <script src="sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="sneat/assets/vendor/js/menu.js"></script>

    <!-- Main JS -->
    <script src="sneat/assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
