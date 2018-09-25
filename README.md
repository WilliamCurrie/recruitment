# Set Up

Make sure to create an `.env` file in your app's root folder:

```
APP_ENV=dev

DB_HOST=127.0.0.1
DB_USER=root
DB_PASSWORD=verysecret
DB_NAME=test
DB_PORT=33061
```

## Docker
We have included a docker setup to allow you to get up and running quickly with this example, though you are under no obligation to use this.  After you have installed docker and forked the repository you will need to:

* Run `docker-compose up`
* The sample sql should automatically run
* Visit http://localhost:8080 in your browser
