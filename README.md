<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Modelo de Projeto Laravel com Docker

Projeto desenvolvido para servir como modelo para trabalhar com o Laravel em containers docker.
Já implementei algumas pré configurações abaixo:

-   **[nginx:alpine]**
-   **[mysql:5.7.22](https://www.mysql.com/)**
-   **[redis]**
-   **[Laravel:9](https://laravel.com/)**
-   **[PHP:8.0\*](https://www.php.net/manual/pt_BR/index.php)**

## Instalar App

```bash
$ git clone https://github.com/luizsantos85/app-laravel-docker.git

**observar as configurações de portas e usuario no arquivo docker-composer.yml

**Copiar o .env.example e gerar o .env, fazer as modificações das portas (se necessário) e usuario do DB

**será criada uma pasta .docker/mysql para os arquivos de banco de dados

**Inicializar os containers
$ docker compose up -d

**Acessar o container do laravel
$ docker compose exec app bash

**Instalar os packges do laravel
$ composer install

**Gerar a key do laravel
$ php artisan key:generate

**acessar localhost:(porta selecionada) para teste

```
