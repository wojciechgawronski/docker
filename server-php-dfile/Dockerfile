FROM php:7.4-cli

# set working direcotry inside the container
WORKDIR /var/www/html

COPY . .

# expose p. 8000 to the outside the world
EXPOSE 8000

CMD [ "php", "-S", "0.0.0.0:8000"]