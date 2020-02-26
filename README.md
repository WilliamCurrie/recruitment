# Refactoring notes

The Docker files have been tweaked to allow the app to run in complete isolation. All you need on your local environment is Docker and Docker Compose.

Here are the steps to build and bootstrap the app:

1. Build and run the container with `docker-compose up -d --build`
2. Once built, access the shell of the container with `docker-compose run app /bin/sh`
3. Inside the shell, build the schema and seed it with data using `sh build/init.sh`

The app should be ready for viewing in the browser. http://localhost:8080

You can run the unit tests inside the app shell using `vendor/bin/phpunit`. The tests use an in-memory Sqlite database ensuring the MySql database is not written to.

# Recruitment Exercise
Please review src/refactor-me.php which contains code that desperately needs improving.  There are a number of bugs and design flaws in it that need addressing.

The task is to refactor this code so that it is functional and also much improved from its current state.  Feel free to refactor as much as you like but we'd ask that you don't use a full framework for your test, though we're happy for you to pull in selected components/libraries.  We want you to consider how the code can be improved; is it maintainable, how can it be made to adhere to best practice. 

Note, to do well in this test you will need to refactor the code into multiple files.  We would anticipate that a good submission should take no longer than 2-4 hours though better submissions are likely to be towards the end of that.  Please note that submissions with automated tests are preferred. 

To complete the exercise, please fork this repository and work directly in your fork. Once you've finished create a Pull Request back to this repository so we can view the diff.

## Docker
We have included a docker setup to allow you to get up and running quickly with this example, though you are under no obligation to use this.  After you have installed docker and forked the repository you will need to:

* Run `docker-compose up` 
* The sample sql should automatically run 
* Visit http://localhost:8080 in your browser

