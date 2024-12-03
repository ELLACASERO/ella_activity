<?php 
include('authentication.php');

$page_title = "Dashboard";
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="dashboard-container py-5"> 
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

                <?php include('includes/alert.php'); ?>

                <div class="card shadow-lg">
                    <div class="card-header">
                        <h5>User Dashboard</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Dashboard Stats -->
                            <div class="col-md-4 mb-4">
                                <div class="card info-card shadow-sm">
                                    <div class="card-header text-center">
                                        Total SK Members
                                    </div>
                                    <div class="card-body text-center">
                                        <h3>120</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card info-card shadow-sm">
                                    <div class="card-header text-center">
                                        Active Projects
                                    </div>
                                    <div class="card-body text-center">
                                        <h3>15</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card info-card shadow-sm">
                                    <div class="card-header text-center">
                                        Upcoming Events
                                    </div>
                                    <div class="card-body text-center">
                                        <h3>5</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SK Management Section -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow-lg">
                                    <div class="card-header">
                                        <h5>SK Management</h5>
                                    </div>
                                    <div class="card-body"> 
                                        <!-- Search Bar -->
                                        <input type="text" id="searchBox" class="form-control mb-3" placeholder="Search SK Members..." onkeyup="searchTable()">

                                        <a href="add_sk_member.php" class="btn btn-primary mb-3">Add New SK Member</a>
                                        <table class="table table-bordered table-hover" id="skMembersTable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Fetch SK members from the database
                                                include('db.php'); // Include database connection
                                                $query = "SELECT * FROM sk_members";
                                                $query_run = mysqli_query($conn, $query);

                                                if (mysqli_num_rows($query_run) > 0) {
                                                    foreach ($query_run as $row) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $row['id']; ?></td>
                                                            <td><?= $row['name']; ?></td>
                                                            <td><?= $row['position']; ?></td>
                                                            <td><?= $row['phone']; ?></td>
                                                            <td><?= $row['email']; ?></td>
                                                            <td>
                                                                <a href="edit_sk_member.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                                <button class="btn btn-danger btn-sm delete-btn" data-id="<?= $row['id']; ?>">Delete</button>
                                                                                                                            
                                                                <script>
                                                                    document.addEventListener("DOMContentLoaded", function() {
                                                                    const deleteButtons = document.querySelectorAll('.delete-btn');

                                                                    deleteButtons.forEach(button => {
                                                                        button.addEventListener('click', function() {
                                                                            const memberId = this.getAttribute('data-id');

                                                                            Swal.fire({
                                                                                title: 'Are you sure?',
                                                                                text: "You won't be able to revert this!",
                                                                                icon: 'warning',
                                                                                showCancelButton: true,
                                                                                confirmButtonColor: '#ff69b4',
                                                                                cancelButtonColor: '#d33',
                                                                                confirmButtonText: 'Yes, delete it!',
                                                                                cancelButtonText: 'Cancel'
                                                                            }).then((result) => {
                                                                                if (result.isConfirmed) {
                                                                                    if (memberId) {
                                                                                        window.location.href = 'delete_sk_member.php?id=' + memberId;
                                                                                    } else {
                                                                                        Swal.fire({
                                                                                            icon: 'error',
                                                                                            title: 'Error',
                                                                                            text: 'No member ID found for deletion.'
                                                                                        });
                                                                                    }
                                                                                }
                                                                            });
                                                                        });
                                                                    });
                                                                });
                                                                </script>

                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='6' class='text-center'>No SK Members Found</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
<style>
/* Background and Layout */
.dashboard-container {
    background-color: #ffe4e1; /* Light pink background */
}

/* Card styles */
.card {
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(255, 105, 180, 0.2); /* Soft pink shadow */
}

.card-header {
    background-color: #ff1493; /* Deep pink for card header */
    color: white;
    font-weight: bold;
    font-family: 'Comic Sans MS', sans-serif; /* Optional playful font */
    border-bottom: 2px solid #ff69b4;
    text-align: center;
}

.card-body {
    background-color: #fff0f5; /* Lavender blush for the card body */
    color: #ff69b4; /* Pink text color */
}

/* Info Cards */
.info-card {
    transition: transform 0.3s ease-in-out, box-shadow 0.3s;
    background: rgba(255, 182, 193, 0.8); /* Soft pink with transparency */
}

.info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(255, 105, 180, 0.3);
}

/* Button Styles */
.btn-primary {
    background: #ff69b4; /* Bright pink */
    border: none;
    font-weight: bold;
}

.btn-primary:hover {
    background: #ff1493;
}

/* Table */
.table-hover tbody tr:hover {
    background-color: rgba(255, 105, 180, 0.2); /* Highlight rows */
}

/* Responsive Styling */
@media (max-width: 768px) {
    .info-card {
        margin-bottom: 20px;
    }
}

.table {
    border: 2px solid #ffb6c1; /* Light pink border for the table */
    border-radius: 10px; /* Optional: Rounded corners for the table */
}

.table th, 
.table td {
    border: 1px solid #ffb6c1; /* Light pink border for cells */
}

/* Table Header Styling */
.table thead th {
    background-color: #ff1493;
    color: white; /* White text color for better contrast */
    text-align: center; /* Center-align header text */
    font-weight: bold; /* Bold text */
}

/* Hover Effect for Table Rows */
.table-hover tbody tr:hover {
    background-color: rgba(255, 182, 193, 0.2); /* Light pink hover effect */
}
</style>

<script>
    // Initialize DataTables
    $(document).ready(function () {
        $('#skMembersTable').DataTable();
    });
</script>

<script>
    // Search function for filtering SK Members
    function searchTable() {
        let input = document.getElementById('searchBox');
        let filter = input.value.toLowerCase();
        let table = document.getElementById('skMembersTable');
        let rows = table.getElementsByTagName('tr');

        for (let i = 1; i < rows.length; i++) {
            let cells = rows[i].getElementsByTagName('td');
            let found = false;
            
            for (let j = 0; j < cells.length - 1; j++) {
                if (cells[j].textContent.toLowerCase().includes(filter)) {
                    found = true;
                }
            }

            if (found) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
</script>

<?php include('includes/footer.php'); ?>
