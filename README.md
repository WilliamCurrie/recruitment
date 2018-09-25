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

## Docker
We have included a docker setup to allow you to get up and running quickly with this example, though you are under no obligation to use this.  After you have installed docker and forked the repository you will need to:

* Run `docker-compose up`
* The sample sql should automatically run
* Visit http://localhost:8080 in your browser
