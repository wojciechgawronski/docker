# Start
```bash
docker-compose up -d
```
# Sprawdzanie
```bash
# podpinanie się do kontenera
docker exec -ti mysql_for_php mysql -u docker_user -p db_docker
# przez ip
docker inspect php-for-mysql | grep IPAddress
docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' php-for-mysql
mysql -h 172.30.0.2 -P 3306 -u duser -p
```

# Zmiana hasła do BD
```bash
# zatrzymaj kontener mysql:
docker-compose stop mysql

# usuwa kontenery: f-force, 
# i powiązane z nimi wolumeny v-volumes 
docker-compose rm -f -v mysql

# 1. zatrzymaj wszystkie kontenery
# 2. usun ich wolumeny:
# 3. usun sieci utworzone przez docker-compose
docker-compose down --volume

docker rm mysql_for_php 

# zmiana w .env
docker volume ls
docker volume rm nazwa_woluminu
docker-compose down --volume
docker-compose up -d --build 

# budowanie nowego kontenera
#  ew --no-cache:
docker-compose build --no-cache
docker-compose up 

```

# php lokalnie
```bash
php -S localhost:8000
composer install
```