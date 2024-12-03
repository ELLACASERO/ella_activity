<?php
include('authentication.php');
include('db.php');
include('includes/header.php');
include('includes/navbar.php');

if (isset($_POST['update_sk_member'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "UPDATE sk_members SET name='$name', position='$position', phone='$phone', email='$email' WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['status'] = "SK Member Updated Successfully";
        echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Updated",
                    text: "SK Member Updated Successfully!",
                    confirmButtonColor: "#ff69b4"
                }).then(() => {
                    window.location.href = "dashboard.php";
                });
              </script>';
    } else {
        $_SESSION['status'] = "Failed to Update SK Member";
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Failed to Update SK Member",
                    confirmButtonColor: "#ff1493"
                }).then(() => {
                    window.location.href = "edit_sk_member.php?id='.$id.'";
                });
              </script>';
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM sk_members WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $row = mysqli_fetch_array($query_run);
    } else {
        $_SESSION['status'] = "No Member Found with ID: $id";
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "No Member Found with this ID",
                    confirmButtonColor: "#ff1493"
                }).then(() => {
                    window.location.href = "dashboard.php";
                });
              </script>';
    }
} else {
    $_SESSION['status'] = "No ID Provided";
    header("Location: dashboard.php");
    exit(0);
}
?>

<div class="content-wrapper">
    <div class="floating-container">
        <div class="card shadow-lg">
            <div class="card-header custom-header text-white">
                <h5 class="mb-0 text-center">Edit SK Member</h5>
            </div>
            <div class="card-body bg-light-pink">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">

                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="name" id="name" value="<?= $row['name']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="position" class="form-label">Position</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                            <input type="text" name="position" id="position" value="<?= $row['position']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="text" name="phone" id="phone" value="<?= $row['phone']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" name="email" id="email" value="<?= $row['email']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" name="update_sk_member" class="btn custom-btn-pink w-100">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
        /* Content wrapper ensures navbar stays above */
    .content-wrapper {
        margin-top: 70px; /* Adjust based on your navbar height */
    }

    /* Floating container for the form */
    .floating-container {
        position: relative;
        margin: 0 auto;
        margin-top: 50px; /* Space below navbar */
        width: 100%;
        max-width: 500px; /* Adjust form width */
        padding: 20px;
        background: rgba(255, 182, 193, 0.8); /* Light pink with transparency */
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); /* Smooth shadow */
    }

    /* Card Header: Custom pink color */
    .custom-header {
        background-color: #ff69b4; /* Bright pink */
        font-family: 'Comic Sans MS', sans-serif;
        font-weight: bold;
        text-align: center;
    }

    /* Form Background: Light pink */
    .bg-light-pink {
        background-color: #fff0f5;
        padding: 2rem;
        border-radius: 0.5rem;
    }

    /* Input Group */
    .input-group-text {
        background-color: #ff69b4;
        color: white;
        font-weight: bold;
    }

    .form-control {
        border: 1px solid #ffb6c1;
        border-radius: 0.25rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #ff69b4;
        box-shadow: 0 0 5px rgba(255, 105, 180, 0.5);
    }

    /* Submit Button */
    .custom-btn-pink {
        background-color: #ff1493; /* Deep pink */
        border: 1px solid #ff69b4;
        font-weight: bold;
        color: white;
        transition: all 0.3s ease;
    }

    .custom-btn-pink:hover {
        background-color: #ff69b4;
        border-color: #ff69b4;
        color: white;
    }

    /* Form Labels */
    .form-label {
        font-family: 'Comic Sans MS', sans-serif;
        color: #ff69b4;
        font-weight: bold;
    }

    /* Title */
    h5.mb-0 {
        font-family: 'Comic Sans MS', sans-serif;
        font-size: 1.5rem;
        color: white;
    }

    /* Background styling for the page */
    body {
        background: linear-gradient(135deg, #ffb6c1, #ffe4e1); /* Soft gradient background */
        min-height: 100vh; /* Full viewport height */
    }

</style>

<?php include('includes/footer.php'); ?>
