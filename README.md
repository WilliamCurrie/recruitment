# Approach
I focused on bug-fix and refactor and did not extend the functionality of the app nor did I vastly change it's appearance.

I used the exercise to expose some coding abilities and not as the production of a real application. I considered the rendered page as just a convenient proof the code is working.

I did not modify the database. Hypothetically the production database could be used by other apps and services. The production dataset may conflict with modifications etc.

# Run the app
* Run `docker-compose up -d` 
* Allow time for the composer container to install dependencies 
* Allow time for the SQL sample to run
* Visit http://localhost:8080 in your browser

## Highlights
* Used PSR-12 style.
* Used MVC and other OOP structures and principles
* Used (nullable) type hints including scalar
* Used return type declarations
* Created PHPUnit tests.
* Used input validation.
* Used PDO, mysqli is legacy.
* Used prepared statements to stop SQL injection.
* Used composer to manage dependencies.
* Used twig templates to remove presentation logic from business logic.
* Twig escapes output to prevent code injection.
* Reduced nginx raw file access to just index.php and css.
* Added some user feedback in response to user inputs to expose the server-side validation
* For test purposes only, I added services to docker-compose to run php composer

## What else could be done
* Finish unit tests for uncovered code
* Unit test methods could be broken down and further improved
* Add user accounts and authentication with bcrypt/argon2 password hashing and brute force protection.
* Add CSRF protection.
* Change "second_name" to "last_name" in the code and database field. "'"last_name" and "surname"
are both more explicit than second_name, especially with a more diverse audience. A possible
solution to the complexity of names across different cultures is to ask for "full_name" plus
optional "preferred_name" to allow for the more casual "Hey Rob!" situations whilst capturing the
actual full name.
* Change customerId to customer_id to match the convention.
* Use innodb engine rather than MyISAM if no specific MyISAM properties are needed.
* Add indexes to database tables.
* Add unique indexes to tables to prevent conflicts and duplication
* The Latin1 charset won't allow the multi-byte characters. utf8 and utf8mb4 cover cases where (for example)
  content may be multi-lingual or "richly emotive" ;).
* Add integration tests to test the app as it runs. Behat is a nice option for this.
* Improve style and UX of page.
* Use ajax to provide sortable lists.
* Add client-side input validation and add 'required' property to inputs as necessary.
* Extend to allow full CRUD on customers and bookings
* Add full request routing
* Use factory pattern for Controllers, Models & Validators
* Create abstract controller, abstract model & abstract validator describe the basic shared dependencies and for common type hinting
