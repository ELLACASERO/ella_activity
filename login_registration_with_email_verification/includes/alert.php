<?php 
if (isset($_SESSION['status'])) {
    $statusMessage = $_SESSION['status'];
    $alertType = 'info'; // Default alert type for SweetAlert

    // Determine the SweetAlert icon type based on the status message
    if (stripos($statusMessage, 'successfully') !== false) {
        $alertType = 'success';
    } elseif (stripos($statusMessage, 'Failed') !== false) {
        $alertType = 'error';
    } elseif (stripos($statusMessage, 'already verified') !== false) {
        $alertType = 'warning';
    }

    // Generate the SweetAlert JavaScript code
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: "' . htmlspecialchars($alertType, ENT_QUOTES, 'UTF-8') . '",
                title: "Alert",
                text: "' . htmlspecialchars($statusMessage, ENT_QUOTES, 'UTF-8') . '",
                confirmButtonColor: "#ff69b4" // Optional: Use a custom pink button color
            });
        });
    </script>';

    unset($_SESSION['status']);
}


?>
