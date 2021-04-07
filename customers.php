<?php
$title = 'Customers | Gym';
include_once 'includes/header.inc.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Customers</h1>
    </div>

    <!-- Content Row -->
    <div class="row">


        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <a href="#addCustomer" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>New Customer</span></a>
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
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addCustomer" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/insertCustomer.inc.php" method = "POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Customer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Firstname*</label>
                            <input type="text" class="form-control" name="firstname" required>
                        </div>
                        <div class="form-group">
                            <label>Lastname*</label>
                            <input type="text" class="form-control" name="lastname" required>
                        </div>
                        <div class="form-group">
                            <label>Telephone*</label>
                            <input type="text" class="form-control" name="telephone" required>
                        </div>
                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Address*</label>
                            <input type="text" class="form-control" name="address" required>
                        </div>
                        <div class="form-group">
                            <label>Password*</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>Repeat Password*</label>
                            <input type="password" class="form-control" name="Repassword" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-defauls" data-dismiss="modal" value="Cancel">
                        <input type="submit" name = "submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal HTML -->
    <div id="editCustomer" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/updateCustomerRow.inc.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo $lang['editcustomer']?></h4>
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
                            <input type="text" class="form-control" name="telephone" value='<?php echo $_GET['phoneNo'] ?>' required>
                        </div>
                        <div class="form-group">
                            <label>Address*</label>
                            <input type="text" class="form-control" name="address"  value='<?php echo $_GET['address'] ?>' required>
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
    <div id="deleteCustomer" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/deleteCustomer.inc.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Customer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure?</p>
                        <p class="text-warning"><small>test</small></p>
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