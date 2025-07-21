<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('Please log in first to delete your profile.'); window.location.href = 'login.php';</script>";
    exit();
}

include("connection.php");
$conn = $con; // reuse the same variable


$username = $_SESSION['username'];
$sql = "DELETE FROM registration WHERE username = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $username);

if ($stmt->execute()) {
    unset($_SESSION['username']);
    echo "<script>alert('Profile deleted successfully.'); window.location.href = 'logo.php';</script>";
} else {
    echo "<script>alert('Profile deletion failed.');</script>";
}

$stmt->close();
$con->close();
?>
