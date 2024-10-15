<?php 
include('authentication.php');

$page_title = "Dashboard";
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="py-5"> 
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

            <?php include('includes/alert.php'); ?>
            
                <div class="card">
                    <div class="card-header">
                        <h5>User Dashboard</h5>
                    </div>
                    <div class="card-body">
                        <h5>Access when you are logged in</h5> 
                        <hr>
                        <h5>Username: <?= $_SESSION['auth_user']['username']; ?></h5>
                        <h5>Phone No.: <?= $_SESSION['auth_user']['phone']; ?></h5>
                        <h5>Email ID: <?= $_SESSION['auth_user']['email']; ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

<?php include('includes/footer.php'); ?>