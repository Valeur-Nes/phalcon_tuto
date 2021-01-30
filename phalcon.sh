#!/bin/bash
if [ -z $1 ]
then
    docker-compose exec app ./vendor/bin/phalcon
else
    docker-compose exec app ./vendor/bin/phalcon "$1"
fi
