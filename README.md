# Symfony 5 with docker containers

The instruction understands what you have installed on your pc docker and docker-compose

```
git clone git@gitlab.com:sendxt/coinmarketcup.git

cd coinmarketcup

docker-compose up
```

## Compose

### Database (MariaDB)

...

### PHP (PHP-FPM)

Composer is included

```
docker-compose run php composer 
```

Create database and tables run follow commands

```
docker-compose run php bin/console doctrine:database:create

docker-compose run php bin/console doctrine:schema:update --force
```

### Webserver (Nginx)

...

Open your browser and page localhost:8080/crypto/converter and you'll see a form for convert currencies (not styled)
