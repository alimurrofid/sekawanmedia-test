## Requirements Installation

requirement:

-   PHP >= 8.2
-   [Composer](https://getcomposer.org/download/)
-   [Node.js](https://nodejs.org/en/download/)
-   [Vscode](https://code.visualstudio.com/download)
-   [Xampp](https://www.apachefriends.org/download.html)
-   [Git](https://git-scm.com/downloads)

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
