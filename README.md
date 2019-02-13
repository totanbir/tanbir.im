# tanbir.im
My Personal Website and Blog Developed on the Laravel Framework

![](https://i.imgur.com/8i5zuvC.gif)

## Installation

Clone the repository-
```
git clone git@github.com:totanbir/tanbir.im.git
```

Then cd into the folder with this command-
```
cd tanbir.im
```

Then do a composer install
```
composer install
```

Then create a environment file using this command-
```
cp .env.example .env
```

Then edit `.env` file with appropriate credential for your database server. Just edit these two parameter(`DB_USERNAME`, `DB_PASSWORD`).

Then create a database named `blog` and then do a database migration using this command-
```
php artisan migrate
```

## Creating an Admin User
```
php artisan db:seed
```

Start up a local development server with `php artisan serve` And, visit [http://localhost:8000/admin](http://localhost:8000/admin).

>**email:** `admins@admin.gmail.com`   
>**password:** `12345`
