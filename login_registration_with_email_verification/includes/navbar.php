<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<div class="bg-primary-gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">ella_casero</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($current_page == 'Home.php') echo 'active'; ?>" href="Home.php">
                                        <i class="fas fa-home"></i> Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($current_page == 'dashboard.php') echo 'active'; ?>" href="dashboard.php">
                                        <i class="fas fa-tachometer-alt"></i> Dashboard
                                    </a>
                                </li>
                                <?php if(!isset($_SESSION['authenticated'])) :?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($current_page == 'register.php') echo 'active'; ?>" href="register.php">
                                        <i class="fas fa-user-plus"></i> Sign up
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($current_page == 'login.php') echo 'active'; ?>" href="login.php">
                                        <i class="fas fa-sign-in-alt"></i> Login
                                    </a>
                                </li>
                                <?php  endif ?>

                                <?php if(isset($_SESSION['authenticated'])) :?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($current_page == 'logout.php') echo 'active'; ?>" href="logout.php">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </li>
                                <?php  endif ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-primary-gradient {
        background: linear-gradient(45deg, #0d6efd, #6610f2); 
        padding: 1rem 0;
    }

    .navbar-dark .navbar-brand {
        color: #fff;
        font-weight: bold;
        font-size: 2rem;
    }

    .navbar-dark .nav-link {
        color: rgba(255, 255, 255, 0.75);
        transition: color 0.3s ease;
    }

    .navbar-dark .nav-link:hover {
        color: #fff;
    }

    .navbar-dark .nav-link.active {
        color: #fff;
        border-bottom: 2px solid #fff;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%28255, 255, 255, 0.5%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }

   
    @media (min-width: 992px) {
        .navbar {
            padding: 1.5rem 0;

        }

    }
    /* Girly color gradient for the navbar */
.bg-primary-gradient {
    background: linear-gradient(45deg, #ffb6c1, #ff69b4, #ff1493, #ff7f50); /* Soft pink to coral */
    padding: 1rem 0;
}

/* Navbar brand in girly colors */
.navbar-dark .navbar-brand {
    color: #fff;
    font-weight: bold;
    font-family: 'Brush Script MT', cursive; /* Optional: playful font */
}

/* Navbar link colors for girly theme */
.navbar-dark .nav-link {
    color: rgba(255, 255, 255, 0.85);
    transition: color 0.3s ease;
    font-family: 'Comic Sans MS', sans-serif; /* Optional: playful font */
}

.navbar-dark .nav-link:hover {
    color: #fff0f5; /* Lavender blush on hover */
}

.navbar-dark .nav-link.active {
    color: #fff;
    border-bottom: 2px solid #fff;
}

/* Toggler icon color for girly theme */
.navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%28255, 255, 255, 0.85%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

</style>