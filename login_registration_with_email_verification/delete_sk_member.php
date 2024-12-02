<?php
include('db.php');

if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM sk_members WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        $_SESSION['status'] = "SK Member Deleted Successfully";
    } else {
        $_SESSION['status'] = "Failed to Delete SK Member";
    }
    header("Location: dashboard.php");
}
