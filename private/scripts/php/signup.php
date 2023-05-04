<?php
session_start();
require_once 'config.php';

$display_name = $_POST['display_name'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$user_type = $_POST['user_type'];

if ($_POST['password'] !== $_POST['confirm_password']) {
  echo "Passwords do not match.";
  exit;
}

$sql = "INSERT INTO Users (display_name, first_name, last_name, email, password, user_type) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
  echo "Error: " . $conn->error;
  exit;
}

$stmt->bind_param('ssssss', $display_name, $first_name, $last_name, $email, $password, $user_type);

if ($stmt->execute()) {
  // ...
  
  $font = '../../styles/Product_Sans_Bold.ttf';
  $image = imagecreate(256, 256);
  $background = imagecolorallocate($image, 143, 239, 191);
  $text = imagecolorallocate($image, 43, 45, 66);
  $string = strtoupper(substr($first_name, 0, 1) . substr($last_name, 0, 1));
  $fontSize = 64;
  $boundingBox = imagettfbbox($fontSize, 0, $font, $string);
  $textWidth = $boundingBox[2] - $boundingBox[0];
  $textHeight = $boundingBox[1] - $boundingBox[7];
  $x = (imagesx($image) - $textWidth) / 2;
  $y = (imagesy($image) - $textHeight) / 2 + $textHeight;
  imagettftext($image, $fontSize, 0, $x, $y, $text, $font, $string);
  
  $user_id = $stmt->insert_id;
  
  // Use this file path for generating the image and saving it
  $generationFilePath = "../../media/user/images/{$user_id}.png";
  
  // Use this file path for storing the image path in the database
  $databaseFilePath = "../private/media/user/images/{$user_id}.png";
  
  // Generate the image and save it using the generation file path
  imagepng($image, $generationFilePath);
  imagedestroy($image);
  
  // Update the user's profile image in the database using the database file path
  $sql = "UPDATE Users SET profile_image = ? WHERE user_id = ?";
  $stmt2 = $conn->prepare($sql);
  $stmt2->bind_param('si', $databaseFilePath, $user_id);
  $stmt2->execute();
  $stmt2->close();
  
  // Redirect to the dashboard
  $_SESSION['user_id'] = $user_id;
  $_SESSION['display_name'] = $display_name;
  header('Location: ../../../public/dashboard.php');
} else {
  echo "Error: Account creation failed. Please try again.";
}

$stmt->close();
$conn->close();
?>
