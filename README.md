# Changes applied
* I've tried to keep all code "framework agnostic" to ensure refactor does not add excess code to PR
* I've added a rudimentary application bootstrap `public/index.php` in the absence of a framework
* I've added basic `Factory` classes; I would expect that some convention would be used from framework 
* Moved classes to PSR-4 name spaces
* As company coding styles are not known, I have implemented a camelCase convention for methods and properties
* PSR naming conventions used for classes and methods
* DB naming convention changed, to use snake_case. Added migrations. Charset, FK and engine change. Server defaults should be checked.
* Removed error suppression `@` but have not specifically added try..catch which could be used in several places
* Updated `nginx.conf`
* NB: not all potential Domain structures are in place, for brevity, and they should adhere to the main codebase conventions and coding styles
* Added two basic tests. Normally the framework will include several Abstract TestCase classes to assist with code coverage, dispatch and DI handling
* execute tests with `composer test`
* Phinx migrations added for SQL schema update if required in production environment although not engine and charset changes which have greater repercussions

# Changes Ignored
* No `Router` has been added; I've assumed this would be part of chosen framework for this single view
* Basic database adapter / service has been added, but not PDO (server capabilities not known); I have utilised a `Repository` which would have access to a specific vendor `Adapter`
* I've not applied any styling to the page view but would presume this should be rendered with Bootstrap or JS framework as required
* Reference to `User` object; I've assumed that this was meant to be `Customer` rather than a new model which may be a derivative of `Customer`

--- 

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
