<?php


openlog("myScriptLog", LOG_PID | LOG_PERROR, LOG_LOCAL0);
syslog (LOG_DEBUG , "PHP: ".var_dump($_REQUEST));

closelog();