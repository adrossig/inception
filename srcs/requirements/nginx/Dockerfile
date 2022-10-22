FROM debian:buster

RUN apt update && apt upgrade -y
RUN apt install nginx -y
RUN apt install vim -y
RUN apt install curl -y

RUN mkdir -p /etc/nginx/ssl
RUN apt install OpenSSL -y

RUN openssl req -newkey rsa:4096 -days 42 -nodes -x509 \
-subj "/C=IT/ST=RO/L=Roma/O=42/OU=42/CN=marossign.42.fr/UID=arossign" \
-out /etc/ssl/certs/inception.crt \
-keyout /etc/ssl/private/inception.key

RUN mkdir -p /var/run/nginx

COPY conf/nginx.conf /etc/nginx/nginx.conf

RUN chmod 755 /var/www/html
RUN chown -R www-data:www-data /var/www/html

CMD [ "nginx", "-g", "daemon off;" ]
