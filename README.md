**Test Submission**

To run this test inside the folder run 

`docker-compose up` or `docker-compose up -d`

I was unable to get composer fully working within the container, so for now you will need to also run

`docker-compose run composer -- install`

Everything should run and install. I tested it on an OS/X system and I presume it will run fine on Linux. No idea about Windows.
 

The task

I have implemented a basic refactor of the code, implementing an MVC pattern. I have not added new features to add or remove data as my main focus was refactoring, however my solution makes adding new features straightforward.

I still think its pretty crude and I wouldn't contemplate deploying this in production. I would use a framework, however I hope this gives you enough information to evaluate my application.

Libraries

- Composer Autoloader 
- AltoRouter - for routing requests
- vlucas/phpdotenv - for loading results from external env file
- PHPUnit, Mockery, Squizlabs/Codesniffer - dev dependencies


Testing

- There was a problem with the mysqli library in PHP Unit and I didn't have enough time left to debug - so i have left a couple of tests in there to show the direction I was going in.
