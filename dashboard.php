<?php
session_start();
require_once 'db_connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'header.php';
?>

<main>
    <section class="dashboard">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></h1>
        <div class="dashboard-content">
            <div class="dashboard-card">
                <h2>Recent Notices</h2>
                <?php
                $sql = "SELECT * FROM notices ORDER BY date DESC LIMIT 5";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<p>" . htmlspecialchars($row['title']) . " - " . date('M d, Y', strtotime($row['date'])) . "</p>";
                }
                ?>
                <a href="notices.php" class="btn">View All Notices</a>
            </div>
            <div class="dashboard-card">
                <h2>Recent Lost & Found</h2>
                <?php
                $sql = "SELECT * FROM lost_found ORDER BY date DESC LIMIT 5";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<p>" . htmlspecialchars($row['item_name']) . " - " . date('M d, Y', strtotime($row['date'])) . "</p>";
                }
                ?>
                <a href="lost_found.php" class="btn">View All Items</a>
            </div>
        </div>
    </section>
</main>

<?php
include 'footer.php';
$conn->close();
?>

