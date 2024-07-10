<?php include "../../utils/connection.php"; 
if (!$_SESSION['solo_parent']) {
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
                        Parent
                    </li>
                    <li class="sidebar-item">
                        <a href="dashboard" class="sidebar-link">
                            <i class="fa-solid fa-volume-up pe-2"></i>
                            Announcements
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="beneficiary" class="sidebar-link">
                            <i class="fa-solid fa-volume-up pe-2"></i>
                            Benefeciaries
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="profile" class="sidebar-link">
                            <i class="fa-solid fa-user pe-2"></i>
                            Profile
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="descendant" class="sidebar-link">
                            <i class="fa-solid fa-users pe-2"></i>
                            Dependents
                        </a>
                    </li>
                  
                    <li class="sidebar-item">
                        <a href="changepass" class="sidebar-link">
                            <i class="fa-solid fa-key pe-2"></i>
                           Change Password
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="../../includes/logout" class="sidebar-link">
                            <i class="fa-solid fa-sign-out-alt pe-2"></i>
                           Logout
                        </a>
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