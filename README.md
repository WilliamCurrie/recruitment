
# Setup
## Composer
You'll need to run `composer install` before doing anything else so that the additional packages I added get installed. 
## Database
You'll need to self initialize the database so once you've created an appropriate schema inside of mysql you need to run the `mysql SCHEMA < init.sql` command to setup the database
## Environment
Copy .env.example to .env and then change the DB information inside to point at wherever you've initialized your database
## Display
To get the website to display uou'll want to point an apache configuration file at the public directory
### Alternatives
Alternatively you should still be able to run Docker however as I wasn't able to run it myself I didn't want to risk me messing up the Dockerfile. Should work off the bat regardless. Wasn't able to use Docker because I'm developing on Windows 10 atm and I am running Home not Professional or Enterprise


# Database
I've modified the structure of the init.sql to change some columns to some slightly more conforming names
