FROM apline:3.13

RUN apk update
RUN apk add --no-cache --quiet --update redis

COPY tools/config.sh /config.sh

ENTRYPOINT [ "bash", "config.sh" ]
