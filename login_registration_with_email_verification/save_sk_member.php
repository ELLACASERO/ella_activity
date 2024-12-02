<?php
include('db.php');

if (isset($_POST['save_sk_member'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "INSERT INTO sk_members (name, position, phone, email) VALUES ('$name', '$position', '$phone', '$email')";
    if (mysqli_query($conn, $query)) {
        $_SESSION['status'] = "SK Member Added Successfully";
        header("Location: dashboard.php");
    } else {
        $_SESSION['status'] = "SK Member Not Added";
        header("Location: add_sk_member.php");
    }
}
