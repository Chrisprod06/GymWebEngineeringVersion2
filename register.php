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



                            <form class="user" action="includes/register.inc.php" method="POST">
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
                                <?php
                                if (isset($_GET['error'])) {
                                    if ($_GET['error'] == 'emptyinput') {
                                        echo '<p class = "text-danger text-center " >Fill in all the fields!</p>';
                                    }

                                    if ($_GET['error'] == 'emailExists') {
                                        echo '<p class = "text-danger text-center " >User already exists!</p>';
                                    }

                                    if ($_GET['error'] == 'passworddontmatch') {
                                        echo '<p class = "text-danger text-center " >The passwords must match!</p>';
                                    }

                                    if ($_GET['error'] == 'invalidemail') {
                                        echo '<p class = "text-danger text-center " >The email you have entered is invalid!</p>';
                                    }

                                    if ($_GET['error'] == 'stmtfailed') {
                                        echo '<p class = "text-danger text-center " >Something went wrong, try again!</p>';
                                    }
                                }

                                ?>
                                <input type="submit" name="submitRegister" class="btn btn-primary btn-user btn-block" value="Register">
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="index.php">Go Back</a>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    <?php
    if (isset($_GET['registration'])) {
        if ($_GET['registration'] == 'success') {
            echo '
                <script>
                $(document).ready(function(){
                Swal.fire({
                position: "center",
                icon: "success",
                title: "Registration Successful!",
                showConfirmButton: false,
                timer: 1600                 
                }).then(function() {
                window.location.href="login.php";

                })
                });                 
                </script>
                ';
        }
    }
    ?>

</body>

</html>