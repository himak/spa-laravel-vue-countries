# SVK media

SPA web application Laravel API / Vue.js

## Deploy

Create **.env** from **.env.example** and fill EUROSMS and CAPTCHA.

    cp .env.example .env

Run this commands:

    composer install
    php artisan key:generate

Import continents and countries from this database [dump file](https://gist.githubusercontent.com/kamermans/1441495/raw/a3364fd2469f1ae1bd5d475428d6c0b6853f7cb7/mysql_countries.sql)

## API points

| Method | URL                         | Note                 |
|--------|-----------------------------|----------------------|
| GET    | /api/countries              | Get all countries    |
| GET    | /api/countries/{country_id} | Detail of country    |
| POST   | /api/countries              | Create a new country |
