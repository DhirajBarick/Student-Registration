<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = 1; // Replace with actual student ID (you may want to retrieve this from session)
    $uploadDir = 'uploads/'; // Directory to save uploaded files

    foreach ($_FILES['documents']['name'] as $key => $name) {
        $tmpName = $_FILES['documents']['tmp_name'][$key];
        $filePath = $uploadDir . basename($name);
        
        if (move_uploaded_file($tmpName, $filePath)) {
            $stmt = $conn->prepare("INSERT INTO document_track (student_id, document_name) VALUES (?, ?)");
            $stmt->execute([$student_id, $name]);
        }
    }
    echo json_encode(['message' => 'Documents uploaded successfully']);
}
?>