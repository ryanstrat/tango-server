<?php

openlog("myScriptLog", LOG_PID | LOG_PERROR, LOG_LOCAL0);

$username = "mhacksv";
$password = "mhacksv!";
$hostname = "192.168.1.51";

$mysqli = new mysqli($hostname, $username, $password, "mhacksv");


if($result = $mysqli->query("SELECT xyz_count, xyz_parcel, timestamp FROM tango ORDER BY id DESC LIMIT 1;")) {
    $obj = $result->fetch_object();
    echo json_encode($obj);
}

$stmt->close();

$mysqli->close();

closelog();

?>