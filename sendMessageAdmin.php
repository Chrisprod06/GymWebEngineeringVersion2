<?php
$title = 'Send Message Admin | Gym';
include_once 'includes/header.inc.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Send Message</h1>
    </div>

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
                                                <h1>Contact Admin Manual</h1>

                                                <p>In this screen you can send a message to the Admin of the gym in case there is a problem or a question.
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

    <!-- Content Row -->
    <div class="row">
        <div class="col d-flex justify-content-center">
            <form action="includes/sendMessage.inc.php" method="POST">
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'stmtFailed') {
                        echo '<p class = "text-danger text-center ">Something Went Wrong! Please try again.</p>';
                    }
                }
                if(isset($_GET['message'])){
                    if($_GET['message'] == 'notSent'){
                        echo '<p class = "text-danger text-center ">Something Went Wrong! Please try again.</p>';
                    }
                }
                ?>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" class="form-control" name="subject" id="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label><br>
                    <textarea name="message" id="message" cols="100" rows="10" required></textarea>
                </div>
                <div class="form-group">
                    <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit" name="submitSendMessage">Send Message</button>
                    </div>
                </div>
            </form>
        </div>


    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include_once 'includes/footer.inc.php';
?>