<?php
$title = 'My Customers | Gym';
include_once 'includes/header.inc.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Customers</h1>
    </div>

    <!-- Content Row -->
    <div class="row">


        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                    <div class="col-sm-4">
                            <h2>Customers</b></h2>
                        </div>
                        
                    </div>
                </div>
                <table data-page-length="5" id="contentTables" class="table table-striped table-hover">
                    <thead>
                        <tr>

                            <th>User ID</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Telephone</th>
                            <th>Address</th>
                            <th>Email</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php include_once 'includes/updateTrainersTable.inc.php';?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include_once 'includes/footer.inc.php';
?>