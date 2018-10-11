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

## Todo / Explaination
Added Composer to use some strong, well tested dependencies and brought in PHPUnit Testing. I'm using Eloquent to handle the Database connection as this has been developed for years it's likely there are less bugs and more thoughts about how the data should be dealt with and cleaned to prevent SQL Injection, creating a custom Database Connector could be dangerous as a foundation.

I basically have refactored the code into a MVC basic framework, it uses Blade to offer a CLEAN frontend view to help prevent future developers inserting PHP code and ensuring everything conforms to a controller.

I have added a few basic PHP Unit Tests, however these are bare minimum and I would of liked to add more but based on time constraints I was unable to.

I removed a lot of the old code as eloquent handles it quite well. 

You'll notice I didn't change the database structure as if the data is already structured in this way in a live environment it *could* cause data loss and issues, I would normally always plan how to migrate / reorganise data within a database.

I've also moved all code "Below-Root" so they cannot be executed by browsers.

Added a "Create Booking" option.

If I have more time I would:
- Setup Migrations to ensure all environments have the same database structure as it will also aid the development process as the software gets bigger.
- More Unit Tests
- Cleaner Directory Structure
- Create functions to structure the creates on the Models.