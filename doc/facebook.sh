#!/bin/bash

# If it redirects to http://www.facebook.com/login.php at the end, wait a few minutes and try again

EMAIL='php_wei_li@163.com' # edit this
PASS='liwei1987821' # edit this

COOKIES='cookies.txt'
USER_AGENT='Firefox/3.5'

curl -X GET 'https://www.facebook.com/home.php' --verbose --user-agent $USER_AGENT --cookie $COOKIES --cookie-jar $COOKIES --location # redirects to https://login.facebook.com/login.php
curl -X POST 'https://login.facebook.com/login.php' --verbose --user-agent $USER_AGENT --data-urlencode "email=${EMAIL}" --data-urlencode "pass=${PASS}" --cookie $COOKIES --cookie-jar $COOKIES
curl -X GET 'https://www.facebook.com/home.php' --verbose --user-agent $USER_AGENT --cookie $COOKIES --cookie-jar $COOKIES
