<?php


openlog("myScriptLog", LOG_PID | LOG_PERROR, LOG_LOCAL0);
syslog (LOG_DEBUG , "PHP Request: ".var_dump($_REQUEST));
syslog (LOG_DEBUG , "PHP Post: ".var_dump($_POST));


closelog();