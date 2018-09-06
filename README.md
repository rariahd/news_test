
## Introduction News APIs

Welcome to News API documentation. You can use our API to access News API endpoints, which can get information on news, topics, etc in our database.

## Installation
Create new database named `test123` or whatever you want.
Setup database connection in `.env` file or just use default connection:
```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test123
DB_USERNAME=root
DB_PASSWORD=root
```
Run `composer install && php artisan migrate && php artisan db:seed && vendor/bin/phpunit && php artisan serve` in your terminal.
For full API documentation go to `http://127.0.0.1:8000/docs`

## Authentication

News uses JWT tokens to allow access to the API. You can register a new user and use login API to get your JWT token.
News expects for the API key to be included in all API requests to the server in a header that looks like the following:

```
Authorization: Bearer yourtokenhere
```

Or you can put your JWT token in query parameter like:

```
http://localhost/api/news?token=yourtokenhere
```

You must replace yourtokenhere with your personal JWT token.

## Errors

The News API uses the following error codes:
- 400 - Bad Request – Your request sucks.
- 403 - Forbidden – The data requested is hidden for administrators only.
- 404 - Not Found – The specified data could not be found.
- 500 - Internal Server Error – We had a problem with our server. Try again later.
- 503 - Service Unavailable – We’re temporarially offline for maintanance. Please try again later.
