
# How to build a Puzz Recruitment

## Table of Contents
 1. Cloning the project
 2. Open Docker
 3. Copy .env.example file to make .env file 
 4. Building the container using Docker-Compose
 5. Running the container using Docker-Compose
 6. Accessing and executing php script using docker-compose
 7. Stopping the project using docker-compose
 8. Appendix. Dockerfile

## 1. Cloning the project
In cloning the project will be using the `git cli`. Clone the project into your designated folder.
Repository link [here](https://bitbucket.org/lig-admin/buzzreach_puzz_recruitment_backend/src/master/).

## 2. Open Docker

You can simply click the `launchpad` then click the Docker. Or you can just push the `command` + `space` key then type `Docker`.

Note: `Wait for the docker to be successfully running`

## 3. Copy .env.example file to make .env file
To make a .env file, we can just simply use this command.

    cp .env.example .env

## 4. Building the container using Docker-Compose
If building the container first time, you can use this command.

    docker-compose build

If you want to rebuild the container, you can use this command.

    docker-compose build --no-cache
 

## 5. Running the container using Docker-Compose
First you need to navigate to your project. Then open terminal.
You can use your embedded terminal in your IDE or you can use the `terminal` in mac.

In running the project all you need to do is to write this command

    docker-compose up -d

Commands:
`docker-compose up` - will start the Docker container.
`-d` - Docker container runs in the background of your terminal.

## 6. Accessing and executing php script using docker-compose
To access the php script in the miilike project, in your terminal just write this command.

    docker-compose exec api bash
### Sample Commands
Now we can execute php scripts and unix commands.

#### Install dependencies
To install dependencies, we can just simply use this command.

    composer install

#### Create App key for Laravel project
To create an `APP_KEY`, we can just simply use this command.

    php artisan key:generate

#### Create JWT secret key
Since in our project we are using JWT, to generate JWT secret key we can just simply use this command.

    php artisan jwt:secret

#### Other commands
You can now use other commands like creating model, migrations, seeders and other.
Example migrating database:

    php artisan migrate
or

    php artisan migrate --seed

## 7. Stopping the container using docker-compose
In stopping the container, be sure you are not inside the container bash.
If you are inside the container bash, you can just simply type `exit`.

To stop the container, you can just simply use this command.

    docker-compose down

## 8. Appendix. Dockerfile

for Local Development
    
    .docker/Dockerfile.dev

for Staging & Production

    .docker/Dockerfile.prd
