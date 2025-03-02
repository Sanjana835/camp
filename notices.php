<?php
session_start();
require_once 'db_connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id']) && !isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch notices
$sql = "SELECT n.*, u.name as posted_by_name FROM notices n JOIN users u ON n.posted_by = u.id ORDER BY n.date DESC";
$result = $conn->query($sql);

include 'header.php';
?>

<main>
    <section class="notices">
        <h1>Notices</h1>
        <?php if (isset($_SESSION['admin_id'])): ?>
            <a href="add_notice.php" class="btn">Add New Notice</a>
        <?php endif; ?>
        
        <div class="notice-list">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="notice-item <?php echo $row['notice_type']; ?>">
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo htmlspecialchars($row['content']); ?></p>
                    <span class="notice-meta">
                        Posted by: <?php echo htmlspecialchars($row['posted_by_name']); ?> | 
                        Date: <?php echo date('M d, Y', strtotime($row['date'])); ?>
                    </span>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
</main>

<?php
include 'footer.php';
$conn->close();
?>

