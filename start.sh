#!/bin/bash

./wait-for-it.sh database:3306

/var/www/test/src/console migrations:migrate --no-interaction --quiet