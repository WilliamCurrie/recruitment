# Setup:

- First run: `bash setup`, this will start the docker containers detached and generate the database + import the `init.sql` file
> This setup is for local, an ECS or deployed environment wouldn't use it.

After this you can continue to use:

- `docker-compose up` / `docker-compose down`

Access via: http://localhost:8080/

## Tests

- php bin/phpunit

OR

- docker exec -it test_app php bin/phpunit

```
➜  josh.freeman git:(master) ✗ php bin/phpunit
#!/usr/bin/env php
PHPUnit 6.5.13 by Sebastian Bergmann and contributors.

Testing Symfony FrameworkBundle Test Suite
.............                                                     13 / 13 (100%)

Time: 53 ms, Memory: 6.00MB

OK (13 tests, 32 assertions)
```

## Note

This demo will import the original `init.sql` data during docker-compose.
