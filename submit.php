<?php

openlog("myScriptLog", LOG_PID | LOG_PERROR, LOG_LOCAL0);

$username = "mhacksv";
$password = "mhacksv!";
$hostname = "192.168.1.51";

syslog(LOG_DEBUG, "REQUEST: ".$_REQUEST);
syslog(LOG_DEBUG, "Post0: ".$_POST['timestamp']);

$conn = new mysqli($hostname, $username, $password, "mhacksv");

if (!$conn->query("INSERT INTO tango (timestamp) VALUES (".$_POST['timestamp'].")")) {
    syslog(LOG_DEBUG, "Data insert failed: (" . $conn->errno . ") " . $conn->error);
}

$conn->close();

closelog();