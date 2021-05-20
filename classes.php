<?php
$title = 'Classes | Gym';
include_once 'includes/header.inc.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Classes</h1>

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
                            <h2>Classes</b></h2>
                        </div>
                        <div class="col-sm-8">
                            <a href="#addClass" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Class</span></a>
                        </div>
                    </div>
                </div>
                <table data-page-length="5" id="contentTables" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Class ID</th>
                            <th>Class Name</th>
                            <th>Day</th>
                            <th>Start Day</th>
                            <th>End Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Role</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include_once 'includes/updateClassesTable.inc.php'; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addClass" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/insertClass.inc.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Class</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Class Name*</label>
                            <input type="text" class="form-control" name="className" required>
                        </div>
                        <div class="form-group">
                            <label>Start Date*</label>
                            <input type="date" class="form-control" name="startDate" required>
                        </div>
                        <div class="form-group">
                            <label>End Date*</label>
                            <input type="date" class="form-control" name="endDate" required>
                        </div>
                        <div class="form-group">
                            <label>Day*</label>
                            <select class="form-control" name="day" id="day">
                                <option value=""></option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Start Time*</label>
                            <input type="time" class="form-control" name="startTime" required>
                        </div>
                        <div class="form-group">
                            <label>End Time*</label>
                            <input type="time" class="form-control" name="endTime" required>
                        </div>
                        <div class="form-group">
                            <label>TrainerID*</label>
                            <select class = "form-control" name="trainerID" id="trainerID">
                            <option value=""></option>
                                <?php
                                include_once 'dbh.inc.php';
                                $sql = "SELECT userID, firstname, lastname FROM users WHERE role=2;";
                                $result = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($result);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value = " . $row['userID'] . ">" . $row['userID'] . "," . $row['firstname'] . " " . $row['lastname'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                       
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" name="submitAddClass" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
   <!-- Edit Modal HTML -->
   <div id="editClass" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/editClass.inc.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Class</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Class Name*</label>
                            <input type="text" class="form-control" name="className" value = "<?php echo $_GET['className']?>" required>
                        </div>
                        <div class="form-group">
                            <label>Start Date*</label>
                            <input type="date" class="form-control" name="startDate"  value = "<?php echo $_GET['startDate']?>" required>
                        </div>
                        <div class="form-group">
                            <label>End Date*</label>
                            <input type="date" class="form-control" name="endDate"  value = "<?php echo $_GET['endDate']?>"   required>
                        </div>
                        <div class="form-group">
                            <label>Day*</label>
                            <select class="form-control" name="day" id="day">
                            
                                <option  value = "<?php echo $_GET['day']?>"><?php echo $_GET['day']?></option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Start Time*</label>
                            <input type="time" class="form-control" name="startTime" value = "<?php echo $_GET['startTime']?>" required>
                        </div>
                        <div class="form-group">
                            <label>End Time*</label>
                            <input type="time" class="form-control" name="endTime" value = "<?php echo $_GET['endTime']?>" required>
                        </div>
                        <div class="form-group">
                            <label>TrainerID*</label>
                            <select class = "form-control" name="trainerID" id="trainerID">
                            <option  value = "<?php echo $_GET['trainerID']?>"><?php echo $_GET['trainerID']?></option>
                                <?php
                                include_once 'dbh.inc.php';
                                $sql = "SELECT userID, firstname, lastname FROM users WHERE role=2;";
                                $result = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($result);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value = " . $row['userID'] . ">" . $row['userID'] . "," . $row['firstname'] . " " . $row['lastname'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                       
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="hidden" name = "classID" value = "<?php echo $_GET['classID']?>">
                        <input type="submit" name="submitAddClass" class="btn btn-info" value="Save Changes">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="deleteClass" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/deleteClass.inc.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Class</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure?</p>
                        <p class="text-warning"><small>This action can not be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="hidden" name="classID" value='<?php echo $_GET['classID'] ?>'>
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