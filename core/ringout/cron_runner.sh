#!/bin/bash
echo "["$(date)"] start cron_runner"
for i in {1..9};
do
    /usr/bin/php /var/www/html/informator/core/ringout/ringout.php 1>>/var/log/asterisk/ringing_system.log 2>>/var/log/asterisk/ringing_system.err.log
    sleep 5
done