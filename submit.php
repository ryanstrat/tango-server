<?php

openlog("myScriptLog", LOG_PID | LOG_PERROR, LOG_LOCAL0);

$username = "mhacksv";
$password = "mhacksv!";
$hostname = "192.168.1.51";

syslog(LOG_DEBUG, "XYZ_PARCEL: ".$_POST['xyz_parcel']);

$mysqli = new mysqli($hostname, $username, $password, "mhacksv");

$timestamp = $_POST['timestamp'];
$ij_cols = $_POST['ij_cols'];
$ij_rows = $_POST['ij_rows'];
$xyz_count = $_POST['xyz_count'];
$xyz_parcel = $_POST['xyz_parcel'];

/*if (!$conn->query("INSERT INTO tango (ij_cols, ij_rows, xyz_count, xyz_parcel, timestamp) VALUES (".$ij_cols.",".$ij_rows.",".$xyz_count.",".$xyz_parcel.",".$timestamp.")")) {
    syslog(LOG_DEBUG, "Data insert failed: (" . $conn->errno . ") " . $conn->error);
}*/
if (!($stmt = $mysqli->prepare("INSERT INTO tango (xyz_count, xyz_parcel, timestamp) VALUES (?,?,?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

/* Prepared statement, stage 2: bind and execute */
$id = 1;
if (!$stmt->bind_param("i", $xyz_count) || !$stmt->bind_param("s", $xyz_parcel) || $stmt->bind_param("d", $timestamp)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

$stmt->close()

$conn->close();

closelog();