<?php
session_start();
require_once('DBConnection.php');

class Actions extends DBConnection {
    function __construct() {
        parent::__construct();
    }

    function __destruct() {
        parent::__destruct();
    }

    function login() {
        extract($_POST);
        $sql = "SELECT * FROM admin_list WHERE username = '{$username}' AND `password` = '".md5($password)."'";
        @$qry = $this->db->query($sql)->fetch_array();
        if (!$qry) {
            $resp['status'] = "failed";
            $resp['msg'] = "Invalid username or password.";
        } else {
            $resp['status'] = "success";
            $resp['msg'] = "Login successfully.";
            foreach ($qry as $k => $v) {
                if (!is_numeric($k)) {
                    $_SESSION[$k] = $v;
                }
            }
        }
        return json_encode($resp);
    }

    function logout() {
        session_destroy();
        header("location:./login.php"); // Redirect to login page after logout
        exit;
    }

    function updateRole($new_role) {
        // Check if the user is an admin
        $user_role = $_SESSION['role'] ?? '';
        if ($user_role !== 'Admin') {
            return ['status' => 'failed', 'msg' => 'You do not have permission to change roles.'];
        }

        // Validate the new role
        $valid_roles = ['Human Resource', 'Campus Director', 'Peer', 'Supervisor', 'Admin'];
        if (!in_array($new_role, $valid_roles)) {
            return ['status' => 'failed', 'msg' => 'Invalid role selected.'];
        }

        // Update the role in the database
        $admin_id = $_SESSION['admin_id']; // Assuming admin_id is stored in session
        $stmt = $this->db->prepare("UPDATE admin_list SET role = ? WHERE admin_id = ?");
        if ($stmt->execute([$new_role, $admin_id])) {
            $_SESSION['role'] = $new_role; // Update session role
            return ['status' => 'success', 'msg' => 'Role updated successfully.'];
        } else {
            return ['status' => 'failed', 'msg' => 'Failed to update role.'];
        }
    }
}

$a = isset($_GET['a']) ? $_GET['a'] : '';
$action = new Actions();

switch ($a) {
    case 'login':
        echo $action->login();
        break;
    case 'logout':
        $action->logout();
        break;
    case 'update_role':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $new_role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
            $result = $action->updateRole($new_role);
            $_SESSION['flashdata'] = ['type' => $result['status'], 'msg' => $result['msg']];
            header("Location: ./?page=manage_account");
            exit;
        }
        break;
    default:
        break;
}
?>
