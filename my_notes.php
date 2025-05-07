<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    die("Please log in to view your notes.");
}

$userId = $_SESSION['user_id'];
$sql = "SELECT title, file_name, file_path FROM documents WHERE user_id = ? ORDER BY id DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>My Uploaded Notes</h2>";
if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li><a href='" . htmlspecialchars($row['file_path']) . "' target='_blank'>" . htmlspecialchars($row['title']) . " - " . htmlspecialchars($row['file_name']) . "</a></li>";
    }
    echo "</ul>";
} else {
    echo "No files uploaded yet.";
}

$stmt->close();
?>
