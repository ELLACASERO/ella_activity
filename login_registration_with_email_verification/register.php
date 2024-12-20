<?php 
session_start();
$page_title = "Registration Form";
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="py-5 bg-light"> 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
            
            <!-- Alert Messages -->
                <div class="alert <?php echo isset($_SESSION['status']) ? (strpos($_SESSION['status'], 'Success') !== false ? 'alert-success' : (strpos($_SESSION['status'], 'exists') !== false ? 'alert-warning' : 'alert-danger')) : ''; ?> alert-dismissible fade show" role="alert">
                    <?php 
                        if (isset($_SESSION['status'])) { 
                            if (strpos($_SESSION['status'], 'Success') !== false) {
                                echo "<i class='fas fa-check-circle'></i> " . $_SESSION['status'];
                            } elseif (strpos($_SESSION['status'], 'exists') !== false) {
                                echo "<i class='fas fa-exclamation-circle'></i> " . $_SESSION['status'];
                            } else {
                                echo "<i class='fas fa-times-circle'></i> " . $_SESSION['status'];
                            }
                            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            unset($_SESSION["status"]); // Clear status after displaying
                        }
                    ?>
                </div>
                <div class="card shadow-lg">
                    <div class="card-header custom-header text-white">
                        <h5 class="mb-0">Registration Form</h5> 
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <!-- Name -->
                            <div class="form-group mb-3 position-relative"> 
                                <label for="name">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
                                </div>
                            </div>
                            
                            <!-- Phone Number -->
                            <div class="form-group mb-3 position-relative"> 
                                <label for="phone">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" pattern="[0-9]{10}" title="Enter a valid 10-digit phone number" required>
                                </div>
                            </div>
                            
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
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" minlength="6" required>
                                </div>
                            </div>
                            
                            <!-- Confirm Password -->
                            <div class="form-group mb-3 position-relative"> 
                                <label for="confirm_password">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm your password" minlength="6" required>
                                </div>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="form-group text-center">
                                <button type="submit" name="register_btn" class="btn btn-primary w-100">Register</button> 
                            </div>
                            <div class="form-group text-center mt-3">
                                <p>Already have an account? <a href="login.php">Login</a></p>
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