<?php
$title = "Login | Gym";
include_once 'includes/headerStart.inc.php';
if(isset($_GET['role'])){
    $_SESSION['role'] = (int)$_GET['role'];
}
?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <?php
                                        if($_SESSION['role'] == 1){
                                            echo '<h1 class="h4 text-gray-900 mb-4">Admin Login</h1>';

                                        }else if($_SESSION['role'] == 2){
                                            echo '<h1 class="h4 text-gray-900 mb-4">Trainer Login</h1>';

                                        }else if ($_SESSION['role'] ==3){
                                            echo '<h1 class="h4 text-gray-900 mb-4">Customer Login</h1>';

                                        }
                                        
                                        ?>
                                        
                                    </div>
                                    <form class="user" action="includes/login.inc.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                                        </div>                                 
                                        <input type="submit" name="submitLogin" class="btn btn-primary btn-user btn-block" value="Login">
                                        <hr>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php?role=1">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php?role=1">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>