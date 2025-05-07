<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileTmp = $file['tmp_name'];
    $fileSize = $file['size'];
    $uploadDir = "uploads/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $filePath = $uploadDir . basename($fileName);
    if (move_uploaded_file($fileTmp, $filePath)) {
        $stmt = $conn->prepare("INSERT INTO documents (title, file_name, file_path, file_size) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $title, $fileName, $filePath, $fileSize);
        if ($stmt->execute()) {
            header("Location:index.html");
        } else {
            echo "Database error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "File upload failed!";
    }
}
?>
