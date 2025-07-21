<?php
// Database connection
$con = mysqli_connect("localhost", "root", "", "organ");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Count donors
$countDonorsQuery = "SELECT COUNT(*) AS num_donors FROM donor";
$resultDonors = mysqli_query($con, $countDonorsQuery);
$rowDonors = mysqli_fetch_assoc($resultDonors);
$numDonors = $rowDonors['num_donors'];

// Count patients
$countPatientsQuery = "SELECT COUNT(*) AS num_patients FROM patients";
$resultPatients = mysqli_query($con, $countPatientsQuery);
$rowPatients = mysqli_fetch_assoc($resultPatients);
$numPatients = $rowPatients['num_patients'];

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor and Patient Counts</title>
</head>
<body>
    <h1>Donor and Patient Counts</h1>
    <p>Total Donors: <?php echo $numDonors; ?></p>
    <p>Total Patients: <?php echo $numPatients; ?></p>
</body>
</html>
