#!/usr/bin/env bash

#rsync -avzo -e ssh laravel-react-webrtc-video-chat/ root@80.211.66.164:/usr/share/nginx/html/
rsync -avzo --exclude-from 'exclude.txt' -e ssh laravel-react-webrtc-video-chat/ root@80.211.66.164:/var/www/html/
#rsync -avzo -e ssh backend/ adminedi@edisoftware.northeurope.cloudapp.azure.com:/www/html/apiediacademy/

sleep 5