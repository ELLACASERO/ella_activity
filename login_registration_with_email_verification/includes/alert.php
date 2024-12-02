<?php 
if (isset($_SESSION['status'])) {
    $statusMessage = $_SESSION['status'];
    $alertType = 'info'; // Default alert type for SweetAlert

    // Determine the SweetAlert icon type based on the status message
    if (strpos($statusMessage, 'successfully') !== false) {
        $alertType = 'success';
    } elseif (strpos($statusMessage, 'Failed') !== false) {
        $alertType = 'error';
    } elseif (strpos($statusMessage, 'already verified') !== false) {
        $alertType = 'warning';
    }

    // Generate the SweetAlert JavaScript code
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: '$alertType',
                title: 'Alert',
                text: '$statusMessage',
                confirmButtonColor: '#ff69b4' // Optional: Use a custom pink button color
            });
        });
    </script>";

    unset($_SESSION['status']);
}
?>
