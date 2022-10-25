FROM alpine:3.13

RUN apk update
RUN apk add curl php7 php7-session php7-fpm php7-mysqli
RUN wget -O /usr/bin/dumb-init https://github.com/Yelp/dumb-init/releases/download/v1.2.5/dumb-init_1.2.5_x86_64
RUN chmod +x /usr/bin/dumb-init

COPY tools/config.sh /tmp/config.sh

RUN chmod +x /tmp/config.sh

ENTRYPOINT [ "/usr/bin/dumb-init", "--" ]

CMD [ "sh", "-c", "/tmp/config.sh" ]
