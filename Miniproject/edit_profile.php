<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $student_id = 1; // Replace with actual student ID

    $stmt = $conn->prepare("UPDATE student_registration SET name = ?, email = ? WHERE id = ?");
    if ($stmt->execute([$name, $email, $student_id])) {
        echo json_encode(['message' => 'Profile updated successfully']);
    } else {
        echo json_encode(['message' => 'Error updating profile']);
    }
}
?>
