# build image 
```bash
docker build -t my-php-server .
docker images
```

# start container
```bash
docker run -d -p 8000:8000 -v "$(pwd)":/var/www/html --name my-php-container my-php-server
```