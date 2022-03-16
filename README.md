# Real Estate API - REST API Solution intended for use in Real Estate Brokerages

This application is based on ``laravel`` framework, 
but implements a different approach for handling requests, 
as it complies with ``SOLID Principles``

## Setup

The environment already comes with laravel framework files on the ``/src``, however, 
in order to setup the database service, you will need to create an ``.env`` file on the root of the project 
with the following content:

```sh
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:2LHerIXZksnkqRCenC0W8Sclpw62bYc2J7xv5HJHH5Y=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=database
DB_DATABASE=realestate
DB_USERNAME=realestate_user
DB_PASSWORD=r34l35t4t3@2022
```

After that, you'll need to copy those database parameters to the ``.env`` file inside the ``/src`` directory, as this one is read by laravel.
Then, after following theses steps, execute the commands:

```
make docker-up
make access-php
composer install
php artisan migrate
```