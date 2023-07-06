# Laravel E-Commerce

## Инструкция для исползования

### Клонирование проекта и копирование env

```bash
$ git clone https://github.com/JaloladdinRozmetov/magazine-test.git
$ cd laravel-ecommers-api
$ cp .env.example .env
```

### Запуск проекта через докер
```bash
$ docker-compose up -d
```

### Запускаем установку пакетов php (композер)
```bash
$ docker exec -it php.ecom composer install
```

### Генерация ключа и запуск миграции для Laravel
```bash
$ docker exec -it php.ecom php artisan key:generate
```

### Запуск миграции для Laravel
```bash
$ docker exec -it php.ecom php artisan migrate
```

### Чтобы заполнить БД заранее прописанными данными можно использовать seed
```bash
$ docker exec -it php.ecom php artisan DB:seed
```
### Открываем Postman или Insomnia или любую другую программу для проверки API
```
method:post
http://localhost:8098/api/login
body:{
"email":"admin@gmail.com",
"password":"password"
}
отправляем и получаем токен логина
```
