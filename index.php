<?php
session_start();

// Redirect to login if admin_id is not set
if (!isset($_SESSION['admin_id'])) {
    header("Location: ./login.php");
    exit;
}

require_once('DBConnection.php');

// Default page is 'home' if not specified in URL
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucwords(str_replace('_', ' ', $page)) ?> | Request Form</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap">
    <!-- Icons -->
    <link rel="stylesheet" href="sneat/assets/vendor/fonts/boxicons.css">
    <!-- Core CSS -->
    <link rel="stylesheet" href="sneat/assets/vendor/css/core.css" class="template-customizer-core-css">
    <link rel="stylesheet" href="sneat/assets/vendor/css/theme-default.css" class="template-customizer-theme-css">
    <link rel="stylesheet" href="sneat/assets/css/demo.css">
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="sneat/assets/vendor/js/helpers.js"></script>
    <!-- Template customizer & Theme config files -->
    <script src="sneat/assets/js/config.js"></script>
</head>
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <!-- Wrap logo inside link with dropdown toggle -->
                        <span class="app-brand-logo demo">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="image/logo.png" alt="Logo" class="w-px-40 h-auto rounded-circle">
                            </a>
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">SLSU-BONTOC</span>
                    </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <!-- Your menu items -->
                    <!-- Dashboard -->
                    <li class="menu-item <?php echo ($page == 'home') ? 'active' : '' ?>">
                        <a href="./?page=home" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Home</div>
                        </a>
                    </li>
                    <!-- Other menu items -->
                    <li class="menu-item <?php echo ($page == 'form_staff_from_peer') ? 'active' : '' ?>">
                        <a href="./?page=form_staff_from_peer" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                            <div data-i18n="Class">Performance-Appraisal-for-Staff-from-Peer</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo ($page == 'form_staff_from_hr') ? 'active' : '' ?>">
                        <a href="./?page=form_staff_from_hr" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Students">Performance-Appraisal-for-Staff-from-HR</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo ($page == 'form_staff_from_campus_director') ? 'active' : '' ?>">
                        <a href="./?page=form_staff_from_campus_director" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-list-ol"></i>
                            <div data-i18n="Assessments">Performance-Appraisal-for-Staff-from-Campus-Director</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo ($page == 'form_staff_supervisor') ? 'active' : '' ?>">
                        <a href="./?page=form_staff_supervisor" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-edit-alt"></i>
                            <div data-i18n="Marks">Performance-Appraisal-for-Staff-Supervisor</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User Dropdown -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar avatar-online">
                                        <img src="image/logo.png" alt="Logo" class="w-px-40 h-auto rounded-circle">
                                    </div>
                                </a>
                                <!-- Dropdown Menu -->
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">Hello <?php echo $_SESSION['fullname'] ?></span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="./?page=manage_account">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">Manage Account</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="./Actions.php?a=logout">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Logout</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- /Dropdown Menu -->
                            </li>
                            <!--/ User Dropdown -->
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="container py-3" id="page-container">
                            <?php
                            if (isset($_SESSION['flashdata'])):
                            ?>
                            <div class="dynamic_alert alert alert-<?php echo $_SESSION['flashdata']['type'] ?>">
                                <div class="float-end">
                                    <a href="javascript:void(0)" class="text-dark text-decoration-none" onclick="$(this).closest('.dynamic_alert').hide('slow').remove()">x</a>
                                </div>
                                <?php echo $_SESSION['flashdata']['msg'] ?>
                            </div>
                            <?php unset($_SESSION['flashdata']) ?>
                            <?php endif; ?>
                            <?php
                            // Check if the requested page exists and include it
                            $filename = $page . '.php';
                            if (file_exists($filename)) {
                                include $filename;
                            } else {
                                echo "<h2>404 Not Found</h2>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Layout wrapper -->
    </div>
    <!-- Core JS -->
    <script src="sneat/assets/vendor/js/bundle.js"></script>
    <script src="sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="sneat/assets/vendor/js/sidebar.js"></script>
    <!-- App JS -->
    <script src="sneat/assets/js/demo.js"></script>
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    </script>
</body>
</html>
