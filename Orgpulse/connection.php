<?php

$dbhost = "mysql";
$dbuser = "root";
$dbpass = "";
$dbname = "organ";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("Failed to connect!");
}
