# Well Backend (PHP/Laravel)
** **
## Development
** **
### How to install local:
 - Install `Docker / Docker Compose`
 - Pull this project: `git clone git@github.com:New-beggining/well_backend_php.git`
 - `cp .env.example .env`
 - (optional) Configure `.env` variables (DATABASE, URL etc.)
 - From root: run `docker compose up`. Ports that need to be free: 8000 (for app), 3306 (for mysql), 6379 (for redis)
 - Server will run on `localhost:8000`
 - Go inside laravel-container with bash: `docker compose exec laravel bash`
 - Generate app key: `php artisan key:generate`
 - Run database migration: `php artisan migrate`
