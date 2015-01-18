<?php

openlog("myScriptLog", LOG_PID | LOG_PERROR, LOG_LOCAL0);

$username = "mhacksv";
$password = "mhacksv!";
$hostname = "192.168.1.51";

$mysqli = new mysqli($hostname, $username, $password, "mhacksv");

if(!is_null($_GET)) {
    if($result = $mysqli->query("SELECT xyz_count, xyz_parcel, timestamp, id FROM tango WHERE id=".$_GET['q']."ORDER BY id DESC LIMIT 1;")) {
        $obj = $result->fetch_object();
        echo json_encode($obj);
    }
} else {
    if($result = $mysqli->query("SELECT xyz_count, xyz_parcel, timestamp, id FROM tango ORDER BY id DESC LIMIT 1;")) {
        $obj = $result->fetch_object();
        echo json_encode($obj);
    }
}

$mysqli->close();

closelog();

?>