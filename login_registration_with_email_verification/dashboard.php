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
<style>
    /* Dashboard background */
.py-5 {
    background-color: #ffe4e1; /* Light pink background */
}

/* Card styles */
.card {
    border: 2px solid #ff69b4; /* Pink border for the card */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(255, 105, 180, 0.2); /* Soft pink shadow */
}

.card-header {
    background-color: #ff1493; /* Deep pink for card header */
    color: white;
    font-weight: bold;
    font-family: 'Comic Sans MS', sans-serif; /* Optional playful font */
    border-bottom: 2px solid #ff69b4;
    text-align: center;
}

.card-body {
    background-color: #fff0f5; /* Lavender blush for the card body */
    color: #ff69b4; /* Pink text color */
    font-weight: bold;
    font-family: Arial, sans-serif;
    padding: 20px;
}

/* Style for user information */
h5 {
    color: #ff69b4; /* Pink for user info text */
    font-family: 'Comic Sans MS', sans-serif;
}

/* Alert message styling */
.alert {
    border-radius: 5px;
    background-color: #ff69b4; /* Use pink for alerts */
    color: white;
    font-weight: bold;
}

.btn-close {
    color: white;
}

</style>
<?php include('includes/footer.php'); ?>