#!/bin/bash



export QT_QPA_PLATFORM=minimal
export DISPLAY=:0 
export PATH=%PATH:/usr/local/lib/node_modules/phantomjs/bin
export PHANTOMJS_EXECUTABLE=/usr/local/lib/node_modules/phantomjs/bin
xvfb-run -a /usr/local/lib/node_modules/casperjs/bin/casperjs prob9_bot.js
