<?php
$title = 'Classes | Gym';
include_once 'includes/header.inc.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-left justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Classes Customer</h1>
        <!--Vue modal Enroll to a class-->
        <div class="container" id="crudApp">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6" align="right">

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
                                            <input type="button" class="btn btn-success btn-xs" v-model="actionButton" @click="submitData" />
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
                            <h2>Classes</b></h2>
                        </div>
                        <div class="col-sm-8">
                            <a href="#addCustomer" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Enroll to a class</span></a>
                        </div>
                    </div>
                </div>
                <table data-page-length="5" id="contentTables" class="table table-striped table-hover">
                    <thead>
                        <tr>

                            <th>Class ID</th>
                            <th>Class Name</th>
                            <th>Day</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include_once 'includes/updateClassesCustomer.inc.php'; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Modal HTML -->
    <div id="addCustomer" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/enrollClass.inc.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Enroll to a Class</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="classID">Choose Class</label>
                            <select name="classID" id="classID" class="form-control">
                                <option value=""></option>
                                <?php

                                include_once 'includes/dbh.inc.php';
                                $sql = "SELECT distinct * FROM classes ";
                                $result = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($result);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value = " . $row['classID'] . ">" . $row['className'] . "," . $row['day'] . ", " . $row['startTime'] . ",
                                                                        " . $row['endTime'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="customerID" id="customerID" value="<?php echo $_SESSION['userID'] ?>">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" name="submit" class="btn btn-success" value="Enroll">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="unEnrollClass" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/unEnrollClass.inc.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Un-Enroll Class</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure?</p>
                        <p class="text-warning"><small>This action can not be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="hidden" name="classID" value='<?php echo $_GET['classID'] ?>'>
                        <button type="submit" value="Yes" class="btn btn-danger">Un-Enroll</button>
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