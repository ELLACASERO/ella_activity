<?php 
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_SESSION['authenticated'])) {
    
    $_SESSION['status'] = "Yippee! You’re already in your happy place!";
    header('Location: dashboard.php');
    exit(0);

}


$page_title = "Login Form";
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5 bg-light"> 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
               
                   <!-- Include alert messages -->
                <?php include('includes/alert.php'); ?>
  
                <div class="card shadow-lg">
                    <div class="card-header custom-header text-white">
                        <h5 class="mb-0">Login Form</h5> 
                    </div>
                    <div class="card-body">
                        <form action="process_login.php" method="POST">
                            
                            <!-- Email Address -->
                            <div class="form-group mb-3 position-relative"> 
                                <label for="email">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                                </div>
                            </div>
                            
                            <!-- Password -->
                            <div class="form-group mb-3 position-relative"> 
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                                </div>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="form-group text-center">
                                <button type="submit" name="login_btn" class="btn btn-primary w-100">Login</button> 
                            </div>
                        
                            <div class="form-group text-center mt-3">
                                <p>Don't have an account yet? <a href="register.php">Sign Up</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>

    /* Girly-themed background */
.py-5.bg-light {
    background-color: #ffe4e1; /* Light pink background */
}

/* Card header: custom pink color instead of default blue */
.custom-header {
    background-color: #ff69b4; /* Bright pink */
    color: #fff;
    font-family: 'Comic Sans MS', sans-serif; /* Optional playful font */
    font-weight: bold;
}

.card-body {
    background-color: #fff0f5; /* Lavender blush */
    padding: 2rem;
    border-radius: 0.5rem;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow */
}

/* Input group and form elements */
.input-group-text {
    background-color: #ff69b4;
    color: white;
}

.form-control {
    border: 1px solid #ffb6c1; /* Soft pink border */
    border-radius: 0.25rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #ff69b4;
    box-shadow: 0 0 5px rgba(255, 105, 180, 0.5);
}

/* Button */
.btn-primary {
    background-color: #ff1493; /* Deep pink */
    border-color: #ff69b4;
    font-weight: bold;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #ff69b4; /* Lighter pink on hover */
    border-color: #ff69b4;
}

/* Links */
a {
    color: #ff1493;
    text-decoration: none;
}

a:hover {
    color: #ff69b4;
    text-decoration: underline;
}

/* Custom form styling */
.form-group label {
    font-family: 'Comic Sans MS', sans-serif;
    color: #ff69b4;
    font-weight: bold;
}

h5.mb-0 {
    font-family: 'Comic Sans MS', sans-serif;
    font-size: 1.25rem;
    color: white;
}

</style>
<?php include('includes/footer.php'); ?>