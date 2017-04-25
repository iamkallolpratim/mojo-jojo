

## About Mojo-jojo

Mojo-jojo is a simple task management app

##Installation guide

1. Pull the repository

2. Run the command `composer install`

3.Make a copy of `.env.example` file and name it `.env`

4.Configure your DB name, DB user name and and DB password there.

5.Run the command `php artisan key:generate`.

5.Run the command `php artisan migrate` to to create tables.

6.Run the command `php artisan db:seed --class=UsersTableSeeder` to create 3 different types of user.

6.Run the command `php artisan serve` to run the app.



