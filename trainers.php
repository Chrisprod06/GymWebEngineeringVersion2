<?php
$title = 'Trainers | Gym';
include_once 'includes/header.inc.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Trainers</h1>
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
                                                <h1>Manager's User Manual</h1>

                                                <p>In this screen you can view information about system administrators,add new administrators
                                                    as well as delete them or edit the details of an administrator. You can also
                                                    create a report for the administrators.
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
                            <h2>Trainers Information</b></h2>
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include_once 'includes/updateTrainersTable.inc.php'; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Modal HTML -->
    <div id="editCustomer" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/updateCustomerRow.inc.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Customer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Firstname*</label>
                            <input type="text" class="form-control" name="firstname" value='<?php echo $_GET['firstname'] ?>' required>
                        </div>
                        <div class="form-group">
                            <label>Lastname*</label>
                            <input type="text" class="form-control" name="lastname" value='<?php echo $_GET['lastname'] ?>' required>
                        </div>
                        <div class="form-group">
                            <label>Telephone*</label>
                            <input type="text" class="form-control" name="telephone" value='<?php echo $_GET['telephone'] ?>' required>
                        </div>
                        <div class="form-group">
                            <label>Address*</label>
                            <input type="text" class="form-control" name="address" value='<?php echo $_GET['address'] ?>' required>
                        </div>
                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" class="form-control" name="email" value='<?php echo $_GET['email'] ?>' required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="hidden" name="userID" value='<?php echo $_GET['userID'] ?>'>
                        <button type="submit" value="Yes" class="btn btn-info">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteTrainer" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/deleteTrainer.inc.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Trainer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure?</p>
                        <p class="text-warning"><small>This action can not be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="hidden" name="userID" value='<?php echo $_GET['userID'] ?>'>
                        <button type="submit" value="Yes" class="btn btn-danger">Delete</button>
                    </div>
                </form>
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