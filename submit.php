<?php

openlog("myScriptLog", LOG_PID | LOG_PERROR, LOG_LOCAL0);

$username = "mhacksv";
$password = "mhacksv!";
$hostname = "192.168.1.51";

syslog(LOG_DEBUG, "REQUEST: ".$_REQUEST);
syslog(LOG_DEBUG, "Post0: ".$_POST['timestamp']);

$conn = new mysqli($hostname, $username, $password, "mhacksv");

$timestamp = $_POST['timestamp'];
$ij_cols = $_POST['ij_cols'];
$ij_rows = $_POST['ij_rows'];
$xyz_count = $_POST['xyz_count'];

if (!$conn->query("INSERT INTO tango (ij_cols, ij_rows, xyz_count, timestamp) VALUES (".$ij_cols.",".$ij_rows.",".$xyz_count.",".$timestamp.")")) {
    syslog(LOG_DEBUG, "Data insert failed: (" . $conn->errno . ") " . $conn->error);
}

$conn->close();

closelog();