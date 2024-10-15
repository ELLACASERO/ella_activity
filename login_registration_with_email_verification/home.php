<?php 
$page_title = "Home Page";
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Hero Section -->
<div class="bg-light py-5 text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-4">Welcome to Ella Añana</h1>
                <p class="lead">A Secure Login and Registration System with Email Verification</p>
                <a href="register.php" class="btn btn-pink btn-lg">
                    <i class="fas fa-user-plus"></i> Get Started
                </a>
                <a href="login.php" class="btn btn-outline-pink btn-lg ms-2">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <i class="fas fa-shield-alt fa-3x text-primary mb-3"></i>
                <h5>Secure Authentication</h5>
                <p>We use the latest encryption and security techniques to ensure your data is protected.</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-envelope fa-3x text-success mb-3"></i>
                <h5>Email Verification</h5>
                <p>All users are required to verify their email address, ensuring account validity and security.</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-user-check fa-3x text-info mb-3"></i>
                <h5>User-Friendly Interface</h5>
                <p>Our platform is designed with simplicity in mind, providing a smooth user experience.</p>
            </div>
        </div>
    </div>
</div>

<style>
    /* Hero section background */
.bg-light.py-5 {
    background-color: #ffe4e1; /* Light pink background */
}

h1.display-4 {
    color: #ff69b4; /* Bright pink */
    font-family: 'Comic Sans MS', sans-serif; /* Optional playful font */
    font-weight: bold;
}

p.lead {
    color: #ff1493; /* Deep pink for the lead text */
}

/* Buttons */
.btn-pink {
    background-color: #ff1493; /* Deep pink button */
    border-color: #ff69b4;
    color: white;
    font-weight: bold;
    transition: all 0.3s ease;
}

.btn-pink:hover {
    background-color: #ff69b4; /* Lighter pink on hover */
    border-color: #ff69b4;
}

.btn-outline-pink {
    color: #ff69b4;
    border-color: #ff69b4;
    font-weight: bold;
    transition: all 0.3s ease;
}

.btn-outline-pink:hover {
    background-color: #ff69b4;
    color: white;
}

/* Features Section */
.py-5 {
    background-color: #fff0f5; /* Lavender blush for features section */
}

h5 {
    color: #ff1493; /* Deep pink for feature titles */
    font-family: 'Comic Sans MS', sans-serif;
}

p {
    color: #ff69b4; /* Lighter pink for feature descriptions */
}

.text-primary {
    color: #ff69b4 !important; /* Change text-primary to bright pink */
}

.text-success {
    color: #ff69b4 !important; /* Align icons with the theme */
}

.text-info {
    color: #ff1493 !important; /* Use deep pink for info icons */
}

</style>

<?php include('includes/footer.php'); ?>