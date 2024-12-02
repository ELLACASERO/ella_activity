<?php
include('db.php');

if (isset($_POST['update_sk_member'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "UPDATE sk_members SET name='$name', position='$position', phone='$phone', email='$email' WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        $_SESSION['status'] = "SK Member Updated Successfully";
    } else {
        $_SESSION['status'] = "Failed to Update SK Member";
    }
    header("Location: dashboard.php");
    exit(0);
} else {
    $_SESSION['status'] = "Unauthorized Access";
    header("Location: dashboard.php");
    exit(0);
}
