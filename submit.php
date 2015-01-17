<?php


openlog("myScriptLog", LOG_PID | LOG_PERROR, LOG_LOCAL0);
syslog (LOG_DEBUG , "PHP: ".json_encode($_REQUEST));

closelog();