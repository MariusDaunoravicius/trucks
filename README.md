## Setup

* Docker must be running
* Run `cp env.example .env`
* Run `./vendor/bin/sail up -d`
* Run `./vendor/bin/sail php artisan migrate`
* Open http://127.0.0.1:8080/api/v1/trucks it should return paginated response
* ## Testing
* To run tests run `./vendor/bin/sail php artisan test`
