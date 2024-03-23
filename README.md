[Big Plus] Deploy your project to any free hosting platform.
##How to run the project online
---------------------------------------------------------------
1- Change the base URL in the Books Recommender.postman_collection.json = https://www.goblinsware.com/BooksRecommender/api/v1

2- Try the email:user1@users.com with password: password or user2@users.com with password:password or user3@users.com password:password

3- then try the API collection normally.


[Plus] Dockerize the app.
## How to run a project with Laradock.
1- git clone https://github.com/Laradock/laradock.git

2- **cp .env.example .env**

3- change **APP_CODE_PATH_HOST=../BooksRecommender** in laradock .env file and git clone our project beside laradock so the structure should be laradock folder - BooksRecommender folder besides.

4- run: **docker-compose up -d nginx mysql phpmyadmin workspace** in laradock folder

5- Open your project’s .env file and set the following:
**DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=default
DB_USERNAME=default
DB_PASSWORD=secret**

6-**docker-compose exec --user=root workspace bash** in laradock folder now you're inside our project you can then run **compser install** then **php artisan migrate** then **php artisan db:seed**


[Plus] Write API docs
API docs inside Recommender.postman_collection.json;

## How to run the project on the host directly.
It needs a composer, MySQL server , nginx server

1- git clone https://github.com/Mahmoud-ElBoshy/BooksRecommender.git

2- Open your project’s .env file and set the following:
**DB_CONNECTION=mysql
DB_HOST=localhost or 127.0.0.1
DB_PORT=3306
DB_DATABASE=your database name
DB_USERNAME=your database username
DB_PASSWORD=your database password**

3- **composer install** inside the project directory.

4- **php artisan migrate**

5- **php artisan db:seed**
