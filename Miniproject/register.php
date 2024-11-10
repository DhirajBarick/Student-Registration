<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO student_registration (name, dob, email) VALUES (?, ?, ?)");
    if ($stmt->execute([$name, $dob, $email])) {
        echo json_encode(['message' => 'Registration successful']);
    } else {
        echo json_encode(['message' => 'Error in registration']);
    }
}
?>