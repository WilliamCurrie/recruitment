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

<!-- TABLE OF CONTENTS -->
## Table of Contents

* [About the Project](#about-the-project)
  * [Built With](#built-with)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Installation](#installation)

<!-- ABOUT THE PROJECT -->
## About The Project

The task is to refactor this code so that it is functional and also much improved from its current state. Feel free to refactor as much as you like but we'd ask that you don't use a full framework for your test, though we're happy for you to pull in selected components/libraries. We want you to consider how the code can be improved; is it maintainable, how can it be made to adhere to best practice.

### Built With
* Vanilla PHP


<!-- GETTING STARTED -->
## Getting Started

On this task I paid more attention to refactoring the code as you requested.

I followed some design patterns to upgrade the current coding functionality and structure with adhering to best practices.

I have used two packages to help me build the core functionality which are (**psr/container**) and (**symfony/dotenv**).

The first package mainly assists with dependency injection, while the later to read the environment variables.

However, this task you may know can also be built using a separation of concerns, but I skipped the view layer because I want to focus on refactoring the code.


### Prerequisites

* COMPOSER
* PHP +7.2
* PDO MYSQL

### Installation

After configuring the website with the web server of your choice, the database etc, a few commands need to be run:

1. Clone the repo
   ```sh
    git clone https://github.com/amineabri/recruitment.git
   ```
      
2. Copy the .env.example to .env and configure necessary settings:
   ```
    cp .env.example .env
   ```
   
3. Import init.sql to your database :

4. Install dependencies:
   ```
    composer install
   ```