# Base Image (Currently Most Stable Version 3.13)
FROM alpine:3.13

RUN apk update && \
	apk add redis && \
	wget -O /usr/bin/dumb-init https://github.com/Yelp/dumb-init/releases/download/v1.2.5/dumb-init_1.2.5_x86_64 && \
	chmod +x /usr/bin/dumb-init

COPY tools/config.sh /tmp/config.sh

RUN chmod +x /tmp/config.sh

ENTRYPOINT [ "/usr/bin/dumb-init", "--" ]

CMD [ "sh", "-c", "/tmp/config.sh" ]
