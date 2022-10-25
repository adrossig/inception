FROM alpine:3.13

RUN apk update && \
    apk add curl mariadb-client redis php7 php7-phar php7-json php7-curl php7-fpm php7-mysqli php7-iconv && \
    wget -O /usr/bin/dumb-init https://github.com/Yelp/dumb-init/releases/download/v1.2.5/dumb-init_1.2.5_x86_64 && \
    chmod +x /usr/bin/dumb-init && \
    mkdir -p /var/www/wordpress && \
    curl -s -L https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar --output /usr/bin/wp && \
    chmod +x /usr/bin/wp && \
    wp core download --version=5.8.1 --path=/var/www/wordpress

COPY conf/wp-config.php /tmp/wp-config.php
COPY tools/config.sh /tmp/config.sh

RUN chmod +x /tmp/config.sh

ENTRYPOINT [ "/usr/bin/dumb-init", "--" ]

CMD [ "sh", "-c", "/tmp/config.sh" ]
