<?php
$title = 'My Customers | Gym';
include_once 'includes/header.inc.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Customers</h1>
        <div class="container" id="crudApp">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12" align="right">
 
                            <input type="button" class="btn btn-primary btn-xs" @click="openModel" value="Help" />
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="myModel">
                <transition name="model">
                    <div class="modal-mask">
                        <div class="modal-wrapper">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" @click="myModel=false"><span aria-hidden="true">&times;</span></button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <h1>My Customers Trainer </h1>

                                                <p>In this screen the trainer can view information about the customers he/she currently teaches.
                                                </p>




                                            </div>
                                        </div>

                                        <div align="center">

                                            <input type="hidden" name="customerID" id="customerID" v-model="customerID" value="<?php echo $_SESSION['userID'] ?>">
                                            <button type="button" class="close" @click="myModel=false"><span class = "btn btn-success" aria-hidden="true">Ok</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </transition>
            </div>
        </div>
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
                        <?php include_once 'includes/updateMyCustomers.inc.php';?>
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