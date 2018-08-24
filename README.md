# Submission Notes
Please accept this pull request as my test submission. Just a couple of notes to make:

1) The database migrations are run as part of the `docker-compose up` command but there is a `wait-for-it.sh` script
included to wait for the database service to complete initialization before running the commands. The expected data will
not display in the browser until all services are fully running

2) To run the test suite execute `docker-compose run --rm app /var/www/test/src/vendor/bin/phpunit`

# Recruitment Exercise
Please review src/refactor-me.php which contains code that desperately needs improving.  There are a number of bugs and design flaws in it that need addressing.

The task is to refactor this code so that it is functional and also much improved from its current state.  Feel free to refactor as much as you like but we'd ask that you don't use a full framework for your test, though we're happy for you to pull in selected components/libraries.  We want you to consider how the code can be improved; is it maintainable, how can it be made to adhere to best practice. 

Note, to do well in this test you will need to refactor the code into multiple files.  We would anticipate that a good submission should take no longer than 2-3 hours though better submissions are likely to be towards the end of that.

To complete the exercise, please fork this repository and work directly in your fork. Once you've finished create a Pull Request back to this repository so we can view the diff.

## Docker
We have included a docker setup to allow you to get up and running quickly with this example, though you are under no obligation to use this.  After you have installed docker and forked the repository you will need to:

* Run `docker-compose up` 
* The sample sql should automatically run 
* Visit http://localhost:8080 in your browser