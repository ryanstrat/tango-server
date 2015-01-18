<?php

openlog("myScriptLog", LOG_PID | LOG_PERROR, LOG_LOCAL0);

$username = "mhacksv";
$password = "mhacksv!";
$hostname = "192.168.1.51";

$mysqli = new mysqli($hostname, $username, $password, "mhacksv");


$result = $mysqli->query("SELECT xyz_count, xyz_parcel, timestamp FROM tango ORDER BY timestamp DESC LIMIT 1");
var_dump($result);

echo $xyz_count."<br>";
echo $xyz_parcel."<br>";
echo $timestamp;

//printf("id = %s (%s)\n", $row['id'], gettype($row['id']));
//printf("label = %s (%s)\n", $row['label'], gettype($row['label']));

$stmt->close();

$mysqli->close();

closelog();