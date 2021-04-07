<?php
$title = "Register | Gym";
include_once 'includes/headerStart.inc.php';
?>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <?php
                                if ($_SESSION['role'] == 1) {
                                    echo '<h1 class="h4 text-gray-900 mb-4">Register Admin</h1>';
                                } else if ($_SESSION['role'] == 2) {
                                    echo '<h1 class="h4 text-gray-900 mb-4">Register Trainer</h1>';
                                } else if ($_SESSION['role'] == 3) {
                                    echo '<h1 class="h4 text-gray-900 mb-4">Register Customer</h1>';
                                }
                                ?>
                            </div>



                            <form class="user" action="includes/register.inc.php" method = "POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" name="firstname" placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName" name="lastname" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleAddress" name="address" placeholder="Address" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleTelephone" name="telephone" placeholder="Telephone" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" placeholder="Email Address" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" name="repeatPassword" placeholder="Repeat Password" required>
                                    </div>
                                </div>
                                <input type="submit" name="submitRegister" class="btn btn-primary btn-user btn-block" value="Register">
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php?role=">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php?role=">Already have an account? Login!</a>
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