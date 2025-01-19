## Requirements Installation

requirement:

-   PHP = 8.2.27
-   Composer = 2.7.1
-   Node.js = 20.13.1
-   NPM = 10.5.2
-   Mysql = 15.1 Distrib 10.11.8-MariaDB

## How to install

1. Clone repository

```sh
git clone https://github.com/alimurrofid/sekawanmedia-test.git
```

2. Install & Update Composer

```sh
composer update
```

3. Copy .env.example to .env

```sh
cp .env.example .env
```

4. Generate Key

```sh
php artisan key:generate
```

5. Migration database

```sh
php artisan migrate
```

6. Seeding database

```sh
php artisan db:seed
```


7. Intall npm

```sh
npm install -D tailwindcss postcss autoprefixer flowbite
```

8. Run npm

```sh
npm run dev
```

9. Run laravel

```sh
php artisan serve
```

### User Login
Admin
username: admin
password: admin

User
role diberikan saat booking

username: ade
password: password

username: budi
password: password