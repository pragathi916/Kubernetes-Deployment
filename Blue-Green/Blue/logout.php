<?php
session_start();

// Include centralized database connection
include("connection.php");

// Check if user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Check if the user exists in login_details
    $stmt_check = mysqli_prepare($con, "SELECT username FROM login_details WHERE username = ?");
    mysqli_stmt_bind_param($stmt_check, "s", $username);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    if (mysqli_stmt_num_rows($stmt_check) > 0) {
        mysqli_stmt_close($stmt_check);

        // Delete user from login_details
        $stmt_delete = mysqli_prepare($con, "DELETE FROM login_details WHERE username = ?");
        mysqli_stmt_bind_param($stmt_delete, "s", $username);
        mysqli_stmt_execute($stmt_delete);
        mysqli_stmt_close($stmt_delete);
    }

    // End session
    session_unset();
    session_destroy();
    mysqli_close($con);

    echo "<script>alert('Logged out successfully. Redirecting to homepage.');</script>";
    echo '<meta http-equiv="refresh" content="2;url=logo.php">';
    exit();
} else {
    echo "<script>alert('Please login first.');</script>";
    echo '<meta http-equiv="refresh" content="0;url=login.php">';
    exit();
}
?>
