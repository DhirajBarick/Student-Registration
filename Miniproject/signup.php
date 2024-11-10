<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    $stmt = $conn->prepare("INSERT INTO student_login (username, password) VALUES (?, ?)");
    if ($stmt->execute([$username, $password])) {
        echo json_encode(['message' => 'User  created successfully']);
    } else {
        echo json_encode(['message' => 'Error creating user']);
    }
}
?>