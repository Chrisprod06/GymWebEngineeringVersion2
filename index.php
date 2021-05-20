<?php
$title = "Home | Gym";
include_once 'includes/headerStart.inc.php';
?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5 ">
                    <div class="card-body p-0">
                        <h1 class="text-center mt-5">Gym Management System </h5>
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="p-5">
                                        <div class="card text-center">
                                            <img class="card-img-top" src="img/admin.png" alt="Card image cap">
                                            <div class="card-body">
                                                <a href="login.php?role=1" class="btn btn-primary">Admin Module</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="p-5">
                                        <div class="card text-center">
                                            <img class="card-img-top" src="img/trainer.png" alt="Card image cap">
                                            <div class="card-body">
                                                <a href="login.php?role=2" class="btn btn-primary">Trainer Module</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="p-5">
                                        <div class="card text-center">
                                            <img class="card-img-top" src="img/customer.png" alt="Card image cap">
                                            <div class="card-body">
                                                <a href="login.php?role=3" class="btn btn-primary">Customer Module</a>

                                            </div>
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

    <!--Sweet Alert-->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <?php

    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'wrongRole') {
            echo '
        <script>
        $(document).ready(function(){
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Please login to the correct module!",
            showConfirmButton: false,
            timer: 1600                 
        }).then(function() {
            
            
        })
        });                 
        </script>
        ';
        }
    }

    ?>
</body>


</html>