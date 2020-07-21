Laravel Countries API application

## Technical requirements

- [Docker](https://www.docker.com/get-started).
- [Git](https://git-scm.com/).
- Made with [Laradock](https://laradock.io/)

## Installation

- **Init laradock submodule**

``` bash
git submodule init
```

- **Move to laradock directory, init env file and start docker**

``` bash
cd laradock && cp env-example .env && docker-compose up -d nginx mysql phpmyadmin redis workspace 
```
- **Edit the env file depends on your data, exec workspace container and init laravel application

```bash
composer install && php artisan key:generate
```

## Available methods

- /api/countries (GET) - List of all countries statistic 
- /api/countries (POST) (*require parametr in POST body - 'country') - Add new entry in countries statistic

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
