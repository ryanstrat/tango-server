<?php

openlog("myScriptLog", LOG_PID | LOG_PERROR, LOG_LOCAL0);

$username = "mhacksv";
$password = "mhacksv!";
$hostname = "192.168.1.51";

syslog(LOG_DEBUG, "REQUEST: ".$_REQUEST.toString());
syslog(LOG_DEBUG, "XYZ_PARCEL: ".$_POST['xyz_parcel']);

$conn = new mysqli($hostname, $username, $password, "mhacksv");

$timestamp = $_POST['timestamp'];
$ij_cols = $_POST['ij_cols'];
$ij_rows = $_POST['ij_rows'];
$xyz_count = $_POST['xyz_count'];
$xyz_parcel = $_POST['xyz_parcel'];

if (!$conn->query("INSERT INTO tango (ij_cols, ij_rows, xyz_count, xyz_parcel, timestamp) VALUES (".$ij_cols.",".$ij_rows.",".$xyz_count.",".$xyz_parcel.",".$timestamp.")")) {
    syslog(LOG_DEBUG, "Data insert failed: (" . $conn->errno . ") " . $conn->error);
}

$conn->close();

closelog();