<?php
$title = 'Classes | Gym';
include_once 'includes/header.inc.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-left justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Classes Customer</h1>
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
                        <div class="col-sm-2 mb-3">
                            <!--Vue modal Enroll to a class-->
                            <div class="container" id="crudApp">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6" align="right">
                                                <input type="button" class="btn btn-success btn-xs" @click="openModel" value="Enroll to a Class" />
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
                                                            <h4 class="modal-title">{{ dynamicTitle }}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for ="classID">Choose Class</label>
                                                                <select name="classID" v-model="classID" id="classID" class = "form-control">
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
                                                            <br />
                                                            <div align="center">
                                                                <input type="hidden" v-model="hiddenId" />
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php include_once 'includes/updateClassesCustomer.inc.php'; ?>
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