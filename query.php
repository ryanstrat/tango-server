<?php

openlog("myScriptLog", LOG_PID | LOG_PERROR, LOG_LOCAL0);

$username = "mhacksv";
$password = "mhacksv!";
$hostname = "192.168.1.51";

$mysqli = new mysqli($hostname, $username, $password, "mhacksv");

$stmt = $mysqli->stmt_init();
$stmt = $mysqli->prepare("SELECT xyz_count, xyz_parcel, timestamp FROM tango ORDER BY timestamp DESC LIMIT 1");
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();

//printf("id = %s (%s)\n", $row['id'], gettype($row['id']));
//printf("label = %s (%s)\n", $row['label'], gettype($row['label']));

$stmt->close();

$mysqli->close();

closelog();