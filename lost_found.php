<?php
session_start();
require_once 'db_connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id']) && !isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch lost & found items
$sql = "SELECT lf.*, u.name as posted_by_name FROM lost_found lf JOIN users u ON lf.posted_by = u.id ORDER BY lf.date DESC";
$result = $conn->query($sql);

include 'header.php';
?>

<main>
    <section class="lost-found">
        <h1>Lost & Found</h1>
        <a href="add_lost_found.php" class="btn">Report Item</a>
        
        <div class="lost-found-list">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="lost-found-item <?php echo $row['item_status']; ?>">
                    <h3><?php echo htmlspecialchars($row['item_name']); ?></h3>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                    <span class="item-meta">
                        Posted by: <?php echo htmlspecialchars($row['posted_by_name']); ?> | 
                        Date: <?php echo date('M d, Y', strtotime($row['date'])); ?> |
                        Contact: <?php echo htmlspecialchars($row['contact']); ?>
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

