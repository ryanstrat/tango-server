<?php

openlog("myScriptLog", LOG_PID | LOG_PERROR, LOG_LOCAL0);

$username = "mhacksv";
$password = "mhacksv!";
$hostname = "192.168.1.51";

$mysqli = new mysqli($hostname, $username, $password, "mhacksv");

$timestamp = $_POST['timestamp'];
$xyz_count = $_POST['xyz_count'];
$xyz_parcel = $_POST['xyz_parcel'];


if (!($stmt = $mysqli->prepare("INSERT INTO tango (xyz_count, xyz_parcel, timestamp) VALUES (?,?,?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

/* Prepared statement, stage 2: bind and execute */
$stmt->bind_param("isd", $xyz_count, $xyz_parcel, $timestamp);

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

$stmt->close();


$mysqli->close();

closelog();

?>