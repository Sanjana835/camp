<?php
session_start();
require_once 'db_connect.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include 'header.php';
?>

<main>
    <section class="admin-dashboard">
        <h1>Admin Dashboard</h1>
        <div class="admin-dashboard-content">
            <div class="dashboard-card">
                <h2>Manage Notices</h2>
                <a href="manage_notices.php" class="btn">View/Edit Notices</a>
                <a href="add_notice.php" class="btn">Add New Notice</a>
            </div>
            <div class="dashboard-card">
                <h2>Manage Lost & Found</h2>
                <a href="manage_lost_found.php" class="btn">View/Edit Items</a>
            </div>
            <div class="dashboard-card">
                <h2>User Management</h2>
                <a href="manage_users.php" class="btn">Manage Users</a>
            </div>
        </div>
    </section>
</main>

<?php
include 'footer.php';
$conn->close();
?>

