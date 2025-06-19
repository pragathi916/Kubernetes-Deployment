<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Please log in first to view your profile.'); window.location.href = 'login.php';</script>";
    exit();
}

// Database connection
$con = mysqli_connect("mysql", "root", "root", "organ");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get username from session
$username = $_SESSION['username'];

// Query to fetch user details from registration table
$query_user = "SELECT * FROM registration WHERE username = '$username'";
$result_user = mysqli_query($con, $query_user);

// Query to fetch user details from donor table
$query_donor = "SELECT * FROM donor WHERE username = '$username'";
$result_donor = mysqli_query($con, $query_donor);

// Query to fetch user details from patient table
$query_patient = "SELECT * FROM patients WHERE username = '$username'";
$result_patient = mysqli_query($con, $query_patient);

// Check if user exists in the registration table
if (mysqli_num_rows($result_user) > 0) {
    $row_user = mysqli_fetch_assoc($result_user);
    // Display user details
    echo "<div class='container'>";
    echo "<h1>User Profile</h1>";
    echo "<table>";
    echo "<tr><td>Username:</td><td>" . $row_user['username'] . "</td></tr>";
    echo "<tr><td>Email:</td><td>" . $row_user['email'] . "</td></tr>";
    echo "<tr><td>Password:</td><td>" . $row_user['password'] . "</td></tr>";
    echo "</table>";

    // Check if user exists in the donor table
    if (mysqli_num_rows($result_donor) > 0) {
        $row_donor = mysqli_fetch_assoc($result_donor);
        // Display donor details
        echo "<h1>Donor Details</h1>";
        echo "<table>";
        echo "<tr><td>Place:</td><td>" . $row_donor['place'] . "</td></tr>";
        echo "<tr><td>Blood Group:</td><td>" . $row_donor['blood_group'] . "</td></tr>";
        echo "<tr><td>Contact:</td><td>" . $row_donor['contact'] . "</td></tr>";
        echo "<tr><td>Organ:</td><td>" . $row_donor['organ'] . "</td></tr>";
        echo "<tr><td>Age:</td><td>" . $row_donor['age'] . "</td></tr>";
        echo "<tr><td>UserType:</td><td>" . $row_donor['usertype'] . "</td></tr>";
        echo "</table>";

    } elseif (mysqli_num_rows($result_patient) > 0) {
        // Check if user exists in the patient table
        $row_patient = mysqli_fetch_assoc($result_patient);
        // Display patient details
        echo "<h1>Patient Details</h1>";
        echo "<table>";
        echo "<tr><td>Place:</td><td>" . $row_patient['place'] . "</td></tr>";
        echo "<tr><td>Blood Group:</td><td>" . $row_patient['blood_group'] . "</td></tr>";
        echo "<tr><td>Contact:</td><td>" . $row_patient['contact'] . "</td></tr>";
        echo "<tr><td>Organ:</td><td>" . $row_patient['organ'] . "</td></tr>";
        echo "<tr><td>Age:</td><td>" . $row_patient['age'] . "</td></tr>";
        echo "<tr><td>UserType:</td><td>" . $row_patient['usertype'] . "</td></tr>";
        echo "</table>";

    } else {
        echo "<p>User not registered as donor/patient</p>";
    }

    echo "</div>"; // Close container
} else {
    echo "<p>User not found</p>";
}

// Close database connection
mysqli_close($con);
?>
<html>
<head>
  <title>view profile</title>
  <style>
      body {
        background-image: url('bg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: Arial, sans-serif;
        color: #333;
      }

      .container {
        max-width: 800px;
        margin: 20px auto;
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      }

      h1 {
        color: #990011;
        margin-bottom: 20px;
      }

      h2 {
        color: #333;
        margin-top: 20px;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
      }

      table, th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
      }

      th {
        background-color: #f2f2f2;
        color: #333;
      }

      tr:nth-child(even) {
        background-color: #f2f2f2;
      }

      tr:hover {
        background-color: #ddd;
      }

      button {
        background-color: #990011;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
      }

      button:hover {
        background-color: #7A001D;
      }

      button:focus {
        outline: none;
      }
</style></head>
<body>
<center>
<button onclick="window.location.href='logo.php';">Return Home</button>
</center>
</body>
</html>
