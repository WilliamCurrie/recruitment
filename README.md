# Set Up

Make sure to create an `.env` file in your app's root folder:

```
APP_ENV=dev

DB_HOST=mysql
DB_USER=testuser
DB_PASSWORD=password
DB_NAME=test
DB_PORT=3306
```

## Start the Docker Services

    docker-compose up --build

## Bootstrap the Test Database

    sudo docker exec -it recruitment_mysql /bin/bash
    mysql -u root -p test < tests/data/init.sql

## Run the App

    http://localhost:8080/

![index.php](/resources/screencapture.png?raw=true)

## Run the Tests

    sudo docker exec -it recruitment_app /bin/bash
    vendor/bin/phpunit
