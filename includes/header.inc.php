<?php
session_start();
if(!isset($_SESSION['userID'])){
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title ?></title>
    <!--Plugin CSS file with desired skin-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="css\sb-admin-2.css?version=1" rel="stylesheet">

    <!--Sweet Alert-->

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="homepage.php">
                <?php
                if ($_SESSION['role'] == 1) {
                    echo '<div class="sidebar-brand-text mx-3">Admin Module</div>';
                } else if ($_SESSION['role'] == 2) {
                    echo '<div class="sidebar-brand-text mx-3">Trainer Module</div>';
                } else if ($_SESSION['role'] == 3) {
                    echo '<div class="sidebar-brand-text mx-3">Customer Module</div>';
                }
                ?>

            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="homepage.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Management
            </div>
            <?php
            if ($_SESSION['role'] == 1) {
                echo ' <!-- Nav Item - Customers -->
                    <li class="nav-item">
                       <a class="nav-link" href="customers.php">
                           <i class="fas fa-user-friends"></i>
                           <span>My Customers</span></a>
                   </li>
                   <!-- Nav Item - Classes -->
                   <li class="nav-item">
                       <a class="nav-link" href="classes.php">
                           <i class="fas fa-dumbbell"></i>
                           <span>My Classes</span></a>
                   </li>
                   
                   <!-- Nav Item - Trainers -->
                   <li class="nav-item">
                       <a class="nav-link" href="trainers.php">
                           <i class="fas fa-user-friends"></i>
                           <span>Trainers </span></a>
                   </li>
                   <!-- Nav Item - ContactQueries -->
                   <li class="nav-item">
                       <a class="nav-link" href="contactQueries.php">
                           <i class="fas fa-envelope"></i>
                           <span>Queries</span></a>
                   </li>';
            } else if ($_SESSION['role'] == 2) {
                echo ' <!-- Nav Item - Customers -->
                <li class="nav-item">
                   <a class="nav-link" href="MyCustomersTrainer.php">
                       <i class="fas fa-user-friends"></i>
                       <span>My Customers</span></a>
               </li>
               <!-- Nav Item - Classes -->
               <li class="nav-item">
                   <a class="nav-link" href="MyClassesTrainer.php">
                       <i class="fas fa-dumbbell"></i>
                       <span>My Classes</span></a>
               </li>
               
               <!-- Nav Item - Contact -->
               <li class="nav-item">
                   <a class="nav-link" href="sendMessageAdmin.php">
                       <i class="fas fa-envelope"></i>
                       <span>Contact</span></a>
               </li>
               ';
            }else if ($_SESSION['role'] == 3 ){
                echo ' 

            
            
               <!-- Nav Item - Classes -->
               <li class="nav-item">
                   <a class="nav-link" href="MyClassesCustomer.php">
                       <i class="fas fa-dumbbell"></i>
                       <span>My Classes</span></a>
               </li>
               
               <!-- Nav Item - Contact -->
               <li class="nav-item">
                   <a class="nav-link" href="sendMessageAdmin.php">
                       <i class="fas fa-envelope"></i>
                       <span>Contact</span></a>
               </li>
               ';
                
            }
            ?>




            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </li>



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']  ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="editProfile.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Edit Profile
                                </a>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->