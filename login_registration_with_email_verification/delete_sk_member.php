<?php
include('authentication.php');
include('db.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']); // Sanitize input

    $query = "DELETE FROM sk_members WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        $_SESSION['status'] = "SK Member deleted successfully";
    } else {
        $_SESSION['status'] = "Failed to delete SK Member";
    }
} else {
    $_SESSION['status'] = "No ID provided for deletion";
}
header('Location: dashboard.php');
exit();
?>
