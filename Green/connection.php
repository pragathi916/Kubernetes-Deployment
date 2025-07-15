<?php

$dbhost = "mysql";       // Service name in K8s
$dbuser = "root";
$dbpass = "root";
$dbname = "orgpulse";
$dbport = 3306;

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $dbport);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
