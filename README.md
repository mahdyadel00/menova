# MenovaHub

## Run Locally

Clone the project

```bash
  git clone https://github.com/MahmoudSayed96/menova-hub.git
```

Go to the project directory

```bash
  cd menova-hub
```

Install dependencies

```bash
  composer install
```

Copy `.env.example` and rename to `.env`

Set database settings

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_name
DB_USERNAME=db_user
DB_PASSWORD=db_pass
```

Generate `APP_KEY`

```bash
php artisan key:generate
```

Run migrations and seeder

```bash
php artisan migrate:fresh --seed
```

Run server

```base
php artisan serve
```

Open your browser and write `http://locahost:8000`
