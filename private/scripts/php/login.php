<?php
// login.php
session_start();
require_once 'config.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM Users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['display_name'] = $user['display_name'];
        header('Location: ../../../public/dashboard.php');
    } else {
        echo "Invalid password.";
    }
} else {
    echo "User not found.";
}
$stmt->close();
$conn->close();
?>

