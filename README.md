# PoolCompetition
Live version is at [https://poolcompetitie.kuijer.dev](https://poolcompetitie.kuijer.dev)

**Software requirements**
- php 8.0
- mysql
- NodeJs 15.x.x
- Composer v2

## Software
This application runs on the following packages:
- Laravel 8
- InertiaJs
- VueJs 3
- Vue3-chartjs
- Pusher

## To get started
### Composer and data
1. Copy the `.env.example` file to `.env` and configure your database settings;
2. Run `composer install` in your terminal;
3. Run `php artisan key:generate` in your terminal;
4. Run `php artisan migrate` to setup your tables;
5. Configure the default user in your `.env` file;
6. Run `php artisan db:seed` to seed your database;
### Front end
1. Run `npm install` in your terminal;
2. Run `npm run watch` to start watching your js- and css-files.
3. Keep this process running
### Log in
1. Run `php artisan serve` in your terminal to start a local webserver in your project folder.
2. Visit the URL and log in with your credentials. 
3. Happy playing!

## Contributing
Make sure you always run php-cs-fixer before making pull requests. Give your commits usefull names.