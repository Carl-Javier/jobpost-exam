### Demo Credentials

**Admin:** admin@admin.com  
**Password:** secret

**User:** user@user.com  
**Password:** secret

### Setup
- `npm install`
- `cp .env.example .env`

- `docker-compose up -d`
- `docker-compose exec app php artisan key:generate`
- `docker-compose exec app composer install`
- `docker-compose exec app php artisan migrate --seed`
- `npm run dev`

### Run Scheduler for jobs
- `docker-compose exec app php artisan schedule:work`
