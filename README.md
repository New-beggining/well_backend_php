# Well Backend (PHP/Laravel)
** **
## Development
** **
### How to install local:
 - Install `Docker / Docker Compose`
 - Pull this project: `git clone git@github.com:New-beggining/well_backend_php.git`
 - `cp .env.example .env`
 - `cp ./docker-compose/nginx/nginx.conf.example ./docker-compose/nginx/nginx.conf`
 - Create file `custom.ini` in `./docker-compose/php/`. Setting for PHP should be here (optional)
 - (optional) Configure `.env` variables (DATABASE, URL etc.)
 - Run `docker compose up`. Ports that need to be free: 8000 (for app), 3306 (for mysql), 6379 (for redis)
 - In another terminal: run `docker compose exec php bash`. Now we are in bash-console inside php container.
 - Run `composer install`
 - Generate app key: `php artisan key:generate`
 - Run database migration: `php artisan migrate`
 - Server will run on `localhost:8000`
