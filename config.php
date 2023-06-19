<?php

$host = "localhost"; /* Host name */
$user = "kalawaja"; /* User */
$password = "23340"; /* Password */
$dbname = "yuppie"; /* Database name */

$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}