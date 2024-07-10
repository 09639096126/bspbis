<?php include "../../utils/connection.php";
if (!$_SESSION['admin']) {
    header('location: ../../index');
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solo Parent</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css2/style.css">
    <link href="../../assets/dataTable/datatables.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../assets/img/bunawan.webp" type="image/x-icon">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <img src="../../assets/img/bunawan.webp" alt="" width="30%">&nbsp;
                    <a href="#">BSPBIS</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Admin
                    </li>
                    <li class="sidebar-item">
                        <a href="dashboard" class="sidebar-link">
                            <i class="fa-solid fa-home pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="parent" class="sidebar-link">
                            <i class="fa-solid fa-user pe-2"></i>
                            Solo Parent
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="cash_assistance" class="sidebar-link">
                            <i class="fa-solid fa-money-bill-wave pe-2"></i>
                            Cash Assistance
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="announcement" class="sidebar-link">
                            <i class="fa-solid fa-volume-up pe-2"></i>
                            Announcements
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="parent_account" class="sidebar-link">
                            <i class="fa-solid fa-key pe-2"></i>
                            Solo Parent Accounts
                        </a>
                    </li>
                    <!-- <li class="sidebar-item">
                        <a href="users" class="sidebar-link">
                            <i class="fa-solid fa-users pe-2"></i>
                            Users
                        </a>
                    </li> -->
                    </li>
                    <li class="sidebar-item">
                        <a href="../../includes/logout_admin" class="sidebar-link">
                            <i class="fa-solid fa-sign-out-alt pe-2"></i>
                            Logout
                        </a>
                    </li>
                    <li class="sidebar-header">
                        Deleted History
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#multi" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-trash pe-2"></i>
                            Trash History
                        </a>
                        <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="deleted_cash_assistance" class="sidebar-link">
                                    <i class="fa-solid fa-times pe-2"></i>
                                    Deleted Cash Assistance
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="deleted_parent" class="sidebar-link">
                                    <i class="fa-solid fa-user-times pe-2"></i>
                                    Deleted Solo Parent
                                </a>
                            </li>
                    </li>
                </ul>
                </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="../../assets/image/profile.jpg" class="avatar img-fluid rounded" alt="">
                            </a>
                      
                        </li>
                    </ul>
                </div>
            </nav>