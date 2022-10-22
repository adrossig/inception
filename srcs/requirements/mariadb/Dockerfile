FROM debian:buster

RUN apt update && apt upgrade -y
RUN apt-get install mariadb-server -y

COPY conf/50-server.cnf /etc/mysql/mariadb.conf.d/50-server.cnf
COPY tools/config.sh /config.sh

ENTRYPOINT [ "bash", "config.sh" ]

EXPOSE 3306

