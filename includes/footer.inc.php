<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="includes/logout.inc.php">Logout</a>
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

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

<!--Sweet Alert-->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="js/paginationTable.js"></script>

<!--Vue js-->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<!--My vue modal script-->
<script src="js/vueModal.js"></script>

<!--Sweet alerts used in the website-->

<?php
if (isset($_GET['message'])) {
    if ($_GET['message'] == 'sent') {
        echo '
      <script>
      $(document).ready(function(){
        Swal.fire({
          position: "center",
          icon: "success",
          title: "Message Sent Successfully!",
          showConfirmButton: false,
          timer: 1600                 
        }).then(function() {
           
          
        })
      });                 
      </script>
      ';
    }
} ?>

<?php

if (isset($_GET['updateDetails'])) {
    if ($_GET['updateDetails'] == 'successful') {
        echo '
            <script>
            $(document).ready(function(){
              Swal.fire({
                position: "center",
                icon: "success",
                title: "Information updated successfully!",
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

<?php

if (isset($_GET['passwordUpdate'])) {
    if ($_GET['passwordUpdate'] == 'successful') {
        echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Password successfully changed!",
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
<?php

if (isset($_GET['registration'])) {
    if ($_GET['registration'] == 'success') {
        echo '
        <script>
        $(document).ready(function(){
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Registration successful!",
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
<?php

if (isset($_GET['deletion'])) {
    if ($_GET['deletion'] == 'success') {
        echo '
        <script>
        $(document).ready(function(){
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Deletion successful!",
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
<?php

if (isset($_GET['insertClass'])) {
    if ($_GET['insertClass'] == 'success') {
        echo '
        <script>
        $(document).ready(function(){
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Added new class successfully!",
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




<!--Script to edit Customer modal when form is submitted-->
<?php if (isset($_GET['modal']) && 'editCustomer' == $_GET['modal']) { ?>
    <script type='text/javascript'>
        $("#editCustomer").modal();
    </script>
<?php } ?>
<!--Script to show delete Customer modal when form is submitted-->
<?php if (isset($_GET['modal']) && 'deleteCustomer' == $_GET['modal']) { ?>
    <script type='text/javascript'>
        $("#deleteCustomer").modal();
    </script>
<?php } ?>
<!--Script to show edit Class modal when form is submitted-->
<?php if (isset($_GET['modal']) && 'editClass' == $_GET['modal']) { ?>
    <script type='text/javascript'>
        $("#editClass").modal();
    </script>
<?php } ?>
<!--Script to show delete Class modal when form is submitted-->
<?php if (isset($_GET['modal']) && 'deleteClass' == $_GET['modal']) { ?>
    <script type='text/javascript'>
        $("#deleteClass").modal();
    </script>
<?php } ?>
<!--Script to show delete Trainer modal when form is submitted-->
<?php if (isset($_GET['modal']) && 'deleteTrainer' == $_GET['modal']) { ?>
    <script type='text/javascript'>
        $("#deleteTrainer").modal();
    </script>
<?php } ?>

</body>

</html>