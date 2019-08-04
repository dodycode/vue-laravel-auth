# vue-laravel-auth
Authentication App that use vuejs as a frontend framework and Laravel as a backend RESTFUL API. This project made for practice purposes.

### Materials
* [Laravel](https://laravel.com)
* [Vue JS](https://vuejs.org/)
* [VueX](https://vuex.vuejs.org/)
* [Vue Router](https://router.vuejs.org/)
* [Axios](https://github.com/axios/axios) 
* [Tailwind CSS](https://tailwindcss.com/)

## Default User
```
email: laravuex@admin.com
pass: password
```

## Setup Laravel
```
composer install
```

### Re-generates autoload to read seeder classes
```
composer dump-autoload
```

### set-up .env
```
cp .env.example .env
```

```
DB_DATABASE=yourdbname
DB_USERNAME=cooluser
DB_PASSWORD=secretpassword
```

### Migrate
```
php artisan migrate --seed
```

### Setup Laravel Mix and other dependencies
```
npm install
```

### Run Laravel and NodeJS for Laravel Mix
```
php artisan serve
npm run watch
```