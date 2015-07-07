#!/usr/bin/env bash
sudo apt-get install php5 phpunit
wget https://getcomposer.org/download/1.0.0-alpha10/composer.phar --no-check-certificate
php composer.phar install