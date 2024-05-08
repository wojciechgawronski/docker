```bash
sudo service docker start
```

# build image
```bash
docker build -t my-httpd .
```

# start container
```bash
docker run -d -p 8000:80 -v "$(pwd)":/usr/local/apache2/htdocs --name my-httpd my-httpd
 ```