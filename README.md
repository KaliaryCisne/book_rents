# BOOKSTORE

# SIMPLE APPLICATION WITH LARAVEL

basic project with laravel framework.

## Installation

```bash
    
    git clone project_url_here
    
    cd src
    
    composer install
    
```

## Create database

```bash

    cd ..
    
    docker-compose up -d
    
```

## Creating tables
```bash

    cd src/

    php artisan migrate
        
    
```
## Run Application
```bash
    php artisan key:generate

    php artisan serve
```


## Steps to use the application

1. First, register a user with route: [POST] /users/register

```json
  {
  "name": "kaliary",
  "email": "kaliary@gmail.com",
  "password": "123456",
  "password_confirmation": "123456"
  } 
``` 

2. Now let's log into the application: [POST] /auth/login

```json
 {
  "email": "kaliary@gmail.com",
  "password": "123456"
 }
```

3. And we can already create some books: [POST] /books/register
```json
{
  "title": "php book",
  "unitCount": "2",
  "price": "10"
}
```

4. Finally, we can now rent this book: [POST] /rents/new

```json
{
  "book_id": "4"
}
```