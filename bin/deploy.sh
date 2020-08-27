#!/bin/bash

echo "Moving to project..."
cd ~/pornic

echo "Pulling from repo..."
git checkout master
git reset HEAD --hard
git pull origin master

echo "Installing composer vendors..."
/usr/local/php7.3/bin/php composer.phar install

exit;
