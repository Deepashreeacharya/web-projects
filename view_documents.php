<?php
include 'db.php';

$sql = "SELECT title, file_name, file_path FROM documents ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li><a href='" . htmlspecialchars($row['file_path']) . "' target='_blank'>" . htmlspecialchars($row['title']) . " - " . htmlspecialchars($row['file_name']) . "</a></li>";
    }
    echo "</ul>";
} else {
    echo "No files found.";
}
?>
