# start
```bash
docker-compose up -d
```
# sprawdzanie
```bash
docker exec -ti mysql_for_php mysql -u duser -p dbdocker
```

# inne 
```bash
docker volume ls
docker volume rm nazwa_woluminu
du -sh /var/lib/docker/volumes/

docker exec -ti mysql_for_php mysql -u duser -p dbdocker


# "mysql uses an image, skipping" oznacza, że ​​usługa MySQL zdefiniowana w twoim pliku docker-compose.yml korzysta z istniejącego obrazu (image) zamiast budować nowy obraz na podstawie pliku Dockerfile.
docker-compose build --no-cache
```

# php lokalnie
```
php -S localhost:8000
composer require vlucas/phpdotenv
```
