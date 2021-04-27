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